@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content ">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 offset-md-2 col-12">

                    <a href="{{route('tvshows#list')}}" >
                        <button class="mb-2 btn text-white mt-2" style="background-color: rgba(0, 48, 96,0.8)">
                        <i class="fa-solid fa-left-long"></i>
                    </button>
                    </a>
                <div class="card text-white" style="background-color: rgba(0, 48, 96,0.8)">
                    <div class="card-header text-center h2  text-secondary ">Movies details</div>
                    <div class="card-body ">
                        <div class="text-center d-block d-md-none">
                            <img src="{{asset('uploads/'.$data->poster)}}" alt=""
                        style="width: 80%; height: 100%; "
                        class="border border-3 border-secondary">
                        </div>

                        <div class="container mt-3">
                            <div class="row">
                                <div class="text-center col-4 d-none d-md-block">
                                    <img src="{{asset('uploads/'.$data->poster)}}" alt=""
                                style="width: 80%; height: 100%; "
                                class="border border-3 border-secondary">
                                </div>
                                <div class="col-8">
                                    <div>
                                        <span for="" class='fw-bold'>Name- </span><span for="" >{{$data->tvshows_name}}</span>
                                    </div>
                                    <div>
                                        <span for=""class='fw-bold'>Rating- </span><span for="" >{{$data->rating}}/10</span>
                                    </div>

                                    <div>
                                        <span for=""class='fw-bold'>Category- </span><span for="" >{{$data->category_id}}</span>
                                    </div>

                                    <div>
                                        <span for=""class='fw-bold'>Award- </span><span for="" >{{$data->award}}</span>
                                    </div>
                                    <div>
                                        <span for=""class='fw-bold'>Cast- </span><span for="" >{{$data->cast}}</span>
                                    </div>
                                    <div>
                                        <span for=""class='fw-bold'>Director- </span><span for="" >{{$data->director}}</span>
                                    </div>
                                    <div>
                                        <span for=""class='fw-bold'>ReleaseDate- </span><span for="" >{{$data->release_date}}</span>
                                    </div>

                                    <div>
                                        <span for=""class='fw-bold'>Language- </span><span for="" >{{$data->language}}</span>
                                    </div>
                                    <div class="w-md-50 w-sm-100 w-100">
                                        <span for=""class='fw-bold'>Review- </span><span for="" >{{$data->review}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
