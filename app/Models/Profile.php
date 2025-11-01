<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profiles'; // Use 'profile' table
    protected $fillable = ['name', 'description', 'image'];

}
