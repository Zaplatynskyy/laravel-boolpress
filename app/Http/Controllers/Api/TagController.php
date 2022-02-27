<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tag;
use App\Post;

class TagController extends Controller
{
   
    public function index()
    {
        $tags = Tag::all();

        return response()->json($tags);
    }

    public function show($slug)
    {
        $tag = Tag::where('slug', $slug)->first();
        $posts = Post::where('category_id', $tag->id)->get();

        if(empty($tag)) {
            return response()->json('', 404);
        }
        
        return response()->json(['categories' => $tag, 'posts' => $posts]);
    }
   
}
