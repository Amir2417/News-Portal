@extends('admin.admin_master')
@section('content')
<div class="container-full">
    <div class="content">
        <div class="row">
             <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                            <h3 class="box-title">Add Author</h3>
                    </div>
                        <div class="card-body">
                            <form action="{{ route('authors.update',$authors->id) }}" method="PATCH" enctype="multipart/form-data">
                                @csrf


                                <input type="hidden" value="{{ $authors->photo }}" name="old_image">


                                <div class="form-group">
                                    <h5>Author Name <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="name" value="{{ $authors->name }}" class="form-control" >
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Author Email <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="email" name="email" value="{{ $authors->email }}" class="form-control" >
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Author Phone <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="phone" value="{{ $authors->phone }}" class="form-control" >
                                        @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Author Photo<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                    <input type="file" name="photo" id="image" class="form-control" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <img id="showImage" src="{{ (!empty($authors->photo))? url($authors->photo):url('upload/no_image.jpg') }}" style="width:100px; height:100px;" alt="">
                                    </div>
                                </div>


                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New">

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
