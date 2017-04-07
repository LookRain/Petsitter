@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-default">
				<div class="panel panel-body">
					@foreach ($notifications as $notification)
					@if ($notification->post->getAuthor->id == auth()->user()->id)
					@php ($bidder = $notification->bid->getBidder->name)
					@php ($post = $notification->post)			
					<a href="/post/{{$post->id}}"><div class="alert alert-info">

						<strong>{{  $bidder  }}</strong> Made a bid on your post <strong>{{  $post->title  }}</strong>.

					</div> </a>
					@endif
					@endforeach
				</div>
				<div class="panel panel-body">
					@foreach ($contracts_bidder as $contract)
					
					<a href="/post/{{  $contract->regardedBid->getPost->id  }}">
					<div class="alert alert-success">
						
						<strong>{{  $contract->regardedBid->getPost->getAuthor->name  }}</strong> Accepted your bid! <strong>{{  $contract->regardedBid->getPost->title  }}</strong>.

					</div> </a>
				
					@endforeach
				</div>

			</div>

		</div>

	</div>

</div>


@endsection