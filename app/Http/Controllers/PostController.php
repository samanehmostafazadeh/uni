<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();
        return view('post.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $post = new Post($request->validated());
        $post->active = true;
        $post->user_id = $request->user()->id;
        if(is_null($post->img)) {
            $post->img = "https://th.bing.com/th/id/R.3559875f2f27979aed146ff438ae72f7?rik=sQMSmIfxK05kZA&riu=http%3a%2f%2fgetwallpapers.com%2fwallpaper%2ffull%2fe%2f2%2fc%2f165907.jpg&ehk=N7zplciv61IuAEjujEGoXCY%2bRekZ09PLytL%2bnx2hNic%3d&risl=&pid=ImgRaw&r=0";
        }
        $post->save();
        return Redirect::route('post.edit',$post)->with('status', 'post-updated');
    }

    /**
     * Display the specified resource.
     */
    public function show( Post $post)
    {
        $user = auth()->user();
        return view('post.show', compact('user', 'post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $user = auth()->user();
        return view('post.edit', compact('user', 'post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->fill($request->validated());

        if ($post->isDirty(['title', 'body'])) {
            $post->update();
        }
        return Redirect::route('post.edit',$post)->with('status', 'post-updated');
    }

    /**
     * Comment on Post
     */
    public function comment(Request $request, Post $post)
    {
        $body = $request->body;
        if( is_null($request->body)) {
            $body = "this is a test comment! ~~For DEVELOP ~~ <br> In Production we should prevent null body";
        }
        $comment = new Comment([
            'body' => $body
        ]);
        $comment->post_id = $post->id;
        $comment->user_id = $request->user()->id;
        $comment->save();
        $post->refresh();

        return Redirect::route('post.show',$post)->with('status', 'comment-posted');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,Post $post)
    {
        $request->validateWithBag('postDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $post->delete();

        return Redirect::to('/dashboard');
    }
}
