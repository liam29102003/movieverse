<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/12c38be203.js" crossorigin="anonymous"></script>

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('dist/css/movies.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/home copy.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif&display=swap" rel="stylesheet">
    <style>
        body{
            font-family: 'PT Serif', serif;

        }
         .nav-link:hover{
            background-color:#189AB4;
        }
        .nav-link{
            border-radius:5px;
        }
        .nav-menu{
            gap: 20px;
        }

        @media(max-width:768px) {

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
    .nav-item:hover{
        background-color: gray;

    }
}
    </style>
</head>

<body style="background-image: url('{{asset('images/pexels-pixabay-265685.jpg')}}'); background-size: cover;">
    <div class="main">
        <header>
            <nav class="navbar text-black">
                <div class="nav-branding">
                    <img src="{{asset('images/movieverse_logo.png')}}" alt="">
                    <a href=""  style="">Movieverse</a>
                </div>

                <ul class="nav-menu mt-1">
                    <li class="nav-item">
                        <a href="{{route('admin#profile')}}" class="nav-link text-white mt-2">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('category#list')}}" class="nav-link text-white mt-2">Category</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a href="{{route('movies#list')}}" class="nav-link text-white mt-2">Movies</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('tvshows#list')}}" class="nav-link text-white mt-2">Tv Shows</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('anime#list')}}" class="nav-link text-white mt-2">Anime</a>
                    </li> --}}

                    <li class="nav-item">
                        <a href="{{route('user#list')}}" class="nav-link text-white mt-2">Users</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('request#list')}}" class="nav-link text-white mt-2">Requests</a>
                    </li>
                    <li class="nav-item dropdown mt-2 btn " style="z-index:100; background-color :">
                        <a class=" dropdown-toggle bg-none" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Choose Type
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink" style="z-index:17; background-color: ">
                            <li><a class="dropdown-item " href="{{route('movies#list')}} " style="background-color:#003060">Movies</a></li>

                            <li><a class="dropdown-item" href="{{route('tvshows#list')}}" style="background-color:#003060">Tv Shows</a></li>
                        </ul>
                    </li>
                    <form action="{{route('logout')}}" method="POST" class="mt-2">
                        @csrf
                        <li class="nav-item">
                            <button class="btn text-white" type="submit"> Logout</button>
                        </li></form>



                </ul>
                <div class="hamburger">
                    <span class="bar"> </span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div>
            </nav>
        </header>

        @yield('content')
    </div>
    <script src="{{asset('dist/js/home.js')}}">

    </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>

</html>
