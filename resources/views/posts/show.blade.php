@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Post Content
                    </div>

                    <h1>
                        {{ $post->description }}
                    </h1>


                </div>
            </div>
        </div>
    </div>
@stop
