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
            <div class="card" style="background-color: rgba(0, 48, 96,0.8)">
                <div class="card-header" style="display: flex; justify-content:space-between">
                    <div class="card-title">
                        <a href="{{route('tvshows#add')}}" ><button class="btn btn-sm text-white" style="background-color:#003060"><i class="fa-solid fa-plus"></i>TV Shows</button></a>
                        <a href="{{route('episodes#add')}}" ><button class="btn btn-sm text-white" style="background-color:#003060"><i class="fa-solid fa-plus"></i>Episodes</button></a>

                        <button class="btn btn-sm d-none d-md-inline-block text-white" style="background-color:#003060">
                          Total <span class="badge badge-light">{{$data->total()}}</span>
                      </button>
                    </div>
                    <div class="heading d-lg-block d-md-block d-sm-none d-none">
                        <h3 class="text-light text-decoration-underline">Tvshow-List</h3>
                    </div>

                    <form action="{{route('tvshows#search')}}" method="GET">
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
                    <div class="table-responsive">
                        <table class="table mt-3 table-hover rounded-3 " align="center" style="background-color:rgba(255,255,255,0.9)">
                            <thead>
                                <tr>
                                    <th style="text-align: left" scope="col" style='text-align: left'>Id<a  href="{{route('tvshowsid#sort1')}}" id='idsort1' class=' ms-2 me-0 text-dark'><i class="fa-solid fa-down-long"></i></a>
                                        <a  href="{{route('tvshowsid#sort')}}"  class='text-dark '><i class=" ms-0 fa-solid fa-up-long"></i></a>
                                    </th>
                                    <th style="text-align: left" scope="col" style='text-align: left'>Movies Name<a  href="{{route('tvshowsname#sort1')}}" class=' ms-2 me-0 text-dark'><i class="fa-solid fa-down-long"></i></a>
                                        <a  href="{{route('tvshowsname#sort')}}" class='text-dark '><i class=" ms-0 fa-solid fa-up-long"></i></a></th>
                                    <th style="text-align: left" scope="col" style='text-align: left'>Category</th>
                                    <th style="text-align: left" scope="col" style='text-align: left' class="d-none d-md-block">Poster</th>
                                    <th style="text-align: left" scope="col" style='text-align: left'>Imdb<a  href="{{route('tvshowsimdb#sort1')}}"  class=' ms-2 me-0 text-dark'><i class="fa-solid fa-down-long"></i></a>
                                        <a  href="{{route('tvshowsimdb#sort')}}" id='idsort2' class='text-dark '><i class=" ms-0 fa-solid fa-up-long"></i></a>
                                    </th>
                                    <th style="text-align: left" scope="col" style='text-align: left' class="d-none d-md-block">Episodes</th>
                                    <th style="text-align: left" scope="col"></th>
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
                                    <th style="text-align: left" scope="row">{{$item->tvshows_id}}</th>
                                    <td style="text-align: left">{{$item->tvshows_name}}</td>
                                    <td style='text-align: left'>@foreach ($category as $cat)
                                        @if($cat['tvshowCategory_id'] == $item['category_id'])
                                        {{$cat['tvshowCategory_name']}}
                                        @endif
                                        @endforeach
                                    </td>                                    <td style="text-align: left" class="d-none d-md-block"><img src="{{asset('uploads/'.$item->poster)}}"></td>
                                    <td  style="text-align: left"class="">{{$item->rating}}</td>
                                    <td style="text-align: left" class=>
                                        @if ($item->count==0)
                                <a href="#" class="text-decoration-none text-primary">{{$item->count}}</a>
                            @else
                                <a href="{{route('tvshows#episodes',$item->tvshows_id)}}" class="text-decoration-none text-primary">{{$item->count}}</a>
                            @endif
                                    </td>
                                    <td>
                                        <a href="{{route('tvshows#details',$item->tvshows_id)}}"><button class="btn btn-sm bg-primary text-white"><i class="fas fa-eye"></i></button></a>
                                        <a href="{{route('tvshows#edit',$item->tvshows_id)}}"><button class="btn btn-sm bg-secondary text-white"><i class="fas fa-edit"></i></button></a>
                                        <a href="{{route('tvshows#delete',$item->tvshows_id)}}"><button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button></a></td>
                                </tr>
                                @else
                                <tr>
                                    <th style="text-align: left" scope="row">{{$item->tvshows_id}}</th>
                                    <td style="text-align: left">{{$item->tvshows_name}}</td>
                                    <td style='text-align: left'>@foreach ($category as $cat)
                                        @if($cat['tvshowCategory_id'] == $item['category_id'])
                                        {{$cat['tvshowCategory_name']}}
                                        @endif
                                        @endforeach
                                    </td>                                    <td style="text-align: left" class="d-none d-md-block"><img src="{{asset('uploads/'.$item->poster)}}"></td>
                                    <td  style="text-align: left"class="">{{$item->rating}}</td>
                                    <td style="text-align: left" class=>
                                        @if ($item->count==0)
                                <a href="#" class="text-decoration-none text-primary">{{$item->count}}</a>
                            @else
                                <a href="{{route('tvshows#episodes',$item->tvshows_id)}}" class="text-decoration-none text-primary">{{$item->count}}</a>
                            @endif
                                    </td>
                                    <td>
                                        <a href="{{route('tvshows#details',$item->tvshows_id)}}"><button class="btn btn-sm bg-primary text-white"><i class="fas fa-eye"></i></button></a>
                                        <a href="{{route('tvshows#edit',$item->tvshows_id)}}"><button class="btn btn-sm bg-secondary text-white"><i class="fas fa-edit"></i></button></a>
                                        <a href="{{route('tvshows#delete',$item->tvshows_id)}}"><button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button></a></td>
                                </tr>
                                @endif

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

<script type="text/javascript">
     var namebtn = document.getElementById('nameSort');

     namebtn.addEventListener("click", myFunction);
     function myFunction()
     {
        namebtn.  = "";
     }
</script>

</section>
@endsection
