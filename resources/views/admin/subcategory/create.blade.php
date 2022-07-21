@extends('admin.admin_master')
@section('content')

<div class="container-full">
    <div class="content">
        <div class="row">


            <div class="col-8">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">SubCategory List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Category Name</th>
                                        <th>SubCategory Name</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($subcategory as $item)
                                    <tr>
                                        <td>{{$item['category']['name']}}</td>
                                        <td>{{$item->subcategory_name}}</td>
                                        <td>
                                            @if ($item->status==1)
                                            <span class="badge badge-pill badge-success">Active</span>
                                            @else
                                            <span class="badge badge-pill badge-danger">InActive</span>
                                            @endif

                                        </td>
                                        <td>
                                            {{-- Edit and Delete Option Start--}}
                                            <a class="btn btn-primary" href="{{ route('subcategory.edit',$item->id) }}" title="Edit Data"><i class="fa fa-pencil"></i></a>
                                            <a class="btn btn-danger" id="delete" href="{{ route('subcategory.delete',$item->id) }}" title="Delete Data"><i class="fa fa-trash"></i></a>
                                            {{-- Edit and Delete Option End--}}

                                            {{-- Active and inactive Option  Start--}}
                                            @if($item->status ==1)
                                            <a class="btn btn-primary" href="{{ route('subcategory.inactive',$item->id) }}" title="InActive Now"><i class="fa fa-arrow-down"></i></a>
                                            @else
                                            <a class="btn btn-primary" href="{{ route('subcategory.active',$item->id) }}" title="Active Now"><i class="fa fa-arrow-up"></i></a>
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
                            <h3 class="box-title">Add SubCategory</h3>
                    </div>
                        <div class="card-body">
                            <form action="{{ route('subcategory.store') }}" method="post">
                                @csrf
                                <div class="form-group">
								<h5>Category Select <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="category_id" class="form-control">
										<option value="" selected="" disabled="">Select Category</option>
                                        @foreach($categories as $category)
										<option value="{{ $category->id }}">{{$category->name}}</option>
										@endforeach
									</select>
                                    @error('category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

							</div><br>
                                <div class="form-group">
                                        <h5>SubCategory Name<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="subcategory_name" class="form-control" >
                                        @error('subcategory_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
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
