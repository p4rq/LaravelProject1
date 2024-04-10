<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $post = Post::find(1);
        $category = Category::find(1);
        $tag = Tag::find(1);
        dd($post->tags);
        return view('post.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.create', compact('categories', 'tags'));
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'required|string',
            'content' => 'string',
            'image' => 'string',
            'category_id'=>'',
            'tags'=>'',
        ]);
        $tags=$data['tags'];
        unset($data['tags']);
        $post = Post::create($data);
        $post->tags()->attach($tags);
        return redirect()->route('post.index');
    }

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('post.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
            'category_id'=>'',
            'tags'=>'',
        ]);
        $tags=$data['tags'];
        unset($data['tags']);
        $post->update($data);
        $post -> tags() ->sync($tags);
        return redirect()->route('post.show', $post->id);
    }

    public function delete()
    {
        $post = Post::withTrashed()->find(2);
        $post->delete();
        dd('deleted');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }

    public function firstOrCreate()
    {
        $anotherPost = [
            'title' => '1111title of some post',
            'content' => '1111some content',
            'image' => '11112345',
            'likes' => 200000,
            'is_published' => 1,
        ];
        $post = Post::firstOrCreate([
            'title' => 'title some of some post'
        ], [
            'title' => 'title some of some post',
            'content' => '1111some content',
            'image' => '11112345',
            'likes' => 200000,
            'is_published' => 1,
        ]);
        dump($post->content);
        dd('finished');
    }

    public function updateOrCreate()
    {
        $anotherPost = [
            'title' => 'UOC 1111title of some post',
            'content' => 'UOC 1111some content',
            'image' => '11112345',
            'likes' => 20000,
            'is_published' => 0,
        ];
        $post = Post::updateOrCreate([
            'title' => 'title of some post',
        ], [
            'title' => ' 1111title of some post',
            'content' => 'UOC 1111some content',
            'image' => 'UOC 11112345',
            'likes' => 20000,
            'is_published' => 0,
        ]);
        dump($post->content);
        dd('working');
    }
}


