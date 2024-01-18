@extends('admin.layouts.app')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-6 offset-3">
            <a href="{{route('category#list')}}" class=""><button class="btn btn-sm text-light" style="background-color: #003060"><i class="fa-solid fa-arrow-left"></i></button></a>
            <div class="card  text-light mt-3">
                <div class="card-header text-light" style="background-color:#003060"><h3 style="text-align:center; ">Add AnimeCategory</h3></div>
                <div class="card-body">
                    <div id="error" class="alert alert-danger " style="display:none"><i class="fa-solid fa-circle-exclamation"></i>&nbsp;&nbsp;</div>
                    <form action="{{route('category#create')}}" method="POST" id="form" onsubmit = "return(validate())";>
                        @csrf
                        <div class="form-floating mb-3">
                            <input name="category" type="text" class="form-control" id="name" placeholder="Category">
                            <label for="name" class="text-dark">Category</label>
                          </div>
                          <button type="submit" class="btn text-light" style="float: right; background-color:#003060"><i class="fa-solid fa-check"></i></button>
                          <button type="reset" class="btn text-light" style="float: left; background-color:#003060"><i class="fa-solid fa-xmark"></i></button>

                    </form>
                </div>


            </div>
        </div>
    </div>
</div>
<script>
    const name = document.getElementById('name');
    const form = document.getElementById('form');
    const error = document.getElementById('error');
// form.addEventListener('submit', (e)=>{
    function validate(){


    let messages =[];

if(name.value === '' || name.value == null)
{
    messages.push('Name is required')
}
if(messages.length > 0)
{
    // e.preventDefault();
    error.appendChild(document.createTextNode(messages.join(", ")));
    error.style.display = 'block';
    return false;
}
return true;
}


    </script>

    {{-- <script type = "text/javascript">
        <!--
           // Form validation code will come here.
           function validate() {

              if( document.myForm.Name.value == "" ) {
                 alert( "Please provide your name!" );
                 document.myForm.Name.focus() ;
                 return false;

              }
              return( true );
            } --}}
@endsection
