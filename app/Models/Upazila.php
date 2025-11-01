<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Upazila extends Model
{
    //
    protected $fillable = [
        'id',
        'title',
        'division_id',
        'district_id',
        'code',
        'status',
        'lat',
        'lng',
    ];
}
