@extends('admin.admin_master')
@section('content')

<div class="container-full">
    <div class="content">
        <div class="row">


            <div class="col-12">

                <div class="box">
                    <div class="box-header with-border ">
                        <h3 class="box-title">Article List</h3>
                        <div class="box-tools">
                            <div class="input-group input-group-sm hidden-xs" >
                                <div class=" text-right">
                                    <a href="{{ route('articles.create') }}" class="btn btn-success btn-flat"> ADD NEW </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="table-responsive no-padding overflow-visible">
                        <div class="box-body ">
                            <table id="example1" class="table table-hover text-center">
                                <thead>
                                    <tr>
                                        <th>Category Name</th>


                                        <th>Title</th>
                                        <th>Date</th>
                                        <th>Image</th>
                                        <th>Status</th>

                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($articles as $item)
                                    <tr>
                                        <td>{{$item['category']['name']}}</td>


                                        <td>{{$item->title}}</td>
                                        <td>{{$item->date}}</td>
                                        <td><img src="{{ asset($item->image) }}" style="width: 40px;height:35px"></td>
                                        <td>
                                            @if($item->status ==1)
                                                <span class="badge badge-pill badge-success">Approved</span>
                                            @elseif ($item->status ==2)
                                                <span class="badge badge-pill badge-danger">Reject</span>
                                            @else
                                                <span class="badge badge-pill badge-warning ">Pending</span>
                                            @endif
                                        </td>

                                        <td width="20%">
                                            {{-- Edit and Delete Option Start--}}
                                            <a class="btn btn-primary" href="{{ url('articles/edit',$item->id) }}" title="Edit Data"><i style="width:15px" class="fa fa-pencil"></i></a>
                                            <a class="btn btn-danger" id="delete" href="{{ url('articles/delete',$item->id) }}" title="Delete Data"><i class="fa fa-trash"></i></a>
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
