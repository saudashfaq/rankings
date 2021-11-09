<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_accounts extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table ='user_accounts';
    protected $fillable = [
        'email',



    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */




}
