<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Category;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $categories = Category::all();
        $post = Post::latest()->first();
        // Load categories associated with the latest post
        $post->load('Category');
        return view('home.index',compact('post', 'categories'));
    }
}
