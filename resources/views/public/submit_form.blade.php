@extends('layouts.public_1column')
@section('content')
    <form method="post" action="{{ url('submit-lyrics-post') }}">
        <div class="form-group">
            <label for="txtname">Name</label>
            <input class="form-control input-lg" type="text" placeholder="" name="txtname" value="{{ old('txtname') }}">
            @if ($errors->has('txtname'))
                <span class="help-block"><strong>{{ $errors->first('txtname') }}</strong></span>
            @endif
        </div>
        <div class="form-group">
            <label for="name">Artist</label>
            <input class="form-control input-lg" type="text" placeholder="" name="artist" value="{{ old('artist') }}">
            @if ($errors->has('artist'))
                <span class="help-block"><strong>{{ $errors->first('artist') }}</strong></span>
            @endif
        </div>
        <div class="form-group">
            <label for="album">Album</label>
            <input class="form-control input-lg" type="text" placeholder="" name="album" value="{{ old('album') }}">
            @if ($errors->has('album'))
                <span class="help-block"><strong>{{ $errors->first('album') }}</strong></span>
            @endif
        </div>
        <div class="form-group">
            <label for="year">Year</label>
            <input class="form-control input-lg" type="text" placeholder="" name="year" value="{{ old('year') }}">
            @if ($errors->has('year'))
                <span class="help-block"><strong>{{ $errors->first('year') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="lyrics">Lyrics</label>

            <textarea class="form-control" rows="5" cols="20" name="lyrics">{{ old('lyrics') }}</textarea>
            @if ($errors->has('lyrics'))
                <span class="help-block"><strong>{{ $errors->first('lyrics') }}</strong></span>
            @endif
        </div>
        <div class="form-group">
            <div class="g-recaptcha"
                 data-sitekey="{{env('GOOGLE_RECAPTCHA_KEY')}}">
            </div>
            @if ($errors->has('g-recaptcha-response'))
                <span class="" style="color:red;">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
            @endif
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        @csrf
    </form>
@endsection