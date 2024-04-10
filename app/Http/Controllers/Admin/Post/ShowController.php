<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Post\BaseController;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;


class ShowController extends Controller
{
    public function __invoke(Post $post)
    {
        return view('admin.post.show', compact('post'));


    }
}


