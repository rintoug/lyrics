@extends('layouts.admin_2column')
@section('page_header') Albums @endsection
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">


                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    {{ $submissions->links() }}
                    <table class="table table-hover">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Album</th>
                            <th>Artist</th>
                            <th>Video URL</th>
                            <th>Year</th>
                            <th>Email</th>
                            <th>Created At</th>
                            <th>Actions</th>

                        </tr>
                        @foreach($submissions as $submission)
                        <tr>
                            <td>{{ $submission->id }}</td>
                            <td>{{ $submission->name }}</td>
                            <td>{{ $submission->album }}</td>
                            <td>{{ $submission->artist }}</td>
                            <td>{{ $submission->video_url }}</td>
                            <td>{{ $submission->year }}</td>
                            <td>{{ $submission->email }}</td>
                            <td>{{ $submission->created_at }}</td>
                            <td><a href="{{ action('Admin\SubmissionController@show',$submission->id)}}">View</a> </td>

                        </tr>
                        @endforeach

                    </table>
                    {{ $submissions->links() }}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection