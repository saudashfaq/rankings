<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Premission extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table ='permissions';
    protected $fillable = [
        'name',



    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */


}
