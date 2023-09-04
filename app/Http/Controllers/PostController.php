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
}
