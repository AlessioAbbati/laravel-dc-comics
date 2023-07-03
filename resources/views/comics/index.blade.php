@extends('layouts.base')

@section('contents')

    @if (session('delete_success'))
        @php
            $comic = session('delete_success')
        @endphp
        <div class="alert alert-danger">
            "{{ $comic->title }}" has been deleted!!
            <form action="{{ route("comics.restore", ['comic' => $comic] )}}" method="post">
                @csrf
                <button class="btn btn-warning">Restore</button>
            </form>
        </div>
    @endif

    @if (session('restore_success'))
        @php
            $comic = session('restore_success')
        @endphp
        <div class="alert alert-success">
            "{{ $comic->title }}" has been restored!!
            
        </div>
    @endif

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
                        <a href="{{ route('comics.edit', ['comic' => $comic->id]) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('comics.destroy', ['comic' => $comic->id]) }}" method="POST" class="d-inline-block">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger" href="">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{ $comics->links() }}
</div>

@endsection