<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\Category;
use App\User;

class DashboardController extends Controller
{
    public function index(){
		$posts 		= Post::count();
		$categories = Category::count();
		$tags 		= Tag::count();
		$users 		= User::count();
		return view('admin.dashboard.index', ['posts'=>$posts, 'categories'=>$categories, 'tags'=>$tags, 'users'=>$users]);
	}
}
