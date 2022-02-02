<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\KeywordRankings;
use Kdion4891\LaravelLivewireTables\Column;
use Kdion4891\LaravelLivewireTables\TableComponent;

class KeywordRankingTable extends TableComponent
{

    public $checkbox = false;
    public $sort_attribute = 'created_at';
    public $per_page = 10;

    public function query()
    {
        return KeywordRankings::with('keyword','campaign');//TODO: ->where('user_account_id', auth()->user()->user_account_id);
    }

    public function columns()
    {
        return [
            //Column::make('ID')->searchable()->sortable(),
            Column::make('Keyword', 'keyword.keyword')->searchable()->sortable(),
            Column::make('Location', 'campaign.location_name')->searchable()->sortable(),
            Column::make('Organic Rank', 'google_organic')->searchable()->sortable(),
            Column::make('Organic Change', 'google_organic_change')->searchable()->sortable(),
            Column::make('Mobile Rank', 'google_mobile')->searchable()->sortable(),
            Column::make('Mobile Change', 'google_mobile_change')->searchable()->sortable(),
            Column::make('Local Rank', 'google_local')->searchable()->sortable(),
            Column::make('Local Change', 'google_local_change')->searchable()->sortable(),
        ];
    }
}
