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

<body class="main-body" style="background-image: url('{{asset('images/crystal.jpg')}}'); background-size:cover; background-position: center">
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

    <div class="container">
        <div class="row">
            <div class="col-6 offset-3">
                <div class="card mt-3" style='background:rgba(0, 48, 96, 0.8)'>
                    <div class="card-header text-center" >
                        <h3 class="mb-1 text-white">Your Profile</h3>
                    </div>
                    <div class="card-body text-center text-light">
                        <div class="mb-2"><label for="" class="fw-bolder">Name : </label><label for="">{{$user->name}}</label></div>
                        <div class="mb-2"><label for="" class="fw-bolder">Email : </label><label for="" style=''>{{$user->email}}</label></div>
                        <div class="mb-2"><label for="" class="fw-bolder">Register at : </label><label for="">{{$user->created_at}}</label></div>

                    </div>
                    <div class="card-footer text-center">
<a href="{{route('update#profile')}}"><button class="btn"><i class="fa-solid fa-pen-to-square"></i> Edit</button></a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-3">
        <div class="row">
            <div class="col-6 offset-3" >
                <h2 class="text-center card text-light p-2" style="background-color:#040f4b">Download History</h2>
                @foreach($data as $item)
                <a href="{{route('user#moviesDetails',$item->movies_id)}}"><div class="card pt-2 ps-2 border border-2 mb-2" style='background:rgba(0, 48, 96, 0.8)'>
                    <div style="display: flex; justify-content:space-between" class=" text-white">
                    <p class="mt-2">{{$item->movies_name}}</p>
                    <p class="mt-2 me-2">{{$item->updated_at}}</p>
                </div>
            </a>
                </div>
                @endforeach
                @foreach($data2 as $item2)
                <a href="{{route('user#episodeDetails',$item2->episodes_id)}}"><div class="card pt-2 ps-2 border border-2 mb-2" style='background:rgba(0, 48, 96, 0.8)'>
                    <div style="display: flex; justify-content:space-between" class=" text-white">
                    <p class="mt-2">{{$item2->tvshows_name}}</p>

                    <p class="mt-2 me-2">{{$item2->updated_at}}</p>
                </div>
            </a>
                </div>
                @endforeach
            </div>

        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
