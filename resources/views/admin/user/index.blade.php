@extends('layouts.admin')

@section('content')
	<div class="content-wrapper">
		<div class="content-header">
		  <div class="container-fluid">
			<div class="row mb-2">
			  <div class="col-sm-6">
				<h1 class="m-0 text-dark">User List</h1>
			  </div><!-- /.col -->
			  <div class="col-sm-12">
				<ol class="breadcrumb float-sm-right">
				  <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
				  <li class="breadcrumb-item active">User List</li>
				</ol>
			  </div>
			</div>
		  </div>
		</div>
		
		<div class="content">
		  <div class="container-fluid">
			<div class="row">
			  <div class="col-sm-12">
				<table class="table table-striped">
				  <thead>
					<tr>
					  <th scope="col">#</th>
					  <th scope="col">Name</th>
					  <th scope="col">Image</th>
					  <th scope="col">Email</th>
					  <th scope="col">Action</th>
					</tr>
				  </thead>
				  <tbody>
					@php $i=0; @endphp
					@foreach($users as $user)
						<tr>
						  <th scope="row">{{ ++$i }}</th>
						  <td>{{ $user->name }}</td>
						  <td ><img src="{{ asset($user->image) }}" width="100px" height="70px" /></td>
						  <td>{{ $user->email }}</td>
						  <td class="d-flex">
							<a class="btn btn-info btn-sm mr-2" href="{{ route('user.show', [$user->id]) }}" data-toggle="tooltip" data-placement="bottom" title="View details""><i class="nav-icon fas fa-eye"></i></a>
							
							<form action="{{ route('user.destroy', [$user->id]) }}" method="post">
								@method('DELETE')
								@csrf
								<button type="submit" class="btn btn-danger btn-sm"  data-toggle="tooltip" data-placement="bottom" title="Delete" onclick="return confirm('Are you sure to Delete?');"> <i class="nav-icon fas fa-trash"></i> </button>
							</form>
						  </td>
						</tr>
					@endforeach	
				  </tbody>
				</table>
			  </div>
			</div>
		  </div>
		</div>
	</div>	
@endsection