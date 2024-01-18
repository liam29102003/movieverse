<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('dist/css/home_style2.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Aboreto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif&display=swap" rel="stylesheet">

    <style>
        body{
            /* text-transform:lowercase; */
            font-family: 'PT Serif', serif;

        }
        .nav-link:hover{
            background-color:#189AB4;
        }
        .nav-link{
            border-radius:5px;
        }
        .sidebar {
        border: 3px double grey;
        border-top: none;
        padding: 2px;
        width: 15em;
        height: fit-content;
        background-size: cover;
        background-position: center;
        float: left;
        /* margin-top: 30px; */
        /* display: flex;
    flex-direction: row; */
        overflow: hidden;
        /* margin-right: 50px; */
    }
.sidebar .card {
        position: static;
        color: white;
        background-color: rgba(4, 15, 75, 0.6);
        border: 2px solid #040f4b;
        border-bottom-left-radius: 10%;
        border-bottom-right-radius: 10%;
        margin-top: 20px;
        margin-bottom: 40px;
    }
     /* .sidebar .card1{
        position: fixed;
        top:100;
        width: 15%
    }
    .sidebar .card1{
        position: fixed;
        top:100px;
        width: 15%
    }
    .sidebar .card2{
        position: fixed;
        top:500px;
        width: 15%
    }
    .sidebar .card3{
        position: fixed;
        top:800px;
        width: 15% */


    </style>
</head>

<body class="main-body" style="background-image: url('{{asset('images/planet-glow-asteroids-flash-bright-spaceBg.jpg')}}')">
    <header id='header'>
        <div class="heading">
            <nav class="navbar text-black">
                <a href="">
                    <h3>Movieverse</h3>
                </a>
                <!-- <button class="d-md-none d-block">Quick Search</button> -->
                <ul class="nav-menu mt-1">
                    <li class="nav-item">
                        <a href="{{route('user#home')}}" class="nav-link text-white mt-2">Home</a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('user#movies')}}" class="nav-link text-white mt-2">Movies</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('user#tvshows')}}" class="nav-link text-white mt-2">Tv Shows</a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('user#contact')}}" class="nav-link text-white mt-2">Requests</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('user#profile',Auth::user()->id)}}" class=" text-white "><button class="btn mt-2">{{Auth::user()->name}}</button></a>
                    </li>
                    <li class="nav-item">
                        <button class="btn  mt-2 ps-2 pe-2 me-0 search" onclick="myFunction()" id='button'><i class="fa-solid fa-magnifying-glass"></i></button>
                    </li>
                    <form action="{{route('logout')}}" method="POST" class="mt-2">
                        @csrf
                        <li class="nav-item">
                            <button class="btn" type="submit">Logout</button>
                        </li>
                    </form>
                </ul>
                <div class="hamburger">
                    <span class="bar"> </span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div>
            </nav>
        </div>

    </header>

    <section class="body ">

        <div class="container-fluid">
            <div class="row">
                <div class=" col-md-3 col-lg-2 d-none d-md-block p-0">
                    <div class="sidebar w-100" id='sidebar'>
                        <div class="barplace">
                            <div class="quick-search card card1 text-center border-3 shadow-lg">
                                <div class="card-header">
                                    <h5 class="text-center mb-0 mt-0">Category Search</h5>

                                </div>
                                <div class="card-body">

                                    <button class="button" type="submit" onclick="buttonClickMovies()">Movies</button>
                                    <div id="movieCategorylist" style="display: none;">

                                        @foreach ($catData1 as $category)
                                        <a href="{{route('user#moviesearch',$category->category_id)}}">
                                        <p class="category">{{$category->category_name}}</p>
                                    </a>
                                        @endforeach
                                    </form>
                                    </div>
                                    <button class="button" type="submit" onclick="buttonClickTvshows()">Tvshows</button>
                                    <div id="tvshowCategorylist" style="display: none;">
                                        @foreach ($catData2 as $category1)
                                        <a href="{{route('user#tvshowsearch',$category1->tvshowCategory_id)}}">
                                        <p class="category">{{$category1->tvshowCategory_name}}</p>
                                        </a>
                                        @endforeach

                                    </div>

                                </div>

                            </div>
                            <form action="{{route('user#searchDate')}}" method="get">
                                @csrf
                            <div class="card card2 text-center mt-3 rating_search mt-">
                                <div class="card-header">
                                    <h5 class="">Search By Release-Date</h5>
                                </div>
                                <div class="card-body">
                                    <input type="date" name="start_date" id="date1" class="form-control" placeholder="Start Date" max=""> -
                                    <input type="date" name="end_date" id="" class="form-control" placeholder="End Date">
                                    <button type="submit" class="mt-3 mb-0 btn">Search</button>
                                </div>
                            </div>
                            </form>
                            <form action="{{route('user#searchRating')}}" method="get">

                            <div class="card card3 text-center mt-3 rating_search mt-">
                                <div class="card-header">
                                    <h5 class="">Search By Rating</h5>
                                </div>
                                <div class="card-body">
                                    <input type="number" name="min_rating" id="minr" class="form-control" placeholder="min rating" min="1" max="10" step='0.1'> -
                                    <input type="number" name="max_rating" id="maxr" class="form-control" placeholder="max rating" min="1" max="10" step='0.1'>
                                    <button type="submit" class="mt-3 mb-0 btn">Search</button>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>

                </div>
                <div class="   col-md-9 col-lg-10 col-12 movielist p-3" >
                    <div class="container  " id="search">
                        <div class="row height d-flex justify-content-center align-items-center">
                            <div class="col-md-8">
                                <form action="{{route('user#search')}}" method="get">
                                <div class="search">
                                    <i class="fa fa-search"></i>
                                    <input type="text" onfocus = "darken()" onblur = 'lighten()' class="form-control autoCompleteInput" placeholder="Search Movies, Series, Animes" name='user_search'>
                                    <button class=" btn btn-primary ">search</button>
                                    <div class="resultContainer"></div>

                                </div>
                            </form>
                            </div>
                            <!-- <div class="col-4">
                            <button class="btn btn-primary">Quick Search</button>

                        </div> -->
                        </div>
                    </div>
                    <div class="card main-card" id='movie-card'>

                        <div class="container mt-3">
                            <div class="row">
                                <div class="col-12 offset-0">
                                    <div class="carousel slide" data-bs-ride="carousel" id="slide" style="border: 3px solid black;">
                                        <ol class="carousel-indicators">
                                            <li data-bs-target="#slide" data-bs-slide-to="0" class="active"></li>
                                            <li data-bs-target="#slide" data-bs-slide-to="1"></li>
                                            <li data-bs-target="#slide" data-bs-slide-to="2"></li>
                                            <li data-bs-target="#slide" data-bs-slide-to="3"></li>

                                        </ol>
                                        <div class="carousel-inner">
                                            @if(isset($new[0]))
                                            <div class="carousel-item">
                                                <img src="{{asset('uploads/'.$new[0]->background)}}" alt="pizza photo1" class="w-100" style="height: 400px">
                                            </div>
                                            @endif
                                            @if(isset($new[1]))
                                            <div class="carousel-item active">
                                                <img src="{{asset('uploads/'.$new[1]->background)}}" alt="pizza photo2" class="w-100" style="height: 400px">
                                            </div>
                                            @endif
                                            @if(isset($new[2]))
                                            <div class="carousel-item">
                                                <img class="w-100" src="{{asset('uploads/'.$new[2]->background)}}" alt="pizza photo3" style="height: 400px">
                                            </div>
                                            @endif
                                            @if(isset($new[3]))
                                            <div class="carousel-item">
                                                <img class="w-100" src="{{asset('uploads/'.$new[3]->background)}}" alt="pizza photo3" style="height: 400px">
                                            </div>
                                            @endif
                                        </div>
                                        <a href="#slide" class="carousel-control-prev" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon"></span>
                                        </a>
                                        <a href="#slide" class="carousel-control-next" data-bs-slide="next">
                                            <span class="carousel-control-next-icon"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list mt-3">
                            <a href="{{route('user#movies')}}"><button class="btn" style="float: right; margin-top: 12px; margin-right: 3%;     color: rgb(222, 182, 241);
                            ;">Sell All</button></a>


                            <h1>New Release Movies</h1>
                            <hr>
                            <div class="line">
                                <div class="movierow ">
                                    @for ($i = 0; $i <4; $i++)
                                    @if(isset($new[$i]))
                                    <a data-aos="fade-up"  class="column " style="position: relative;" href="{{route('user#moviesDetails',$new[$i]->movies_id)}}">
                                        <div class="moviecard" style="width: 200px; height:350px; overflow:hidden" onmouseover="myOpacity('{{$new[$i]->movies_id}}')" onmouseleave="myNoOpacity('{{$new[$i]->movies_id}}')">
                                            <img src="{{asset('uploads/'.$new[$i]->poster)}}" alt=" " width="220px " height="300px " class="image rounded">
                                            <p class="text-center p-1 ">{{$new[$i]->movies_name}}</p>
                                        </div>
                                        <div class="overlay text-center" id="overlay{{$new[$i]->movies_id}}" style="opacity: 0;">
                                            <h5>{{$new[$i]->movies_name}}</h5>

                                        </div>
                                    </a>
                                    @endif
                                    @endfor
                                </div>
                            </div>
                        </div>

                        <div class="list mt-3">
                            <a href="{{route('user#tvshows')}}"><button class="btn" style="float: right; margin-top: 12px; margin-right: 3%;     color: rgb(222, 182, 241);
                            ;">Sell All</button></a>


                            <h1>New Release Series</h1>
                            <hr>
                            <div class="line">
                                <div class="movierow ">
                                    @for ($i = 0; $i <4; $i++)
                                    @if(isset($new1[$i]))
                                    <a data-aos="fade-up"  class="column " style="position: relative;" href="{{route('user#tvshowDetails',$new[$i]->movies_id)}}">
                                        <div class="moviecard" style="width: 200px; height:350px; overflow:hidden" onmouseover="tvOpacity('{{$new1[$i]->tvshows_id}}')" onmouseleave="tvNoOpacity('{{$new1[$i]->tvshows_id}}')">
                                            <img src="{{asset('uploads/'.$new1[$i]->poster)}}" alt=" " width="200px " height="300px " class="image ">
                                            <p class="text-center p-1 ">{{$new1[$i]->tvshows_name}}</p>
                                        </div>
                                        <div class="overlay text-center" id="tvoverlay{{$new1[$i]->tvshows_id}}" style="opacity: 0;">
                                            <h5>{{$new1[$i]->tvshows_name}}</h5>

                                        </div>
                                    </a>
                                    @endif
                                    @endfor
                                </div>
                            </div>
                        </div>

                        <div class="list mt-3">
                            <a href="{{route('user#movies')}}"><button class="btn" style="float: right; margin-top: 12px; margin-right: 3%;     color: rgb(222, 182, 241);
                            ;">Sell All</button></a>


                            <h1>Trending Movies</h1>
                            <hr>
                            <div class="line">
                                <div class="movierow ">
                                    @foreach ($data as $data)
                                    <a data-aos="fade-up"  class="column " style="position: relative;" href="{{route('user#moviesDetails',$data->movies_id)}}">
                                        <div class="moviecard" style="width: 200px; height:350px; overflow:hidden" onmouseover="myOpacity1('{{$data->movies_id}}')" onmouseleave="myNoOpacity1('{{$data->movies_id}}')">
                                            <img src="{{asset('uploads/'.$data->poster)}}" alt=" " width="200px " height="300px " class="image ">
                                            <p class="text-center p-1 ">{{$data->movies_name}}</p>
                                        </div>
                                        <div class="overlay text-center" id="overlay1{{$data->movies_id}}" style="opacity: 0;">
                                            <h5>{{$data->movies_name}}</h5>

                                        </div>
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="list ">
                            <a href="{{route('user#tvshows')}}"><button class="btn" style="float: right; margin-top: 12px; margin-right: 3%;     color: rgb(222, 182, 241);
                        ;">Sell All</button></a>
                            <h1>Trending Series</h1>
                            <hr>
                            <div class="line">
                                <div class="movierow ">
                                    @foreach ($data1 as $item2)
                                    <a data-aos="fade-up"  class="column " style="position: relative;" href="{{route('user#tvshowDetails',$item2->tvshows_id)}}">
                                        <div class="moviecard" style="width: 200px; height:350px; overflow:hidden" onmouseover="tvOpacity1('{{$item2->tvshows_id}}')" onmouseleave="tvNoOpacity2('{{$item2->tvshows_id}}')">
                                            <img src="{{asset('uploads/'.$item2->poster)}}" alt=" " width="200px " height="300px " class="image ">
                                            <p class="text-center p-1 ">{{$item2->tvshows_name}}</p>
                                        </div>
                                        <div class="overlay text-center" id="tvoverlay1{{$item2->tvshows_id}}" style="opacity: 0;">
                                            <h5>{{$item2->tvshows_name}}</h5>

                                        </div>
                                    </a>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                        <hr>
                        {{-- <div class="list ">
                            <button class="btn" style="float: right; margin-top: 12px; margin-right: 3%;     color: rgb(222, 182, 241);
                        ;">Sell All</button>
                            <h1>Trending Animes</h1>
                            <hr>
                            <div class="line">
                                <div class="movierow ">
                                    @foreach ($anime as $item3)
                                    <a data-aos="fade-up"  class="column " style="position: relative;" href="{{route('user#tvshowDetails',$item3->anime_id)}}">
                                        <div class="moviecard" onmouseover="myOpacity('{{$item3->anime_id}}')" onmouseleave="myNoOpacity('{{$item3->anime_id}}')">
                                            <img src="{{asset('uploads/'.$item3->poster)}}" alt=" " width="200px " height="300px " class="image ">
                                            <p class="text-center p-1 ">Resident Evil</p>
                                        </div>
                                        <div class="overlay text-center" id="overlay'{{$item3->anime_id}}'" style="opacity: 0;">
                                            <h5>Resident Evil</h5>

                                        </div>
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                        </div> --}}
                        <hr>

                    </div>
                </div>
            </div>
        </div>
        <!-- <section class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 bg-danger text-center">
                        <p>Created by Group-(2)</p>
                        <p>Contact Us</p>

                    </div>
                </div>

            </div>
        </section> -->
    </section>
    <div class="container" id=review style="display: none">
        <div class="row">
            <div class="col-6 offset-3">
                <div class="card" style='background:rgba(0, 48, 96, 0.6)'>
                    <h3 class="card-header text-center  text-white">
                        Review
                    </h3>
                    <div class="card-body" style='background:rgba(0, 48, 96, 0.6)'>
                <form action="{{route('insert#review',Auth::user()->id)}}" method="post">
                    @csrf
                    <label for="" class="form-lable text-white">How many star will you give to our site</label>
                    <select name="star" id="" class="form-select">
                        <option value="5">⭐⭐⭐⭐⭐</option>
                        <option value="4">⭐⭐⭐⭐</option>
                        <option value="3">⭐⭐⭐</option>
                        <option value="2">⭐⭐</option>
                        <option value="1">⭐</option>
                    </select>
                    <label for="" class="form-lable text-white">Write your honest review</label>
                    <textarea name="review" id="" cols="30" rows="10" class="form-control"></textarea>
                <button class="btn mt-2" type="submit" style="float:right">Submit</button>
                </form>
            </div>
            </div>
            </div>
        </div>
    </div>
    <div class="container-fluid m-0 p-0">
        <!-- Footer -->
        <footer class="text-center text-white m-0" style="background-color:#003060">
          <!-- Grid container -->
          <div class="container-fluid">
            <!-- Section: Links -->
            <section class="">
              <!-- Grid row-->
              <div class="row text-center d-flex justify-content-center pt-4">
                <!-- Grid column -->
                <div class="col-md-2">
                  <h6 class="text-uppercase font-weight-bold">
                    <a class="text-white border border-1 p-2 rounded-2 "  id='reviewbtn' onclick="reviewReveal()"><i class="fa-solid fa-plus"></i> Review</a>
                  </h6>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-2">
                  <h6 class="text-uppercase font-weight-bold">
                    <a href="{{route('add#review')}}" class="text-white border border-1 p-2 rounded-2">Read All reviews</a>
                  </h6>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-2">
                  <h6 class="text-uppercase font-weight-bold">
                    <a href="#!" class="text-white">Awards</a>
                  </h6>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-2">
                  <h6 class="text-uppercase font-weight-bold">
                    <a href="#!" class="text-white">Help</a>
                  </h6>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-2">
                  <h6 class="text-uppercase font-weight-bold">
                    <a href="#!" class="text-white">Contact</a>
                  </h6>
                </div>
                <!-- Grid column -->
              </div>
              <!-- Grid row-->
            </section>
            <!-- Section: Links -->

            <hr class="" />

            <!-- Section: Text -->
            <section class="mb-">
              <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                  <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt
                    distinctio earum repellat quaerat voluptatibus placeat nam,
                    commodi optio pariatur est quia magnam eum harum corrupti
                    dicta, aliquam sequi voluptate quas.
                  </p>
                </div>
              </div>
            </section>
            <!-- Section: Text -->

            <!-- Section: Social -->
            <section class="text-center mb-3">
              <a href="" class="text-white me-4">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="" class="text-white me-4">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="" class="text-white me-4">
                <i class="fab fa-google"></i>
              </a>
              <a href="" class="text-white me-4">
                <i class="fab fa-instagram"></i>
              </a>
              <a href="" class="text-white me-4">
                <i class="fab fa-linkedin"></i>
              </a>
              <a href="" class="text-white me-4">
                <i class="fab fa-github"></i>
              </a>
            </section>
            <!-- Section: Social -->
          </div>
          <!-- Grid container -->

          <!-- Copyright -->
          <div
               class="text-center p-3"
               style="background-color: rgba(0, 0, 0, 0.2)"
               >
            © 2022 Copyright:
            <a class="text-white" href="https://mdbootstrap.com/"
               >First Year Second sem group-2</a
              >
          </div>
          <!-- Copyright -->
        </footer>
        <!-- Footer -->
      </div>
      <!-- End of .container -->
    <script type="text/javascript" src="{{asset('dist/js/home2.js')}}">
    </script>
    <script>
        var today = new Date();
