@extends('layouts.public_1column')
@section('content')
    @foreach($songs as $song)
        <a href="{{ url('lyrics/'.$song->slug) }}">{{ $song->name }}</a>
    @endforeach
@endsection
