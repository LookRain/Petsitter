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
                    <h3 style="padding: 10px;">E d at: {{  $post->end_at  }}</h3>

                    @foreach($post->bids as $bid)
                        {{  $bid->bid_message  }}
                    @endforeach()
                    <div class="form-item"><div class="btn btn-primary">Test</div>
                    </div>
                </div>
                    
            </div>
        </div>
    </div>
@stop
