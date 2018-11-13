@extends('layouts.admin_2column')
@section('page_header') Edit Album @endsection
@section('content')
    <div class="row">

        <div class="col-xs-8">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Responsive Hover Table</h3>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        {{ $submission->name }}

                    </div>

                    <div class="form-group">
                        <label for="name">Album</label>
                        {{ $submission->album }}

                    </div>

                    <div class="form-group">
                        <label for="name">Artist</label>
                        {{ $submission->artist }}

                    </div>
                    <div class="form-group">
                        <label for="name">Video</label>
                        {{ $submission->video_url }}

                    </div>

                    <div class="form-group">
                        <label for="name">Lyrics</label>
                        {{ $submission->lyrics }}

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
                        <label for="name">Year</label>
                        {{ $submission->year }}

                    </div>

                    <div class="form-group">
                        <label for="name">Email</label>
                        {{ $submission->email }}

                    </div>

                    <div class="form-group">
                        <form method="post" action="{{ action('Admin\SubmissionController@update',$submission->id) }}" enctype="multipart/form-data">
                        <button type="submit" class="btn btn-primary">Change</button>
                            @csrf
                            <input type="hidden" name="_method" value="PATCH">
                        </form>
                    </div>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>


    </div>
@endsection