@extends('layouts.admin_2column')
@section('content')
    <div class="row">
        <form method="post" action="{{ action('Admin\AlbumController@store') }}" enctype="multipart/form-data">
        <div class="col-xs-8">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Responsive Hover Table</h3>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control input-lg" type="text" placeholder="" name="name" value="{{ old('name') }}">
                        @if ($errors->has('name'))
                            <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                        @endif
                    </div>





                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <div class="col-xs-4">
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Image</label>
                        <input class="form-control input-lg" type="file" name="cover">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
            @csrf
        </form>
    </div>
@endsection