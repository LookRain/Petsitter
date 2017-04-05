@extends('layouts.app') 
@section('content')

<div class="container">
	<div class="col-md-12">
		<div class="list-group">
			<h2>Contracts Signed as Bidder</h2>

			@foreach ($contracts_bidder as $contract)
			<a href="/post/{{  $contract->regardedBid->getPost->id  }}" class="list-group-item">
				Signed with <strong>{{  $contract->regardedBid->getPost->getAuthor->name  }}</strong>  {{  $contract->regardedBid->getPost->getAuthor->created_at->diffForHumans()  }}
				<h3>Listing: </h3> {{  $contract->regardedBid->getPost->title  }}
				{{-- {{  $contract->regardedBid->getBidder->name  }} --}}
			</a>
			<br>
			@endforeach
			

			
		</div>
		
		<br>
		
		
		<div class="list-group">
			<h2>Contracts Signed as Caretaker</h2>
			@foreach ($contracts_caretaker as $contract)
			<a href="/post/{{  $contract->regardedBid->getPost->id  }}" class="list-group-item">
				Signed with <strong>{{  $contract->regardedBid->getPet->getOwner->name  }}</strong> {{  $contract->regardedBid->getPost->getAuthor->created_at->diffForHumans()  }}
				<h3>Listing: </h3> {{  $contract->regardedBid->getPost->title  }}
			</a>
			<br>
			@endforeach

			
		</div>
	</div>
</div>



@endsection