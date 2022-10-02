@extends('admin.layouts.app')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-6 offset-3">
            <a href="{{route('tvshows#list')}}" class=""><button class="btn btn-dark btn-sm text-white" style="background-color:#003060"><i class="fa-solid fa-arrow-left"></i></button></a>
            <a href="{{route('episodes#add')}}"><button class="btn btn-sm text-white" style="background-color:#003060"><i class="fa-solid fa-plus"></i></button></a>

            <div class="card bg-dark text-light mt-3">
                <div class="card-header text-light" style="background-color:#003060"><h3 style="text-align:center; ">Edit Tv shows</h3></div>
                <div class="card-body bg-white">
                    <div class="mb-2 text-center">
                        <img src="{{asset('/uploads/'.$data->poster)}}" alt="" style="width: 30%; height: 30%" class="border rounded-1 ">
                    </div>
                    <form action="{{route('tvshows#update',$data->tvshows_id)}}" method="POST" enctype="multipart/form-data">
                        @csrf



                          <div class="form-floating">
                            <input name="name" type="text" class="form-control"  value="{{$data->tvshows_name}}" id="name" placeholder="category" required>
                            <label for="floatingInput" class="text-dark">Movies Name</label>
                            <div style="text-align: left;padding-left:5px;font-size: 15px;"id="namePass"></div>

                          </div>
                          <select name="Category" id="" class="form-select ">
                          <option value="{{$data->category_id}}">{{$data->category_name}}</option>
                          @foreach ($category as $item )
                          @if ($data->category_name!=$item->category_name)
                          <option value="{{$item->category_id}}">{{$item->category_name}}</option>
                          @endif
                          @endforeach
                      </select>

                          <div class="input-group mb-3">
                            <label class="input-group-text text-white" for="inputGroupFile01" style="background-color: #003060">Poster</label>
                            <input type="file" class="form-control" id="poster" value="{{$data->poster}}" name="poster" >
                          </div>
                          <div class="input-group mb-3">
                            <label class="input-group-text text-white" for="inputGroupFile01" style="background-color: #003060">Background</label>
                            <input type="file" class="form-control" id="background" value="{{$data->background}}" name="background" >
                          </div>
                          {{-- <div class="input-group mb-3">
                            <span class="input-group-text text-white" style="background-color: #003060">Genre</span>
                            <input type="text" class="form-control" name='genre' id= 'genre' value="{{$data->genre}}">
                          </div> --}}
                          <select name="complete" id="complete" class="form-select mb-3">
                            <option value="1">Complete</option>
                            <option value="0">Ongoing</option>

                        </select>
                        @if ($limit == "yes")
                        <select name="trending" id="complete" class="form-select mb-3">

                            <option value="1">Normal</option>

                        </select>
                        @else
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
                        @endif

                          <div class="input-group ">
                            <span class="input-group-text text-white" style="background-color: #003060">IMDB</span>
                            <input type="text" class="form-control" name='rating' id= 'rating' value="{{$data->rating}}" required>
                          </div>
                          <div style="text-align: left;padding-left:5px;font-size: 15px;" class = "mb-3" id="ratingPass"></div>

                          <div class="input-group ">
                            <span class="input-group-text text-white" style="background-color: #003060">Cast</span>
                            <input type="" class="form-control" name='cast' id= 'cast'  value="{{$data->cast}}" required>
                          </div>
                          <div style="text-align: left;padding-left:5px;font-size: 15px;"id="castPass" class="mb-3"></div>

                          <div class="input-group">
                            <span class="input-group-text text-white" style="background-color: #003060">Director</span>
                            <input type="" class="form-control" name='director' id= 'director'  value="{{$data->director}}" required>
                          </div>
                          <div style="text-align: left;padding-left:5px;font-size: 15px;"id="directorPass" class="mb-3"></div>

                          <div class="input-group">
                            <span class="input-group-text text-white" style="background-color: #003060">Award</span>
                            <input type="" class="form-control" name='award' id= 'award' value="{{$data->award}}" required>
                          </div>
                          <div style="text-align: left;padding-left:5px;font-size: 15px;"id="awardPass" class="mb-3"></div>



                          <div class="input-group">
                            <span class="input-group-text text-white"style="background-color: #003060" >Release-date</span>
                            <input type="date" class="form-control" name="releaseDate" id = 'date' value="{{$data->release_date}}" required>

                          </div>
                          <div style="text-align: left;padding-left:5px;font-size: 15px;"id="datePass" class="mb-3"></div>



                          <div class="input-group">
                            <span class="input-group-text text-white" style="background-color: #003060">Trailer Link</span>
                            <input type="url" class="form-control" name='trailer' id='trailer' value="{{$data->trailer}}" required>
                          </div>
                          <div style="text-align: left;padding-left:5px;font-size: 15px;"id="trailerPass" class="mb-3"></div>

                          <div class="input-group">
                            <span class="input-group-text text-white" style="background-color: #003060">Language</span>
                            <input type="text" class="form-control" name='language' id=language value="{{$data->language}}"  required>
                          </div>
                          <div style="text-align: left;padding-left:5px;font-size: 15px;"id="languagePass" class="mb-3"></div>

                          <textarea name="review" id="review" cols="30" rows="10" class="form-control mb-3" placeholder="Enter review">
                            {{$data->review}}
                          </textarea>

                          <button type="submit" class="btn btn-success" id='button' style="float: right"  onclick='nameCheck(); ratingCheck(); languageCheck();  posterCheck(); backgroundCheck(); castCheck(); directorCheck(); awardCheck(); dateCheck(); trailerCheck(); reviewCheck()'><i class="fa-solid fa-check"></i></button>
                          <button type="reset" class="btn btn-danger" style="float: left"><i class="fa-solid fa-xmark"></i></button>

                    </form>
                </div>


            </div>
        </div>
    </div>
