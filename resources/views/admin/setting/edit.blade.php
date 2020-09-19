@extends('layouts.admin')

@section('content')
	<div class="content-wrapper">
		<div class="content-header">
		  <div class="container-fluid">
			<div class="row mb-2">
			  <div class="col-sm-6">
				<h1 class="m-0 text-dark">Edit Setting</h1>
			  </div><!-- /.col -->
			  <div class="col-sm-12">
				<ol class="breadcrumb float-sm-right">
				  <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
				  <li class="breadcrumb-item active">Edit Setting</li>
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
				
				<form action="{{ route('setting.store') }}" method="POST" enctype="multipart/form-data">	
				  @csrf
				  <div class="form-group">
					<label for="exampleFormControlInput1"><span class="text-danger">* </span>Site Name</label><span class="text-muted float-right">* Mandatory</span>
					<input type="text" name="name" class="form-control" id="exampleFormControlInput1" value="{{ $setting->name }}" placeholder="Site Name">
				  </div>
				  
				  <div class="row">
					<div class="col-md-9">
						<div class="form-group">
							<label for="exampleFormControlInput1">Site Logo</label>
							<input type="file" name="logo" class="form-control" id="exampleFormControlInput1">
						</div>
					</div>
					<div class="col-md-3 text-center">
						<img src="{{ asset($setting->site_logo) }}" width="120px" height="80px" />
					</div>
				  </div>
				  
				  <div class="form-group">
					<label for="description">Site Description</label>
					<textarea class="form-control" name="description" id="description" rows="4" placeholder="Setting description...">{{ $setting->about_site }}</textarea>
				  </div>
				  
				  <div class="form-group">
					<label for="address">Address</label>
					<textarea class="form-control" name="description" id="address" rows="4" placeholder="Address">{{ $setting->address}}</textarea>
				  </div>
				  
				  <div class="form-group">
					<label for="exampleFormControlInput1">Phone</label>
					<input type="text" name="phone" class="form-control" id="exampleFormControlInput1" value="{{ $setting->phone }}" placeholder="Phone number">
				  </div>
				  
				  <div class="form-group">
					<label for="exampleFormControlInput1">Email</label>
					<input type="email" name="email" class="form-control" id="exampleFormControlInput1" value="{{ $setting->email }}" placeholder="Email address">
				  </div>
				  <input type="submit" name="submit" class="btn btn-success" value="Update" />
				</form>
			  </div>
			</div>
		  </div>
		</div>
	</div>	
@endsection