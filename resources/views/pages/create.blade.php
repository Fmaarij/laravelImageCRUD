@extends('layouts.index')
@section('content')
<form action="/addimg" method="post" enctype="multipart/form-data">
    @csrf
    <label for="">Image</label>
    <input type="file" name="src">

    <button type="submit">Add</button>
</form>

@endsection
