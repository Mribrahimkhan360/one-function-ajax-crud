<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merchant;

class MerchantController extends Controller
{
    /**
     * Display the Merchant Dashboard view.
     *
     * This method serves the main merchant dashboard page,
     * which is typically used to list, manage, and monitor merchant accounts.
     *
     * @return \Illuminate\View\View
     */

    public function index(){
        return view('pages.dashboard.merchant');
    }

    /**
     * Retrieve and return all merchant records as a JSON response.
     *
     * This endpoint is primarily used for AJAX requests to dynamically
     * populate merchant tables or data grids on the dashboard.
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function fetch(){
        $merchant = Merchant::select('id','name', 'phone','email','address','range','status','login_count')->get();
        return response()->json($merchant,200);
    }

    public function destroy($id)
    {
        $merchant = Merchant::find($id);

        if (!$merchant) {
            return response()->json([
                'status' => false,
                'message' => 'Merchant not found!'
            ], 404);
        }

        $merchant->delete();

        return response()->json([
            'status' => true,
            'message' => 'Merchant deleted successfully!'
        ], 200);
    }

    public function edit($id)
    {
        $merchant = Merchant::findOrFail($id);
        return response()->json($merchant);
    }

    public function update(Request $request, $id)
    {
        $merchant = Merchant::findOrFail($id);

        // Validation to avoid duplicate phone/em

        $merchant->update($request->all());

        return response()->json(['message' => 'Merchant updated successfully!']);
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'name'          => 'required|string|max:255',
            'phone'         => 'required|string',
            'email'         => 'nullable|email',
            'address'       => 'required|string',
            'range'         => 'required|string',
            'store_name'    => 'required',
            'store_code'    => 'required|string',
            'status'        => 'required|in:active,inactive',
        ]);

        $merchant = Merchant::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Merchant added!',
            'merchant' => $merchant
        ], 201);
    }


}
