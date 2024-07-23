<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function posts(Request $request)
    {
        
        $search = $request->search;
        $category = $request->category;

        $postQuery = Post::query();

        $categories = Category::all();
        if ($search) {
            $postQuery->where('title', 'like', '%' . $search . '%')->paginate(2);
            // dump($categories);
            // return view('posts.posts', ['posts' => $posts, 'categories' => $categories]);
        }
        if ($category){
            $postQuery->where('category_id', $category)->paginate(2);
        }
        


        // $posts = Post::all();



        return view('posts.posts', ['posts' => $postQuery->paginate(5), 'categories' => $categories]);

    }
}
