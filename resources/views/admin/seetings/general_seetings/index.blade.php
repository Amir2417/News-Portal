@extends('admin.admin_master')
@section('content')

<div class="container-full">
    <div class="content">
        <div class="row">


            <div class="col-8">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">General Settings List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Favicon</th>
                                        <th>Logo</th>
                                        <th>Advertisement</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($items as $item)
                                    <tr>
                                        <td>{{$item->title}}</td>
                                        <td><img src="{{ asset($item->favicon_image) }}" alt=""></td>
                                        <td><img src="{{ asset($item->logo_image) }}" alt=""></td>
                                        <td><img src="{{ asset($item->advertisement_image) }}"></td>
                                        <td>
                                            @if($item->status ==1)
                                                <span class="badge badge-pill badge-success">Active</span>
                                            @else
                                                <span class="badge badge-pill badge-danger">InActive</span>
                                            @endif
                                        </td>
                                        <td width="30%">
                                            {{-- Edit and Delete Option Start--}}
                                            <a class="btn btn-primary" href="{{ url('edit',$item->id) }}" title="Edit Data"><i class="fa fa-pencil"></i></a>
                                            <a class="btn btn-danger" id="delete" href="{{ url('delete',$item->id) }}" title="Delete Data"><i class="fa fa-trash"></i></a>
                                            {{-- Edit and Delete Option End--}}

                                            {{-- Active and inactive Option  Start--}}
                                            @if($item->status ==1)
                                            <a class="btn btn-primary" href="{{ url('inactive',$item->id) }}" title="InActive Now"><i class="fa fa-arrow-down"></i></a>
                                            @else
                                            <a class="btn btn-primary" href="{{ route('active',$item->id) }}" title="Active Now"><i class="fa fa-arrow-up"></i></a>
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

            <div class="col-md-4">
                <div class="box">
                    <div class="box-header with-border">
                            <h3 class="box-title">Add General Settings</h3>
                    </div>
                        <div class="card-body">
                            <form action="{{ route('general.settings.store') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <h5>Title<span class="text-danger">*</span>
                                    </h5>
                                    <div class="controls">
                                        <input type="text" name="title" class="form-control">
                                        @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Favicon Image<span class="text-danger">*</span>
                                    </h5>
                                    <div class="controls">
                                        <input type="file" name="favicon_image" class="form-control">
                                        @error('favicon_image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Logo Image<span class="text-danger">*</span>
                                    </h5>
                                    <div class="controls">
                                        <input type="file" name="logo_image" class="form-control">
                                        @error('logo_image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Advertisement Image<span class="text-danger">*</span>
                                    </h5>
                                    <div class="controls">
                                        <input type="file" name="advertisement_image" class="form-control">
                                        @error('advertisement_image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Item">

                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
