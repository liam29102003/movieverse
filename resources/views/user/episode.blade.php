<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.css" rel="stylesheet" />
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" /> -->
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Aboreto&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=PT+Serif&display=swap" rel="stylesheet">

    <style type="text/css">
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
        #VM {
            background-image: url('https://www.denofgeek.com/wp-content/uploads/2012/11/totoro-main.jpg?resize=640%2C380.png');
            /* background-color: black; */
            backdrop-filter: blur(6px);
            background-repeat: no-repeat;
            background-size: cover;
            height: fit-content;
            color: gray;
        }
        /* nav.navbar {
            opacity: 0.5;
        } */

        #imgid {
            margin-top: 50px;
            /* margin-left: 35px; */
        }

        #desc {
            margin-top: 50px;
            /* margin-left: 50px; */
            /* margin-right: 285px; */
        }

        #trailer {
            /* background-color: bisque; */
            padding-top: 30px;
            display: none;
            position: relative;
        }

        #close {
            position: absolute;
            top: 0;
            left: 90%;
        }

        .container {
            color: aliceblue;
        }

        .movie-card {
            border: 5px double gray;
            background-color: rgba(4, 15, 75, 0.6);
            border-radius: 4%;
            /* background-color: #003060; */
        }

        #but {
            color: aliceblue;
        }

        h1,
        h2 {
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            font-weight: 200;
            font-style: italic;
        }

        p {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        img {
            border: 3px solid #003060;
            border-radius: 20px;
        }

        iframe {
            border: 4px double black;
            border-radius: 3%;
            margin-top: 10px;
        }

        .download Button {
            transform: rotate(90deg);
            position: absolute;
            top: 70%;
            left: 60%;
            padding: 30px;
        }

        .nav-menu {
            gap: 20px;
        }

        .navbar {
            background-color: #040f4b;
            min-height: 70px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 24px;
        }

        .nav-menu {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 30px;
        }

        .nav-branding {
            font-size: 2rem;
        }

        .nav-link {
            transition: 0.7s ease;
        }

        .nav-link:hover {
            color: dodgerblue
        }

        li {
            list-style: none;
        }

        a {
            color: white;
            text-decoration: none;
        }

        .hamburger {
            display: none;
            cursor: pointer;
        }

        .bar {
            display: block;
            width: 25px;
            height: 3px;
            margin: 5px auto;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
            background-color: white;
        }

        @media(max-width:900px) {
            .nav-item .search {
                display: none;
            }
            #search {
                display: block;
            }
            .hamburger {
                display: block;
            }
            .hamburger.active .bar:nth-child(2) {
                opacity: 0;
            }
            .hamburger.active .bar:nth-child(1) {
                transform: translateY(8px) rotate(45deg);
            }
            .hamburger.active .bar:nth-child(3) {
                transform: translateY(-8px) rotate(-45deg);
            }
            .nav-menu {
                position: fixed;
                left: -100%;
                top: 70px;
                gap: 0;
                flex-direction: column;
                background-color: #003060;
                width: 100%;
                text-align: center;
                transition: 0.3s;
                padding-right: 25px;
            }
            .nav-item {
                margin: 16px 0;
                border: 2px solid white;
                width: 100%;
                transition: 0.3s;
            }
            .nav-menu.active {
                left: 0;
                z-index: 5;
            }
            .nav-item:hover {
                background-color: gray;
            }
        }
        #snackbar {
            width: 100%;
            position: fixed;
            top: 100px;
            display: flex;
            justify-content: center;
        }
        .toastAlert {
            color: white;
            background-color: #003060;
            border-radius: 20px;
            padding: 10px;
            padding-left: 20px;
            padding-right: 20px;
            /* top: -300px; */
            position: relative;
            transition: top 0.4s ease-in-out;
        }
    </style>
    <title>View Movie</title>
</head>

<body id="VM" class="pb-5" style="background-image: url('{{asset('uploads/'.$data->background)}}');
backdrop-filter: blur(6px);
background-repeat: no-repeat;
background-size: cover;
height: fit-content;
color: gray;">
    <!-- <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="javascript:void(0)">Logo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
				<span class="navbar-toggler-icon"></span>
			</button>
            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="text" placeholder="Search">
                    <button class="btn btn-primary" type="button">Search</button>
                </form>
            </div>
        </div>
    </nav> -->
    <header>
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
                        <a href="{{route('user#profile',Auth::user()->id)}}" class="text-light"><button class="btn mt-2 text-light">{{Auth::user()->name}}</button></a>
                    </li>

                    <form action="{{route('logout')}}" method="POST" class="mt-2">
                        @csrf
                        <li class="nav-item">
                            <button class="btn text-light" type="submit">Logout</button>
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
    <div id="snackbar"></div>

    <div class="container mt-5 mb-5">

        <!-- <div class="row">
            <div class="col-8 offset-2">
            </div>
        </div> -->
        <div class="row">
            <div class=" col-md-10 col-12 movie-card offset-md-1  p-3">
                <a href="{{route('user#tvshowDetails',$data->tvshows_id)}}" class=""><button class="btn btn-sm text-light" style="background-color: #003060"><i class="fa-solid fa-arrow-left"></i></button></a>

                <div class="text-center w-100" id="trailer">
                    <button id="close" class="btn text-light btn-outline-dark" onclick="unreveal()"><i class="fa-solid fa-xmark"></i></button>
                    <iframe width="90%" height="400px" src="{{$data->trailer}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-12 " id="imgid"><img src="{{asset('uploads/'.$data->poster)}}" width="100%"></div>
                        <div class="col-lg-9" id="desc">
                            {{-- <h2>New Episodes</h2> --}}
                            <h1>{{$data1->episodes_name}}</h1>
                            <p>Rating : {{$data1->rating}}/10</p>
                            <span>⏱ {{$data1->runtime}}</span>
                            <p>{{$data1->review}}</p>
                            <form action="{{route('download#insert2',$data1->episodes_id)}}" method='post'>
                                @csrf
                            <button type="submit" id="downloaf" class="btn text-white" onclick="popup()" style="background-color: #003060;">Download</button>
                            </form>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js " integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK " crossorigin="anonymous "></script>
    <script>
        var trailer = document.getElementById('trailer');
        var download = document.getElementById('download');

        function reveal() {
            trailer.style.display = "block "
        }

        function unreveal() {
            trailer.style.display = "none "
        }

        function popup() {

            var snack = document.getElementById('snackbar');
            snack.innerHTML = '';
            var toastAlertTag = document.createElement('div');
            toastAlertTag.classList.add('toastAlert');
            toastAlertTag.append('Your download is starting....');
            snack.append(toastAlertTag);

            toastAlertTag.style.top = '-200px';
            setTimeout(() => {
                toastAlertTag.style.top = '0px';

            }, 100)
            setTimeout(() => {
                toastAlertTag.style.top = '-200px';

            }, 2000)


        }
    </script>

</body>

</html>
