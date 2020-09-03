<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{

    public function show($slug)
    {
        $recipe = Recipe::where('slug', $slug)->firstOrFail();
        $comments = $recipe->comments->filter(function ($comment){
            return $comment['status'] == 1;
        });

        $recipes = Recipe::where([
            ['status','=', 1],
            ['featured', '=', 1]
        ])->take(3)->get();


        return view('recipe', compact('recipe', 'comments','recipes'));
    }

    public function store(Request $request){
        $data = $request->all();
        $data['status'] = 1;
        if(Comment::create($data)){
            return back()->withInput();
        }
    }
}
