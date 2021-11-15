<!-- Extending the layout blade -->
@extends('layout')

<!-- Yield the data into the given section -->
@section('content')
    <!-- Using php directives -->
    @foreach ($home as $h)
    <article>
        <h1> <a href="/post/{{$h->slug}}"> {{$h->title}} </a> </h1>
        <!-- Below syntax enables the php not to skip the html elements -->
        {!! $h->body !!}
    </article>
    @endforeach
@endsection