<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

use Illuminate\Support\Facades\Auth;


class PostsController extends Controller
{
    public function index()
    {
        $followed_id = Auth::user()->following()->pluck('followed_id');
        $login_id = Auth::id();
        $posts = Post::with('user')->whereIn('posts.user_id', $followed_id)
            ->orWhere('posts.user_id', $login_id)->get();
        $user = Auth::user();
        $followingCount = $user->following()->count();
        $followerCount = $user->followers()->count();
        // dd($followingCount);
        return view('posts.index')->with('posts', $posts)
        ->with('followingCount', $followingCount)
        ->with('followerCount', $followerCount);
    }

    public function store(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'post' => 'required|min:1|max:150',
            ]);

            $postContent = $request->input('post');

            Post::create([
                'post' => $postContent,
                'user_id' => Auth::id(),
            ]);
            // $posts->save();

            // $following_id = Auth::user()->following()->pluck('followed_id');
            // $posts = Post::with('user')->whereIn('user_id', $following_id)->get();



            return redirect('/top');
        }
    }

    public function delete($id)
    {
        Post::where('id', $id)->delete();
        return redirect('/top');
    }

    public function update(Request $request, $id)
    {
        $updatedPostContent = nl2br($request->input('update'));
        $post = Post::find($id);
        $post->post = $updatedPostContent;
        $post->save();

        return redirect('/top')->with('post', $post);
    }
}
