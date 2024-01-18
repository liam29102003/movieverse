<!DOCTYPE html>

<head>
    <meta charset="utf-8">


    <title>Request Page</title>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Aboreto&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{asset('dist/css/style.css')}}">
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


<body style="background-color: #003060;">
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
    <div class="card m-3" style="background-image: url('{{asset('images/wp9049818-films-4k-wallpapers.jpg')}}')">
        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-10 col-md-6 offset-md-3 offset-1">
                    <form class="mt-3 form" data-aos="fade-up" action="{{route('add#contact')}}" method="POST">
                        @csrf
                        <fieldset>
                            <legend>Request Your Favourites Here!</legend><br>

                            <div class="input-group mb-3">
                                <select class="form-select " aria-label="Default select example" id="type" name='type'>
                                    <option  value="null">Open this select menu</option>
                                    <option value="1">Movie Request</option>
                                    <option value="2">For Ads</option>
                                    <option value="3">For Suggestion</option>
                                    <option value="4">Something Else</option>
                                </select>
                                <button class="btn btn-primary" type="button" id="change" onclick="chooseType()">Change</button>
                            </div>
                            <label for="fname" class="form-label text-white">Name:</label>
                            <input type="text" class="form-control " size="15px" id="fname" name="fname" disabled>
                            <p class="error text-danger mt-0" id="nameerror" style="display:none">Name field is required</p>
                            <label for="Email" class="form-label mt-2 text-white">Email:     </label>
                            <input type="email" class="form-control" disabled id="email" size="30px" name="email" placeholder="Please enter your email address.">
                            <p class="error text-danger mt-0" id="emailerror" style="display:none">Email field is required</p>

                            <div id="toggle">
                                <label for="Mname" id="first" class="form-label mt-2 text-white"></label>
                                <input type="text" class="form-control" size="50 px" id="Mname" name="Mname">
                                <p class="error text-danger mt-0" id="Mnameerror" style="display:none">This field is required</p>

                            </div>




                            <label for="comment" id="second" class="form-label mt-2 text-white">What's on your mind?</label>
                            <textarea name="comment" id="comment" class="form-control" cols="30" rows="5">...</textarea><br>

                            <input type="reset" id="but" class="btn btn-outline-primary" value="reset">
                            <button type="submit" id="subm" class="btn btn-outline-primary"  onclick="func2(); return false">Submit
    </button>
                        </fieldset>

                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="{{asset('dist/js/request_page.js')}}">

    </script>
    <script src="{{asset('dist/js/home.js')}}">

    </script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1200,
        });
        function func2() {


if (fname.value == "") {
    nameerror.style.display = 'block';
} else {
    nameerror.style.display = 'none';
    document.getElementById("subm").setAttribute("onclick", "func2()");


}
if (email.value == "") {
    emailerror.style.display = 'block';
} else {
    emailerror.style.display = 'none';
    document.getElementById("subm").setAttribute("onclick", "func2()");


}
if (firstInput.value == "") {
    Mnameerror.style.display = "block"
} else {
    Mnameerror.style.display = "none";
    document.getElementById("subm").setAttribute("onclick", "func2()");



}
}
    </script>
</body>

</html>
