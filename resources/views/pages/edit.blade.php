@extends('layouts.index')
@section('content')
<form action="/edit/{{$dbPhoto->id}}/update" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <label for="">Image</label>
    <img width="10%" src="{{asset('storage/img/' . $dbPhoto->src)}}" alt="pic">
    <input type="file" name="src">

    <button type="submit">update</button>
</form>

@endsection
