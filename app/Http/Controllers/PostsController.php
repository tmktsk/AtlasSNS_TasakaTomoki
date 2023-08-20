<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

// use App\Post;

use Illuminate\Support\Facades\Auth;


class PostsController extends Controller
{
    //
    public function index(){
        if (Auth::check()) {
            Auth::user()->setRandomImage();
        }
        
        return view('posts.index');
    }

    // public function postCreate(Request $request)
    // {
    //     $postContent = $request->input('post');
    //     return view('posts.index', ['postContent' => $postContent]);
    //     // Post::create(['post' => $postContent]);
    //     // return back();
    // }

    public function store(Request $request)
    {
        // $user_id = Auth::id();
        if ($request->isMethod('post')) {
            $request->validate([
                'post' => 'required|min:1|max:150',
            ]);

        $postContent = $request->input('post');

        return redirect('/top')->with('postContent', $postContent);

        // return redirect()->route('index')->with('postContent', $postContent);
        }
        // return view('posts.index', compact('postContent'));

        // DB::table('posts')->insert([
        //     'user_id' => $user_id,
        //     'post' => $postContent, 
        // ]);

        // return back();
    }

}
