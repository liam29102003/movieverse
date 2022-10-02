@extends('admin.layouts.app')
@section('content')
<section id="list" class="container">
    <div class="row">
        <div class="col-10 offset-1">
            @if (Session::has('categorySuccess'))
            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                {{Session::get('categorySuccess')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>

            @endif
            @if (Session::has('deleteSuccess'))
            <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                {{Session::get('deleteSuccess')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>

            @endif
            @if (Session::has('editSuccess'))
            <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
                {{Session::get('editSuccess')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>

            @endif
            <div class="card pb-0" style="background-color: rgba(0, 48, 96,0.8)">
                <div class="card-header" style="display: flex; justify-content:space-between">
                    <div class="card-title">
                        <a href="{{route('category#add')}}"><button class="btn btn-sm btn-secondary" style="background-color:#003060"><i class="fa-solid fa-plus"></i></button></a>
                        <button class="btn  btn-sm text-light" style="background-color:#003060">
                          Total <span class="badge badge-light ms-1" >{{$data->total()}}</span>
                      </button>
                    </div>
                    <div class="heading d-lg-block d-md-block d-sm-none d-none">
                        <h3 class="text-light text-decoration-underline">Movie-Category-List</h3>

                    </div>
                    <form action="{{route('category#search')}}" method="GET">
                        @csrf
                        <div class="input-group ">
                            <input
                              type="search"
                              class="form-control rounded"
                              placeholder="Search"
                              name = "table_search"

                            />
                            <button type="submit" class="btn text-white" style="background-color:#003060">
                                <i class="fas fa-search"></i>
                            </button>
                          </div>
                    </form>
                </div>
                <div class="card-body">

                    <a href="{{route('tvshowCategory#list')}}"><button class="btn text-white btn-sm"style="background-color:#003060">
                        Tvshow
                    </button></a>
                    <div class="table-responsive">


                                <table class="table mt-3 table-hover rounded-3 bg-light" align="center" >
                                    <thead >
                                        <tr>
                                            <th scope="col" >No</th>
                                            <th scope="col">Category Name</th>
                                            <th scope="col">Movie Count</th>
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

                                        <tr>
                                            <th scope="row">{{$item['category_id']}}</th>
                                            <td>{{$item['category_name']}}</td>
                                            <td>
                                                @if ($item->count==0)
                                                    <a href="#" class="text-decoration-none text-primary">{{$item->count}}</a>
                                                @else
                                                    <a href="#" class="text-decoration-none text-primary">{{$item->count}}</a>
                                                @endif
                                            </td>
                                            <td><a href="{{route('category#edit',$item['category_id'])}}"><button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button></a>
                                                <a href="{{route('category#delete',$item['category_id'])}}"><button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button></a></td>
                                        </tr>
                                        @endforeach
                                        <tr class="pb-0">
                                            <td class="pb-0" colspan="4">
                                                {{$data->links()}}

                                            </td>
                                        </tr>
                                        @endif
                                    </tbody>

                                </table>


                    </div>


                </div>

            </div>

        </div>
    </div>



</section>

@endsection
