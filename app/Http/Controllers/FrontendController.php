<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use App\User;
use App\Contact;


class FrontendController extends Controller
{
    public function home(){
		$posts = Post::orderBy('published_at', 'desc')->limit(5)->get();
		$RecentPosts = Post::orderBy('published_at', 'desc')->paginate(9);
		$cat_tech = Category::where('name', 'Technology')->first();
		$cat_sports = Category::where('name', 'Sports')->first();
		$cat_travel = Category::where('name', 'Travel')->first();
		$cat_bus = Category::where('name', 'Business')->first();
		return view('website.home', ['posts'=>$posts, 'RecentPosts'=>$RecentPosts, 'cat_tech'=>$cat_tech, 'cat_sports'=>$cat_sports, 'cat_travel'=>$cat_travel, 'cat_bus'=>$cat_bus]);
	}
	
	public function about($slug){
		$user = User::where('slug', $slug)->first();
		return view('website.about', ['user'=>$user]);
	}
	
	public function category($slug){
		$category = Category::where('slug', $slug)->first();
		return view('website.category', ['category'=>$category]);
	}
	
	public function contact(){
		return view('website.contact');
	}
	
	public function tag($slug){
		$tag = Tag::where('slug', $slug)->first();
		return view('website.tag', ['tag'=>$tag]);
	}
	
	public function post($slug){
		$post = Post::where('slug', $slug)->first();
		$user_post = $post->user->id;
		$posts = $post->where('user_id', $user_post)->inRandomOrder()->limit(3)->get();
		//$posts = Post::limit(3)->get();
		$categories = Category::all();
		$tags = Tag::all();
		return view('website.post', ['post'=>$post, 'posts'=>$posts, 'categories'=>$categories, 'tags'=>$tags]);
	}
	
	public function send_message(Request $request){
		$validatedData = $request->validate([
			'name' => 'required|max:50',
			'email' => 'required|email',
			'subject' => 'required|max:100',
			'message' => 'required|min:50'
		]);
		
		$contact = new Contact();
		$contact->name    = $request->name;
		$contact->email   = $request->email;
		$contact->subject = $request->subject;
		$contact->message = $request->message;
		
		$contact->save();
		
		Session::flash('success', 'Message sent successfully');
		return redirect()->back();
		
	}
}
