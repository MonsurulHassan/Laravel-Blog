@extends('layouts.admin')

@section('content')
	<div class="content-wrapper">
		<div class="content-header">
		  <div class="container-fluid">
			<div class="row mb-2">
			  <div class="col-sm-6">
				<h1 class="m-0 text-dark">Create Tag</h1>
			  </div><!-- /.col -->
			  <div class="col-sm-12">
				<ol class="breadcrumb float-sm-right">
				  <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
				  <li class="breadcrumb-item active"><a href="{{ route('tag.index') }}">Tag List</a></li>
				  <li class="breadcrumb-item active">Create Tag</li>
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
				
				<form action="{{ route('tag.store') }}" method="post">
				  @csrf	
				  <div class="form-group">
					<label for="exampleFormControlInput1"><span class="text-danger">* </span>Tag Name</label><span class="text-muted float-right">* Mandatory</span>
					<input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Tag name">
				  </div>
				  
				  <div class="form-group">
					<label for="description">Description</label>
					<textarea class="form-control" name="description" id="description" rows="4" placeholder="Tag description..."></textarea>
				  </div>
				  <input type="submit" name="submit" class="btn btn-success" value="Create" />
				</form>
			  </div>
			</div>
		  </div>
		</div>
	</div>	
@endsection