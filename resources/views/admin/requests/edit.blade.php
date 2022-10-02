@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        <div class="row mt-4">
          <div class="col-8 offset-3 mt-5">
            <a href="" class=""><button class="btn btn-dark btn-sm"><i class="fa-solid fa-arrow-left"></i></button></a>

            <div class="col-md-9">
              <div class="card">
                <div class="card-header p-2">
                  <legend class="text-center">Edit User</legend>
                </div>
                <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                      <form class="form-horizontal" action="" method="POST">
                        @csrf
                        <input type="text" value="" hidden name="id">
                        <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">Role</label>
                          <div class="col-sm-10">
                            <select name="" id="" class="form-select">
                                <option value="1">User</option>
                                <option value="2">Admin</option>
                            </select>
                          </div>
                        </div>

                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                             <button type="submit" class="btn bg-dark text-white float-right">Confirm</button>
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

