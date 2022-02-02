<?php

namespace App\Http\Controllers;


use App\Events\SendInvitationMail;
use App\Mail\SendMail;
use App\Models\Keyword;
use App\Models\UserAccount;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database;

class KeywordsController extends Controller
{



    public function index()
    {
        $keywords = Keyword::get();

        return view('livewire.keywords.keywords')->with(['keywords' => $keywords]);

    }


}


