@extends('layouts.admin')

@section('content')
	<div class="content-wrapper">
		<div class="content-header">
		  <div class="container-fluid">
			<div class="row mb-2">
			  <div class="col-sm-6">
				<h1 class="m-0 text-dark">Edit Profile - {{ $user->name }}</h1>
			  </div>
			</div>
		  </div>
		</div>
		
		<div class="content">
		  <div class="container-fluid">
			<div class="row">
			  <div class="col-sm-12">
				@include('admin.includes.error')
				
				<form action="{{ route('user.update', [$user->id]) }}" method="post" enctype="multipart/form-data">
				  @method('PUT')	
				  @csrf
				  <div class="form-group">
					<label for="exampleFormControlInput1"><span class="text-danger">* </span>Name</label><span class="text-muted float-right">* Mandatory</span>
					<input type="text" name="name" class="form-control" id="exampleFormControlInput1" value="{{ $user->name }}" placeholder="Name">
				  </div>
				  
				  <div class="form-group">
					<label for="exampleFormControlInput1"><span class="text-danger">* </span>Email</label>
					<input type="email" name="email" class="form-control" id="exampleFormControlInput1" value="{{ $user->email }}" placeholder="Email">
				  </div>
				  
				  <div class="row">
					<div class="col-md-9">
						<div class="form-group">
							<label for="exampleFormControlInput1">Image</label>
							<input type="file" name="image" class="form-control" id="exampleFormControlInput1">
						</div>
					</div>
					<div class="col-md-3 text-center">
						<img src="{{ asset($user->image) }}" width="120px" height="80px" />
					</div>
				  </div>
				  
				  <div class="form-group">
					<label for="description">Description</label>
					<textarea class="form-control" name="description" id="description" rows="4" placeholder="Description...">{{ $user->description }}</textarea>
				  </div>
				  
				  <div class="form-group">
					<label for="exampleFormControlInput1"><span class="text-danger">* </span>Password</label>
					<input type="password" name="password" class="form-control" id="exampleFormControlInput1" placeholder="Password">
				  </div>
				  
				  <div class="form-group">
					<label for="exampleFormControlInput1"><span class="text-danger">* </span>Confirm Password</label>
					<input type="password" name="cpassword" class="form-control" id="exampleFormControlInput1" placeholder="Confirm password">
				  </div>
				  
				  <input type="submit" name="submit" class="btn btn-success" value="Update" />
				</form>
			  </div>
			</div>
		  </div>
		</div>
	</div>	
@endsection