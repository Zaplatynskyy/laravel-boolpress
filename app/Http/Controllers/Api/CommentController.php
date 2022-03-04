<?php

namespace App\Http\Controllers\Api;

use App\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\CommentMail;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'nullable|string|max: 50',
            'content' => 'required|string',
            'post_id' => 'exists:posts,id'
        ]);

        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "errors" => $validator->errors()
            ], 400);
        }

        $new_comment = new Comment();

        if( !empty($data['name']) ) {
            $new_comment->name = $data['name'];
        }

        $new_comment->content = $data['content'];
        $new_comment->post_id = $data['post_id'];
        $new_comment->save();

        Mail::to('webmaster@boolpress.com')->send(new CommentMail($new_comment->post));

        return response()->json([
            "success" => true
        ]);
    }
}
