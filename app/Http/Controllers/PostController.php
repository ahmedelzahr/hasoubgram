<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use SweetAlert2\Laravel\Swal;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
   
        $sugesstions=Auth::user()->sugessted_users();
        return view('post.index' , compact('sugesstions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate(['image' => 'required|mimes:png,jpg,gif',
            'description' => 'required']);
        $data['image'] = $request->file('image')->store('posts', 'public');
        $data['slug'] = Str::random(10);
        $data['user_id'] = Auth::id();

        Post::create($data);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {

        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        Gate::authorize('update',$post);
        $data = $request->validate(['image' => 'nullable|mimes:png,jpg,gif',
            'description' => 'required']);
        $request->hasFile('image') ? $data['image'] = $request->file('image')->store('posts', 'public') : '';
        $post->update($data);

        return redirect(route('show_post', $post->slug));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        Gate::authorize('delete',$post);
        $post->delete();
        Storage::disk('public')->delete($post->image);
        return redirect(route('user_profile', $post->owner->userName));
    }

    public function explore(){
        $posts=Post::whereRelation('owner','private_account',0)->whereNot('user_id',auth()->id())->simplePaginate(12);
        return view('post.explore',compact('posts'));
    }
}
