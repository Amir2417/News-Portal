@extends('admin.admin_master')
@section('content')
<div class="container-full">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                            <h3 class="box-title">Edit Footer Menu</h3>
                    </div>
                        <div class="card-body">
                            <form action="{{ url('footer_menu/update/'.$items->id)}}" method="post">
                                @csrf

                                <div class="form-group">
                                    <h5>Name <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="general_menu_id" class="form-control">
                                            <option value="" selected="" disabled="">Select General Menus</option>
                                            @foreach($generals as $general)
                                            <option value="{{ $general->id }}"{{ $general->id==$items->general_menu_id?'selected':''}}>{{$general->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('general_menu_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Title<span class="text-danger">*</span>
                                    </h5>
                                    <div class="controls">
                                        <input type="text" name="title" value="{{ $items->title }}" class="form-control">
                                        @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Link<span class="text-danger">*</span>
                                    </h5>
                                    <div class="controls">
                                        <input type="text" name="link" value="{{ $items->link }}" class="form-control">
                                        @error('link')
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
