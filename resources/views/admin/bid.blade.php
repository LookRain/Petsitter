@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Bid Info</div>
                <div class="panel-body">
                    {{-- {{  $user->isAdmin  }} --}}
                    <form class="form-horizontal" role="form" method="POST" action="/admin/bid/delete">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Bidder</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{  $bid->getBidder->name  }}" disabled>


                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Caretaker</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{  $bid->getPost->getAuthor->name  }}" disabled>


                            </div>
                        </div>

                        <input type="hidden" name="id" value="{{  $bid->id  }}">

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-danger">
                                    Delete
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
