<?php

namespace App\Http\Livewire;

use App\Models\Campaign;
use App\Models\Keyword;
use Kdion4891\LaravelLivewireTables\Column;
use Kdion4891\LaravelLivewireTables\TableComponent;

class CampaignTable extends TableComponent
{

    public $sort_attribute = 'campaign_id';
    public $campaign_name;
    public $url;
    public $location;
    public $group;
    public $language_name;
    public $language_code;
    public $report_delivery;
    public $keywords;
    public $frameworks = [];
    public $totalSteps = 3;
    public $currentStep = 1;
    public $search;
    public $search_term;
    public $user_id;
    public $status;
   public $location_code;
   public $campaign_logo;
  public $country_iso_code;
  public $rank_check_due_time;
  public $rank_check_frequncy;
 public $user_account_id;
 public $location_name;
 public $keyword;
    public $checkbox_side = 'right';
    public $campaign_id;
 public $updateMode = false;
 public $checkbox = true;
 public $checkbox_attribute = 'campaign_id';
 public $header_view = 'campaigns.campaigns-table-header';

    public $Campaign;

    public function query()
    {

        return Campaign::query();

    }

    private function resetInput()
    {
        $this->campaign_name = null;
        $this->language_code = null;
    }
    public function store()
    {


        $this->validate([
            'campaign_name' => 'required',
            'language_name' => 'required',
            'location'=> 'required',
            'url'=>'required',
            'search_term'=>'required',

        ]);
       Campaign::create([
           'user_id'=> auth()->user()->id,
           'campaign_name' => $this->campaign_name,
            'language_name' => $this->language_name,
            'location'=>$this->location,
            'url'=>$this->url,
           'location_name'=>$this->search_term,
           'status'=> 2,
           'location_code'=>1,
           'language_code'=>'en',
           'campaign_logo'=>'ab',
           'country_iso_code'=>0,
           'rank_check_due_time'=>2,
           'rank_check_frequncy'=>1,
           'user_account_id'=>1,


       ]);

        $this->language_code= 'abc';
        $this->increaseStep();

        //$this->resetInput();
    }
    private function resetInputFields(){
        $this->campaign_name = '';
        $this->language_name = '';
    }
    public function edit($id)
    {
        $this->updateMode = true;
        $campaign = Campaign::where('campaign_id',$id)->first();
        $this->campaign_id = $id;
        $this->campaign_name = $campaign->campaign_name;
        $this->language_name = $campaign->language_name;

    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();


    }

    public function update()
    {

        $validatedDate = $this->validate([
            'campaign_name' => 'required',
            'language_name' => 'required',
        ]);

        if ($this->campaign_id) {
            $campaign = Campaign::find($this-> campaign_id);
            $campaign->update([
                'campaign_name' => $this->campaign_name,
                'language_name' => $this->language_name,
            ]);
            $this->updateMode = false;
            session()->flash('message', 'campaign Updated Successfully.');
            $this->resetInputFields();

        }
    }


    public function addKeywords()
    {

        //dd($this->keywords);
        $this->validate([
            'keywords' => 'required',

        ]);

       Keyword::create([

           'keyword' => $this->keywords,
           'user_account_id'=>auth()->user()->id,
           'campaign_id'=> 1,


       ]);

        $this->increaseStep();
        $this->resetInput();

    }

    public function mount()
    {
        $this->currentStep = 1;
    }

    public function readCsv()
    {
        $row = 1;
        $res = [];

        $this->search_term;
        if (($handle = fopen("locations_and_languages_dataforseo_labs_2021_09_28 - Sheet1.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 10000, "\t")) !== FALSE) {
                $num = count($data);
                $row++;
                for ($c = 0; $c < $num; $c++) {
                    if (str_contains($data[$c], $this->search_term)) {
                        $res[] = $data[$c];
                    }
                }

            }
            fclose($handle);

        }

        //dd($res);
        $this->location = $res;


    }

    public function increaseStep()
    {
        $this->resetErrorBag();
        $this->validateData();
        $this->currentStep++;
        if ($this->currentStep > $this->totalSteps) {
            $this->currentStep = $this->totalSteps;
        }
    }

    public function decreaseStep()
    {
        $this->resetErrorBag();
        $this->currentStep--;
        if ($this->currentStep < 1) {
            $this->currentStep = 1;
        }
    }

    public function validateData()
    {

        if ($this->currentStep == 1) {
            $this->validate([
                'campaign_name' => 'required',
                'url' => 'required|string',
                'location' => 'required',
                'group' => 'required',
                'language_name' => 'required',
                'report_delivery' => 'required',
            ]);
        } elseif ($this->currentStep == 2) {
            $this->validate([
                'keywords' => 'required',

            ]);
        }
//        elseif ($this->currentStep == 3) {
//            $this->validate([
//
//            ]);
//        }

    }




    public function deleteChecked()
    {
        Campaign::whereIn('campaign_id', $this->checkbox_values)->delete();
    }


    public function columns()
    {
        return [
            Column::make('campaign_name')->searchable()->sortable(),
            Column::make('location_name')->searchable()->sortable(),
            Column::make('language_name')->searchable()->sortable(),
            //Column::make('user_id')->searchable()->sortable(),
            Column::make('Action')->view('livewire.campaigns.edit_campaign'),
//            Column::make('Created At')->searchable()->sortable(),
//            Column::make('Updated At')->searchable()->sortable(),
        ];
    }
}
