<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HandlePostController extends Controller
{
    public function create()
    {
        $postQuery = Post::query();
        $categories = Category::all();
        // dump('create');
        return view('posts.create', ['posts' => $postQuery->get(), 'categories' => $categories]);
    }

    public function createPost(Request $req)
    {
        $post = new Post();
        $post->title = $req->title;
        $post->content = $req->content;
        $post->category_id = $req->category_id;
        $post->save();
        return redirect()->route('posts');
    }
    // public function edit(Request $req)
    // {
    //     dump('edit Post $req->id');
    // }
    public function delete(Request $req)
    {
        $post = Post::find($req->id);
        $post->delete();
        return redirect()->route('posts');
    }
    public function edit(Request $req){
        $post = Post::find($req->id);
        // dump($post);
        $categories = Category::all();
        return view('posts.edit', ['post' => $post, 'categories' => $categories])->with("post",$post);
    }
    public function update(Request $req){
        $post = Post::find($req->id);
        $post->update([
            'title' => $req->title,
            'content' => $req->content,
            'category_id' => $req->category_id,
        ]);
        return redirect()->route('posts');
    }
}
