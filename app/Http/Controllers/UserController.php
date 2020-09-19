<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
		return view('admin.user.index', ['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
			'name' => ['required', Rule::unique('users')->ignore($id)],
			'email' => 'required|email',
			'image' => 'sometimes|image',
			//'description' => 'string',
			//'password' => ['required', 'string', 'min:8', 'confirmed'],
		]);
		
		$user = User::find($id);
		$user->name  		= $request->name;
        $user->email 	    = $request->email;
        $user->slug 	    = Str::of($request->name)->slug('-');
		//if($request->hasFile('image')){
			$user->image 	= $request->file('image')->store('images');
		//}
        $user->description  = $request->description;
		$user->save();
		
		Session::flash('success', 'Profile updated successfully');
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
        //
    }
	
	public function profile($slug){
		$user = User::where('slug', $slug)->first();
		return view('admin.user.edit', ['user'=>$user]);
	}
}
