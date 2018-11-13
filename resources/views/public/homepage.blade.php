@extends('layouts.public_1column')
@section('title') Welcome to new world of lyrics @endsection
@section('content')

    <div class="row">
        <div class="col-lg-12 mt-3 align-items-center"><h2>Latest Albums</h2></div>

        @foreach($albums as $album)
            <div class="col-md-2">
                <div class="album-card">
                <a href="{{ url('album/'.$album->slug.'/') }}"> <img src="{{ asset('media/album/thumbnail/'.$album->cover) }}" alt="{{ $album->name }}" title="{{ $album->name }}" width="120" ></a>

                <span class="album-title">{{ $album->name }}</span>
                </div>
            </div>
        @endforeach

    </div>
@endsection
