<?php

namespace App\Http\Livewire;

use App\Events\SendInvitationMail;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Kdion4891\LaravelLivewireTables\Column;
use Kdion4891\LaravelLivewireTables\TableComponent;

class UserTable extends TableComponent
{
    public $users, $name, $email, $user_id;
    public $updateMode = false;
    public $checkbox = true;
    public $checkbox_attribute = 'id';

    //This is livewire datatable property we can provide anything in
    //header view
    public $header_view = 'users.users-table-header';


    public function query()
    {
        return User::query();
    }


    public function createTeamMember(Request $request){
        {

            $this->validate($request, [
                'name'     =>  'required',
                'email'  =>  'required|email',
                'url' => [
                    'required|url',
                    'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
                ],

            ]);
            $name = $request->input('name');
            $email = $request->input('email');

            $user = new User();
            $user->name = $name;
            $user->email = $email;
            $user->user_send_invitation='1';
            $user->save();

            $user->assignRole($request->input('role'));

            event(new SendInvitationMail($user));
            return back()->with('success', 'Your Invitation Will be Send!',array('timeout' => 3000));

        }

        //store data in DB
        //assign role
        //Event sendInvitationToTeamMember ok
        //URL should encrypted, validate 60 minutes validity
        //URL would have user id ok

    }


    public function showAcceptInvitationFormToTeamMember(Request $request) {

        $name = $request->route('name');
        $email = $request->route('email');

        $user =User::where('email', $email)->first();

        return view('users.registration_new_user',['name' => $name, 'email' => $email , 'id' => $user->id]);

        //validate secure URL okk
        //get user id from url ok
        //get detail from DB or this user id ok
        //show this detail on form ok


    }

    public function createPasswordForTeamMember(Request $request) {

        $this->validate($request, [
            'password' => [
                'required',
                'min:8',             // must be at least 10 characters in length
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[@$!%*#?&]/', // must contain a special character
            ],
            'url' => [
                'required|url',
                'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
            ],
        ]);

        $id = $request->input('id');
        $password = $request->input('password');

        User::where('id',$id)->update(['password'=> Hash::make($password)]);

        echo "Your are register Now you can Login ";
    }

    public function deleteChecked()
    {
        User::whereIn('id', $this->checkbox_values)->delete();
    }

    private function resetInputFields(){
        $this->name = '';
        $this->email = '';
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


    public function columns()
    {
        return [
//            Column::make('ID')->searchable()->sortable(),
            Column::make('Name')->searchable()->sortable(),
            Column::make('Email')->searchable()->sortable(),
            Column::make('Role'),
            Column::make('Action')->view('livewire.users.edit_user'),
//            Column::make('Created At')->searchable()->sortable(),
//            Column::make('Updated At')->searchable()->sortable(),
        ];
    }
}
