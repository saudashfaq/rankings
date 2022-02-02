<?php

namespace App\Http\Livewire\Keywords;

use App\Models\Keyword;
use Kdion4891\LaravelLivewireTables\Column;
use Kdion4891\LaravelLivewireTables\TableComponent;

class KeywordTable extends TableComponent
{

    public $keywords, $keyword, $keyword_id;
    public $updateMode = false;
    public $checkbox = true;
    public $sort_attribute = 'keyword_id';
    public $checkbox_attribute = 'keyword_id';

    public $header_view = 'livewire.keywords.keywords-table-header';

    public function render()
    {
        return $this->tableView();
    }


    public function query()
    {
        return Keyword::query()->with('campaign')->where('user_account_id', auth()->user()->user_account_id);
    }

    public function deleteChecked()
    {
        Keyword::whereIn('keyword_id', $this->checkbox_values)->where('user_account_id', auth()->user()->user_account_id)->delete();
        session()->flash('success', 'Keyword deleted successfully.');
    }

    private function resetInputFields(){

        $this->keyword = '';
        $this->keyword_id = '';

    }
    public function edit($id)
    {
        $this->updateMode = true;
        $keyword = Keyword::where('keyword_id',$id)->where('user_account_id', auth()->user()->user_account_id)->first();
        $this->keyword_id = $id;
        $this->keyword = $keyword->keyword;

    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
        $this->resetErrorBag();


    }


    public function update()
    {
        $this->validate([

            'keyword' => 'required|min:3|max:255',

        ]);

        if ($this->keyword_id) {
            $keyword = Keyword::find($this->keyword_id);
            $keyword->update([
                'keyword' => $this->keyword,
            ]);
            $this->updateMode = false;
            session()->flash('message', 'Keyword Updated Successfully.');
            $this->resetInputFields();

        }
    }


    public function columns()
    {
        return [
            //Column::make('ID', 'keyword_id')->searchable()->sortable(),
            Column::make('Keyword', 'keyword')->searchable()->sortable(),
            Column::make('Campaign', 'campaign.campaign_name')->searchable()->sortable(),
            Column::make('Created At', 'created_at')->searchable()->sortable(),
            Column::make('Action')->view('livewire.keywords.edit_keyword'),

        ];
    }
}
