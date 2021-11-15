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
  public function users(){

      return $this->hasMany(User::class, 'user_account_id', 'id');

  }

    protected $table ='user_accounts';
    protected $fillable = [
        'business_name',
        'email',
        'logo',
        'status',



    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */




}
