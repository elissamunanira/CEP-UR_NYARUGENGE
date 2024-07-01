<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $i=0;
        $posts = Post::all();
        return view('posts.index', compact('posts','i'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'categories' => 'required|array',
        ]);

        $coverImage = null;
        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            $fileName = $file->getClientOriginalName();
            $filePath = 'cover_images/' . $fileName;
            $file->move(public_path('storage/cover_images'), $fileName);

            $coverImage = 'storage/'. $filePath;
        }

        $post = Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'cover_image' => $coverImage,
        ]);

        // Attach categories to the post
        $post->Category()->attach($request->categories);

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('posts.edit', compact('post','categories'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'categories' => 'required|array',
        ]);

        if ($request->hasFile('cover_image')) {
            if ($post->cover_image) {
                Storage::disk('public')->delete($post->cover_image);
            }
            $file = $request->file('cover_image');
            $fileName = $file->getClientOriginalName();
            $filePath = 'cover_images/' . $fileName;
            $file->move(public_path('storage/cover_images'), $fileName);

            $coverImage = 'storage/'. $filePath;
            $post->cover_image = $coverImage;
        }

        $post->title = $request->title;
        $post->body = $request->body;
         // Sync categories with the post
         $post->categories()->sync($request->categories);

        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        if ($post->cover_image) {
            Storage::disk('public')->delete($post->cover_image);
        }

        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}
