<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public function campaigns()
    {

        return $this->belongsTo(User_accounts::class, 'user_account_id', 'campaign_id');

    }

    public function keyword()
    {
        return $this->hasMany(Keyword::class);
    }


    protected $primaryKey = 'campaign_id';
    protected $table = 'campaigns';
    protected $fillable = [


        'campaign_name',
        'language_name',
        'location_name',
        //'search_term',
        'url',
        'user_id',
        'status',
        'location_code',
        'language_code',
        'campaign_logo',
        'country_iso_code',
        'rank_check_due_time',
        'rank_check_frequncy',
        'user_account_id',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
//        'password',
//        'remember_token',
//        'two_factor_recovery_codes',
//        'two_factor_secret',
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
//        'profile_photo_url',
    ];
}
