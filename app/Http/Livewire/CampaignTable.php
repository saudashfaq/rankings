<?php

namespace App\Http\Livewire;

use App\Models\Campaign;
use App\Models\Keyword;
use App\Models\keywordRankings;
use App\Models\UserAccount;
use Illuminate\Support\Facades\Session;
use Kdion4891\LaravelLivewireTables\Column;
use Kdion4891\LaravelLivewireTables\TableComponent;
use App\Dataforseo\RestClient;

class CampaignTable extends TableComponent
{

    public $sort_attribute = 'campaign_id';
    public $campaign_title;
    public $website_address;
    public $location = [];
    public $time_zone;
    public $group;
    public $language_code;
    public $language_name;
    public $language;
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
    public $country;
    public $Campaign;
    public $campaign;


    /**
     * TODO:
     * when start writing in the location field it should filter from locations
     * and show in the data list
     */


    protected $listeners = ['locationUpdated', 'languageUpdated'];

    public function query()
    {


        return Campaign::query()->where('user_account_id', auth()->user()->user_account_id);

    }


    //listener
    public function locationUpdated($event)
    {
        $this->location = $event[0];
    }

    public function languageUpdated($event)
    {
        $this->language = $event[0];
    }

    private function resetInput()
    {
        $this->campaign_title = null;
        $this->language_code = null;
        $this->language_name = null;
    }


    public function store()
    {

        $this->validate([
            'campaign_title' => 'required',
            'website_address' => 'required',
            'location' => 'required',
            'language' => 'required',
            'time_zone' => 'required'

        ]);
        //dd($this->location);

        $this->campaign = Campaign::create([
            'user_id' => auth()->user()->id,
            'user_account_id' => auth()->user()->user_account_id,

            'campaign_name' => $this->campaign_title,
            'url' => $this->website_address,
            'campaign_logo' => 'N',

            'language_name' => $this->language['language_name'],
            'language_code' => $this->language['language_code'],

            'location' => $this->location['location_code'],
            'location_code' => $this->location['location_code'],
            'location_name' => $this->location['location_name'],
            'country_iso_code' => $this->location['country_iso_code'],

            'time_zone' => $this->time_zone,

            'status' => 2,

            'rank_check_due_time' => "00:00:01",
            'rank_check_frequncy' => 1,


        ]);

        $this->increaseStep();

        //$this->resetInput();
    }

    private function resetInputFields()
    {

        $this->campaign_title = '';
        $this->language_name = '';
        $this->language_code = '';
    }

    public function edit($id)
    {
        $this->updateMode = true;
        $campaign = Campaign::where('campaign_id', $id)->first();
        $this->campaign_id = $id;
        $this->campaign_title = $campaign->campaign_name;
        $this->language_name = $campaign->language_name;
        $this->website_address = $campaign->url;

    }

    public function cancel()
    {
        session()->remove('success');
        session()->remove('failed');
        $this->updateMode = false;
        $this->resetInputFields();

    }

    public function update()
    {

        $validatedDate = $this->validate([
            'campaign_name' => 'required',
            'language_name' => 'required',
            'url' => 'required',
        ]);

        if ($this->campaign_id) {
            $campaign = Campaign::find($this->campaign_id);
            $campaign->update([
                'campaign_name' => $this->campaign_title,
                'language_name' => $this->language_name,
                'url' => $this->website_address,
            ]);
            $this->updateMode = false;
            session()->flash('message', 'Campaign Updated Successfully.');
            $this->resetInputFields();

        }
    }


    public function addKeywords()
    {

        $this->validate([
            'keywords' => 'required',

        ]);


        if (empty($this->campaign->campaign_id)) {
            session()->flash('failed', 'Something is wrong, please refresh page and try again.');
            $this->decreaseStep();
        }

        //dd($this->campaign->campaign_id);

        $kws = explode("\n", $this->keywords);

        $data = array();

        if (count($kws) > 0) {

            $uaid = auth()->user()->user_account_id;
            $cid = $this->campaign->campaign_id;

            foreach ($kws as $kw) {

                if(empty($kw)) continue;
                $data [] = [
                    'keyword' => $kw,
                    'user_account_id' => $uaid,
                    'campaign_id' => $cid,

                ];
            }

            if( count($data) > 0 ) {

                Keyword::insert( $data );

            }

        }


        $this->resetInput();
        $this->resetInputFields();
        $this->resetErrorBag();
        $this->decreaseStep();

        session()->flash('success', 'Campaign successfully created.');

    }

    public function mount()
    {
        $this->currentStep = 1;
    }


    public function increaseStep()
    {
        $this->resetErrorBag();
        //$this->validateData();
        $this->currentStep++;
        if ($this->currentStep > $this->totalSteps) {
            $this->reset();
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
