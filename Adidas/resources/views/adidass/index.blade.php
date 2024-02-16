@extends('layouts.app')
@section('title','index')
@section('content')


	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->
  <!-- start banner Area -->
  <section>
		<div class="container">
			<div class="row fullscreen align-items-center justify-content-start">
				<div class="col-lg-12">
					<div class="active-banner-slider owl-carousel">
						<!-- single-slide -->
						<div class="row single-slide align-items-center d-flex">
							<div class="col-lg-5 col-md-6">
								<div class="banner-content">
									<h1>Adidas New <br>Collection!</h1>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
										dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
								</div>
							</div>
							<div class="col-lg-7">
								<div class="banner-img">
									<img class="img-fluid" src="images/65be9080a3de8.jpg">
								</div>
							</div>
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End banner Area -->
 <!-- start product Area -->
<section>
    <!-- single product slide -->
    <div class="single-product-slider">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="section-title">
                        <h1>Products</h1>
                        <h3></h3>
                        <p></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- single product -->
                @foreach($products as $product)
                <div class="col-lg-3 col-md-6">
                    <div class="single-product">
                        <img class="img-fluid" src="images/{{ $product->image }}" alt="{{ $product->description }}">
                        <div class="product-details">
                            <h3>{{$product->nom}}</h3>
                            <div class="price">
                                <h4>{{ $product->prix}} DH</h4>
                                <h6>{{ $product->cat_name}} </h6>
                                <p>{{ $product->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- end product Area -->
@endsection