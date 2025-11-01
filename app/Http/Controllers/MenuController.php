<?php
namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    // Fetch all menu titles for dropdown
    public function getMenus()
    {
        $menus = Menu::select('title', 'icon','route')->get();
        return response()->json($menus);
    }

    // Store a new menu
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'parent' => 'nullable|string|max:255',
            'route' => 'nullable|string|max:255',
            'type' => 'nullable|in:Dropdown,Single',
            'status' => 'nullable|boolean'
        ]);

        $menu = Menu::create([
            'title' => $request->title,
            'icon' => $request->icon,
            'parent' => $request->parent,
            'route' => $request->route,
            'type' => $request->type ?? 'Dropdown',
            'status' => $request->status ?? true
        ]);

        return response()->json(['message' => 'Menu created successfully', 'menu' => $menu]);
    }


    public function fetch()
    {
        $menus = Menu::select('title', 'icon')->get();
        return response()->json($menus);
    }
}
