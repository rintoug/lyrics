@extends('layouts.public_1column')
@section('content')

    <div class="row">
        <div class="col-lg-4">
            <img src="{{ asset('media/album/thumbnail/'.$album->cover) }}" width="200">
        </div>
        <div class="col-lg-8"><h2>{{ $album->name }}</h2></div>
    </div>
    <div>

        @foreach($album->songs as $song)
            <div class="col-md-3">
                <a href="{{ url('lyrics/'.$song->slug.'/') }}"> {{ $song->name }}</a>
            </div>
        @endforeach

    </div>
@endsection
