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


        $keywords_rankings = KeywordRankings::with('keyword', 'campaign')/*->where('user_account_id', auth()->user()->user_account_id)*/->paginate(10);
        return view('admin.dashboard' )->with('keywords_rankings', $keywords_rankings);
    }
    //
}
