<?php

namespace App\Http\Controllers\Api;

use App\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();

        $new_comment = new Comment();

        if( !empty($data['name']) ) {
            $new_comment->name = $data['name'];
        }

        $new_comment->content = $data['content'];
        $new_comment->post_id = $data['post_id'];
        $new_comment->save();

        return response()->json([
            "success" => true
        ]);
    }
}
