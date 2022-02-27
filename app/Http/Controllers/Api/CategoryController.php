<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Post;

class CategoryController extends Controller
{
   
    public function index()
    {
        $categories = Category::all();

        return response()->json($categories);
    }

    public function show($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $posts = Post::where('category_id', $category->id)->get();

        if(empty($category)) {
            return response()->json('', 404);
        }
        
        return response()->json(['categories' => $category, 'posts' => $posts]);
    }
   
}
