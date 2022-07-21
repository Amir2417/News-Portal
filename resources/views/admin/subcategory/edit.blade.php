@extends('admin.admin_master')
@section('content')

<div class="container-full">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                            <h3 class="box-title">Edit SubCategory</h3>
                    </div>
                        <div class="card-body">
                            <form action="{{ route('subcategory.update',$subcategory->id) }}" method="post">
                                @csrf
                                
                                <div class="form-group">
								    <h5>Category Select <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="category_id" class="form-control">
                                            <option value="" selected="" disabled="">Select Category</option>
                                            @foreach($categories as $category)
                                            <option value="{{ $category->id }} "{{ $category->id==$subcategory->category_id?'selected':''}} >{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                                <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
							    </div>
                                <div class="form-group">
                                        <h5>SubCategory Name<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="subcategory_name" class="form-control" value="{{ $subcategory->subcategory_name}}" >
                                        @error('subcategory_name')
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
