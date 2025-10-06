@extends('layout.master');

@section('content')

<!-- products -->
	<div class="product-section mt-150 mb-150">
		<div class="container">

			<div class="row">
                <div class="col-md-12">
                    <div class="product-filters">
                        <ul>
                            <li class="active" data-filter="">All</li>
                           @foreach ($categories as $category)
							    <li data-filter="._{{$category->id}}">{{$category->name}}</li>
						   @endforeach
                        </ul>
                    </div>
                </div>
            </div>

			<div class="row product-lists">
				@foreach ($products as $product)
					
				<div class="col-lg-4 col-md-6 mt-100 text-center _{{$product->category_id}}">
					<div class="single-product-item" style="width:100%;height:100%;">
						<div class="product-image">
							<a href="single-product.html"><img style="height:250px" src="{{asset( 'assets/' . $product->img)}}" alt=""></a>
						</div>
						<h3>{{$product->name}}</h3>
						<p class="product-price"><span></span> {{$product->price}} $ </p>
						<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
						<a href="{{route('removeproduct' , $product->id)}}" class="cart-btn mt-3 bg-danger"><i class="fa-solid fa-trash"></i> delete </a>
						<a href="{{route('editproduct' , $product->id)}}" class="cart-btn mt-3 bg-info"><i class="fa-solid fa-trash"></i> Edit </a>
					</div>
					</div>
			
				@endforeach
	
			</div>

			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="pagination-wrap">
						<ul>
							<li><a href="#">Prev</a></li>
							<li><a href="#">1</a></li>
							<li><a class="active" href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">Next</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end products -->

@endsection