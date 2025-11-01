<?php

namespace App\Http\Controllers;

use App\Models\CreateMenu;
use App\Models\Profile;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CreateMenuController extends Controller
{

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255'
        ]);
        try {
            //
            $createMenu= new CreateMenu();
            $createMenu->name =$request->name;
            $createMenu->save();

            return response()->json(['res'=>'Data sent successfully']);
        }catch (\Exception $e)
        {
            return response(['res'=> 'Error'.$e->getMessage()], 500);
        }
    }

    public function fetch()
    {
        // $profiles = Profile::all();
        $menu = CreateMenu::orderBy('created_at', 'desc')->get();
        return response()->json($menu);
    }

    public function destroy($id)
    {
        $createMenu = CreateMenu::find($id);

        if ($createMenu)
        {
            $createMenu->delete();
            return response()->json(['res' => 'Delete successfully']);
        }

        return response()->json(['res' => 'Menu not found'], 404);
    }

    public function edit($id)
    {
        $data = CreateMenu::find($id);
        return response()->json(['status' => true, 'message' => '' ,'data'=> $data, 'url'=>route('menu.update',$id)]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $menu = CreateMenu::findOrFail($id);


        $menu->name = $request->name;
        $menu->save();

        return response()->json([
            'status' => true,
            'message' => 'Menu updated successfully',
        ]);
    }
}
