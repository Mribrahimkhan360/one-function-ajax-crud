<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileDetailsController extends Controller
{
    // Profile
    public function index()
    {
        return view('pages.dashboard.profile-details');
    }
}
