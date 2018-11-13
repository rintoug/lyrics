@extends('layouts.public_1column')
@section('content')

    <div class="row">
        <div class="col-lg-12"><h2>Search Results for "{{ app('request')->input('q') }}"</h2></div>

        {{--@foreach($results as $result)
            <div class="col-md-12">
                <a href="{{ url('lyrics/'.$result->slug) }}"> {{ $result->name }}</a>
            </div>
        @endforeach--}}
        <gcse:searchresults-only sort_by="date"></gcse:searchresults-only>

    </div>
@endsection
@section('head')
    <script>
        (function() {
            var cx = '000888210889775888983:3gepro1fol8';
            var gcse = document.createElement('script'); gcse.type = 'text/javascript'; gcse.async = true;
            gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
                '//www.google.com/cse/cse.js?cx=' + cx;
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(gcse, s);
        })();
    </script>
@endsection
