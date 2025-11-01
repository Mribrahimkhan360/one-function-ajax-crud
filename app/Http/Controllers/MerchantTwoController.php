<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MerchantTwo;

class MerchantTwoController extends Controller
{
    //
    public function index()
    {
        return view('pages.dashboard.merchant-two');
    }
    public function create(Request $request)
    {
        $validated = $request->validate([
            'name'          => 'required|string|max:255',
            'phone'         => 'required|string|regex:/^\+?[0-9]{10,15}$/|unique:merchants,phone',
            'email'         => 'nullable|string',
            'address'       => 'required|string',
            'range'         => 'required|string',
            'store_name'    => 'required',
            'store_code'    => 'required|string',
            'status'        => 'required|in:active,inactive',
        ]);

        $merchantTwo = MerchantTwo::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Merchant added!',
            'merchant' => $merchantTwo
        ], 201);
    }
    public function fetch(){
        $merchantTwo = MerchantTwo::select('id','name', 'phone','email','address','range','status','login_count')->get();
        return response()->json($merchantTwo,200);
    }

    public function edit($id)
    {
        $merchantTwo = MerchantTwo::findOrFail($id);
        return response()->json($merchantTwo);
    }
}
