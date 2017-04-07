@extends('layouts.app')

@section('content')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css"/>

<div class="container">
  {{-- TO DO   --}}
  {{-- display in multiple pages in different orders   --}}
  <div class="row">
    <div class="col-md-12">

      <div class="panel panel-default">

        <div class="panel-body">

          <form method="POST" action="/search">
            {{  csrf_field()  }}
            <div class="row">
              <div class="col-md-5">
                Search For Keyword
                <div class="form-group">
                  <label class="sr-only" for="keyword">Key Word</label>
                  <input type="text" class="form-control" id="keyword" placeholder="Key Word" name="keyword">
                </div>
              </div>
              <div class="col-md-2">
                Start From
                <div class="form-group">
                  <label class="sr-only" for="start_at">Start At</label>
                  <div class="input-group">
                    <input type="date" class="form-control" id="checkin" placeholder="Check in" name="start_at">
                  </div>
                </div>
              </div>
              <div class="col-md-2">
                Until
                <div class="form-group">
                  <label class="sr-only" for="end_at">End At</label>
                  <div class="input-group">
                    <input type="date" class="form-control" id="checkout" placeholder="Check out" name="end_at">
                  </div>
                </div>
              </div>
              <div class="col-md-1">
                Available
                <div class="form-group">

                  <label class="switch">
                    <br>
                    <input type="checkbox" name="check" value="yes">
                    <div class="slider round"></div>
                  </label>
                </div>
              </div>
              <div class="col-md-2">
                Order By
                <div class="form-group">
                  <label class="sr-only" for="orderby">Order By</label>
                  <select id="orderby" name="orderby" class="form-control">
                    <option value="1">Most Recent</option>
                    <option value="2">Cheapest</option>
                    <option value="3">Order by Name</option>                   
                  </select>
                </div>
              </div>
            </div>
            <div class="row">

              <div class="col-md-3">
                Minimum Price
                <div class="form-group">
                  <label class="sr-only" for="min">Min. Price</label>
                  <input type="number" class="form-control" id="min" placeholder="Min. Price" name="min">
                </div>
              </div>

              <div class="col-md-3">
                Maximum Price
                <div class="form-group">
                  <label class="sr-only" for="max">Max. Price</label>
                  <input type="number" class="form-control" id="max" placeholder="Max. Price" name="max">
                </div>
              </div>

              <div class="col-md-6">
              <br>
                <button type="submit" class="btn btn-default btn-primary">Search</button>
              </div>
            </div>
          </form>


        </div>

      </div>






      @foreach ($posts as $post)
      @if ($post->signed_contract)
      <div class="well" style="background-color:#cfd2d6;">
        @else
        <div class="well" style="background-color:#ffffff;">
          @endif
          <div class="media">
            <a class="pull-left">
              <img class="media-object" src="http://placekitten.com/150/150">
            </a>
            <div class="media-body">

              @if ($post->signed_contract)
              <a href="/post/{{ $post->id }}"><h4 class="media-heading" style="color:red;">{{ $post->title }}</h4></a>
              @else 
              <a href="/post/{{ $post->id }}"><h4 class="media-heading" style="color:#048c16">{{ $post->title }}</h4></a>
              @endif
              <p class="text-right"><a href="/user/{{  $post->author  }}">By {{ $post->getAuthor->name }}</a></p>
              <p> {{ $post->description }}</p>
              <ul class="list-inline list-unstyled">
                <li><span><i class="glyphicon glyphicon-calendar"></i> {{  $post->updated_at->diffForHumans()  }} </span></li>
                <li>|</li>
                <span><i class="glyphicon glyphicon-comment"></i> {{  $post->bids()->count()  }} bids</span>
                <li>|</li>

                <span><i class="glyphicon glyphicon-usd"></i>{{  $post->listing_price  }}</span>
                <li>|</li>
                <li><span><i class="fa fa-calendar-check-o" aria-hidden="true"></i> {{  Carbon\Carbon::parse($post->start_at)->format('jS \o\f F, Y')  }}<strong><i> to </i></strong> {{  Carbon\Carbon::parse($post->end_at)->format('jS \o\f F, Y')  }}</span></li>

              </ul>
            </div>
          </div>
        </div>

        @endforeach
      </div>
    </div>
  </div>


  @endsection
  <script src="//code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#example').DataTable();
    } );
  </script>

