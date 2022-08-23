@extends('admin.admin_master')
@section('content')

<div class="container-full">
    <div class="content">
        <div class="row">

            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                            <h3 class="box-title">Update Footer Settings</h3>
                    </div>
                        <div class="card-body">
                            <form action="{{ route('footer.settings.update',$data->id) }}" method="post" >
                                @csrf

                                <div class="form-group">
                                    <h5>Facebook Url<span class="text-danger">*</span>
                                    </h5>
                                    <div class="controls">
                                        <input type="url" name="fb_url" placeholder="https://example.com"
                                        pattern="https://.*" value="{{ $data->fb_url }}" size="30" class="form-control">
                                        @error('fb_url')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Twitter Url<span class="text-danger">*</span>
                                    </h5>
                                    <div class="controls">
                                        <input type="url" name="twitter_url" placeholder="https://example.com"
                                        pattern="https://.*" value="{{ $data->twitter_url }}" size="30" class="form-control">
                                        @error('twitter_url')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Linkedin Url<span class="text-danger">*</span>
                                    </h5>
                                    <div class="controls">
                                        <input type="url" name="linkedin_url" placeholder="https://example.com"
                                        pattern="https://.*" value="{{ $data->linkedin_url }}" size="30" class="form-control">
                                        @error('linkedin_url')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Location Address<span class="text-danger">*</span>
                                    </h5>
                                    <div class="controls">
                                        <input type="text" name="lctn_add" value="{{ $data->lctn_add }}" placeholder="Please Write the Location"
                                         class="form-control">
                                        @error('lctn_add')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Location Phone<span class="text-danger">*</span>
                                    </h5>
                                    <div class="controls">
                                        <input type="text" name="lctn_phone" value="{{ $data->lctn_phone }}" placeholder="Please Write the Location Phone"
                                         class="form-control">
                                        @error('lctn_phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Location Email<span class="text-danger">*</span>
                                    </h5>
                                    <div class="controls">
                                        <input type="text" name="lctn_email" value="{{ $data->lctn_email }}" placeholder="Please Write the Location Email"
                                         class="form-control">
                                        @error('lctn_email')
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
