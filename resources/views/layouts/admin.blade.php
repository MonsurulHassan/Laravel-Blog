<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Laravel Blog | Admin Panel</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Toastr -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
  <!-- Summernote text editor -->
  <link href="{{asset('admin/css/summernote-bs4.css')}}" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('admin/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset(auth()->user()->image) }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a class="d-block">{{ auth()->user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
		  
		  <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link {{ (request()->is('admin/dashboard'))? 'active':''}}">
              <i class="nav-icon fas fa-pen-square"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
		  
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Your Profile
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('user.edit.profile', ['slug'=>auth()->user()->slug]) }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p style="font-size:14px">Edit Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p style="font-size:14px">Logout</p>
                </a>
              </li>
            </ul>
          </li>
		  
		  <li class="nav-item">
            <a href="{{ route('post.index') }}" class="nav-link {{ (request()->is('admin/post*'))? 'active':''}}">
              <i class="nav-icon fas fa-pen-square"></i>
              <p>
                Posts
              </p>
            </a>
          </li>
		  
          <li class="nav-item">
            <a href="{{ route('category.index') }}" class="nav-link {{ (request()->is('admin/category*'))? 'active':''}}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Categories
              </p>
            </a>
          </li>
		  
		  <li class="nav-item">
            <a href="{{ route('tag.index') }}" class="nav-link {{ (request()->is('admin/tag*'))? 'active':''}}">
              <i class="nav-icon fas fa-tag"></i>
              <p>
                Tags
              </p>
            </a>
          </li>
		  
		  <li class="nav-item">
            <a href="{{ route('user.index') }}" class="nav-link {{ (request()->is('admin/user*'))? 'active':''}}">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Users
              </p>
            </a>
          </li>
		  
		  <li class="nav-item">
            <a href="{{ route('contact.index') }}" class="nav-link {{ (request()->is('admin/contact*'))? 'active':''}}">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                Messages
              </p>
            </a>
          </li>
		  
		  <li class="nav-item">
            <a href="{{ route('setting.index') }}" class="nav-link {{ (request()->is('admin/setting*'))? 'active':''}}">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Site Setting
              </p>
            </a>
          </li>
		  
		  
        </ul>
      </nav>
	  
	  <div class="text-center mt-4">
		<a href="{{ route('website') }}" class="btn btn-primary" target="blank">
		  <p class="mb-0 text-white"></i>View Website</p>
		</a>
	  </div> 	
	  
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  
  @yield('content')
  

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin/js/adminlte.min.js')}}"></script>
<!-- Toastr -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<!-- Summernote text editor -->
<script src="{{asset('admin/js/summernote-bs4.js')}}"></script>
<script>
  $('#description').summernote({
	//placeholder: 'Hello Bootstrap 4',
	tabsize: 2,
	height: 150
  });
</script>
<script>
	@if(Session::has('success'))
		toastr.success("{{ Session::get('success') }}");
	@endif	
</script>
</body>
</html>
