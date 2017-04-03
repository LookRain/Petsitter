@extends('layouts.app')

@section('content')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css" rel="stylesheet">
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">View Listings</div>

                <ul class="list-group">
                @foreach ($posts as $post)
                    <li class="list-group-item">
                        <h3><a href="/post/{{ $post->id }}">Caretaker: {{ $post->getAuthor->name }}</a></h3>
                        <h4>Description: {{ $post->description }}</h4>
                        <p>Start at: {{  $post->start_at  }}</p>
                        <p>End at: {{  $post->end_at  }}</p>
                    </li>
                @endforeach
                </ul>
            </div>
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

