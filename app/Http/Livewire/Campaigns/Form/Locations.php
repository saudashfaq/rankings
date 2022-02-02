<?php

namespace App\Http\Livewire\Campaigns\Form;

use App\Dataforseo\RestClient;
use Livewire\Component;

class Locations extends Component
{

    public $locations = [];
    public $location;
    public $selected_location = [];


    protected $listeners = ['countryUpdated' => 'getLocations', 'parentComponentErrorBag'];

    public function parentComponentErrorBag($errorBag)
    {
        $this->setErrorBag($errorBag);
    }






    public function render()
    {
        return view('livewire.campaigns.form.locations');
    }


    public function updated()
    {

        //When $this->country is updated we will push
        // detail of this selected country in a varaible
        foreach ($this->locations as $index => $location) {

            if ($location['location_name'] === $this->location) {

                $this->selected_location = $location;
                break;

            }

        }

        $this->emitUp('locationUpdated', [$this->selected_location]);

    }


    public function getLocations($payload = null)
    {

        //dd($payload);

        $selected_country = $payload['selected_country'];

        if (empty($selected_country)) {
            return false;
        }
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

            $country_iso_code = !empty($selected_country) ? '/' . $selected_country['country_iso_code'] : '';
            $results = $client->get("/v3/serp/google/locations" . $country_iso_code);

            //dd($results['tasks'][0]['result']);

            if (!empty($results) && !empty($results['tasks'][0]['result'])) {

                $this->locations = $results['tasks'][0]['result'];
            }


        } catch (RestClientException $e) {
            echo "\n";
            print "HTTP code: {$e->getHttpCode()}\n";
            print "Error code: {$e->getCode()}\n";
            print "Message: {$e->getMessage()}\n";
            print  $e->getTraceAsString();
            echo "\n";
        }
        $client = null;
        return [];

    }

}
