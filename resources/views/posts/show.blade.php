@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Listing Details
                    </div>

                    <h1 style="padding: 10px;">
                        Listing Details: {{ $post->description }}
                    </h1>
                    <h2 style="padding: 10px;">Caretaker: {{ $post->getAuthor->name }}</h2>
                    <h3 style="padding: 10px;">Start at: {{  $post->start_at  }}</h3>
                    <h3 style="padding: 10px;">E d at: {{  $post->end_at  }}</h3>

                </div>
            </div>
        </div>
    </div>
@stop
