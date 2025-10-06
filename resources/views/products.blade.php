@extends('layout.master');

@section('content')

<!-- product section -->
	<div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">Our</span> Products</h3>
						<p>متعة التسوق عبر موقعنا</p>
					</div>
				</div>
			</div>

			<div class="row">

                @foreach ($products as $product)
                    
					<div class="col-lg-4 col-md-6 mt-100 text-center">
					<div class="single-product-item" style="width:100%;height:100%;">
						<div class="product-image">
							<a href=""><img style="height:250px" src="{{asset( 'assets/' . $product->img)}}" alt=""></a>
						</div>
						<h3>{{$product->name}}</h3>
						<p class="product-price"><span>{{$product->description}}</span> {{$product->price}} $ </p>
						<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a> <br>
						<a href="{{route('removeproduct' , $product->id)}}" class="cart-btn mt-3 bg-danger"><i class="fa-solid fa-trash"></i> delete </a>
						<a href="{{route('editproduct' , $product->id)}}" class="cart-btn mt-3 bg-info"><i class="fa-solid fa-trash"></i> Edit </a>
					</div>
				</div>
				
                  @endforeach 

			</div>
		</div>
	</div>


            </div>
        </div> </div>
    </div>
	<!-- end product section -->

@endsection