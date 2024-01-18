
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
    <title>Register</title>
</head>

<body style="background:url('{{asset('images/crystal.jpg')}}')">
    </div>

    <body class="pt-4">
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
                                <div class="login d-flex align-items-center py-5">
                                    <div class="container ">
                                        <div class="row">
                                            <div class="col-10 mx-auto">
                                                <h1 class="login-heading mb-4" style="color: #ffffff;">Register new account</h1>

                                                <!-- Sign In Form -->
                                                <form action="{{route('register')}}" method ='post' >
                                                    @csrf
                                                    <div class="form-floating mb-4">
                                                        <input type="text" class="form-control " id="a" name="name" placeholder="Username">
                                                        <label for="floatingInput">Username</label>
                                                    </div>
                                                    <div class="form-floating mb-4">
                                                        <input type="email" class="form-control" name="email" id="b" placeholder="name@example.com">
                                                        <label for="floatingInput">Email address</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" onkeyup='passConfirm1()'; pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$"  required>
                                                        <label for="floatingPassword">Password</label>
                                                        <input type="checkbox" class="text-white" onclick="myFunction()"><small style='font-size:10px' class="text-light"> Show Password</small><br>

                                                    </div>
                                                    <div class="form-floating mb-4">
                                                        <input type="password" class="form-control " name="password_confirmation" id="password_confirmation" placeholder="Retype Password" onkeyup='passConfirm()';>
                                                        <label for="floatingPassword">Retype Password</label>
                                                        <input type="checkbox"  onclick="myFunction1()"><small style='font-size:10px' class="text-light"> Show Password</small><br>
                                                        <span id="message"></span><br>

                                                    </div>



                                                    <div class="d-grid">
                                                        <button class="btn btn-lg btn-outline-light btn-login text-uppercase fw-bold mb-2" type="submit">Register</button>
                                                        <div class="text-center">

                                                            <a class="small" href="{{route('login')}}" style="color: white;">Sign in</a>
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
<script>
    const oldpwd= document.getElementById('inputName');
        const newpwd= document.getElementById('password');
        const confirmpwd= document.getElementById('password_confirmation');

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
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            }
            else{
                x.type="password";
            }
        }
        function myFunction1(){
        var y = document.getElementById("password_confirmation");

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