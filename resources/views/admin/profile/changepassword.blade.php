@extends('admin.layouts.app')
@section('content')
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
              <a href="{{route('admin#profile')}}" class="mt-0" ><button class="btn text-white btn-sm" style="background-color: #003060"><i class="fa-solid fa-arrow-left"></i></button></a>

              <div class="card mt-3">
                <div class="card-header p-2" style="  background-color:#003060">
                    <legend class="text-center text-white mb-0">Change Password</legend>
                </div>
                <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                        <form class="form-horizontal" action="{{route('profile#confirmPassword',auth()->user()->id)}}" method="POST"onsubmit="validate1()">
                            @csrf

                            <label for="inputName" class="form-label mt-3">Old Password</label>

                                <input type="password" class="form-control " id="inputName" placeholder="Enter your old password" value="" name='oldPassword' required>
                                <input type="checkbox" onclick="myFunction2()"><small style='font-size:10px' > Show Password</small><br>




                                <label for="inputEmail" class="form-label mt-3">New Password</label>

                                <input type="password" class="form-control" id="inputEmail" placeholder="At least 1-digit,1-special character, 1-letter"required pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$"value="" name='newPassword'onkeyup='passConfirm1()';>
                                <input type="checkbox" onclick="myFunction()"><small style='font-size:10px' > Show Password</small><br>


                                <label for="inputPhone" class="form-label mt-3">Confirm Password</label>

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


@endsection