var date = today. getFullYear()+'-'+(today. getMonth()+1)+'-'+today. getDate();

document.getElementById('date1').max = date;
        var movieCategorylist = document.getElementById('movieCategorylist');
var tvshowCategorylist = document.getElementById('tvshowCategorylist');
var animeCategorylist = document.getElementById('animeCategorylist');
var button = document.getElementById('button');
var rbutton = document.getElementById('reviewbtn');
var reviewCard = document.getElementById('review');
function reviewReveal()
{
    if(reviewCard.style.display == 'block')
    reviewCard.style.display = 'none';
    else if(reviewCard.style.display == 'none')
    reviewCard.style.display = 'block';

}

function myFunction() {
    if (search.style.display == "block") {
        search.style.display = "none";
    } else {
        search.style.display = "block";
    }
}
function buttonClickMovies() {
    if (movieCategorylist.style.display == "none") {
        movieCategorylist.style.display = "block";
    } else {
        movieCategorylist.style.display = "none";
    }
}
function buttonClickAnimes() {
    if (animeCategorylist.style.display == "none") {
        animeCategorylist.style.display = "block";
    } else {
        animeCategorylist.style.display = "none";
    }
}

function buttonClickTvshows() {
    if (tvshowCategorylist.style.display == "none") {
        tvshowCategorylist.style.display = "block";
    } else {
        tvshowCategorylist.style.display = "none";
    }
}
    </script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1200,
        });
        function myOpacity1(i) {
    var overlay = document.querySelector('#overlay1' + i);

    overlay.style.opacity = "1";
}

