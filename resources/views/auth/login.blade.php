{{--
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="dist/css/login.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-6 offset-3">
                <div class="card mt-5">
                    <form action="{{route('login')}}" method="POST">
                        @csrf
                        <div class="user-box form-floating mb-3 mt-3">
                            <input id="email" type="email" class="form-control" placeholder="Email" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            <label for="email">Username</label>
                        </div>
                        <div class="user-box form-floating">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password" autofocus>
                            <label for="password">Password</label>
                        </div>
                        <button type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html> --}}
{{-- <html>

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="{{asset('dist/css/login copy.css')}}">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <style>
        legend {
    font-size: 200%;
    text-align: center;
    font-family: cursive, Cochin, Georgia, Times, 'Times New Roman', serif;
    color: #003060;
}
legend span {
    color: white;
    font-size: 100%;
    /* font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; */
}
    </style>
</head>

<body class="body" style="background-image: url('{{asset('images/viber_image_2022-07-16_18-11-41-085.jpg')}}');
background-size:cover;">
                    <form action="{{route('login')}}" method="POST" data-aos='fade-down'>
        @csrf
        <fieldset style="background-image: url('{{asset('images/movie.png')}}');">
            <legend><span>Welcome to </span>Movieverse</legend>
            <img src="{{asset('images/Movieverse (3).png')}}" alt="">
            <div class="box">
                <input type="text" placeholder="Enter your email" name="email" class="email" required value="{{ old('email') }}" required autocomplete="email" autofocus>
            </div><br>
            <div class="box">
                <input type="password" placeholder="Enter your password" name="password" class="pwd" required>
            </div>
            <button type="submit" class="btn1">Log in</button>
            <a href="{{route('welcome')}}"><button type="button" class="btn2">Back</button></a>
            <br><br>
            <div class="create">
                <div class="">
                    <a href={{route('password.request')}}><span>Forgot password?</span></a>
                </div>
                <div class="">
                    <a href={{route('register')}}><span>Create an account.</span></a>
                </div>
            </div>
        </fieldset>



    </form>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1200,
        });
    </script>
</body>

</html> --}}

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('dist/css/login_page.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif&display=swap" rel="stylesheet">
    <title>Login</title>
</head>

<body class="pt-4" style="background:url('{{asset('images/crystal.jpg')}}')">
    <div class="container">
        <div class="row">
            <div class="col-12 ">
                <div class="card">

                    <div class="row g-0">

                        <div class="d-none d-md-flex col-md-4 col-lg-8 bg-image" style="display:  flex; justify-content:center; align-items:center">
                            <div class="text-white" style=""><img src="{{asset('images/movieverse_logo.png')}}" alt="" width=150 style="margin-bottom:10px; position: relative; top:-20px; left:30px">
                                <span style="font-size: 80px;">MovieVerse</span>
                            </div>
                        </div>

                        <div class="col-md-8 col-lg-4  login1">


                            <div class="login  d-flex align-items-center py-5" style="">
                                <div class="container ">
                                    <div class="row">
                                        <div class="col-11 mx-auto">
                                            <h1 class="login-heading mb-4" style="color: #ffffff;">Welcome back!</h1>
                                            @if (Session::has('error'))
                                            <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                                                {{Session::get('error')}}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                              </div>
                                            @endif
                                            <!-- Sign In Form -->
                                            <form action="{{route('login')}}" method="POST" data-aos='fade-down'>
                                                @csrf

                                                <div class="form-floating mb-4 ">
                                                    <input type="email " class="form-control " id="floatingInput " placeholder="name@example.com " name='email' pattern="^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$" required>
                                                    <label for="floatingInput ">Email address</label>
                                                </div>
                                                <div class="form-floating mb-4 ">
                                                    <input type="password" class="form-control" id="password" placeholder="Password " name='password' required>
                                                    <label for="floatingPassword ">Password</label>
                                                    <input type="checkbox"  onclick="myFunction1()"><small style='font-size:10px' class="text-light"> Show Password</small><br>

                                                </div>

                                                <div class="form-check mb-3 ">
                                                    <input class="form-check-input " type="checkbox" value=" " id="rememberPasswordCheck ">
                                                    <label class="form-check-label " for="rememberPasswordCheck " style="color: #ffffff; ">
                                                    Remember password
                                                </label>
                                                </div>

                                                <div class="d-grid ">
                                                    <button class="btn btn-lg btn-outline-light btn-login text-uppercase fw-bold mb-2 " type="submit ">Sign in</button>
                                                    <div class="text-center ">
                                                        <a class="small " href="{{route('password.request')}}" style="color: white; ">Forgot password?</a>
                                                        <a class="small " href="{{route('register')}}" style="color: white; ">Register</a>

                                                    </div>
                                                </div>


                                            </form>
                                        </div>

                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
    function myFunction1(){
        var y = document.getElementById("password");

        if(y.type==="password"){
            y.type="text";
        }
       else{
            y.type="password";
        }
    }
</script>
</body>

</html>
