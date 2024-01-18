@extends('admin.layouts.app')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-6 offset-3">
            <a href="{{route('movies#list')}}" class="text-white" ><button class="btn btn-dark btn-sm text-white" style="background-color:#003060"><i class="fa-solid fa-arrow-left" ></i></button></a>
            <div class="card bg-dark text-light mt-3">
                <div class="card-header text-light" style="background-color:#003060"><h3 style="text-align:center; ">Edit Category</h3></div>
                <div class="card-body bg-white">
                    <div class="mb-2 text-center">
                        <img src="{{asset('/uploads/'.$data->poster)}}" alt="" style="width: 30%; height: 30%" class="border rounded-1 ">
                    </div>
                    <form action="{{route('movies#update',$data->movies_id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-floating mb-3">
                            <input name="name" value='{{$data->movies_name}}' type="text" class="form-control" id="name" placeholder="category" required>
                            <label for="floatingInput" class="text-dark">Movies Name</label>
                            <div style="text-align: left;padding-left:5px;font-size: 15px;" id="namePass"></div>
                        </div>
                        <select name="Category" id="" class="form-select mb-3">
                            <option value="{{$data->category_id}}">{{$data->category_name}}</option>
                            @foreach ($category as $item )
                            @if ($data->category_name!=$item->category_name)
                            <option value="{{$item->category_id}}">{{$item->category_name}}</option>
                            @endif
                            @endforeach
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

                        <div class="input-group mb-3">
                            <label class="input-group-text text-white" for="inputGroupFile01" style="background-color: #003060">Poster</label>
                            <input   type="file" class="form-control" id="poster" name="poster">
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text text-white" for="inputGroupFile02" style="background-color: #003060">Background</label>
                            <input  type="file" class="form-control" id="background" name="background">
                        </div>
                        <div class="input-group">
                            <span class="input-group-text text-white" style="background-color: #003060">Genre</span>
                            <input required type="text" value = '{{$data->genre}}' class="form-control" name='genre' id="genre" required>
                        </div>
                        <div style="text-align: left;padding-left:5px;font-size: 15px;" class='mb-3' id="genrePass"></div>

                        <span class="input-group ">
                            <span class="input-group-text text-white" style="background-color: #003060">IMDB</span>
                        <input type="text" required class="form-control" value = '{{$data->rating}}' name='rating' id='rating' placeholder="1-9" required>

                        </span>
                        <div style="text-align: left;padding-left:5px;font-size: 15px;" class = "mb-3" id="ratingPass"></div>

                        <span class="input-group">
                            <span class="input-group-text text-white"style="background-color: #003060" >Release-date</span>
                        <input type="date" required class="form-control" value = '{{$data->release_date}}' name="releaseDate" id='date'>

                        </span>
                        <div style="text-align: left;padding-left:5px;font-size: 15px;"id="datePass" class="mb-3"></div>

                        <div class="input-group ">
                            <span class="input-group-text text-white" style="background-color: #003060">Cast</span>
                            <input required type="" value = '{{$data->cast}}' class="form-control" name='cast' id='cast' required>
                        </div>
                        <div style="text-align: left;padding-left:5px;font-size: 15px;"id="castPass" class="mb-3"></div>

                        <div class="input-group ">
                            <span class="input-group-text text-white" style="background-color: #003060">Director</span>
                            <input type="text" value = '{{$data->director}}' required class="form-control" name='director' id='director' required>
                        </div>
                        <div style="text-align: left;padding-left:5px;font-size: 15px;"id="directorPass" class="mb-3"></div>

                        <div class="input-group">
                            <span class="input-group-text text-white" style="background-color: #003060">Award</span>
                            <input type="" value = '{{$data->award}}' required class="form-control" name='award' id='award'>
                        </div>
                        <div style="text-align: left;padding-left:5px;font-size: 15px;"id="awardPass" class="mb-3"></div>


                        <div class="input-group">
                            <span class="input-group-text text-white" style="background-color: #003060">Runtime</span>
                            <input required type="text" value = '{{$data->runtime}}' class="form-control" name='runtime' id='runtime' placeholder="***mins" required>

                        </div>
                        <div style="text-align: left;padding-left:5px;font-size: 15px;" id="runtimePass" class="mb-3"></div>

                        <div class="input-group">
                            <span class="input-group-text text-white" style="background-color: #003060">Trailer Link</span>
                            <input required type="url" value = '{{$data->trailer}}' class="form-control" name='trailer' id='trailer'>
                        </div>
                        <div style="text-align: left;padding-left:5px;font-size: 15px;"id="trailerPass" class="mb-3"></div>

                        <div class="input-group">
                            <span class="input-group-text text-white" style="background-color: #003060">Quality</span>
                            <input required type="text" class="form-control" value = '{{$data->quality}}' name='quality' id=quality placeholder="****p" required>
                        </div>
                        <div style="text-align: left;padding-left:5px;font-size: 15px;" id="qualityPass" class='mb-3'></div>

                        <div class="input-group ">
                            <span class="input-group-text text-white" style="background-color: #003060">Language</span>
                            <input required type="text"value = '{{$data->language}}' class="form-control" name='language' id=language required>
                        </div>
                        <div style="text-align: left;padding-left:5px;font-size: 15px;"id="languagePass" class="mb-3"></div>

                        <textarea name="review" id="review" cols="30" rows="10" class="form-control mb-3" placeholder="Enter review" required>
                            {{$data->review}}
                          </textarea>
                        <div id="error" class="alert alert-danger " style="display:none"><i class="fa-solid fa-circle-exclamation"></i>&nbsp;&nbsp;</div>


                        <button type="submit" class="btn btn-success" style="float: right" onclick='ratingCheck(); runtimeCheck(); languageCheck(); qualityCheck(); categoryCheck(); posterCheck(); backgroundCheck(); castCheck(); directorCheck(); awardCheck(); dateCheck(); trailerCheck(); '><i class="fa-solid fa-check"></i></button>
                        <button type="reset" class="btn btn-danger" style="float: left"><i class="fa-solid fa-xmark"></i></button>

                    </form>
                </div>


            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    const name = document.getElementById('name');
    const namePass = document.getElementById('namePass');



    const runtime = document.getElementById('runtime');
    const passRuntime = document.getElementById('runtimePass');

    const quality = document.getElementById('quality');
    const qualityPass = document.getElementById('qualityPass');
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
    genre.addEventListener('input', genreCheck1);

