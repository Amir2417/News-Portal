@extends('admin.admin_master')
@section('content')
<div class="container-full">
    <div class="content">
        <div class="row">


            <div class="col-12">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">  Author List </h3>
                        <div class="box-tools">
                            <div style="width: 150px;">
                                <div class="text-right">
                                    <a href="{{ route('authors.index') }}" class="btn btn-success btn-flat"> Add New </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Author Name</th>
                                        <th>Author Email</th>
                                        <th>Author Phone</th>
                                        <th>Author Photo</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($authors as $author)
                                    <tr>
                                        <td>{{$author->name}}</td>
                                        <td>{{$author->email}}</td>
                                        <td>{{$author->phone}}</td>
                                        <td><img src="{{ asset($author->photo) }}" alt="" width="80px" height="80px"></td>
                                        <td>
                                            @if($author->status ==1)
                                                <span class="badge badge-pill badge-success">Active</span>
                                            @else
                                                <span class="badge badge-pill badge-danger">InActive</span>
                                            @endif
                                        </td>
                                        <td>
                                            {{-- Edit and Delete Option Start--}}
                                            <a class="btn btn-primary" href="{{ route('authors.edit',$author->id) }}" title="Edit Data"><i class="fa fa-pencil"></i></a>
                                            <a class="btn btn-danger" id="delete" href="{{ route('authors.destroy',$author->id) }}" title="Delete Data"><i class="fa fa-trash"></i></a>
                                            {{-- Edit and Delete Option End--}}

                                            {{-- Active and inactive Option  Start--}}
                                            @if($author->status ==1)
                                            <a class="btn btn-primary" href="{{ url('category/inactive',$author->id) }}" title="InActive Now"><i class="fa fa-arrow-down"></i></a>
                                            @else
                                            <a class="btn btn-primary" href="{{ url('category/active',$author->id) }}" title="Active Now"><i class="fa fa-arrow-up"></i></a>
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
