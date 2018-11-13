@extends('layouts.public_1column')
@section('content')

    <div class="row">

        <div class="col-2">
        </div>
        <div class="col-6">
            <h1>{{ $artist->name }}</h1>
            <ul>
            @foreach($artist->songs as $value)
                <li>{{ $value->name }}</li>
            @endforeach
            </ul>
        </div>
    </div>


@endsection
