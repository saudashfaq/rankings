<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeywordRankings extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


//    public function keyword(){
//
//        return $this->belongsTo(Keyword::class, 'keywords_id' ,'id');
//
//    }


    protected $table = 'keyword_rankings';
    protected $primaryKey ='id';
    protected $fillable = [
        'keyword_id',
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

    public function userAccount()
    {

        return $this->belongsTo(UserAccount::class, 'user_account_id', 'id');

    }



    public function keyword()
    {

        return $this->belongsTo(Keyword::class, "keyword_id", 'keyword_id');

    }

    public function campaign()
    {

        return $this->belongsTo(Campaign::class, "campaign_id", 'campaign_id');

    }



}
