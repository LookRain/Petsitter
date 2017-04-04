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
                            Listing Details: {{ $post->description }}
                        </h1>
                    </div>

                    <div class="form-item">
                       <h2 style="padding: 10px;">Caretaker: {{ $post->getAuthor->name }}</h2>
                   </div>
               </div>



               <h3 style="padding: 10px;">Start at: {{  $post->start_at  }}</h3>
               <h3 style="padding: 10px;">End at: {{  $post->end_at  }}</h3>
               <hr>

               <div class="form-group">
                <div class="form-item">
                    <div class="panel-body">
                        @foreach($post->bids as $bid)
                        <strong><h3>Bidder: </strong>{{  $bid->getBidder->name  }}</h3>
                        <strong><h3>Pet: </strong>{{  $bid->getPet->name  }}</h3>
                        <strong><h3>Bidding message:</h3></strong>{{  $bid->bid_message  }}
                        <strong><h4>Bidding price:</h4></strong>{{  $bid->bid_price  }}
                        <hr>
                        @endforeach()
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

               <form>
                  <!-- <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div> -->
                <div class="form-group">Select Your Pet</label>
                    <select class="form-control" id="exampleSelect1">
                        @foreach (Auth::user()->pets as $pet)
                        <option>{{ $pet->name }} </option>
                        @endforeach
                      
                      
                  </select>
              </div>
              <div class="form-group">
                <label for="exampleSelect2">Example multiple select</label>
                <select multiple class="form-control" id="exampleSelect2">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
              </select>
          </div>
          <div class="form-group">
            <label for="exampleTextarea">Example textarea</label>
            <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="exampleInputFile">File input</label>
            <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
            <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
        </div>
        <fieldset class="form-group">
            <legend>Radio buttons</legend>
            <div class="form-check">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                Option one is this and that&mdash;be sure to include why it's great
            </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="option2">
                Option two can be something else and selecting it will deselect option one
            </label>
        </div>
        <div class="form-check disabled">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios3" value="option3" disabled>
                Option three is disabled
            </label>
        </div>
    </fieldset>
    <div class="form-check">
        <label class="form-check-label">
          <input type="checkbox" class="form-check-input">
          Check me out
      </label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

</div>

</div>
</div>

</div>

@endsection
