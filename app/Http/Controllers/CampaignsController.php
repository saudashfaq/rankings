<?php

namespace App\Http\Controllers;

use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades;
use Maatwebsite\Excel\Facades\Excel;

class CampaignsController extends Controller
{



    public function index(){
        return view('pages.campaigns');
    }

}