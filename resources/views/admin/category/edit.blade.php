@extends('admin.admin_master')
@section('content')
<div class="container-full">
    <div class="content">
        <div class="row">




            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                            <h3 class="box-title">Edit Category</h3>
                    </div>
                        <div class="card-body">
                            <form action="{{ url('category/update',$items->id)}}" method="post">
                                @csrf

                                <div class="form-group">
                                    <h5>Category Name<span class="text-danger">*</span>
                                    </h5>
                                    <div class="controls">
                                        <input type="text" name="name" value="{{ $items->name }}" class="form-control">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Category">

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
