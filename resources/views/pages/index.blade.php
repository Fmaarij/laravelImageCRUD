@extends('layouts.index')
@section('content')
    @foreach ($dbPhoto as $pic)
        <p>
            <img width="25%" src="{{ asset('storage/img/' . $pic->src) }}" alt="picture">
        </p>
        <a href="/show/{{ $pic->id }}">

            <button>
                Show
            </button>
        </a>

        <form action="/{{ $pic->id }}/delete" method="post" enctype="multipart/form">
            @csrf
            @method('DELETE')
            <button>Delete</button>
        </form>
        <form action="/download/{{ $pic->id }}" method="POST">
            @csrf
            <button>
                Download
            </button>
        </form>
    @endforeach
@endsection
