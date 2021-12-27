<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Keyword;
use App\Models\KeywordRankings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class HomeController extends Controller
{
    public $keyword;

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

//    $keywords=Keyword::where('user_account_id', auth()->user()->id)->pluck('keyword');

//    $keywords_ranking =keywordRankings::with('keywordshow')->where('id', auth()->user()->id)->get();

//    $keywords_ranking =keywordRankings::with('keywordshow')->get();


//    $keywords_ranking = KeywordRankings::with('keywordshow')->get();
//    $keywords_ranking = $key->toArray();
        //dd($key[0]->keywordshow);


        $keywords_ranking = KeywordRankings::with('keywordshow')->get()->where('user_account_id', auth()->user()->user_account_id);
//       $campaigns_loc = KeywordRankings::with('campaigns')->get();
//         dd($campaigns_loc);

//        return view('admin.admin', compact('keywords_ranking','campaigns_loc'));
        return view('admin.admin', compact('keywords_ranking'));
    }
    //
}
