@extends('admin.admin_master')
@section('content')
<main>
    <div class="container-full">
        <div class="content">
            <div class="row">
                <div class="col-md-9">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">{{ $items->title }}</h3>
                        </div>
                        <div class="card-body">
                            <img src="{{ asset($items->image) }}" alt="">
                            <div class="items d-flex mt-2 ">
                                <div class="col-md-6">
                                    <span>Author: {{ $items->name }}</span><br>
                                    <span>Location: {{ $items->location }}</span>
                                </div>
                                <div class="col-md-6">
                                    <span>Time: {{ $items->created_at->diffForHumans() }}</span>
                                </div>

                            </div>
                            <div class="col-md-12">
                                <h5>{!! $items->long_description !!}</h5>
                                <div class="row d-flex justify-content-between">
                                    <div class="col-md-6">
                                        <a href="{{ url('article/reject',$items->id) }}" class="btn btn-danger">Reject</a>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ url('article/active',$items->id) }}" class="btn btn-primary" style="margin-left:250px">Approved</a>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>

@endsection

