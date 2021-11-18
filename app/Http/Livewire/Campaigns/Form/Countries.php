<?php

namespace App\Http\Livewire\Campaigns\Form;

use App\Dataforseo\RestClient;
use Livewire\Component;

class Countries extends Component
{

    public $country;
    public $countries = [];
    public $selected_country = [];


    public function render()
    {

        $this->getCountries();
        return view('livewire.campaigns.form.countries');

    }




    public function updated() {

        //When $this->country is updated we will push
        // detail of this selected country in a varaible
        foreach ($this->countries as $index => $country)
        {

            if($country['location_name'] === $this->country)
            {
                $this->selected_country = $country;
                break;
            }

        }

        //found full detail of the selected country
        //dd($this->selected_country);

        $this->emitTo( 'campaigns.form.locations','countryUpdated', ['selected_country' => $this->selected_country]);

    }



    public function getCountries()
    {

        $res = [];


        if (($handle = fopen("locations_and_languages_dataforseo_labs_2021_11_09.csv", "r")) !== FALSE) {

            while (($data = fgetcsv($handle, 300, ",")) !== FALSE) {


                //dd($data);
                if( !empty($this->country) ) {

                    if(str_contains(strtolower($data[1]), strtolower($this->country)) === true)
                    {

                        $res[] = [

                            'location_code' => $data[0],
                            'location_name' => $data[1],
                            'country_iso_code' => $data[3]
                        ];

                    }
                    continue;

                } else {

                    $res[] = [

                        'location_code' => $data[0],
                        'location_name' => $data[1],
                        'country_iso_code' => $data[3]
                    ];

               }


            }


        }
        fclose($handle);

        $this->countries = $res;

    }




    public function readCsv()
    {

        dd($this->search_term);

        //$row = 1;
        $res = [];


        if (($handle = fopen("locations_and_languages_dataforseo_labs_2021_11_09.csv", "r")) !== FALSE) {

            while (($data = fgetcsv($handle, 300, ",")) !== FALSE) {

                $res[] = $data;

            }


        }
        fclose($handle);

        $num = count($res);

        //die();

        $final = [];
        foreach ($res as $row) {

            if( !empty($row[1]) && str_contains($row[1], $this->search_term) ) {

                $final[] = $row[1];

            }

        }

        dd($final);
        $this->countries = $res;

    }



}
