@extends('layouts.admin')

@section('content')
	<div class="content-wrapper">
		<div class="content-header">
		  <div class="container-fluid">
			<div class="row mb-2">
			  <div class="col-sm-6">
				<h1 class="m-0 text-dark">Post List</h1>
			  </div><!-- /.col -->
			  <div class="col-sm-12">
				<ol class="breadcrumb float-sm-right">
				  <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
				  <li class="breadcrumb-item active">Post List</li>
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
				  <a class="btn btn-success btn-sm float-right mb-2" href="{{ route('post.create') }}">Create Post</a>	
				  <thead>
					<tr>
					  <th scope="col">#</th>
					  <th scope="col">Title</th>
					  <th scope="col">Image</th>
					  <th scope="col">Description</th>
					  <th scope="col">Category</th>
					  <th scope="col">Tag</th>
					  <th scope="col">Author</th>
					  <th scope="col">Action</th>
					</tr>
				  </thead>
				  <tbody>
					@if($posts->count())
						@php $i=0; @endphp
						@foreach($posts as $post)
							<tr>
							  <th scope="row">{{ ++$i }}</th>
							  <td>{{ $post->title }}</td>
							  <td ><img src="{{ asset($post->image) }}" width="100px" height="70px" /></td>
							  <td>{!! Illuminate\Support\Str::limit($post->description, 30, '...') !!}</td>
							  <td>{{ $post->category->name }}</td>
							  <td>
								@foreach($post->tags as $t)
									<span class="badge badge-info">{{ $t->name }}</span>
								@endforeach	
							  </td>
							  <td>{{ $post->user->name }}</td>
							  <td class="d-flex">
								<a class="btn btn-secondary btn-sm mr-2" href="{{ route('post.edit', [$post->id]) }}" data-toggle="tooltip" data-placement="bottom" title="Edit""><i class="nav-icon fas fa-edit"></i></a>
								
								<form action="{{ route('post.destroy', [$post->id]) }}" method="post">
									@method('DELETE')
									@csrf
									<button type="submit" class="btn btn-danger btn-sm"  data-toggle="tooltip" data-placement="bottom" title="Delete" onclick="return confirm('Are you sure to delete?');"> <i class="nav-icon fas fa-trash"></i> </button>
								</form>
							  </td>
							</tr>
						@endforeach	
					@else
						<tr>
							<td class="text-center" colspan="7">No Posts<td>
						</tr>	
					@endif	
				  </tbody>
				</table>
			  </div>
			</div>
			<div class="row d-flex justify-content-center mt-5">
				{{ $posts->links() }}
			</div>
		  </div>
		</div>
	</div>	
@endsection