<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */





    protected $table ='keywords';
    protected $fillable = [
        'keyword',
        'user_account_id',
        'campaign_id',


    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        // 'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [


    ];


    public function userAccount(){

        return $this->belongsTo(User_accounts::class, 'user_account_id' ,'id');

    }

    public function campaigns(){

        return $this->belongsTo(Keyword::class, 'campaign_id' ,'keyword_id');

    }


}
