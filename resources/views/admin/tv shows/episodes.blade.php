@extends('admin.layouts.app')
@section('content')
<section id="list" class="container">
    <div class="row">
        <div class="col-6 offset-3">
            <a href="{{route('tvshows#list')}}" class="mb-3"><button class="btn btn-dark btn-sm text-white" style="background-color: #003060"><i class="fa-solid fa-arrow-left"></i></button></a>

            <div class="card mt-3" style="background-color: rgba(0, 48, 96,0.8)">                <div class="card-header mb-0" style="display: flex; justify-content:center">
                    <div class="card-title text-center">
                        {{-- <a href=""><button class="btn btn-sm btn-secondary"><i class="fa-solid fa-plus"></i></button></a>
                        <button class="btn btn-secondary btn-sm">
                          Total <span class="badge badge-light"></span>
                      </button> --}}

                    <div class="heading d-lg-block d-md-block d-sm-none d-none">
                        <h3 class="text-secondary text-decoration-underline">{{$names->tvshows_name}}</h3>
                    </div>
                </div>
                    {{-- <form action="" method="GET">
                        @csrf
                        <div class="input-group ">
                            <input
                              type="search"
                              class="form-control rounded"
                              placeholder="Search"
                              name = "table_search"

                            />
                            <button type="submit" class="btn btn-secondary">
                                <i class="fas fa-search"></i>
                            </button>
                          </div>
                    </form> --}}

<?php $i = 0 ?>

                </div>
                <div class="card-body table-responsive">

                    <div class="accordion" id="accordionExample">
                        @foreach($data as $item)
                        <div class="accordion-item">
                          <h2 class="accordion-header " id="heading{{$item->episodes_id}}">
                            <button class="accordion-button collapsed text-center bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$item->episodes_id}}" aria-expanded="true" aria-controls="collapse{{$item->episodes_id}}">
                              Episodes {{++$i}} : {{$item->episodes_name}}
                            </button>
                          </h2>
                          <div id="collapse{{$item->episodes_id}}" class="accordion-collapse collapse " aria-labelledby="heading{{$item->episodes_id}}" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>RunTime : {{$item->runtime}}</p>
                                <p>Rating : {{$item->rating}}/10</p>
                              {{$item->review}}
                            </div>
                          </div>
                        </div>

                        @endforeach
                      </div>
                </div>

            </div>

        </div>
    </div>



</section>
@endsection
