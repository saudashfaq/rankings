<?php

namespace App\Http\Livewire\Campaigns\Form;

use App\Dataforseo\RestClient;
use Livewire\Component;

class Languages extends Component
{

    public $language;
    public $languages = [];
    public $selected_language = [];


    public function render()
    {
        $this->getLanguages();
        return view('livewire.campaigns.form.languages');
    }


    public function getLanguages()
    {

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


            $results = $client->get("/v3/serp/google/languages");

            //dd($results['tasks'][0]['result']);

            if (!empty($results) && !empty($results['tasks'][0]['result'])) {

                $this->languages = $results['tasks'][0]['result'];
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


    public function updated() {

        //When $this->language is updated we will push
        // detail of this selected language in a its specific variable
        foreach ($this->languages as $index => $language)
        {

            if($language['language_name'] === $this->language)
            {
                $this->selected_language = $language;
                break;
            }

        }

        //dd($this->selected_language);
        $this->emitUp('languageUpdated', [$this->selected_language]);

    }


}
