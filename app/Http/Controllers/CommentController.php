<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\Events\CommentSent;
use Illuminate\Http\Request;

class CommentController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Post $post)
    {
        return $post->comments()->with('user')->get();

    }


    public function store(Post $post)
    {
        $this->validate(request(), [
            'text' => 'required',
        ]);
        $user = auth()->user();
        $comment = Comment::create([
            'user_id' => $user->id,
            'post_id' => $post->id,
            'text' => request('text'),
        ]);
        broadcast(new CommentSent($user, $comment))->toOthers();
        $comment['user'] = $user;
        return response()->json(array(
            'success' => true,
            'data' => [
                'comment' => $comment
            ]
        ), 200);
    }


}
