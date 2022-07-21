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
                            <form action="{{ route('authors.store') }}" method="post" enctype="multipart/form-data">
                                @csrf



                                <div class="form-group">
                                    <h5>Author Name <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="name" class="form-control" >
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Author Email <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="email" name="email" class="form-control" >
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Author Phone <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="phone" class="form-control" >
                                        @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Author Photo<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                    <input type="file" name="photo" required class="form-control" onChange="mainPhoto(this)" />
                                        @error('photo')
                                                <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <img src="" alt="" id="mainpho">
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
<script type="text/javascript">
    function mainPhoto(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#mainpho').attr('src',e.target.result).width(120).height(120);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }


</script>
@endsection

