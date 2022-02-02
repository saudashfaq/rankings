<?php

namespace App\Http\Livewire\Campaigns;

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

    public $per_page = 25;
    public $sort_attribute = 'campaign_id';
    public $checkbox_side = 'right';
    public $checkbox_attribute = 'campaign_id';
    public $header_view = 'livewire.campaigns.campaigns-table-header';
    public $checkbox = true;


    public $campaign_title;
    public $campaign_keywords;
    public $website_address;
    public $location = [];
    public $report_delivery_time;
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
    public $campaign_id;
    public $updateMode = false;
    public $country;
    public $campaign;


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


    public function dehydrate()
    {
        $this->emit('parentComponentErrorBag', $this->getErrorBag());
    }



    public function store()
    {

        $this->validate([
            'campaign_title' => 'required|min:3|max:255',
            'website_address' => 'required|min:5|max:255',
            'location' => 'required|max:191',
            'language' => 'required|max:100',
            'report_delivery_time' => 'required|max:7',
            'keywords' => 'required'

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

            'report_delivery_time' => $this->report_delivery_time,

            'status' => 2,

            'rank_check_due_time' => "00:00:01",
            'rank_check_frequncy' => 1,


        ]);

        $this->addKeywords();

        $this->resetInput();
    }

    private function resetInputFields()
    {
        $this->resetErrorBag();

        $this->campaign_title = '';
        $this->language_name = '';
        $this->language_code = '';
        $this->report_delivery_time = '';
        $this->website_address = '';
        $this->location_name = '';
        $this->location_code = '';
        $this->campaign_id = '';
        $this->language = [];
        $this->location = [];
        $this->country = [];
        $this->keywords = '';

        /*$this-> = '';
        $this-> = '';
        $this-> = '';
        $this-> = '';
        $this-> = '';*/
    }

    public function edit($id)
    {
        //dd($id);
        $this->updateMode = true;

        $campaign = Campaign::where('campaign_id', $id)->where('user_account_id', auth()->user()->user_account_id)->firstOrFail();

        $this->campaign_id = $id;
        $this->campaign_title = $campaign->campaign_name;
        $this->report_delivery_time = $campaign->report_delivery_time;
        $this->website_address = $campaign->url;


    }


    public function addMoreKeywordsModel($id)
    {

        $this->campaign = Campaign::where('campaign_id',$id)->where('user_account_id', auth()->user()->user_account_id)->with('keywords')->first();
        $this->campaign_title = $this->campaign->campaign_name;
        $this->campaign_keywords = $this->campaign->keywords;

    }


    public function storeMoreKeywords()
    {

        $this->validate(
            [
                'keywords'=>'required'
            ]
        );

        $this->addKeywords();

        //session()->flash('message', 'Keywords added successfully.');
        Session::flash('success', 'Keywords added successfully.');

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


        $this->validate([
            'campaign_title' => 'required|min:3|max:255',
            'report_delivery_time' => 'required|max:7',
            'website_address' => 'required|min:5|max:255',
        ]);

        if($this->campaign_id) {

            $campaign = Campaign::find($this->campaign_id);

            $updated = $campaign->update([
                'campaign_name' => $this->campaign_title,
                'report_delivery_time' => $this->report_delivery_time,
                'url' => $this->website_address,
            ]);

            if( $updated ) {

                $this->updateMode = false;
                session()->flash('success', 'Campaign updated successfully.');
                $this->resetInputFields();

            }
        }
    }


    public function addKeywords()
    {

        if (empty($this->campaign->campaign_id)) {

            session()->flash('failed', 'Something is wrong, please refresh page and try again.');

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

                $count = Campaign::where('user_account_id', $uaid)->where('campaign_id', $cid)->count();
                if( $count ) {

                    Keyword::insert( $data );
                }


            }

        }

        $this->resetInput();
        $this->resetInputFields();
        $this->resetErrorBag();

        session()->flash('success', 'Campaign successfully created.');


    }



    public function deleteChecked()
    {
        Campaign::whereIn('campaign_id', $this->checkbox_values)->where('user_account_id', auth()->user()->user_account_id)->delete();
    }


    public function columns()
    {
        return [

            Column::make('Campaign', 'campaign_name')->searchable()->sortable(),
            Column::make('Location','location_name')->searchable()->sortable(),
            Column::make('Language','language_name')->searchable()->sortable(),
            //Column::make('user_id')->searchable()->sortable(),
            Column::make('Edit')->view('livewire.campaigns.edit_campaign'),
            Column::make('Add Keywords')->view('livewire.campaigns.add_more_keywords_to_campaign'),

        ];
    }
}