</div>
<script>
    let name = document.getElementById('name');
    let namePass = document.getElementById('namePass');

    let Category = document.getElementById('Category');
    let cPass = document.getElementById('cPass');

    let director = document.getElementById('director');
    let directorPass = document.getElementById('directorPass');

    let poster = document.getElementById('poster');
    let background = document.getElementById('background');


    let genre =document.getElementById('genre');
    let genrePass =document.getElementById('genrePass');

    let rating = document.getElementById('rating');
    let ratingPass =document.getElementById('ratingPass');

    let cast = document.getElementById('cast');
    let castPass =document.getElementById('castPass');

    let award = document.getElementById('award');
    // let directorPass = document.getElementById('directorPass');
    let awardPass = document.getElementById('awardPass');

    let releaseDate = document.getElementById('date');

    let episodes = document.getElementById('episodes');
    let episodesPass = document.getElementById('episodesPass');
    let date = document.getElementById('date');
    let datePass = document.getElementById('datePass');

    let trailer = document.getElementById('trailer');
    let trailerPass = document.getElementById('trailerPass');

    let seasons = document.getElementById('seasons');
    let language = document.getElementById('language');
    let languagePass = document.getElementById('languagePass');

    let review = document.getElementById('review');
    let reviewPass = document.getElementById('languagePass');

    var test2=/^[0-9]{1}(\.[0-9]{1})?$/g;               //rating(decimal value x.y)
    var test3=/^[a-z A-z]+$/g;                          //only words(genre,cast,award,language)
    var test4=/^([0-9]{2,3})mins$/gi;                   //runtime
    var test5=/^([0-9]{3,4}p)$/gi;                       //quality
    var test6=/(^[a-zA-Z][a-zA-Z\s]{1,}}[a-zA-Z]$)/;     //director(name)

    var form = document.getElementById('form');
    var error = document.getElementById('error');
    var messages=[];
    name.addEventListener("input",nameCheck);
    function nameCheck() {

    var test= /^[A-Za-z0-9 \s]+$/ig;                           //movie_name words+digit

        if(test.test(name.value)!=true || name.value==""){
            namePass.innerHTML="Please Enter Name";
            namePass.style.color="red";
        }

        else{
            namePass.innerHTML="Nice Show";
            namePass.style.color="green";
        }
    }

    function dateCheck() {


if(date.value == null || date.value == ""){
    datePass.innerHTML="Please Choose Date";
    datePass.style.color="red";
}
else{
    datePass.innerHTML = "";
}


}
    function castCheck() {


if(cast.value === '' ){
    castPass.innerHTML="Please Enter Cast Name";
    castPass.style.color="red";
}
else{
    castPass.innerHTML = "";
}


}
function directorCheck() {


if(director.value === '' ){
    directorPass.innerHTML="Please Enter director Name";
    directorPass.style.color="red";
}
else{
    directorPass.innerHTML = "";
}


}
function awardCheck() {


if(award.value === '' ){
    awardPass.innerHTML="Please Enter Award Name or 'None'";
    awardPass.style.color="red";
}
else{
    awardPass.innerHTML = "";
}


}
function ratingCheck() {


if(rating.value === '' ){
    ratingPass.innerHTML="Please Enter rating";
    ratingPass.style.color="red";
}
else{
    ratingPass.innerHTML = "";
}


}
function trailerCheck() {


if(trailer.value === '' ){
    trailerPass.innerHTML="Please Enter trailer link";
    trailerPass.style.color="red";
}
else{
    trailerPass.innerHTML = "";
}


}
function languageCheck() {


if(language.value === '' ){
    languagePass.innerHTML="Please Enter Language";
    languagePass.style.color="red";
}
else{
    languagePass.innerHTML = "";
}


}
function reviewCheck() {


if(review.innerHTML == 'Enter review Here' ){
    reviewPass.innerHTML="Please Enter Review";
    reviewPass.style.color="red";
}
else{
    reviewPass.innerHTML = "";
}


}
    function posterCheck() {
// console.log(poster.value)

if(poster.value === '' ){
    document.getElementById('poster').style.border = '1px solid red';

}
else{
    document.getElementById('poster').style.border = '1px solid black';
}


}
function backgroundCheck() {
// console.log(poster.value)

if(poster.value === '' ){
    document.getElementById('background').style.border = '1px solid red';

}
else{
    document.getElementById('background').style.border = '1px solid black';
}


}

rating.addEventListener('input',ratingCheck2);
    function ratingCheck2() {
        var test2=/^[0-9]{1}(\.[0-9]{1})?$/g;               //rating(decimal value x.y)
        if(rating.value=="")
        {
            ratingPass.innerHTML="";

        }
        else if(test2.test(rating.value)!=true ){
            ratingPass.innerHTML="<i class='fa-solid fa-check'></i>Rating must be 1 - 9.9";
            ratingPass.style.color="red";
document.getElementById('button').disabled = true;
        }
        else{
            ratingPass.innerHTML="<i class='fa-solid fa-check'></i>Correct";
            ratingPass.style.color="green";
            document.getElementById('button').disabled = false;

        }
    }

</script>


@endsection
