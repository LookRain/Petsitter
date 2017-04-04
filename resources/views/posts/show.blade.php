@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Listing Details
                </div>
                <div class="form-group">
                    <div class="form-item">
                        <h1 style="padding: 10px;">
                          Title: {{ $post->title }}
                      </h1>
                  </div>
                  <div class="form-item">
                    <h3 style="padding: 10px;">
                      Details: {{ $post->description }}
                  </h3>
              </div>
              <div class="form-item">
                <h2 style="padding: 10px;">Listed By: {{ $post->getAuthor->name }}</h2>
            </div>
        </div>
        <h3 style="padding: 10px;">Start at: {{  $post->start_at  }}</h3>
        <h3 style="padding: 10px;">End at: {{  $post->end_at  }}</h3>
        <hr>
        <div class="form-group">
            <div class="form-item">
                <div class="panel-body">
                    @foreach($post->bids as $bid)
                    <strong><h3>Bidder: </strong>{{ $bid->getBidder->name }}</h3>
                    <strong><h3>Pet: </strong>{{ $bid->getPet->name }}</h3>
                    <strong><h3>Bidding message:</h3></strong>{{ $bid->bid_message }}
                    <strong><h4>Bidding price:</h4></strong>{{ $bid->bid_price }}
                    <hr> @endforeach()
                </div>
            </div>
        </div>
    </div>
</div>
</div>
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
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
