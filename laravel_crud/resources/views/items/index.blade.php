@extends('layouts.master')

@section('content')
	<h1>Super Secret Journal</h1>

	<a href="/items/create" class="btn btn-primary">New Post</a>

	<h2>Previous Posts</h2>

	{{-- @if(count($entries) > 0)
		@foreach($entries as $entry)
			<a href="#">{{$entry->title}}</a>
		@endforeach
	@endif --}}
@endsection