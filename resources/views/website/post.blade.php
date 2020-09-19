@extends('layouts.website')	

@section('content')
    <div class="site-cover site-cover-sm same-height overlay single-page" style="background-image: url({{ $post->image }});">
      <div class="container">
        <div class="row same-height justify-content-center">
          <div class="col-md-12 col-lg-10">
            <div class="post-entry text-center">
              <span class="post-category text-white bg-success mb-3">{{ $post->category->name }}</span>
              <h1 class="mb-4">{{ $post->title }}</h1>
              <div class="post-meta align-items-center text-center">
                <figure class="author-figure mb-0 mr-3 d-inline-block"><img src="{{ asset($post->user->image) }}" alt="Image" class="img-fluid"></figure>
                <span class="d-inline-block mt-1">{{ $post->user->name }}</span>
                <span>&nbsp;-&nbsp; {{ $post->created_at->format('M d, Y') }} at {{ $post->created_at->format('h:i a') }}</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <section class="site-section py-lg">
      <div class="container">
        
        <div class="row blog-entries element-animate">

          <div class="col-md-12 col-lg-8 main-content">
            
            <div class="post-content-body">
              <p>{!! $post->description !!}</p>
            </div>

            
            <div class="pt-5">
              <p>Categories: <a href=>{{ $post->category->name }}</a>
				 @if($post->tags()->count() > 0)
					Tags:
					@foreach($post->tags as $tag)	
						 <a href="#">#{{ $tag->name }}</a>
					@endforeach	
				 @endif	
			  </p>
            </div>


            <div class="pt-5">
              <div id="disqus_thread">
			  </div>
            </div>

          </div>

          <!-- END main-content -->

          <div class="col-md-12 col-lg-4 sidebar">
            <div class="sidebar-box search-form-wrap">
              <form action="#" class="search-form">
                <div class="form-group">
                  <span class="icon fa fa-search"></span>
                  <input type="text" class="form-control" id="s" placeholder="Type a keyword and hit enter">
                </div>
              </form>
            </div>
            <!-- END sidebar-box -->
            <div class="sidebar-box">
              <div class="bio text-center">
                <img src="{{asset($post->user->image)}}" alt="Image Placeholder" class="img-fluid mb-3">
                <div class="bio-body">
                  <h2>{{ $post->user->name }}</h2>
                  <p class="mb-4">{!! $post->user->description !!}</p>
                  <p class="social">
                    <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-instagram"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-youtube-play"></span></a>
                  </p>
                </div>
              </div>
            </div>
            <!-- END sidebar-box -->  
            <div class="sidebar-box">
              <h3 class="heading">Posts of same author</h3>
              <div class="post-entry-sidebar">
                <ul>
				  @foreach($posts as $post)	
                  <li>
                    <a href="{{ route('website.post', ['slug'=>$post->slug]) }}">
                      <img src="{{asset($post->image)}}" alt="Image placeholder" class="mr-4">
                      <div class="text">
                        <h4>{{ $post->title }}</h4>
                        <div class="post-meta">
                          <span class="mr-2">{{ $post->created_at->format('M d, Y') }} </span>
                        </div>
                      </div>
                    </a>
                  </li>
				  @endforeach
                </ul>
              </div>
            </div>
            <!-- END sidebar-box -->

            <div class="sidebar-box">
              <h3 class="heading">Categories</h3>
              <ul class="categories">
				@foreach($categories as $category)
					@if($category->post()->count() > 0)
						<li><a href="#">{{ $category->name }}<span>{{ $category->post()->count() }}</span></a></li>
					@endif
				@endforeach	
              </ul>
            </div>
            <!-- END sidebar-box -->

            <div class="sidebar-box">
              <h3 class="heading">Tags</h3>
              <ul class="tags">
				@foreach($tags as $tag)
					<li><a href="{{ route('website.tag', ['slug'=>$tag->slug]) }}">{{ $tag->name }}</a></li>
				@endforeach	
              </ul>
            </div>
          </div>
          <!-- END sidebar -->

        </div>
      </div>
    </section>


    <div class="site-section bg-lightx">
      <div class="container">
        <div class="row justify-content-center text-center">
          <div class="col-md-5">
            <div class="subscribe-1 ">
              <h2>Subscribe to our newsletter</h2>
              <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit nesciunt error illum a explicabo, ipsam nostrum.</p>
              <form action="#" class="d-flex">
                <input type="text" class="form-control" placeholder="Enter your email address">
                <input type="submit" class="btn btn-primary" value="Subscribe">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection	


@section('script')
	
	<script>

	/**
	*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
	*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
	/*
	var disqus_config = function () {
	this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
	this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
	};
	*/
	(function() { // DON'T EDIT BELOW THIS LINE
	var d = document, s = d.createElement('script');
	s.src = 'https://laravel-blog-uadbmpdibc.disqus.com/embed.js';
	s.setAttribute('data-timestamp', +new Date());
	(d.head || d.body).appendChild(s);
	})();
	</script>
	<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
	<script id="dsq-count-scr" src="//laravel-blog-uadbmpdibc.disqus.com/count.js" async></script>
@endsection
    
  