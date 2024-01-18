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

    <div class="content-wrapper">
        <section class="content">
          <div class="container-fluid">
            <div class="row mt-4">
              <div class="col-8 offset-3 ">
                <div class="col-md-9">
                    {{-- @if (Session::has('updateSuccess'))
                <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                    {{Session::get('updateSuccess')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div> --}}
                  @if (Session::has('passwordError'))
                  <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                      {{Session::get('passwordError')}}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  @endif
                  @if (Session::has('notSameError'))
                  <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                      {{Session::get('notSameError')}}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  @endif
                  @if (Session::has('lengthError'))
                  <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                      {{Session::get('lengthError')}}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  @endif
                  @if (Session::has('success'))
                  <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                      {{Session::get('success')}}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  @endif
                  <a href="{{route('update#profile')}}" class="mt-0" ><button class="btn text-white btn-sm" style="background-color: #003060"><i class="fa-solid fa-arrow-left"></i></button></a>

                  <div class="card mt-3" style='background:rgba(0, 48, 96, 0.6)'>
                    <div class="card-header p-2" style="  background-color:#003060">
                        <legend class="text-center text-white mb-0">Change Password</legend>
                    </div>
                    <div class="card-body text-light">
                      <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                            <form class="form-horizontal" action="{{route('profile#confirmPassword',auth()->user()->id)}}" method="POST"onsubmit="validate1()">
                                 @csrf

                                <label for="inputName" class="form-label mt-3 text-light">Old Password</label>

                                <input type="password" class="form-control " id="inputName" placeholder="Enter your old password" value="" name='oldPassword' required>
                                <input type="checkbox" onclick="myFunction2()"><small style='font-size:10px' > Show Password</small><br>




                                <label for="inputEmail" class="form-label mt-3 text-light">New Password</label>

                                <input type="password" class="form-control" id="inputEmail" placeholder="At least 1-digit,1-special character, 1-letter"required pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$"value="" name='newPassword'onkeyup='passConfirm1()';>
                                <input type="checkbox" onclick="myFunction()"><small style='font-size:10px' > Show Password</small><br>


                                <label for="inputPhone" class="form-label mt-3 text-light">Confirm Password</label>

                                <input type="password" class="form-control " id="inputPhone" placeholder="Re-type your password" value="" name='confirmPassword' onkeyup='passConfirm()';>
                                <input type="checkbox" onclick="myFunction1()"><small style='font-size:10px' > Show Password</small><br>
                                <span id="message"></span><br>

                                <button type="submit" class="btn  text-white float-right mt-3" style="background-color: #003060">Confirm</button>
                            </form>


                        <!-- Modal -->

                        </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <script type="text/javascript">
        const oldpwd= document.getElementById('inputName');
        const newpwd= document.getElementById('inputEmail');
        const confirmpwd= document.getElementById('inputPhone');

        var testnew=/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/ig;

        var passConfirm = function() {
             if (newpwd.value == confirmpwd.value) {
                 document.getElementById("message").style.color = "Green";
                 document.getElementById("message").innerHTML = "Passwords match!"
            }

            else {
                document.getElementById("message").style.color = "Red";
                document.getElementById("message").innerHTML = "Passwords do NOT match!"
            }
        }
        var passConfirm1 = function() {

            if(newpwd.value.length < 8)
            {
                document.getElementById("message").style.color = "Red";
                document.getElementById("message").innerHTML = "At least 8 characters!"
            }
            else
            {
                document.getElementById("message").innerHTML = ""

            }
        }
        function myFunction() {
            var x = document.getElementById("inputEmail");
            if (x.type === "password") {
                x.type = "text";
            }
            else{
                x.type="password";
            }
        }
        function myFunction1(){
        var y = document.getElementById("inputPhone");

        if(y.type==="password"){
            y.type="text";
        }
       else{
            y.type="password";
        }
    }
    function myFunction2(){
        var y = document.getElementById("inputName");

        if(y.type==="password"){
            y.type="text";
        }
       else{
            y.type="password";
        }
    }
    </script>
          </div>
        </section>
      </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
