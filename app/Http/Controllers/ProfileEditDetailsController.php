<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProfileEditDetailsController extends Controller
{
//    public function index()
//    {
//        // just for testing GET request
//        return response()->json(['res' => 'GET request successful']);
//    }


    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB
        ]);

        try {
            // Handle file upload
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->move('images', $fileName, 'public');

            // $filePath = $file->storeAs('images', $fileName, 'public');

            // Save student data
            $profile = new Profile();
            $profile->name = $request->name;
            $profile->description = $request->description;
            $profile->image = $filePath; // Store the file path
            $profile->save();

            return response()->json(['res' => 'Send data successfully', 'filePath' => $filePath]);


        } catch (\Exception $e) {
            return response()->json(['res' => 'Error: ' . $e->getMessage()], 500);
        }
    }
    public function fetch()
    {
        // $profiles = Profile::all();
        $profiles = Profile::orderBy('created_at', 'desc')->get();
        return response()->json($profiles);
    }

    public function destroy($id)
    {
        $profile = Profile::find($id);

        if ($profile)
        {
            if ($profile->image && File::exists(public_path($profile->image)))
            {
                File::delete(public_path($profile->image));
            }

            $profile->delete();
            return response()->json(['res' => 'Profile and image deleted successfully']);
        }

        return response()->json(['res' => 'Profile not found'], 404);
    }

    public function edit($id)
    {
        $data = Profile::find($id);
        return response()->json(['status' => true, 'message' => '' ,'data'=> $data, 'url'=>route('profile.update',$id)]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $profile = Profile::findOrFail($id);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/profiles'), $filename);
            $profile->image = 'uploads/profiles/' . $filename;
        }

        $profile->name = $request->name;
        $profile->description = $request->description;
        $profile->save();

        return response()->json([
            'status' => true,
            'message' => 'Profile updated successfully',
        ]);
    }



}

