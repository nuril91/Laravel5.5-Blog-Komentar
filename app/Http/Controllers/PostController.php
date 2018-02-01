<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class PostController extends Controller
{

    public function index(){
        $posts = Post::latest()->paginate(10);

        return view('post.index', compact('posts'));
    }

    public function create(){
        $categories = Category::all();

        return view('post.create', compact('categories'));
    }

    public function store(){
        $this->validate(request(),[
            'title' => 'required',
            'content' => 'required|min:10',
        ]);

        Post::create([
            'title' => request('title'),
            'slug' => str_slug(request('title')),
            'content' => request('content'),
            'category_id' => request('category_id')
        ]);

        return redirect()->route('post.index')->with('success', 'Post Berhasil Ditambahkan');
    }

    public function show(Post $post){
        return view('post.show', compact('post'));
    }
}
