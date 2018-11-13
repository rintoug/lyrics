@extends('layouts.public_1column')
@section('title') {{ $song->name }} Song Lyrics @endsection
@section('meta_content') Best lyrics website online. Learn {{ $song->name }} Song Lyrics online. @endsection
@section('meta_keywords') @endsection

@section('content')

    <div class="row">

        <div class="col-2">
        </div>
        <div class="col-6">

            <h1>{{ $song->name }} - Lyrics</h1>



            {!! $song->lyrics !!}

            {!! $song->year !!}

            {!! $song->album->name !!}



            {{ $song->video_url }}
        </div>
        <div class="col-4">
            <div class="song-info">
            <h5>Album:{{ $song->album->name }}</h5>
            <div class="album-image">
            <img src="{{ asset('media/album/thumbnail/'.$song->album->cover) }}" width="200">
            </div>

            <h5>Artists</h5>
            @foreach($song->artists as $value)
                <a href="{{ url('artist/'.$value->slug) }}"> {{ $value->name }}</a>
            @endforeach

            </div>

        </div>


    </div>

@endsection
