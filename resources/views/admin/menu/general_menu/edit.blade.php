@extends('admin.admin_master')
@section('content')
<div class="container-full">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                            <h3 class="box-title">Edit General Menu</h3>
                    </div>
                        <div class="card-body">
                            <form action="{{ url('general/menu/update/'.$items->id)}}" method="post">
                                @csrf

                                <div class="form-group">
                                    <h5>Name<span class="text-danger">*</span>
                                    </h5>
                                    <div class="controls">
                                        <input type="text" name="name" value="{{ $items->name }}" class="form-control">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Key<span class="text-danger">*</span>
                                    </h5>
                                    <div class="controls">
                                        <input type="text" name="key" value="{{ $items->key }}" class="form-control">
                                        @error('key')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Position<span class="text-danger">*</span>
                                    </h5>
                                    <div class="controls">
                                        <input type="text" name="position" value="{{ $items->position }}" class="form-control">
                                        @error('position')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
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
        </div>
    </div>
</div>
@endsection
