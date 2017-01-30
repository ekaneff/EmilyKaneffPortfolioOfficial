@extends('layouts.master')

@section('title')
	Bike Shop
@endsection
@include('partials.nav')
@include('partials.header')
@section('content')
<section id="featured">
	<h1>Today's Featured</h1>
	<div class="container">
		@foreach($products->chunk(3) as $productChunk)
			<div class="row">
			@foreach($productChunk as $product)
				<div class="col-sm-6 col-md-4">
				    <div class="thumbnail">
				      <img src="{{ $product->imgPath }}" class="img-responsive" alt="...">
				      <div class="caption">
				        <h3><a href="#">{{ $product->name }}</a></h3>
				        <p class="desc">{{ $product->description }}</p>
				        <div class="clearfix">
				        	<div class="pull-left price">${{ $product->price }}.00</div>
				        	<form action="/cart/add" method="post" pull-right>
					        	<!-- <a href="" class="btn btn-default pull-right" role="button">Add to Cart</a> -->
					        	{{ csrf_field() }}
					        	<input type="hidden" name="item" value="{{ $product->id }}">
					        	<input type="submit" name="submit" value="Add to Cart" class="btn btn-primary pull-right">					        
					        </form>
				        </div>
				      </div>
				    </div>
				</div>
			@endforeach
			</div> 
		@endforeach
	</div>
</section>
@endsection