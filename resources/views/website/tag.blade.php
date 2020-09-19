@extends('layouts.website')	

@section('content')
    <div class="py-5 bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <span>Tag</span>
            <h3>{{ $tag->name }}</h3>
			@if($tag->description)
				<p>{!! $tag->description !!}</p>
			@endif	
          </div>
        </div>
      </div>
    </div>

    <div class="site-section bg-white">
      <div class="container">
        <div class="row">
		@foreach($tag->posts as $post)
          <div class="col-lg-4 mb-4">
            <div class="entry2">
			  <a href=""><img src="{{ asset($post->image) }}" class="img-fluid rounded" /></a>
              <div class="excerpt">
              <span class="post-category text-white bg-secondary mb-3">{{$post->category->name}}</span>
              <h2><a href="single.html">{{ $post->title }}</a></h2>
              <div class="post-meta align-items-center text-left clearfix">
                <span class="d-inline-block mt-1">By <a href="#">{{ $post->user->name }}</a></span>
                <span>&nbsp;-&nbsp; {{ $post->created_at->format('M d, Y') }} at {{ $post->created_at->format('h:i a') }} </span>
              </div>
              
                <p>{!! Illuminate\Support\Str::of($post->description)->limit(200, ' (...) ') !!}</p>
                <p><a href="{{ route('website.post', ['slug'=>$post->slug]) }}">Read More</a></p>
              </div>
            </div>
          </div> 
		@endforeach  
        </div>
        <div class="row text-center pt-5 border-top">
          <div class="col-md-12">
            <div class="custom-pagination">
              <span>1</span>
              <a href="#">2</a>
              <a href="#">3</a>
              <a href="#">4</a>
              <span>...</span>
              <a href="#">15</a>
            </div>
          </div>
      </div>
    </div>
  </div>
@endsection  
    
    
    
    