@extends('admin.layouts.app')
@section('content')
<section id="list" class="container">
    <div class="row">
        <div class="col-10 offset-1">
            <div class="card" style="background-color: rgba(0, 48, 96,0.8)">
                <div class="card-header" style="display: flex; justify-content:space-between">
                    <div class="card-title">
                        <a href="{{route('user#list')}}"><button class="btn btn-sm text-white" style="background-color:#003060">Userlist</button></a>
                        <a href="{{route('admin#list')}}"><button class="btn btn-sm text-white" style="background-color:#003060">Adminlist</button></a>
                        <button class="btn text-white btn-sm" style="background-color:#003060">
                            Total <span class="badge badge-light">{{$data->total()}}</span>
                        </button>
                    </div>
                    <div class="heading d-lg-block d-md-block d-sm-none d-none">
                        <h3 class="text-white text-decoration-underline">Admin-List</h3>
                    </div>
                    <form action="{{route('admin#search')}}" method="get">
                        @csrf
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search" value="{{old('table_search')}}">

                            <div class="input-group-append">
                              <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                              </button>
                            </div>
                          </div></form>

                </div>
                <div class="card-body">
                    <div class="table-responsive">


                        <table class="table mt-3 table-hover rounded-3 " align="center" style="background-color:rgba(255,255,255,0.9)">
                            <thead>
                                        <tr>
                                            <th scope="col" >No</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Join at</th>
                                            <th scope="col"></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $num = 0;
                                            ?>

                                        @foreach ($data as $item)

                                        <tr>
                                            <th scope="row">{{++$num}}</th>
                                            <td>{{$item['name']}}</td>
                                            <td>{{$item['email']}}</td>
                                            <td>{{$item['created_at']}}</td>

                                                <td><a href="{{route('adminUser#delete',$item['id'])}}"><button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button></a></td>
                                        </tr>

                                        @endforeach

                                        <tr class="pb-0">
                                            <td class="pb-0" colspan="4">
                                                {{$data->links()}}

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>


                    </div>

                    {{-- {{$a->links()}} --}}
                </div>

            </div>

        </div>
    </div>



</section>

@endsection

