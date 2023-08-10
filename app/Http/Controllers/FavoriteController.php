<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Models\Type;
use Illuminate\Support\Facades\View;

class FavoriteController extends Controller
{
    public function index()
    {
        // to get all data
        $favorites = Favorite::all();
        // load view and pass favorites
        return View::make('favorites.index')->with(['favorites' => $favorites]);
    }

    public function create()
    {
        $categories = Category::all();
        $types = Type::all();
        return View::make('favorites.create')->with(['categories' => $categories, 'types' => $types]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'link' => 'required',
            'type' => 'required'
        ]);
        $data = new Favorite;
        $data->name = $request->name;
        $data->link = $request->link;
        $data->type_id = $request->type;
        $data->category_id = $request->category;
        $data->save();
        return redirect()->route('favorites.index')->with('success', 'Favourite has been created successfully.');
    }

    public function show($id)
    {
        $favorite = Favorite::find($id);
        return View::make('favorites.show')->with(['favorite' => $favorite]);
    }

    public function edit($id)
    {
        $favorite = Favorite::find($id);
        $categories = Category::all();
        $types = Type::all();
        return View::make('favorites.edit')
            ->with(['favorite' => $favorite,  'categories' => $categories, 'types' => $types]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'link' => 'required',
            'type' => 'required',
            'category' => 'required'
        ]);
        $data = Favorite::find($id);
        $data->name = $request->name;
        $data->link = $request->link;
        $data->type = $request->type;
        $data->categories_id = $request->category;
        $data->save();
        return redirect()->route('favorites.index')
            ->with('success', 'Company Has Been updated successfully');
    }

    public function destroy($id)
    {
        $data = Favorite::find($id);
        $data->delete();
        return redirect()->route('favorites.index')
        ->with('success', 'Favourite has been deleted successfully');
    }
}
