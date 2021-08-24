<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use function PHPUnit\Framework\returnValue;

class AdminController extends Controller
{
    public function index(){
        return view('admin');
    }
    //
}
