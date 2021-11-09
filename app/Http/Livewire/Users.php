<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use App\Models\User;


class Users extends Component
{


    public $users, $name, $email, $user_id;
    public $updateMode = false;
    public $userIdBeingRemoved = null;


    //protected $listeners = ['deleteUser' => 'delete'];

    public function render()
    {
        $this->users = User::all();
        return view('livewire.users.user');
    }
    private function resetInputFields(){
        $this->name = '';
        $this->email = '';
    }

    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        User::create($validatedData);

        session()->flash('message', 'Users Created Successfully.');

        $this->resetInputFields();

        $this->emit('userStore'); // Close model to using to jquery

    }

    public function edit($id)
    {
        $this->updateMode = true;
        $user = User::where('id',$id)->first();
        $this->user_id = $id;
        $this->name = $user->name;
        $this->email = $user->email;

    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();


    }

    public function update()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        if ($this->user_id) {
            $user = User::find($this->user_id);
            $user->update([
                'name' => $this->name,
                'email' => $this->email,
            ]);
            $this->updateMode = false;
            session()->flash('message', 'Users Updated Successfully.');
            $this->resetInputFields();

        }
    }

//    public function confirmUserRemoval($userId)
//    {
////        dd($userId);
//        $this->userIdBeingRemoved =$userId;
//
//         $this->dispatchBrowserEvent('show-delete-modal');
//    }
//    public function deleteUser(){
//
//        $user =User::findorfail($this->userIdBeingRemoved);
//
////        dd($user);
//
//        $user->delete();
//        $this->dispatchBrowserEvent('hide-delete-modal' , ['message' => 'User Deleted']);
//    }
//    /**
//     * Write code on Method
//     *
//     * @return response()
//     */
//    public function deleteId($id)
//    {
//
//        $this->deleteId = $id;
//
//        //User::find($this->deleteId)->delete();
//
//    }
//
//    public function delete()
//    {
//
//        User::find($this->deleteId)->delete();
//        $this->resetInputFields();
//        $this->emit('delete'); // Close model to using to jquery
//    }


//
//    public $listeners = [
//        'deleteUserCallback' => 'delete'
//    ];
//
//    public function deleteId($id)
//    {
//        $userName = User::find($id);
//        $this->emit('sendConfirmation', "Delete Artist: $userName?", 'deleteUserCallback', $id);
//
//    }
//
//    public function delete($id)
//    {
//        $user = User::find($id);
//        $user->delete();
//    }
//    public function confirmUserRemoval($userId)
//    {
//
//        $this->userIdBeingRemoved = $userId;
//
//
//        $this->dispatchBrowserEvent('show-delete-modal');
//    }
//
//


//    public function deleteUser()
//    {
//
//        $user = User::find($this->userIdBeingRemoved);
//
//        if($user) {
//
//            $user->delete();
//
//            $this->dispatchBrowserEvent('hide-delete-modal', ['message' => 'User deleted successfully!']);
//        }
//        //return false;
//
//    }


}
