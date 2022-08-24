@extends('admin.admin_master')
@section('content')
<div class="container-full">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                            <h3 class="box-title">Add General Menu</h3>
                    </div>
                        <div class="card-body">
                            <form action="{{ route('general.menu.store')}}" method="post">
                                @csrf

                                <div class="form-group">
                                    <h5>Name<span class="text-danger">*</span>
                                    </h5>
                                    <div class="controls">
                                        <input type="text" name="name" class="form-control">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Key<span class="text-danger">*</span>
                                    </h5>
                                    <div class="controls">
                                        <input type="text" name="key" class="form-control">
                                        @error('key')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Position<span class="text-danger">*</span>
                                    </h5>
                                    <div class="controls">
                                        <input type="text" name="position" class="form-control">
                                        @error('position')
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
