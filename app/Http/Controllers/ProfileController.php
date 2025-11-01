<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;


class ProfileController extends Controller
{
    // Profile
    public function index()
    {
        return view('pages.dashboard.profile');
    }
}
