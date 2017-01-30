@extends('layouts.master')

@section('title')
	Order Confirmation
@endsection

@include('partials.nav')

@section('content')
	<section class="orderpage">
		<h1>Order complete!</h1>
		<p>Thank you for shopping with The Bike Shop! We will send you confirmation when the order ships</p>
		<article class="order">
			<h2>Order Confirmation</h2>
			<h3>Estimated Delivery Date:</h3>
			<h4>Tuesday, Janurary 10th, 2017</h4>
			<h5 class='total'>Order Total: ${{ $total }}.00</h5>
			<p><button class="btn btn-default">Continue Shopping</button></p>
		</article>
	</section>
@endsection