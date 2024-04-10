<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Post\BaseController;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;


class DestroyController extends BaseController
{
    public function __invoke(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.post.index');

    }
}


