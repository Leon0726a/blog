<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;//Postクラスをインポートしている。

class PostController extends Controller
{
    public function index(Post $post)
    {
	return view('posts.index')->with(['posts' => $post->getPaginateByLimit()]);
	//GetPagenateByLimit()はPost.phpで定義したメソッド。
    }

    public function show(Post $post)
    {
	return view('posts.show')->with(['post'=>$post]);
    }

    public function create(Post $post)
    {
	return view('posts.create');
    }

    public function store(Request $request, Post $post)
    {
	$input = $request['post'];
	$post->fill($input)->save();
	return redirect('/posts/' . $post->id);
    }
}
