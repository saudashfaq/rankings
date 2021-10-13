<?php

namespace App\Http\Livewire;

use App\Models\Campaign;
use App\Models\User;
use Kdion4891\LaravelLivewireTables\Column;
use Kdion4891\LaravelLivewireTables\TableComponent;

class CampaignTable extends TableComponent
{
    public $campaign_title;
    public $website_address;
    public $location;
    public $group;
    public $language;
    public $report_delivery;
    public $keywords;
    public $frameworks = [];
    public $totalSteps = 4;
    public $currentStep = 1;
    public $search;
    public $header_view = 'livewire.header_Campaign';



    public function mount(){
        $this->currentStep = 1;
    }

    public function readCsv(){
        $row = 1;
        $res = [];
        if (($handle = fopen("test.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 10000, ",")) !== FALSE) {
                $num = count($data);
                $row++;
                for ($c=0; $c < $num; $c++) {
                    $res[] = $data[$c] ;
                }

            }
            fclose($handle);

        }

        $this->location = $res;



    }
    public function increaseStep(){
        $this->resetErrorBag();
        $this->validateData();
        $this->currentStep++;
        if($this->currentStep > $this->totalSteps){
            $this->currentStep = $this->totalSteps;
        }
    }

    public function decreaseStep(){
        $this->resetErrorBag();
        $this->currentStep--;
        if($this->currentStep < 1){
            $this->currentStep = 1;
        }
    }

    public function validateData(){

        if($this->currentStep == 1){
            $this->validate([
                'campaign_title'=>'required',
                'website_address'=>'required|string',
                'location'=>'required',
                'group'=>'required',
                'language'=>'required',
                'report_delivery'=>'required',
            ]);
        }
        elseif($this->currentStep == 2){
            $this->validate([
                'keywords'=>'required',

            ]);
        }
        elseif($this->currentStep == 3){
            $this->validate([
                'frameworks'=>'required|array|min:2|max:3'
            ]);
        }
    }



    public function query()
    {

        return 	Campaign::query();

    }

    public function columns()
    {
        return [
            Column::make('campaign_id')->searchable()->sortable(),
            Column::make('Created At')->searchable()->sortable(),
            Column::make('Updated At')->searchable()->sortable(),
        ];
    }
}
