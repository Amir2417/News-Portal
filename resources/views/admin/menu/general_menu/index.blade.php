@extends('admin.admin_master')
@section('content')
<div class="container-full">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">General Menu List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Key</th>
                                        <th>Position</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($items as $item)
                                    <tr>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->key}}</td>
                                        <td>{{$item->position}}</td>
                                        <td>
                                            @if($item->status ==1)
                                                <span class="badge badge-pill badge-success">Active</span>
                                            @else
                                                <span class="badge badge-pill badge-danger">InActive</span>
                                            @endif
                                        </td>
                                        <td>
                                            {{-- Edit and Delete Option Start--}}
                                            <a class="btn btn-primary" href="{{ url('general_menu/edit',$item->id) }}" title="Edit Data"><i class="fa fa-pencil"></i></a>
                                            <a class="btn btn-danger" id="delete" href="{{ url('general_menu/delete',$item->id) }}" title="Delete Data"><i class="fa fa-trash"></i></a>
                                            {{-- Edit and Delete Option End--}}

                                            {{-- Active and inactive Option  Start--}}
                                            @if($item->status ==1)
                                            <a class="btn btn-primary" href="{{ url('general_menu/inactive',$item->id) }}" title="InActive Now"><i class="fa fa-arrow-down"></i></a>
                                            @else
                                            <a class="btn btn-primary" href="{{ url('general_menu/active',$item->id) }}" title="Active Now"><i class="fa fa-arrow-up"></i></a>
                                            @endif
                                            {{-- Active and inactive Option  End--}}
                                        </td>

                                   @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
