@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        <div class="row mt-4">
          <div class="col-10 offset-1 col-md-6 offset-md-3 mt-5">

            @if (Session::has('passwordError'))
              <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                  {{Session::get('passwordError')}}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif
                @if (Session::has('updateSuccess'))
            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                {{Session::get('updateSuccess')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
              <div class="card" >
                <div class="card-header p-2" style="  background-color:#003060">
                  <legend class="text-center text-white mb-1" >User Profile</legend>
                </div>
                <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                      <form class="form-horizontal"  method="POST" action='{{route('profile#update',$data['id'])}}'>
                        @csrf
                        <div class="form-group row mb-2">
                          <label for="inputName" class="col-sm-2 col-form-label d-none d-lg-block" style="color: #003060">Name:</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputName" placeholder="Name" value="{{$data['name']}}" name='Name' required>
                        </div>
                        </div>
                        <div class="form-group row mb-2">
                          <label for="inputEmail" class="col-sm-2 col-form-label d-none d-lg-block" style="color: #003060">Email:</label>
                          <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail" placeholder="Email" value="{{$data['email']}}" name='Email' pattern="^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$" required>
                        </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="inputPassword" class="col-sm-2 col-form-label d-none d-lg-block" style="color: #003060">Password:</label>
                            <div class="col-sm-10">
                              <input type="password" class="form-control" id="inputPassword" placeholder="Enter password" value="" name='password' required>
                              <input type="checkbox" onclick="myFunction2()"><small style='font-size:10px' > Show Password</small><br>

                            </div>
                          </div>

                        <div class="form-group row">
                          <div class="offset-sm-2 col-10">
                           <!-- Button trigger modal -->
                                <a href="{{route('profile#changePassword')}}" class="text-primary"><div type="button"  class="text-primary mt-2 mb-2">
                                    Change Password
                                </div>
                            </a>
                                <!-- Modal -->
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn  text-white float-right" style = "background-color:#003060">Update</button>
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
    </section>
  </div>
  <script>
    function myFunction2(){
        var y = document.getElementById("inputPassword");

        if(y.type==="password"){
            y.type="text";
        }
       else{
            y.type="password";
        }
    }
  </script>
@endsection
