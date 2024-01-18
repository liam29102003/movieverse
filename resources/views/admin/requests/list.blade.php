@extends('admin.layouts.app')

@section('content')
<section id="list" class="container">
    <div class="row">
        <div class="col-10 offset-1">
            <div class="card pb-0" style="background-color: rgba(0, 48, 96,0.8)">
                <div class="card-header" style="display: flex; justify-content:space-between">
                    <div class="card-title">

                        <button class="btn text-white btn-sm" style="background-color:#003060">
                          Total <span class="badge badge-light ms-1">{{$data->total()}}</span>
                      </button>
                    </div>
                    <div class="heading d-lg-block d-md-block d-sm-none d-none">
                        <h3 class="text-light text-decoration-underline">Request-List</h3>
                    </div>
                    <form action="{{route('contact#search')}}" method="get">
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
                                    <thead >
                                        <tr>
                                            <th scope="col" >Id</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Type</th>
                                            <th scope="col">Title</th>

                                            <th scope="col">Message</th>
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
                                            <td>{{$item->contact_id}}</td>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->email}}</td>
                                            <td>{{$item->type}}</td>
                                            <td>{{$item->title}}</td>
                                            <td>{{$item->message}}</td>
                                            <td><a href="{{route('delete#contact',$item['contact_id'])}}"><button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button></a></td></td>
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

{{-- <script>
    var sites = {!! json_encode($data->toArray()) !!};
    const myJSON = JSON.stringify(sites);
    document.write(myJSON);
</script> --}}

