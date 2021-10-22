<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class HomeController extends Controller
{
    public function index()
    {
//
//        $role = Role::create(['name' => 'write']);
//        $Permission = Permission::create(['name' => 'write a post']);
//
//        $role =Role::findById(1);
////
//        $permission = Permission::findById(1);
//       $role->givePermissionTo($permission);


//        (auth()->user()->givePermissionTo('write a post'));

        //(auth()->user()->assignRole('write'));
//        return auth()->user()->permissions;
//        $permission = Permission::create(['name' => 'writer a post']);
//        $role =Role::findById(5);
//        $role->givePermissionTo($permission);




        return view('admin.admin');
    }
    //
}
