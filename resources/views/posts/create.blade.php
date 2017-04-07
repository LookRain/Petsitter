@extends('layouts.app')

@section('content')
<div class="container">
	<div class="col-md-12">
		<form method="POST" action="/post/new">

			{{  csrf_field() }}
			<div class="form-group">
				<label for="title">Title: </label>
				<input type="text" class="form-control" id="title" name="title">
			</div>
			<div class="form-group">
				<label for="description">Description of the pet-sitting service that you are providing: </label>
				<textarea type="text" rows=5 class="form-control" id="body" name="description"></textarea>
			</div>

			<div class="form-group">
				<label for="description">Price: </label>
				<input type="number" class="form-control" id="listing_price" name="listing_price" min="0" max="5000" step="0.01"></input>
			</div>
			

			<label for="form-group" class="col-2 col-form-label">Starting Date and Time of your pet-sitting service: </label>
			<div class="col-8">
				<input class="form-control" type="date" id="start_at" value=<?php echo date("Y-m-d");?> name="start_at">
			</div>

			<label for="form-group" class="col-2 col-form-label">Ending Date and Time of your pet-sitting service: </label>
			<div class="col-8">
				<input class="form-control" type="date" value=<?php echo date("Y-m-d");?> id="end_at" name="end_at">
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Publish</button>
			</div>

			@include('layouts.errors')

		</form>
		
	</div>
</div>

@endsection