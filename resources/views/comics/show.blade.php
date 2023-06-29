@extends('layouts.base')

@section('contents')
<h1>{{ $comic->title }}</h1>
<p class="card-text">{!! $comic->description !!}</p>

@endsection