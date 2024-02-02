<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    /**
     * Displaying a listing of the recipes
     */
    public function index()
    {
        $recipes = Recipe::all();
        return view('welcome',compact('recipes'));
    }

    /**
     * show the form creating a new recipe
     */
    public function create()
    {
        return view('add_recipe');
    }

    /**
     * store a newly created recipe in storage
     */
    public function store(Request $request)
    {
        $incomingFields = $request->validate([
            'title' => "required",
            'ingredients' => "required",
            'recipe' => "required",
        ]);
        $imageName = time() . '.' . $request->file('picture')->extension();
        $request->picture->move(public_path("storage"), $imageName);
        $incomingFields["picture"] = $imageName;

        Recipe::create($incomingFields);
        return redirect("/");
    }

/**
 * Show the form for editing the specified resource.
 */
    public function edit(Recipe $recipe)
    {
        return view("update_recipe",  ['recipe' => $recipe]);
    }

/**
 * Update the specified recipe in storage.
 */
    public function update(Request $request, Recipe $recipe)
    {
        $incomingFields = $request->validate([
            'title' => 'required',
            'recipe' => 'required',
            'ingredients' => 'required',
        ]);
        $imageName = time() . '.' . $request->file('picture')->extension();
        $request->picture->move(public_path("storage"), $imageName);
        $incomingFields["picture"] = $imageName;

        $recipe->update($incomingFields);
        return redirect("/");
    }

/**
 * Remove the specified recipe from storage.
 */
    public function destroy(Recipe $recipe){$recipe->delete();
        return redirect('/');
    }


    /**
     * functionality of seraching
     */

//    public function search(Request $request)
//    {
//        $search = $request->input('search');
//        $results = Recipe::where('name', 'like', "%$search%")->get();
//
//        return view('welcome', ['results' => $results]);
//    }

    public function search(Request $request)
    {
        $query = $request->input('search');

        $recipes = Recipe::where('Title', 'like', '%' . $query . '%')->get();

        return view('search', ['recipes' => $recipes, 'search' => $query]);
    }

}
