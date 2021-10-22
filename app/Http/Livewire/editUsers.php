<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class editUsers extends Component
{
    use WithPagination;

    public $action;
    public $id;
protected $listeners=[
    'refreshParent' =>   '$refresh'
];

public  function selectUser($id ,$action){
            $this->id= $id;
            $this->action=$action;
}

    public function render()
    {
        $user = User::where('id','=',auth()->user()->id)->first();
        return view('livewire.edit-users',[
            'user'=> $user
        ]);
    }

    public function deleteUser($id){

        User::destroy($id);
    }
}
