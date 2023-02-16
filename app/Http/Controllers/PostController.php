<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
class PostController extends Controller
{
    public function create()
    {
        $posts = Post::latest()->get();
        return compact('posts');
    }

    public function store()
    {
        request()->validate([
            'username' => 'required',
            'comments' => 'required'
        ]);

        $post = new Post();
        $post->username = request('username');
        $post->comments = request('comments');
        $post->save();
        return response()->json();
    }

    public function edit($id)
    {
        //find the article associated with id
        $posts = Post::find($id);
        if ($posts)
        {
            return response()->json([
                'status' => 200,
                'posts' => $posts,
            ]);
        }
        else
        {
            return response()->json([
                'status' => 404,
                'posts' => 'Student not Found',
            ]);
        }
    }

    public function update($id)
    {
        request()->validate([
            'username' => 'required',
            'comments' => 'required'
        ]);

        $post = Post::find($id);
        $post->username = request('username');
        $post->comments = request('comments');
        $post->save();
        return response()->json();
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
    }
}
