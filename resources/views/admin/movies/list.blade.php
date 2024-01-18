@extends('admin.layouts.app')
@section('content')
<section id="list" class="container">
    <div class="row">
        <div class="col-12 offset-0">
            @if (Session::has('addPizzaSuccess'))
            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                {{Session::get('addPizzaSuccess')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
            @if (Session::has('deleteSuccess'))
            <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                {{Session::get('deleteSuccess')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
            @if (Session::has('success'))
            <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
                {{Session::get('success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
            <div class="card" style="background-color: rgba(0, 48, 96,0.8)">                <div class="card-header mb-0" style="display: flex; justify-content:space-between">
                    <div class="card-title">
                        <a href="{{route('movies#add')}}"><button class="btn btn-sm text-white" style="background-color:#003060"><i class="fa-solid fa-plus"></i></button></a>
                        <button class="btn  btn-sm text-white" style="background-color:#003060">
                          Total <span class="badge badge-light">{{$data->total()}}</span>
                      </button>
                    </div>
                    <div class="heading d-lg-block d-md-block d-sm-none d-none">
                        <h3 class="text-light text-decoration-underline">Movies-List</h3>
                    </div>
                    <form action="{{route('movies#search')}}" method="GET">
                        @csrf
                        <div class="input-group ">
                            <input
                              type="search"
                              class="form-control rounded"
                              placeholder="Search"
                              name = "table_search"

                            />
                            <button type="submit" class="btn text-light" style="background-color:#003060">
                                <i class="fas fa-search"></i>
                            </button>
                          </div>
                    </form>



                </div>
                <div class="card-body table-responsive">

                    <table class="table mt-3 table-hover rounded-3 " align="center" style="background-color:rgba(255,255,255,0.9)">
                        <thead>
                            <tr>
                                <th scope="col" style='text-align: left'>Id<a  href="{{route('movies#sortById1')}}" id='idsort1' class=' ms-2 me-0 text-dark'><i class="fa-solid fa-down-long"></i></a>
                                    <a  href="{{route('movies#sortById')}}" id='idsort2' class='text-dark '><i class=" ms-0 fa-solid fa-up-long"></i></a>
                                </th>
                                <th scope="col" style='text-align: left'>Movies Name<a  href="{{route('movies#sortByMovie1')}}" class=' ms-2 me-0 text-dark'><i class="fa-solid fa-down-long"></i></a>
                                    <a  href="{{route('movies#sortByMovie')}}" class='text-dark '><i class=" ms-0 fa-solid fa-up-long"></i></a></th>
                                <th scope="col" style='text-align: left'>Category</th>
                                <th scope="col" style='text-align: left' class="d-none d-md-block">Poster</th>
                                <th scope="col" style='text-align: left'>Imdb<a  href="{{route('movies#sortByRating1')}}"  class=' ms-2 me-0 text-dark'><i class="fa-solid fa-down-long"></i></a>
                                    <a  href="{{route('movies#sortByRating')}}" id='idsort2' class='text-dark '><i class=" ms-0 fa-solid fa-up-long"></i></a>
                                </th>
                                <th scope="col" style='text-align: left' class="d-none d-md-block">Quality</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($status==0)
                            <tr>
                                <td colspan=7 class="text-muted">
                                    <small class="text-muted"> There is no data</small>
                                </td>
                            </tr>
                            @else
                            @foreach ($data as $item)
                            @if($item->trending==0)
                            <tr style="color: red">
                                <th scope="row" style='text-align: left'>{{$item->movies_id}}</th>
                                <td style='text-align: left'>{{$item->movies_name}}</td>
                                <td style='text-align: left'>@foreach ($category as $cat)


                                    @if($cat['category_id'] == $item['category_id'])
                                    {{$cat['category_name']}}
                                    @endif
                                    @endforeach
                                </td>
                                <td class="d-none d-md-block"><img src="{{asset('uploads/'.$item->poster)}}" style='text-align: left'></td>
                                <td class="" style='text-align: left'>{{$item->rating}}</td>
                                <td class style='text-align: left'>{{$item->quality}}</td>
                                <td>
                                    <a href="{{route('movies#details',$item->movies_id)}}"><button class="btn btn-sm bg-primary text-white"><i class="fas fa-eye"></i></button></a>

                                    <a href="{{route('movies#edit',$item->movies_id)}}"><button class="btn btn-sm bg-secondary text-white"><i class="fas fa-edit"></i></button></a>
                                    <a href="{{route('movies#delete',$item->movies_id)}}"><button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button></a></td>
                            </tr>
                            @else
                            <tr>
                                <th scope="row" style='text-align: left'>{{$item->movies_id}}</th>
                                <td style='text-align: left'>{{$item->movies_name}}</td>
                                <td style='text-align: left'>@foreach ($category as $cat)


                                    @if($cat['category_id'] == $item['category_id'])
                                    {{$cat['category_name']}}
                                    @endif
                                    @endforeach
                                </td>
                                <td class="d-none d-md-block"><img src="{{asset('uploads/'.$item->poster)}}" style='text-align: left'></td>
                                <td class="" style='text-align: left'>{{$item->rating}}</td>
                                <td class style='text-align: left'>{{$item->quality}}</td>
                                <td>
                                    <a href="{{route('movies#details',$item->movies_id)}}"><button class="btn btn-sm bg-primary text-white"><i class="fas fa-eye"></i></button></a>

                                    <a href="{{route('movies#edit',$item->movies_id)}}"><button class="btn btn-sm bg-secondary text-white"><i class="fas fa-edit"></i></button></a>
                                    <a href="{{route('movies#delete',$item->movies_id)}}"><button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button></a></td>
                            </tr>
                            @endif
                            @endforeach
                            @endif
                            <tr class="pb-0">
                                <td class="pb-0" colspan="4">
                                    {{$data->links()}}

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>
    <script>

    </script>


</section>
@endsection
