@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <ul class="list-group">
                @foreach ($posts as $post)
                    <li class="list-group-item">
                        <h3><a href="/post/{{ $post->id }}">{{ $post->getAuthor->name }}</a></h3>
                        <h4>{{ $post->description }}</h4>
                    </li>
                @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
