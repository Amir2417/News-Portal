@extends('admin.admin_master')
@section('content')
<div class="col-md-12">
    <div class="box">
        <div class="box-header with-border">
                <h3 class="box-title">Add General Settings</h3>
        </div>
            <div class="card-body">
                <form action="{{ route('general.settings.update',$data->id) }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <h5>Title<span class="text-danger">*</span>
                        </h5>
                        <div class="controls">
                            <input type="text" name="title" value="{{ $data->title }}" class="form-control">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
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
                        </div>
                        <div class="col-md-6">
                            <img src="{{ asset($data->favicon_image) }}" alt="">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
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
                        </div>
                        <div class="col-md-6">
                            <img src="{{ asset($data->logo_image) }}" alt="">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
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
                        </div>
                        <div class="col-md-6">
                            <img src="{{ asset($data->advertisement_image) }}" alt="">
                        </div>
                    </div>


                    <div class="text-xs-right">
                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">

                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
