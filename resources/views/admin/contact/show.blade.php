@extends('layouts.admin')

@section('content')
	<div class="content-wrapper">
		<div class="content-header">
		  <div class="container-fluid">
			<div class="row mb-2">
			  <div class="col-sm-6">
				<h1 class="m-0 text-dark">View Message of {{ $contact->name }}</h1>
			  </div><!-- /.col -->
			  <div class="col-sm-12">
				<ol class="breadcrumb float-sm-right">
				  <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
				  <li class="breadcrumb-item active"><a href="{{ route('contact.index') }}">Message List</a></li>
				  <li class="breadcrumb-item active">View Message</li>
				</ol>
			  </div>
			</div>
		  </div>
		</div>
		
		<div class="content">
		  <div class="container-fluid">
			<div class="row">
			  <div class="col-sm-12">
				<div class="form-group">
					<label for="exampleFormControlInput1">Sender Name</label>
					<input type="text" name="name" class="form-control" id="exampleFormControlInput1" value="{{ $contact->name }}" readonly>
				</div>
				
				<div class="form-group">
					<label for="exampleFormControlInput1">Sender Email</label>
					<input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Category name" value="{{ $contact->email }}" readonly>
				</div>
				
				<div class="form-group">
					<label for="exampleFormControlInput1">Subject</label>
					<input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Category name" value="{{ $contact->subject }}" readonly>
				</div>
				  
				<div class="form-group">
					<label for="message">Message</label>
					<textarea class="form-control" name="description" id="message" rows="4" placeholder="Category description..." readonly>{{ $contact->message }}</textarea>
				</div>
			  </div>
			</div>
		  </div>
		</div>
	</div>	
@endsection