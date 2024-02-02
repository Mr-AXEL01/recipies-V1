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
        return view('home',compact(recipes));
    }
}
