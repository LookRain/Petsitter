@extends('layouts.app')

@section('content')
<div class="container">
	<div class="col-md-12 blog-main">
		<form method="POST" action="/post/new">

			{{  csrf_field() }}
			<div class="form-group">
				<label for="title">Title: </label>
				<input type="text" class="form-control" id="title" name="title">
			</div>
			<div class="form-group">
				<label for="body">Description of the pet-sitting service that you are providing: </label>
				<textarea  type="text" rows="5" class="form-control" id="body" name="body"></textarea>
			</div>

			<label for="form-group" class="col-2 col-form-label">Starting Date and Time of your pet-sitting service: </label>
			<div class="col-8">
				<input class="form-control" type="datetime-local" value="2011-08-19T13:45:00" id="example-datetime-local-input" name="start_at">
			</div>

			<label for="form-group" class="col-2 col-form-label">Ending Date and Time of your pet-sitting service: </label>
			<div class="col-8">
				<input class="form-control" type="datetime-local" value="2011-08-19T13:45:00" id="example-datetime-local-input" name="end_at">
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Publish</button>
			</div>

			@include('layouts.errors')

		</form>
	</div>
</div>

@endsection