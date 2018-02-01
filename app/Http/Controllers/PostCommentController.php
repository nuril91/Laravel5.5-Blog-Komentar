<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class PostCommentController extends Controller
{
    public function store(Post $post){
        $this->validate(request(),[
            'message' => 'required|max:2000',
        ]);

        Comment::create([
            'post_id' => $post->id,
            'user_id' => auth()->id(),
            'message' => request('message')
        ]);

        return redirect()->back()->with('success', 'Komentar Berhasil Ditambahkan');
    }
}
