@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        <div class="row mt-4">
          <div class="col-8 offset-3 mt-5">
            <a href="{{route('category#list')}}" class=""><button class="btn btn-sm text-white mb-2" style="background-color:#003060"><i class="fa-solid fa-arrow-left"></i></button></a>

            <div class="col-md-9">
              <div class="card">
                <div class="card-header text-light" style="background-color:#003060"><h3 style="text-align:center; ">Edit User</h3></div>

                <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                      <form class="form-horizontal" action="{{route('adminUser#update')}}" method="post">
                        @csrf
                        <input type="text" value="{{$data->id}}" hidden name="id">
                        <div class="form-group row mb-2">
                            <label for="inputName" class="col-sm-2 col-form-label">Role:</label>

                          <div class="col-sm-10">

                            <select name="role" id="" class="form-select">
                                @if($data->role=='user')
                                <option value="user" selected>User</option>
                                <option value="admin" >Admin</option>
                                @else
                                <option value="user">User</option>
                                <option value="admin" selected>Admin</option>
                                @endif
                            </select>
                          </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="inputPassword" class="col-sm-2 col-form-label d-none d-lg-block" style="color: #003060">Password:</label>
                            <div class="col-sm-10">
                              <input type="password" class="form-control" id="inputPassword" placeholder="Enter password" value="" name='password'>

                            </div>
                          </div>

                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                             <button type="submit" class="btn text-white float-right mt-3" style="background-color:#003060">Confirm</button>
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
@endsection
