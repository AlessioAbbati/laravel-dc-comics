@extends('layouts.base')

@section('contents')
    <h1>Trash comics</h1>

    @if (session('delete_success'))
        @php
            $comic = session('delete_success')
        @endphp
        <div class="alert alert-danger">
            "{{ $comic->title }}" has been deleted!!
        </div>
    @endif

    @if (session('restore_success'))
    @php
        $comic = session('restore_success')
    @endphp
    <div class="alert alert-success">
        "{{ $comic->title }}" has been deleted!!
        
    </div>
@endif

    <div class="container">
        <div class="row row-cols-3">
            @foreach ($trashedComics as $comic)
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
                            <form action="{{ route('comics.restore', ['comic' => $comic->id]) }}" method="POST" class="d-inline-block">
                                @csrf
                                <button class="btn btn-warning" href="">Restored</button>
                            </form>
    
                            <form action="{{ route('comics.hardDelete', ['comic' => $comic->id]) }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('delete')
                                <button class="hard_delete btn btn-danger" href="">Elimina definitivamente</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    {{ $trashedComics->links() }}

@endsection