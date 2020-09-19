@extends('layouts.admin')

@section('content')
	<div class="content-wrapper">
		<div class="content-header">
		  <div class="container-fluid">
			<div class="row mb-2">
			  <div class="col-sm-6">
				<h1 class="m-0 text-dark">Create Post</h1>
			  </div><!-- /.col -->
			  <div class="col-sm-12">
				<ol class="breadcrumb float-sm-right">
				  <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
				  <li class="breadcrumb-item active"><a href="{{ route('post.index') }}">Post List</a></li>
				  <li class="breadcrumb-item active">Create Post</li>
				</ol>
			  </div>
			</div>
		  </div>
		</div>
		
		<div class="content">
		  <div class="container-fluid">
			<div class="row">
			  <div class="col-sm-12">
				@include('admin.includes.error')
				
				<form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
				  @csrf	
				  <div class="form-group">
					<label for="exampleFormControlInput1"><span class="text-danger">* </span>Post Title</label><span class="text-muted float-right">* Mandatory</span>
					<input type="text" name="title" class="form-control" id="exampleFormControlInput1" value="{{ old('title') }}" placeholder="Post title">
				  </div>
				  
				  <div class="form-group">
					<label for="exampleFormControlSelect1"><span class="text-danger">* </span>Post Category</label>
					<select class="form-control" name="category" id="exampleFormControlSelect1">
					  <option selected style="display:none">Select Category</option>	
					  @foreach($categories as $category)
						<option value="{{ $category->id }}">{{ $category->name }}</option>
					  @endforeach	
					</select>
				  </div>
				  
				  
				  <div class="form-group">
					<label for="exampleFormControlSelect1"><span class="text-danger">* </span>Post Tags</label>
					 @foreach($tags as $tag)
					  <div class="form-check">
						  <input class="form-check-input" type="checkbox" name="tags[]" value="{{ $tag->id }}" id="defaultCheck1">
						  <label class="form-check-label" for="defaultCheck1">{{ $tag->name }}</label>
					  </div>
					 @endforeach
				  </div>
				  
				  <div class="form-group">
					<label for="exampleFormControlInput1"><span class="text-danger">* </span>Post Image</label>
					<input type="file" name="image" class="form-control" id="exampleFormControlInput1">
				  </div>
				  
				  <div class="form-group">
					<label for="description"><span class="text-danger">* </span>Post Description</label>
					<textarea class="form-control" name="description" id="description" rows="4" placeholder="Post description...">{{ old('description') }}</textarea>
				  </div>
				  <input type="submit" name="submit" class="btn btn-success" value="Create" />
				</form>
			  </div>
			</div>
		  </div>
		</div>
	</div>	
@endsection