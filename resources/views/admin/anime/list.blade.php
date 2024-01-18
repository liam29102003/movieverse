@extends('admin.layouts.app')
@section('content')
<section id="list" class="container">
    <div class="row">
        <div class="col-10 offset-1">
            <div class="card" style="background-color: rgba(0, 48, 96,0.8)">
                <div class="card-header" style="display: flex; justify-content:space-between">
                    <div class="card-title">
                        <a href="{{route('anime#add')}}"><button class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="Add Anime"><i class="fa-solid fa-plus"></i></button></a>
                        <a href="{{route('episodes#add')}}"><button class="btn btn-sm text-white" style="background-color:#003060" data-bs-toggle="tooltip" data-bs-placement="top" title="Add Episodes"><i class="fa-solid fa-plus"></i></button></a>

                        <button class="btn btn-secondary btn-sm d-none d-md-inline-block">
                          Total <span class="badge badge-light">{{$data->total()}}</span>
                      </button>
                    </div>
                    <div class="heading d-lg-block d-md-block d-sm-none d-none">
                        <h3 class="text-secondary text-decoration-underline">Heelo-List</h3>
                    </div>

                    <form action="{{route('anime#search')}}" method="GET">
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
                    </form>



                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mt-3 table-hover rounded-3 " align="center" style="background-color:rgba(255,255,255,0.9)">
                            <thead>
                                <tr>
                                    <th style="text-align: left" scope="col" style='text-align: left'>Id<a  href="{{route('animeid#sort1')}}" id='idsort1' class=' ms-2 me-0 text-dark'><i class="fa-solid fa-down-long"></i></a>
                                        <a  href="{{route('animeid#sort')}}"  class='text-dark '><i class=" ms-0 fa-solid fa-up-long"></i></a>
                                    </th>
                                    <th style="text-align: left" scope="col" style='text-align: left'>Movies Name<a  href="{{route('animename#sort1')}}" class=' ms-2 me-0 text-dark'><i class="fa-solid fa-down-long"></i></a>
                                        <a  href="{{route('animename#sort')}}" class='text-dark '><i class=" ms-0 fa-solid fa-up-long"></i></a></th>
                                    <th style="text-align: left" scope="col" style='text-align: left'>Category</th>
                                    <th style="text-align: left" scope="col" style='text-align: left' class="d-none d-md-block">Poster</th>
                                    <th style="text-align: left" scope="col" style='text-align: left'>Imdb<a  href="{{route('animeimdb#sort1')}}"  class=' ms-2 me-0 text-dark'><i class="fa-solid fa-down-long"></i></a>
                                        <a  href="{{route('animeimdb#sort')}}" id='idsort2' class='text-dark '><i class=" ms-0 fa-solid fa-up-long"></i></a>
                                    </th>
                                    <th style="text-align: left" scope="col" style='text-align: left' class="d-none d-md-block">Quality</th>
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

                                @if($item->trending == 0)

                                <tr style="color: red">

                                    <th scope="row">{{$item->anime_id}}</th>
                                    <td>{{$item->anime_name}}</td>
                                    <td>@foreach ($category as $cat)
                                        @if($cat['animeCategory_id'] == $item['category_id'])
                                        {{$cat['AnimeCategory_name']}}
                                        @endif
                                        @endforeach</td>
                                    <td class="d-none d-md-block"><img src="{{asset('uploads/'.$item->poster)}}"></td>
                                    <td class="">{{$item->rating}}</td>
                                    <td class=>
                                        @if ($item->count==0)
                                        <a href="#" class="text-decoration-none text-primary">{{$item->count}}</a>
                                        @else
                                        <a href="{{route('anime#episodes',$item->anime_id)}}" class="text-decoration-none text-primary">{{$item->count}}</a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('anime#details',$item->anime_id)}}"><button class="btn btn-sm bg-primary text-white"><i class="fas fa-eye"></i></button></a>


                                        <a href="{{route('anime#edit',$item->anime_id)}}"><button class="btn btn-sm bg-secondary text-white"><i class="fas fa-edit"></i></button></a>
                                        <a href="{{route('anime#delete',$item->anime_id)}}"><button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button></a></td>
                                </tr>
                                @else
                                <tr style="color: black">
                                    <th scope="row">{{$item->anime_id}}</th>
                                    <td>{{$item->anime_name}}</td>
                                    <td>{{$item->category_id}}</td>
                                    <td class="d-none d-md-block"><img src="{{asset('uploads/'.$item->poster)}}"></td>
                                    <td class="">{{$item->rating}}</td>
                                    <td class=>
                                        @if ($item->count==0)
                                <a href="#" class="text-decoration-none text-primary">{{$item->count}}</a>
                            @else
                                <a href="{{route('anime#episodes',$item->anime_id)}}" class="text-decoration-none text-primary">{{$item->count}}</a>
                            @endif
                                    </td>
                                    <td>
                                        <a href="{{route('anime#details',$item->anime_id)}}"><button class="btn btn-sm bg-primary text-white"><i class="fas fa-eye"></i></button></a>


                                        <a href="{{route('anime#edit',$item->anime_id)}}"><button class="btn btn-sm bg-secondary text-white"><i class="fas fa-edit"></i></button></a>
                                        <a href="{{route('anime#delete',$item->anime_id)}}"><button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button></a></td>
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
