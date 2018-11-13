@extends('layouts.admin_2column')
@section('page_header') Songs @endsection
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
                    {{ $songs->links() }}
                    <table class="table table-hover">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Created At</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        @foreach($songs as $song)
                        <tr>
                            <td>{{ $song->id }}</td>
                            <td>{{ $song->name }}</td>
                            <td>{{ $song->created_at }}</td>
                            <td>
                                @if($song->status==1)
                                    <span class="label label-success">Active</span>
                                @else
                                    <span class="label label-danger">Inactive</span>
                                @endif
                            </td>
                            <td><a href="{{ action('Admin\SongController@edit',$song->id)}}">Edit</a> </td>
                        </tr>
                        @endforeach

                    </table>
                    {{ $songs->links() }}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection