<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Post;
use App\Models\Tag;
use phpDocumentor\Reflection\PseudoTypes\LowercaseString;

class PostController extends Controller
{
    /**
     * Craete a new list of tag ids for the post from comma separated string of tag names.
     */
    private function createTagIds($tags)
    {
        $tags = explode(',', $tags);
        $tags = array_map(function($v) {
            return Str::ucfirst(trim($v));
        }, $tags);
        $tags = array_unique($tags);
        $tag_ids = [];
        foreach ($tags as $tag_name) {
            $tag = Tag::where('name', $tag_name)->first();
            if (!$tag) {
                $tag = new Tag();
                $tag->name = Str::lower($tag_name);
                $tag->save();
            }
            $tag_ids[] = $tag->id;
        }
        return $tag_ids;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::get();
        return view("posts.index", ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $tags = $request->input('tags');
        $tag_ids = $this->createTagIds($tags);
        $post = new Post();
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->save();
        $post->tags()->sync($tag_ids);
        return redirect()->route('posts.show', ['post' => $post->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)    // Dependency Injection
    {
        $post->save();
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $tags = implode(',', $post->tags->pluck('name')->toArray());
        return view('posts.edit', ['post' => $post, 'tags' => $tags]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->title = $request->input('title');
        $post->description = $request->input('description');

        $tags = $request->input('tags');
        $tag_ids = $this->createTagIds($tags);
        $post->tags()->sync($tag_ids);
        $post->save();
        return redirect()->route('posts.show', ['post' => $post->id]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Post $post)
    {
        $title = $request->input('title');
        if ($title == $post->title) {
            $post->delete();
            return redirect()->route('posts.index');
        }
        return redirect()->back();
    }

    //store comment trough post
    public function storeComment(Request $request, Post $post)
    {
        $comment = new Comment();
        $comment->message = $request->input('message');
        $post->comments()->save($comment);
        return redirect()->route('posts.show', ['post' => $post->id]);
    }

}
