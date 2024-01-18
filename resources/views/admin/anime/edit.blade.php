@extends('admin.layouts.app')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-6 offset-3">
            <a href="{{route('anime#list')}}" class=""><button class="btn btn-dark btn-sm text-white" style="background-color:#003060"><i class="fa-solid fa-arrow-left"></i></button></a>
            <a href="{{route('episodes#add')}}"><button class="btn btn-sm text-white" style="background-color:#003060"><i class="fa-solid fa-plus"></i></button></a>

            <div class="card bg-dark text-light mt-3">
                <div class="card-header text-light" style="background-color:#003060"><h3 style="text-align:center; ">Edit Anime</h3></div>
                <div class="card-body bg-white">
                    <div class="mb-2 text-center">
                        <img src="{{asset('/uploads/'.$data->poster)}}" alt="" style="width: 30%; height: 30%" class="border rounded-1 ">
                    </div>
                    <form action="{{route('anime#update',$data->anime_id)}}" method="POST" enctype="multipart/form-data">
                        @csrf



                          <div class="form-floating mb-3">
                            <input name="name" type="text" class="form-control"  value="{{$data->anime_name}}" id="name" placeholder="category">
                            <label for="floatingInput" class="text-dark">Anime Name</label>
                          </div>
                          <select name="Category" id="" class="form-select mb-3">
                          <option value="{{$data->animeCategory_id}}">{{$data->AnimeCategory_name}}</option>
                          @foreach ($category as $item )
                          @if ($data->AnimeCategory_name!=$item->AnimeCategory_name)
                          <option value="{{$item->animeCategory_id}}">{{$item->AnimeCategory_name}}</option>
                          @endif
                          @endforeach
                      </select>
                          <div class="input-group mb-3">
                            <label class="input-group-text text-white" for="inputGroupFile01" style="background-color: #003060">Poster</label>
                            <input type="file" class="form-control" id="poster" value="{{$data->poster}}" name="poster">
                          </div>
                          <div class="input-group mb-3">
                            <label class="input-group-text text-white" for="inputGroupFile01" style="background-color: #003060">Background</label>
                            <input type="file" class="form-control" id="background" value="{{$data->background}}" name="background">
                          </div>
                          {{-- <div class="input-group mb-3">
                            <span class="input-group-text text-white" style="background-color: #003060">Genre</span>
                            <input type="text" class="form-control" name='genre' id= 'genre' value="{{$data->genre}}">
                          </div> --}}
                          <select name="complete" id="complete" class="form-select mb-3">
                            <option value="1">Complete</option>
                            <option value="0">Ongoing</option>

                        </select>
                        <select name="trending" id="complete" class="form-select mb-3">
                            @if($data->trending == "0")
                            <option value="0">Trending</option>
                            <option value="1">Normal</option>
                            @endif

                            @if($data->trending == '1')
                            <option value="1">Normal</option>
                            <option value="0">Trending</option>
                            @endif

                        </select>

                          <div class="input-group mb-3">
                            <span class="input-group-text text-white" style="background-color: #003060">IMDB</span>
                            <input type="text" class="form-control" name='rating' id= 'rating' value="{{$data->rating}}">
                          </div>

                          <div class="input-group mb-3">
                            <span class="input-group-text text-white" style="background-color: #003060">Cast</span>
                            <input type="" class="form-control" name='cast' id= 'cast'  value="{{$data->cast}}">
                          </div>
                          <div class="input-group mb-3">
                            <span class="input-group-text text-white" style="background-color: #003060">Director</span>
                            <input type="" class="form-control" name='director' id= 'director'  value="{{$data->director}}">
                          </div>
                          <div class="input-group mb-3">
                            <span class="input-group-text text-white" style="background-color: #003060">Award</span>
                            <input type="" class="form-control" name='award' id= 'award' value="{{$data->award}}">
                          </div>

                          <div class="input-group mb-3">
                            <span class="input-group-text text-white"style="background-color: #003060" >Release-date</span>
                            <input type="date" class="form-control" name="releaseDate" id = 'date' value="{{$data->release_date}}">

                          </div>


                          <div class="input-group mb-3">
                            <span class="input-group-text text-white" style="background-color: #003060">Trailer Link</span>
                            <input type="url" class="form-control" name='trailer' id='trailer' value="{{$data->trailer}}">
                          </div>
                          <div class="input-group mb-3">
                            <span class="input-group-text text-white" style="background-color: #003060">Language</span>
                            <input type="text" class="form-control" name='language' id=language value="{{$data->language}}"">
                          </div>
                          <textarea name="review" id="review" cols="30" rows="10" class="form-control mb-3" placeholder="Enter review">
                            {{$data->review}}
                          </textarea>

                          <button type="submit" class="btn btn-success" style="float: right"><i class="fa-solid fa-check"></i></button>
                          <button type="reset" class="btn btn-danger" style="float: left"><i class="fa-solid fa-xmark"></i></button>

                    </form>
                </div>


            </div>
        </div>
    </div>
</div>



@endsection
