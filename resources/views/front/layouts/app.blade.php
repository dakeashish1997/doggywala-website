<!DOCTYPE html>
<html class="no-js" lang="en_AU">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>DoggyWala | Find Your Perfect Dog</title>
	<meta name="description" content="Find your perfect dog buddy at DoggyHaven." />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1, user-scalable=no" />
	<meta name="HandheldFriendly" content="True" />
	<meta name="pinterest" content="nopin" />
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}" />
	<!-- Fav Icon -->
	<link rel="shortcut icon" type="image/x-icon" href="#" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
	<!-- Toastr CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>
<!-- Bootstrap Icons CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>
<body data-instant-intensity="mousedown">
	<style>
	.city-scroll {
    max-height: 200px; /* adjust as needed */
    overflow-y: auto;
}
</style>
<header>
	<nav class="navbar navbar-expand-lg navbar-light bg-white shadow py-3">
		<div class="container">
			<a class="navbar-brand" href="{{ route('home') }}">Doggywala</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ms-0 ms-sm-0 me-auto mb-2 mb-lg-0 ms-lg-4">
					<li class="nav-item">
						<a class="nav-link" aria-current="page" href="{{ route('home') }}">Home</a>
					</li>	
					
					<li class="nav-item dropdown">
					    <a class="nav-link dropdown-toggle" href="#" id="availablePuppiesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
					        Available Puppies
					    </a>
					   <ul class="dropdown-menu city-scroll" aria-labelledby="availablePuppiesDropdown">
						    <li><a class="dropdown-item" href="{{ route('available-puppies.city', ['city' => 'delhi']) }}">Delhi</a></li>
						    <li><a class="dropdown-item" href="{{ route('available-puppies.city', ['city' => 'mumbai']) }}">Mumbai</a></li>
						    <li><a class="dropdown-item" href="{{ route('available-puppies.city', ['city' => 'bangalore']) }}">Bangalore</a></li>
						    <li><a class="dropdown-item" href="{{ route('available-puppies.city', ['city' => 'hyderabad']) }}">Hyderabad</a></li>
						    <!-- Add more cities here as needed -->
						</ul>
					</li>

					<li class="nav-item">
						<a class="nav-link" aria-current="page" href="{{route('blogs')}}">Blog</a>
					</li>
					<!-- <li class="nav-item">
						<a class="nav-link" aria-current="page" href="">Find Dogs</a>
					</li> -->
					<li class="nav-item">
						<a class="nav-link" aria-current="page" href="{{route('conract-us')}}">Contact Us</a>
					</li>	
					<!-- <li class="nav-item">
						<a class="nav-link" aria-current="page" href="">Find Dogs</a>
					</li>	 -->									
				</ul>

                @if (!Auth::check()) 
				<a class="btn btn-outline-primary me-2" href="{{ route('account.login') }}" type="submit">Login</a>
			     @else
				    @if (Auth::user()->role == 'admin')
					<a class="btn btn-outline-primary me-2" href="{{ route('admin.dashboard') }}" type="submit">Admin</a>				
					@endif
				    <a class="btn btn-outline-primary me-2" href="{{ route('account.profile') }}" type="submit">Account</a>
				@endif 
				<!-- <a class="btn btn-primary" href="" type="submit">Post a Dog</a> -->
				
			</div>
		</div>
	</nav>
</header>

@yield('main')


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title pb-0" id="exampleModalLabel">Change Profile Picture</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="profilePicForm" name="profilePicForm" action="" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Profile Image</label>
                <input type="file" class="form-control" id="image"  name="image">
				<p class="text-danger" id="image-error"></p>
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary mx-3">Update</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            
        </form>
      </div>
    </div>
  </div>
</div>

<br>
@extends('front.layouts.footer')

<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.5.1.3.min.js') }}"></script>
<script src="{{ asset('assets/js/instantpages.5.1.0.min.js') }}"></script>
<script src="{{ asset('assets/js/lazyload.17.6.0.min.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>

<script>
	$.ajaxSetup({
	headers: {
	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});

$("#profilePicForm").submit(function(e){
    e.preventDefault();

    var formData = new FormData(this);

	$.ajax({
		url: '{{ route("account.updateProfilePic") }}',
		type: 'post',
		data: formData,
		dataType: 'json',
		contentType: false,
		processData: false,
		success: function(response){
			if(response.status == false) {
				var errors = response.errors;
				if (errors.image) {
                    $("#image-error").html(errors.image)
				}
			} else {
				window.location.href = '{{ url()->current() }}'
			}
		}
	});
});
</script>
@yield('customJs')
</body>
</html>
