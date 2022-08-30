@extends('admin.admin_master')
@section('content')

<div class="container-full">
    <div class="content">
        <div class="row">


            <div class="col-12">

                <div class="box">
                    <div class="box-header with-border ">
                        <h3 class="box-title">Footer Settings List</h3>
                        <div class="box-tools">
                            <div class="input-group input-group-sm hidden-xs" >
                                <div class=" text-right">
                                    <a href="{{ route('footer.settings.create') }}" class="btn btn-success btn-flat"> ADD NEW </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Facebook Url</th>
                                        <th>Twitter Url</th>
                                        <th>Location</th>
                                        <th>Location Phone</th>
                                        <th>Location Email</th>

                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($items as $item)
                                    <tr>
                                        <td>{{$item->fb_url}}</td>
                                        <td>{{$item->twitter_url}}</td>
                                        <td>{{$item->lctn_add}}</td>
                                        <td>{{$item->lctn_phone}}</td>
                                        <td>{{$item->lctn_email}}</td>


                                        <td width="20%">
                                            {{-- Edit and Delete Option Start--}}
                                            <a class="btn btn-primary" href="{{ url('edit',$item->id) }}" title="Edit Data"><i style="width:15px" class="fa fa-pencil"></i></a>
                                            <a class="btn btn-danger" id="delete" href="{{ url('delete',$item->id) }}" title="Delete Data"><i class="fa fa-trash"></i></a>
                                            {{-- Edit and Delete Option End--}}


                                        </td>

                                   @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>

                </div>
            </div>


        </div>
    </div>
</div>

@endsection

