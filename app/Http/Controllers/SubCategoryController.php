<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use App\Models\Profile;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SubCategoryController extends Controller
{

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255'
        ]);
        try {
            //
            $subCategory= new SubCategory();
            $subCategory->name =$request->name;
            $subCategory->save();

            return response()->json(['res'=>'Data sent successfully']);
        }catch (\Exception $e)
        {
            return response(['res'=> 'Error'.$e->getMessage()], 500);
        }
    }

    public function fetch()
    {
        // $profiles = SubCategory::all();
        $menu = SubCategory::orderBy('created_at', 'desc')->get();
        return response()->json($menu);
    }

    public function destroy($id)
    {
        $subCategory = SubCategory::find($id);

        if ($subCategory)
        {
            $subCategory->delete();
            return response()->json(['res' => 'Delete successfully']);
        }

        return response()->json(['res' => 'Menu not found'], 404);
    }

    public function edit($id)
    {
        $data = SubCategory::find($id);
        return response()->json(['status' => true, 'message' => '' ,'data'=> $data, 'url'=>route('subcategory.update',$id)]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $menu = SubCategory::findOrFail($id);
        $menu->name = $request->name;
        $menu->save();

        return response()->json([
            'status' => true,
            'message' => 'Sub Category updated successfully',
        ]);
    }
}
