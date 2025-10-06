@extends('layout.master');

@section('content')

<div class="contact-from-section mt-150 mb-150">
		<div class="container">
			<div class="row">

                <div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">Add</span> Product</h3>
						<p>Add New Product</p>
					</div>
				</div>

<div class="contact-form col-12">
						<form method="POST" action="{{route('storeproduct')}}" enctype="multipart/form-data">
							@csrf
							<p>
								<input value="{{old('name')}}" style="width:100%"  type="text" placeholder="Name" name="name"> <br>
							</p>
							 @error('name')
							<div class="alert alert-danger" role="alert">
									   {{$message}}
                                  </div>
								   @enderror
							<p>
								<input value="{{old('price')}}" style="width:49.5%" class="col-12"  type="number" placeholder="Price" name="price">
								<input value="{{old('quantity')}}" style="width:49.5%" type="number" placeholder="Quantity" name="quantity">
							</p>
							
							 @error('price')
							<div class="alert alert-danger" role="alert">
									   {{$message}}
                                  </div>
								   @enderror @error('quantity')
							<div class="alert alert-danger" role="alert">
									   {{$message}}
                                  </div>
								   @enderror
                                  

							<p>
								<input style="width:100%; height:50px; border:1px solid gray; cursor: pointer;"
							       type="file" placeholder="UploadImage" name="image">
							</p>
							 @error('image')
							<div class="alert alert-danger" role="alert">
									   {{$message}}
                                  </div>
								   @enderror
							
							<p><textarea name="description" cols="30" rows="10" placeholder="description">{{old('description')}}</textarea></p>
							 @error('description')
							<div class="alert alert-danger" role="alert">
									   {{$message}}
                                  </div>
								   @enderror
							<input type="hidden" name="token" value="FsWga4&@f6aw" />

							<p>
							<select name="categoryid" class="form-control" style="cursor: pointer;">
								@foreach ($categories as $category)
								<option value="{{$category->id}}">{{$category->name}}</option> 
								@endforeach
							</select>  </p>
							<p><input type="submit" value="Save"></p>
						</form>
					</div>

            </div> </div>
</div>
    
@endsection