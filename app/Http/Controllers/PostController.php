<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Resources\PostResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\Resource;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return PostResource::collection(Post::with('user')->latest()
            ->paginate(Post::LATEST_POST_NUMBER));
    }

    public function postsByUser($user_id)
    {
        return PostResource::collection(Post::where('user_id', '=', $user_id)
            ->with('user')->with('comments')->latest()->paginate(Post::LATEST_POST_NUMBER));
    }

    public function single(Post $post)
    {
        $post = json_encode(new PostResource($post));
        return view('single', compact('post'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'text' => 'required',
            'user_id' => 'required',
            'image' => 'mimes:jpeg,png,jpg,gif,svg',
        ]);

        $post = new Post();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = $image->getClientOriginalName();
            $destinationPath = public_path('/uploads/posts');
            $image->move($destinationPath, $name);
            $post->image = $name;
        }

        $post->user_id = $request->user_id;
        $post->title = $request->title;
        $post->text = $request->text;
        $post->save();

        return new PostResource($post);
    }


    public function show(Post $post)
    {
        return new PostResource($post);
    }

    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'title' => 'required',
            'text' => 'required',
        ]);

        $post->update($request->only(['title', 'text']));
        return new PostResource($post);
    }

    public function destroy(Post $post)
    {
        $destinationPath = public_path('/uploads/posts');
        $imagePath = $destinationPath . "/" . $post->image;
        \File::delete($imagePath);

        $post->delete();
        return response()->json(['deleted' => true], 204);
    }
}
