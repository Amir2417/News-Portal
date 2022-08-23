@extends('admin.admin_master')
@section('content')

<div class="container-full">
    <div class="content">
        <div class="row">

            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                            <h3 class="box-title">Update Article</h3>
                    </div>
                        <div class="card-body">
                            <form action="{{ route('articles.update',$items->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Category Select <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="cat_id" class="form-control">
                                                    <option value="" selected="" disabled="">Select Category</option>
                                                    @foreach($categories as $category)
                                                    <option value="{{ $category->id }}"{{ $category->id==$items->cat_id?'selected':''}}>{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('cat_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror

                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group">

                                    <div class="controls">
                                        <input type="hidden" name="name" value="{{ Auth::user()->name }}"
                                        class="form-control">
                                        @error('location')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Location<span class="text-danger">*</span>
                                    </h5>
                                    <div class="controls">
                                        <input type="text" value="{{ $items->location }}" name="location" placeholder="Enter The Location"
                                        class="form-control">
                                        @error('location')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Date<span class="text-danger">*</span>
                                    </h5>
                                    <div class="controls">
                                        <input type="date" value="{{ $items->date }}" name="date" class="form-control">
                                        @error('date')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Tags<span class="text-danger">*</span>
                                    </h5>
                                    <div class="controls">
                                        <input type="text" value="{{ $items->tags }}" name="tags" placeholder="Enter the Tags"
                                         class="form-control">
                                        @error('tags')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Title<span class="text-danger">*</span>
                                    </h5>
                                    <div class="controls">
                                        <input type="text" value="{{ $items->title }}" name="title" placeholder="Please Write the Title"
                                         class="form-control">
                                        @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row"> <!--   start 8th row -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <fieldset>
                                                    <input type="checkbox" name="latest_news" id="checkbox_2"  value="1" {{ $items->latest_news == 1 ?'checked' : ''}}>
                                                    <label for="checkbox_2">Latest News</label>
                                                </fieldset>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <fieldset>
                                                    <input type="checkbox"  name="sports" id="checkbox_3" value="1" {{ $items->sports == 1 ?'checked' : ''}}>
                                                    <label for="checkbox_3">Sports</label>
                                                </fieldset>



                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <h5>Long Description<span class="text-danger">*</span>
                                    </h5>
                                    <div class="controls">
                                        <textarea class="form-control" id="editor1" name="long_description"  id="" cols="30" rows="10">{{ $items->long_description }}</textarea>
                                        @error('long_description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Photo<span class="text-danger">*</span>
                                            </h5>
                                            <div class="controls">
                                                <input type="file" name="image" accept="image/png, image/jpeg"
                                                 class="form-control">
                                                @error('image')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <h4>Previous Picture</h4>
                                        <img style="width: 150px; height:150px;" src="{{ asset($items->image) }}" alt="">
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
