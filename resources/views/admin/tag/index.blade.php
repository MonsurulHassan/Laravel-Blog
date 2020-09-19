@extends('layouts.admin')

@section('content')
	<div class="content-wrapper">
		<div class="content-header">
		  <div class="container-fluid">
			<div class="row mb-2">
			  <div class="col-sm-6">
				<h1 class="m-0 text-dark">Tag List</h1>
			  </div><!-- /.col -->
			  <div class="col-sm-12">
				<ol class="breadcrumb float-sm-right">
				  <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
				  <li class="breadcrumb-item active">Tag List</li>
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
				  <a class="btn btn-success btn-sm float-right mb-2" href="{{ route('tag.create') }}">Create Tag</a>	
				  <thead>
					<tr>
					  <th scope="col">#</th>
					  <th scope="col">Name</th>
					  <th scope="col">Slug</th>
					  <th scope="col">Action</th>
					</tr>
				  </thead>
				  <tbody>
					@if($tags->count())
						@php $i=0; @endphp
						@foreach($tags as $tag)
							<tr>
							  <th scope="row">{{ ++$i }}</th>
							  <td>{{ $tag->name }}</td>
							  <td>{{ $tag->slug }}</td>
							  <td class="d-flex">
								<a class="btn btn-secondary btn-sm mr-2" href="{{ route('tag.edit', [$tag->id]) }}" data-toggle="tooltip" data-placement="bottom" title="Edit""><i class="nav-icon fas fa-edit"></i></a>
								
								<form action="{{ route('tag.destroy', [$tag->id]) }}" method="post">
									@method('DELETE')
									@csrf
									<button type="submit" class="btn btn-danger btn-sm"  data-toggle="tooltip" data-placement="bottom" title="Delete" onclick="return confirm('Are you sure to Delete?');"> <i class="nav-icon fas fa-trash"></i> </button>
								</form>
							  </td>
							</tr>
						@endforeach	
					@else
						<tr>
							<td class="text-center" colspan="4">No tags<td>
						</tr>	
					@endif	
				  </tbody>
				</table>
			  </div>
			</div>
			<div class="row d-flex justify-content-center mt-5">
				{{ $tags->links() }}
			</div>
		  </div>
		</div>
	</div>	
@endsection