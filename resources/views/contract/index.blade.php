@extends('layouts.app') 
@section('content')

@foreach ($contracts_bidder as $contract)
{{  $contract->regardedBid->getBidder->name  }}
<br>
@endforeach
<hr>
@foreach ($contracts_caretaker as $contract)
{{  $contract->regardedBid->getPet->getOwner->name  }}
<br>
@endforeach

@endsection