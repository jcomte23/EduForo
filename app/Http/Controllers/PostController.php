<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $posts=Post::where('user_id', $user_id)->orderBy('updated_at', 'desc')->paginate(10);
        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $request->user()->unionTblPost()->create($request->all());

        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $user_id = auth()->user()->id;
        if($user_id != $post->user_id){
            abort(403);
        }else{
            return view('posts.show',compact('post'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $user_id = auth()->user()->id;
        if($user_id != $post->user_id){
            abort(403);
        }
        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post)
    {
        if($request->user()->id != $post->user_id){
            abort(403);
        }

        $post->update($request->all());
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $user_id = auth()->user()->id;
        if($user_id != $post->user_id){
            abort(403);
        }
        $post->delete();
        return redirect()->route('post.index');
    }
}
