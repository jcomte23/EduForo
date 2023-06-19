<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PublicPagesController extends Controller
{
    public function page_home()
    {
        $posts = Post::orderBy('updated_at', 'desc')->paginate(5);
        return view('welcome',compact('posts'));

    }
}