// function genreCheck1() {
//     var test1 = /^[A-Za-z]+$/ig; //genre
//     if(genre.value == "")
//     {
//         genrePass.innerHTML = "";

//     }
//     else if (test1.test(genre.value) != true) {
//         genrePass.innerHTML = "<i class='fa-solid fa-check'></i>Invalig genre";
//         genrePass.style.color = "red";
//     } else {
//         genrePass.innerHTML = "<i class='fa-solid fa-check'></i>Correct";
//         genrePass.style.color = "green";
//     }
// }
runtime.addEventListener('input', runtimeCheck1);

        function runtimeCheck1() {
            var test4 = /^([0-9]{2,})mins$/; //runtime
            if(runtime.value == "")
            {
                runtimePass.innerHTML = "";

            }
            else if (test4.test(runtime.value) != true) {
                runtimePass.innerHTML = "<i class='fa-solid fa-check'></i>Please fill the format";
                runtimePass.style.color = "red";
            } else {
                runtimePass.innerHTML = "<i class='fa-solid fa-check'></i>Correct";
                runtimePass.style.color = "green";
            }
        }

        function qualityCheck() {
            // console.log(document.getElementById('form').onsubmit


            // var test5 = /^([0-9]{3,4}p)$/gi; //quality
            if(quality.value == '') {
                qualityPass.innerHTML = "Enter quality";
                qualityPass.style.color = "red";
            }
            else if (quality.value != "1080p" & quality.value != "720p" & quality.value != "4k") {
                qualityPass.innerHTML = "<i class='fa-solid fa-exclamation'></i>Please fill the valid quality";
                qualityPass.style.color = "red";
                // document.getElementById('form').onsubmit ='aa';
                }
            else{
                qualityPass.innerHTML = '';
         }
        }

        function runtimeCheck()
{
    if(runtime.value === '' ){
    runtimePass.innerHTML="Please enter runtime";
    runtimePass.style.color="red";
}
else{
    runtimePass.innerHTML = "";
}
}
function genreCheck()
{
    if(Category.value === 'null' ){
    genrePass.innerHTML="Please enter genre";
    genrePass.style.color="red";
}
else{
    genrePass.innerHTML = "";
}
}
    function categoryCheck() {


if(Category.value === 'null' ){
    cPass.innerHTML="Please Choose Category";
    cPass.style.color="red";
}
else{
    cPass.innerHTML = "";
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
        }
        else{
            ratingPass.innerHTML="<i class='fa-solid fa-check'></i>Correct";
            ratingPass.style.color="green";
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
</script>




@endsection