function myNoOpacity1(i) {
    var overlay = document.querySelector('#overlay1' + i);

    overlay.style.opacity = "0";
}
        function tvOpacity1(i) {
    var overlay = document.querySelector('#tvoverlay1' + i);

    overlay.style.opacity = "1";
}

function tvNoOpacity(i) {
    var overlay = document.querySelector('#tvoverlay' + i);

    overlay.style.opacity = "0";
}
function tvNoOpacity2(i) {
    var overlay = document.querySelector('#tvoverlay1' + i);

    overlay.style.opacity = "0";
}
        function darken()
{
    document.querySelector('#movie-card').style.filter = 'brightness(50%)';
    document.querySelector('#header').style.filter = 'brightness(50%)';
    document.querySelector('#sidebar').style.filter = 'brightness(50%)';




}
function tvNoOpacity(i) {
    var overlay = document.querySelector('#tvoverlay' + i);

    overlay.style.opacity = "0";
}
function tvOpacity(i) {
    var overlay = document.querySelector('#tvoverlay' + i);

    overlay.style.opacity = "1";
}
function lighten()
{
    document.querySelector('#movie-card').style.filter = 'brightness(100%)';
    document.querySelector('#header').style.filter = 'brightness(100%)';
    document.querySelector('#sidebar').style.filter = 'brightness(100%)';


}


    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
