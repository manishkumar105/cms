<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware("authMiddleware");
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with("user")->latest()->paginate(3);
        return view("posts.index",compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Post $post)
    {
        $this->authorize("create",$post);
        return view("posts.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Post $post)
    {
        $this->authorize("create",$post);
        $validated = $request->validate([
            "title"=>"required|string",
            "description"=>"required|string",

        ]);

        $validated["user_id"] = Auth::id();
        Post::create($validated);
        return redirect()->route("posts.index")->with("success","Post Created");
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $this->authorize("edit",$post);
        return view("posts.edit",compact("post"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $this->authorize("update",$post);
        $validated = $request->validate([
            "title"=>"required|string",
            "description"=>"required|string",
        ]);
        $post->update($validated);
        return redirect()->route("posts.index")->with("success","Post Updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $this->authorize("delete",$post);
        $post->delete();
        return redirect()->route("posts.index")->with("success","Post Deleted");
    }
    //soft delete

    public function deletedPost()
    {
        $deletedPosts = Post::onlyTrashed()->with("user")->paginate(3);
        return view('posts.deletedposts',compact('deletedPosts'));
    }

    public function restoreSoftDelete(Post $post,$id)
    {
    // Find the soft-deleted post (must use withTrashed)
    $post = Post::withTrashed()->findOrFail($id);

    $this->authorize("restore",$post);
    // Restore the post
    $post->restore();

    return redirect()
        ->route('posts.index')
        ->with('success', 'Post restored successfully.');
    }
}
