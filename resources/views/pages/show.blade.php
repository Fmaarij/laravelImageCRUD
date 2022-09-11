@extends('layouts.index')
@section('content')
    {{-- @foreach ($dbPhoto as $pic) --}}
        <p>
            <img width="25%"
                src="{{ asset('storage/img/' . $dbPhoto->src) }}" alt="picture">
        </p>
        <a href="/edit/{{$dbPhoto->id}}">
            <button>Edit</button>
        </a>
    {{-- @endforeach --}}
@endsection
