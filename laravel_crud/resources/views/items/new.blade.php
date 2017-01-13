@extends('layouts.master')

@section('title')
	New Entry
@endsection

@section('content')
<h1>New Jounral Entry</h1>
<form action="/items/store" method="post">
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" placeholder="Title">
  </div>
  <div class="form-group">
    <label for="date">Date</label>
    <input type="date" class="form-control" id="date" placeholder="Date">
  </div>
  <div class="form-group">
    <label for="entry">Entry</label>
    <textarea class="form-control" rows="20" id="entry"></textarea>
  </div>
  <button type="submit" class="btn btn-success">Publish</button>
</form>

@endsection