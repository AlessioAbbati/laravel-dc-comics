@extends('layouts.base')

@section('contents')

<div class="container">
    <div class="row row-cols-3">
        @foreach ($comics as $comic)
            <div class="col mb-3">
                <div class="card h-100">
                    <img src="{{ $comic->thumb }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $comic->title }}</h5>
                        {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{ $comic->price }}</li>
                        <li class="list-group-item">{{ $comic->series }}</li>
                        <li class="list-group-item">{{ $comic->type }}</li>
                        <li class="list-group-item">{{ $comic->sale_date }}</li>
                    </ul>
                    <div class="card-body">
                        <a href="{{ route('comics.show', ['comic' => $comic->id]) }}" class="btn btn-primary">Comic info</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{ $comics->links() }}
</div>

@endsection