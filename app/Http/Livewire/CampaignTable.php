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
    public $campaign_name;
    public $url;
    public $location = [];
    public $time_zone;
    public $group;
    public $language;
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
    public $country;
    public $Campaign;
    public $campaign;
    public $language_name;


    /**
     * TODO:
     * when start writing in the location field it should filter from locations
     * and show in the data list
     */


    protected $listeners = ['locationUpdated'];

    public function query()
    {

        return Campaign::query()->where('user_account_id', auth()->user()->user_account_id);

    }


    //listener
    public function locationUpdated($event)
    {
        $this->location = $event[0];
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
            'url' => 'required',
            'location' => 'required',
            'language' => 'required',


        ]);
        //dd($this->location);

        $this->campaign = Campaign::create([
            'user_id' => auth()->user()->id,
            'campaign_name' => $this->campaign_name,
            'language_name' => $this->language,
            'location' => $this->location['location_code'],
            'url' => $this->url,
            'location_name' => $this->location['location_name'],
            'status' => 2,
            'location_code' => $this->location['location_code'],
            'language_code' => 'en',
            'campaign_logo' => 'ab',
            'country_iso_code' => $this->location['country_iso_code'],
            'rank_check_due_time' => "00:00:01",
            'rank_check_frequncy' => 1,
            'user_account_id' => auth()->user()->user_account_id,


        ]);

        $this->language_code = 'abc';
        $this->increaseStep();

        //$this->resetInput();
    }

    private function resetInputFields()
    {

        $this->campaign_name = '';
        $this->language_name = '';
    }

    public function edit($id)
    {
        $this->updateMode = true;
        $campaign = Campaign::where('campaign_id', $id)->first();
        $this->campaign_id = $id;
        $this->campaign_name = $campaign->campaign_name;
        $this->language_name = $campaign->language_name;
        $this->url = $campaign->url;

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
            'url' => 'required',
        ]);

        if ($this->campaign_id) {
            $campaign = Campaign::find($this->campaign_id);
            $campaign->update([
                'campaign_name' => $this->campaign_name,
                'language_name' => $this->language_name,
                'url' => $this->url,
            ]);
            $this->updateMode = false;
            session()->flash('message', 'Campaign Updated Successfully.');
            $this->resetInputFields();

        }
    }


    public function addKeywords()
    {

//        dd($this->campaign->campaign_id);

        //dd($this->keywords);
        $this->validate([
            'keywords' => 'required',

        ]);

        //dd($this->campaign->campaign_id);
        //dd($this->keywords);
        $this->keyword = Keyword::create([

            'keyword' => $this->keywords,
            'user_account_id' => auth()->user()->user_account_id,
            'campaign_id' => $this->campaign->campaign_id,

        ]);


        $this->resetInput();
        $this->resetInputFields();
        $this->resetErrorBag();
        $this->decreaseStep();
        Session::put('success','Campaign created successfully');

    }

    public function mount()
    {
        $this->currentStep = 1;
    }


    public function updatedLocation()
    {

        dd($this->location);
        //$row = 1;
        $res = [];
        $this->country;

        $this->locations = $this->getLocations();

        dd($this->locations);


    }


    public function getLocations()
    {

        if (!empty($this->country)) {

            try {
                //Instead of 'login' and 'password' use your credentials from https://app.dataforseo.com/api-dashboard
                $client = new RestClient('https://api.dataforseo.com/', null, env('DFS_API_USER'), env('DFS_API_PASS'));
                //do something
            } catch (RestClientException $e) {
                echo "\n";
                print "HTTP code: {$e->getHttpCode()}\n";
                print "Error code: {$e->getCode()}\n";
                print "Message: {$e->getMessage()}\n";
                print  $e->getTraceAsString();
                echo "\n";
                exit();
            }

            try {
                // using this method you can get a list of locations
                // GET /v3/serp/google/locations
                // in addition to 'google' you can also set other search engine
                // the full list of possible parameters is available in documentation
                $country = 'AT';//TODO: uncomment $this->country;
                $results = $client->get("/v3/serp/google/locations/$country");
                //dd($results['tasks'][0]['result']);
                if (!empty($results) && !empty($results['tasks'][0]['result'])) {

                    $this->locations = $results['tasks'][0]['result'];
                }
                //$this->locations =

            } catch (RestClientException $e) {
                echo "\n";
                print "HTTP code: {$e->getHttpCode()}\n";
                print "Error code: {$e->getCode()}\n";
                print "Message: {$e->getMessage()}\n";
                print  $e->getTraceAsString();
                echo "\n";
            }
            $client = null;

            //return $client->get('/v3/serp/google/locations/'.$this->country);

        }

        return [];

    }


    public function increaseStep()
    {
        $this->resetErrorBag();
        $this->validateData();
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

    public function validateData()
    {

        if ($this->currentStep == 1) {
            $this->validate([
                'campaign_name' => 'required',
                'url' => 'required|string',
                'location' => 'required',
                'group' => 'required',
                'language' => 'required',

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
