<!DOCTYPE html>
<html lang="eng">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.3.0/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('dist/css/home_style.css')}}">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Aboreto&display=swap" rel="stylesheet">
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
        </style>
</head>

<body class="main-body" style="background-image: url('{{asset('images/moon-knight-illustration-poster-w5.jpg')}}');
background-size: cover;">
    <!-- <nav id="navbar">
        <h1>MOVIESVERSE</h1>
        <ul class="nav-links" id="navMenu">
            <div class="nav-content">
                <li><a href=""><span style="color:antiquewhite">Movieverse</span></a></li>
                <li><a href="index.html">Home</a></li>
                <li><a href="movies.html">Movies</a></li>
                <li><a href="">TV-series</a></li>
                <li><a href="">Animes</a></li>
            </div>
        </ul>
    </nav> -->
    <header>
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
    </header>
    <div class="container  " id="search">
        <div class="row height d-flex justify-content-center align-items-center">
            <div class="col-md-8">
                <div class="search">
                    <i class="fa fa-search"></i>
                    <input type="text" class="form-control" placeholder="Search Movies, Series, Animes">
                    <button class=" btn btn-primary ">search</button>
                </div>
            </div>
            <!-- <div class="col-4">
                <button class="btn btn-primary">Quick Search</button>

            </div> -->
        </div>
    </div>
    <div class="card mt-3 m-4" >
        <div class="card-header">
            <div style="display:flex; justify-content: space-between;">
                <h2 class="">Movies</h2>
                <button class="mt-2 btn text-white">Total - {{$data1->total()}}</button>
            </div>
        </div>
        <div class="card-body">
            <div class="line">
                <div class="movierow ">
                    @foreach ($data1 as $item)
                    <a class="column" style="position: relative;" href="{{route('user#moviesDetails',$item->movies_id)}}">
                        <div class="moviecard"style="width: 200px; height:350px; overflow:hidden" onmouseover="myOpacity('{{$item->movies_id}}')" onmouseleave="myNoOpacity('{{$item->movies_id}}')">
                            <img src="{{asset('uploads/'.$item->poster)}}" alt=" " width="200px " height="300px " class="image ">
                            <p class="text-center p-1 ">{{$item->movies_name}}</p>
                        </div>
                        <div class="overlay text-center" id="overlay{{$item->movies_id}}" style="opacity: 0;">
                            <h5>{{$item->movies_name}}</h5>

                        </div>
                    </a>
                    @endforeach



            </div>
        </div>

    </div>
    </div>
    <div class="card mt-3 m-4" >
        <div class="card-header">
            <div style="display:flex; justify-content: space-between;">
                <h2 class="">Movies</h2>
                <button class="mt-2 btn text-white">Total - {{$data2->total()}}</button>
            </div>
        </div>
        <div class="card-body">
            <div class="line">
                <div class="movierow ">
                    @foreach ($data2 as $item2)
                    <a class="column" style="position: relative;" href="{{route('user#tvshowDetails',$item2->tvshows_id)}}">
                        <div class="moviecard" style="width: 200px; height:350px; overflow:hidden" onmouseover="myOpacity1('{{$item2->tvshows_id}}')" onmouseleave="myNoOpacity1('{{$item2->tvshows_id}}')">
                            <img src="{{asset('uploads/'.$item2->poster)}}" alt=" " width="200px " height="300px " class="image ">
                            <p class="text-center p-1 ">{{$item2->tvshows_name}}</p>
                        </div>
                        <div class="overlay text-center" id="tvoverlay{{$item->tvshows_id}}" style="opacity: 0;">
                            <h5>{{$item2->tvshows_name}}</h5>

                        </div>
                    </a>
                    @endforeach



            </div>
        </div>

    </div>
    </div>



    <br>
    <hr>
    <!-- <div class="row">
        <div class="column">
            <img src="" alt="" width="200px" height="250px">
            <p>Bubble</p>
        </div>
        <div class="column">
            <img src="" alt="" width="200px" height="250px">
            <p>Bubble</p>
        </div>
        <div class="column">
            <img src="" alt="" width="200px" height="250px">
            <p>Bubble</p>
        </div>
        <div class="column">
            <img src="" alt="" width="200px" height="250px">
            <p>Bubble</p>
        </div>
    </div>
    <br>
    <hr>
    <div class="row">
        <div class="column">
            <img src="" alt="" width="200px" height="250px">
            <p>Bubble</p>
        </div>
        <div class="column">
            <img src="" alt="" width="200px" height="250px">
            <p>Bubble</p>
        </div>
        <div class="column">
            <img src="" alt="" width="200px" height="250px">
            <p>Bubble</p>
        </div>
        <div class="column">
            <img src="" alt="" width="200px" height="250px">
            <p>Bubble</p>
        </div>
    </div>
    <br>
    <hr> -->
</body>
<!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.3.0/mdb.min.js"></script>
<script type="text/javascript" src="{{asset('dist/js/home2.js')}}"></script>
    <script>
         function myNoOpacity(i) {
    var overlay = document.querySelector('#overlay' + i);

    overlay.style.opacity = "0";
}
        function myOpacity(i) {
    var overlay = document.querySelector('#overlay' + i);

    overlay.style.opacity = "1";
}
function myNoOpacity1(i) {
    var overlay = document.querySelector('#tvoverlay' + i);

    overlay.style.opacity = "0";
}
        function myOpacity1(i) {
    var overlay = document.querySelector('#tvoverlay' + i);

    overlay.style.opacity = "1";
}

</script>

</html>
