<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

use Illuminate\Support\Facades\Auth;


class PostsController extends Controller
{
    //
    public function index()
    {
        // if (Auth::check()) {
        //     Auth::user()->setRandomImage();
        // }
        $posts = Post::all();

        return view('posts.index')->with('posts', $posts);
    }

    public function store(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'post' => 'required|min:1|max:150',
            ]);

            $postContent = $request->input('post');

            $post = Post::create([
                'post' => $postContent,
                'user_id' => Auth::id(),
            ]);
            $post->save();


            // return view('posts', compact('posts'));

            return redirect('/top')->with('post', $postContent);

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
