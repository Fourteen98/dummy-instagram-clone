<?php

namespace App\Http\Controllers;

use Intervention\Image\ImageManager as Image;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $data = request()->validate([
            'caption' => 'required',
            'image' => ['required', 'image'],
        ]);


        $imagePath = request('image')->store('uploads', 'public');

//        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
//        $image.save();

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]);

        return redirect('/profile/' . auth()->user()->id);
    }

    public function show($post)
    {
        $post = \App\Models\Post::findOrFail($post);
        return view('posts.show', [
            'post' => $post,
        ]);
    }
}
