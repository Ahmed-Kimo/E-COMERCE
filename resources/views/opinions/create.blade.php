@extends('layout.master');

@section('content')


<div class="contact-from-section mt-150 mb-10">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 mb-5 mb-lg-0">

					@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
            </ul>
        </div>
    @endif

					<div class="form-title">
						<h2>Enter Your Opinion</h2>
					</div>
				 	<div id="form_status"></div>
					<div class="contact-form">
						<form action="{{ route('opinions.store') }}" method="POST" enctype="multipart/form-data">
							@csrf
							<p>
								<input type="text" placeholder="Name" name="name" id="name">
								<input type="email" placeholder="Email" name="email" id="email">
							</p>
							<p>
								<input type="tel" placeholder="Phone" name="phone" id="phone">
								<input type="text" placeholder="Subject" name="subject" id="subject">
								<div class="form-group">
							 <label>Image (optional)</label>
                            <input type="file" name="image" class="form-control">
								</div>
							</p>
							<p><textarea name="message" id="message" cols="30" rows="10" placeholder="Message"></textarea></p>
							<input type="hidden" name="token" value="FsWga4&amp;@f6aw">
							<p><input type="submit" value="Submit"></p>
						</form>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="contact-form-wrap">
						<div class="contact-form-box">
							<h4><i class="fas fa-map"></i> Shop Address</h4>
							<p>34/8, East Hukupara <br> Gifirtok, Sadan. <br> Country Name</p>
						</div>
						<div class="contact-form-box">
							<h4><i class="far fa-clock"></i> Shop Hours</h4>
							<p>MON - FRIDAY: 8 to 9 PM <br> SAT - SUN: 10 to 8 PM </p>
						</div>
						<div class="contact-form-box">
							<h4><i class="fas fa-address-book"></i> Contact</h4>
							<p>Phone: +00 111 222 3333 <br> Email: support@fruitkha.com</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>



    {{-- Customer Opinions --}}

   <!-- testimonail-section -->
	<div class="testimonail-section mt-80 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1 text-center">
					<h2 style="margin-bottom:30px; color:#F28123;">All Opinions</h2>
					@if (count($opinions) > 1)
						
					<div class="testimonial-sliders">

						@elseif (count($opinions) == 0)
                           <div class="alert alert-danger">
            
                <li>No Opinion Yet!!</li>
            
        </div>
                @endif
                       

                        @foreach ($opinions as $op)
				
                            
		<div class="single-testimonial-slider">
			 @if ($op->image)
    <div class="client-avater">
            <img style="border-radius:10%;" src="{{ asset($op->image) }}">
    </div>
        @endif

    <div class="client-meta">
        <h3>{{ $op->name }} <span>Local shop owner</span></h3>
        <p class="testimonial-body">{{ $op->message }}</p>
        <div class="last-icon">
            <i class="fas fa-quote-right"></i>
        </div>
        
        {{-- زرار الحذف --}}
      
                
                <div class="opinion-actions mt-2">

                    <form action="{{ route('opinions.destroy', $op->id) }}" method="POST" style="display:inline-block;"
                          onsubmit="return confirm('Are you Sure');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">delete</button>
                    </form>
                </div>
    

    </div>

		</div>

	    
                           @endforeach
						   

					
					</div>
				</div>
			</div>
		</div>  
	 </div>  

	<!-- end testimonail-section -->
	



<!-- logo carousel -->
	<div class="logo-carousel-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="logo-carousel-inner">
						<div class="single-logo-item">
							<img src="{{asset('assets/img/company-logos/1.png')}}" alt="">
						</div>
						<div class="single-logo-item">
							<img src="{{asset('assets/img/company-logos/2.png')}}" alt="">
						</div>
						<div class="single-logo-item">
							<img src="{{asset('assets/img/company-logos/3.png')}}" alt="">
						</div>
						<div class="single-logo-item">
							<img src="{{asset('assets/img/company-logos/4.png')}}" alt="">
						</div>
						<div class="single-logo-item">
							<img src="{{asset('assets/img/company-logos/5.png')}}" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end logo carousel -->


@endsection