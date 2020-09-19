<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Session;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$categories = Category::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.category.index', ['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
			'name' => 'required|max:100|unique:categories'
		]);
		
		$category = new Category;
        $category->name 	   = $request->name;
        $category->slug 	   = Str::of($request->name)->slug('-');
        $category->description = $request->description;
        $category->save();
		
		Session::flash('success', 'Category created successfully');
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
        $category = Category::find($id);
		return view('admin.category.edit', ['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $validatedData = $request->validate([
			'name' => ['required', Rule::unique('categories')->ignore($category->id)],
		]);
		
		$category = Category::find($category->id);
		$category->name 	   = $request->name;
		$category->slug 	   = Str::of($request->name)->slug('-');
		$category->description = $request->description;
		$category->save();
		
		Session::flash('success', 'Category updated successfully');
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
        $category = Category::find($id);
		$category->delete();
		
		Session::flash('success', 'Category deleted successfully');
		return redirect()->back();
    }
}
