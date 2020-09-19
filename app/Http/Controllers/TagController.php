<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use Session;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::orderBy('created_at', 'desc')->paginate(5);
		return view('admin.tag.index', ['tags'=>$tags]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
			'name' => 'required|max:100|unique:tags'
		]);
		
		$tag = new Tag;
        $tag->name 	   	  = $request->name;
        $tag->slug 	      = Str::of($request->name)->slug('-');
        $tag->description = $request->description;
        $tag->save();
		
		Session::flash('success', 'Tag created successfully');
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
        $tag = Tag::find($id);
		return view('admin.tag.edit', ['tag'=>$tag]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $validatedData = $request->validate([
			'name' => ['required', Rule::unique('tags')->ignore($tag->id)],
		]);
		
		$tag = Tag::find($tag->id);
		$tag->name 	   	  = $request->name;
		$tag->slug 	      = Str::of($request->name)->slug('-');
		$tag->description = $request->description;
		$tag->save();
		
		Session::flash('success', 'Tag updated successfully');
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
        $tag = Tag::find($id);
		$tag->delete();
		
		Session::flash('success', 'Tag deleted successfully');
		return redirect()->back();
    }
}
