@extends('layouts.apps')
@section('title','Login')
@section('content')


    <!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Login                </h1>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Login Box Area =================-->
	<section class="login_box_area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img pt-20">
						<img class="img-fluid" src="assets/img/ADIDAS-2.jpg" alt="adidas">
                        <div class="hover">
				        	<h4>New to our website?</h4>
				        	<p>There are advances being made in science and technology everyday, and a good example of this is the</p>
				        	<a class="primary-btn" href="/register">Create an Account</a>
				        </div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Create Your Account</h3>
						@if(session('success'))
						    <div class="alert alert-success">
						        {{ session('success') }}
						    </div>
						@endif
						
						@if(session('error'))
						    <div class="alert alert-danger">
						        {{ session('error') }}
						    </div>
						@endif
						<form class="row login_form" action="/login_into" method="post" id="contactForm" novalidate="novalidate">
							
                            @csrf 

							<div class="col-md-12 form-group">
								<input type="email" class="form-control" id="email" name="email" placeholder="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'email'">
							</div>
							@error('email')
						    	<div class="text-danger">
						    	    {{ $message }}
						    	</div>
							@enderror
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="password" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
							</div>
							@error('password')
						    	<div class="text-danger">
						    	    {{ $message }}
						    	</div>
							@enderror
							<div class="col-md-12 form-group">
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" value="submit" class="primary-btn">Log In</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->
  