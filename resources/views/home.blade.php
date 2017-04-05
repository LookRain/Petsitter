@extends('layouts.app')

@section('content')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css"/>

<div class="container">
{{-- TO DO   --}}
{{-- display in multiple pages in different orders   --}}
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
            <span><i class="glyphicon glyphicon-comment"></i> 2 bids</span>
            <li>|</li>
            <li>
               <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star-empty"></span>
            </li>
            <li>|</li>
            <li>
            <!-- Use Font Awesome http://fortawesome.github.io/Font-Awesome/ -->
              <span><i class="fa fa-facebook-square"></i></span>
              <span><i class="fa fa-twitter-square"></i></span>
              <span><i class="fa fa-google-plus-square"></i></span>
            </li>
            </ul>
       </div>
    </div>
  </div>
                
    @endforeach

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

