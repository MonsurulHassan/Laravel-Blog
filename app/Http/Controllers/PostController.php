<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Session;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$posts = Post::orderBy('published_at', 'desc')->paginate(5);
        return view('admin.post.index', ['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$categories = Category::orderBy('name', 'asc')->get();
		$tags = Tag::orderBy('name', 'asc')->get();
        return view('admin.post.create', ['categories'=>$categories, 'tags'=>$tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		//dd($request->all());
		
        $validatedData = $request->validate([
			'title' => 'required|max:100|unique:posts',
			'category' => 'required',
			'image' => 'required|image',
			'description' => 'required',
			'tags' => 'required',
		]);
		
		$post = new Post;
		$post->user_id 	    = auth()->user()->id;
		$post->category_id  = $request->category;
        $post->title 	    = $request->title;
        $post->slug 	    = Str::of($request->title)->slug('-');
		$post->image 		= $request->file('image')->store('images');
        $post->description  = $request->description;
        $post->published_at = now();
        
        $post->save();
		
		$post->tags()->attach($request->tags);
		
		Session::flash('success', 'Post created successfully');
		return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
		$categories = Category::orderBy('name', 'asc')->get();
		$tags = Tag::orderBy('name', 'asc')->get();
		return view('admin.post.edit', ['post'=>$post, 'categories'=>$categories, 'tags'=>$tags]);
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
        $validatedData = $request->validate([
			'title' => ['required', Rule::unique('posts')->ignore($post->id)],
			'category' => 'required',
			//'image' => 'required|image',
			'description' => 'required',
		]);
		
		$post = Post::find($post->id);
		$post->category_id  = $request->category;
        $post->title 	    = $request->title;
        $post->slug 	    = Str::of($request->title)->slug('-');
		if($request->hasFile('image')){
			$post->image 	= $request->file('image')->store('images');
		}
        $post->description  = $request->description;
        $post->published_at = now();
		$post->save();
		
		$post->tags()->sync($request->tags);
		
		Session::flash('success', 'Post updated successfully');
		return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
		unlink(public_path($post->image));
		$post->delete();
		
		Session::flash('success', 'Post deleted successfully');
		return redirect()->back();
    }
}
