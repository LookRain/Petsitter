@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">




            @if ($post->signed_contract)
            @php ($signed_bid_id = $post->signed_contract->signed_under)
            @endif
            <div class="panel panel-default">

                <div class="panel-heading">
                    Listing Details
                </div>
                <div class="panel-body">

                    <div class="form-group">
                        <div>
                            <h1 style="padding: 10px;">
                              Title: {{ $post->title }}
                          </h1>
                          <hr>
                      </div>
                      <div>
                        <h3 style="padding: 10px;">
                          Details: {{ $post->description }}
                      </h3>
                      <hr>
                      <div>
                        <h2 style="padding: 10px;">Listed By: {{ $post->getAuthor->name }}</h2>
                    </div>

                    <h3 style="padding: 10px;">Start at: {{  $post->start_at  }}</h3>
                    <h3 style="padding: 10px;">End at: {{  $post->end_at  }}</h3>

                    <hr>
                </div>
            </div>
        </div>


    </div>
    <div class="panel panel-default">

        <div class="panel-heading">
            Bids
        </div>
        <div class="form-group">
            <div class="panel-body">
            @if ($post->bids->isEmpty())
            <h3 style="background-color: yellow;">No bids for this listing yet.</h3>
            @else
                @foreach($post->bids as $bid)
                @if ($post->signed_contract)
                @if ($bid->id == $signed_bid_id) 
                <h1 style="color:black; background-color: red;">Successful Bid!</h1>
                @endif
                @endif
                <strong><h3>Bidder: </strong>{{ $bid->getBidder->name }}</h3>
                <strong><h3>Pet: {{ $bid->getPet->name }}</h3>
                    <strong><h5>Bidding message:</strong> {{ $bid->bid_message }}</h5>
                    <strong><h4>Bid Id:</strong> {{ $bid->id }}</h4>
                    <strong><h4>Bidding price:</strong> {{ $bid->bid_price }}</h4>

                    @if (auth()->user()->id == $post->getAuthor->id && !$post->signed_contract)
                    <br>          
                    <form method="POST"  action="/post/{{  $post->id  }}/accept" >
                        {{  csrf_field()  }}
                        <input type="hidden" value="{{  $bid->id  }}" name="bid_id" />
                        <input type="submit" value="Accept This Bid" class="btn">
                    </form>
                    @endif


                    <hr> 
                    @endforeach()

                    @endif
                </div>
            </div>
            
        </div>
    </div>
</div>
@if (auth()->check())
@if (auth()->user()->id != $post->getAuthor->id)
@if (!$post->signed_contract)
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">

            <div class="panel-heading">
                <strong>Offer a Bid</strong>
            </div>
            
            <div class="panel-body">
                <form method="POST" action="/post/{{ $post->id }}/bid">
                    {{ csrf_field() }}
                    <div class="form-group">Select Your Pet</label>
                        <select class="form-control" id="pet" name="pet">

                            @foreach(auth()->user()->pets as $pet)
                            <option value="{{ $pet->id }}">{{ $pet->name }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Offer Your Price</label>
                        <input type="number" class="form-control" name="price" min="0" max="5000" step="0.01">
                        <small id="emailHelp" class="form-text text-muted">Please offer a price that you think is appropriate for the service the caretaker is providing.</small>
                    </div>
                    <div class="col-8">
                        <input class="form-control" type="datetime-local" value="2011-08-19T13:45:00" id="example-datetime-local-input" name="start_at">
                    </div>

                    <label for="form-group" class="col-2 col-form-label">Ending Date and Time of your pet-sitting service: </label>
                    <div class="col-8">
                        <input class="form-control" type="datetime-local" value="2011-08-19T13:45:00" id="example-datetime-local-input" name="end_at">
                    </div>
                    <br>
                    
                    <button type="submit" class="btn btn-primary">Bid</button>

                    
                </form>
            </div>
            @endif
            @endif

            @else
            <div class="panel-body">please <a href="{{  route('login')  }}">log in</a> to offer a bid</div>
            @endif

        </div>
    </div>
</div>
</div>
@endsection
