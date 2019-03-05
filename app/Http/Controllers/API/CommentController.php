<?php

namespace App\Http\Controllers\API;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function store(Request $request){
        $post = Post::find($request['post_id'])->with('comments')->first();
        $comment = Comment::create([
            'post_id' => $post->id,
            'user_id' => auth()->user()->id,
            'message' => $request['message']
        ]);
        return response()->json($comment, 201);
    }
    public function getCommentByPost($post_id){
        $post = Post::find($post_id);
        $comments = $post->comments();
        return response()->json($comments, 200);
    }
}
