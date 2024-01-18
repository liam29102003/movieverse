@extends('admin.layouts.app')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-6 offset-3">
            <a href="{{route('tvshows#list')}}" class=""><button class="btn btn-dark btn-sm text-white" style="background-color: #003060"><i class="fa-solid fa-arrow-left"></i></button></a>
            <div class="card bg-dark text-light mt-3">
                <div class="card-header text-light" style="background-color:#003060"><h3 style="text-align:center; ">Add Tv shows</h3></div>
                <div class="card-body bg-white">

                    <form action="{{route('episodes#insert')}}" method="POST" enctype="multipart/form-data" id='form' onsubmit = "return(validate2())";>
                        @csrf
                        <div class="form-floating mb-3">
                            <input name="name" type="text" class="form-control" id="name" placeholder="category">
                            <label for="floatingInput" class="text-dark">Episodes Title</label>
                          </div>
                            <select name="tvShows" id="tvShows" class="form-select mb-3">
                                <option value="null">Choose TV Shows</option>
                                @foreach ($names as $item )
                                @if($item->complete !== 1)
                                <option value="{{$item->tvshows_id}}">{{$item->tvshows_name}}</option>
                                @endif
                                @endforeach
                            </select>
                          <div class="input-group mb-3">
                            <span class="input-group-text text-white" style="background-color: #003060">IMDB</span>
                            <input type="" class="form-control" name='rating' id= 'rating'>
                          </div>

                          <div class="input-group mb-3">
                            <span class="input-group-text text-white" style="background-color: #003060">Runtime</span>
                            <input type="" class="form-control" name='runtime' id= 'runtime'>
                          </div>

                          <div class="input-group mb-3">
                            <span class="input-group-text text-white"style="background-color: #003060" >Release-date</span>
                            <input type="date" class="form-control" name="releaseDate" id = 'date'>

                          </div>
                          <textarea name="review" id="review" cols="30" rows="10" class="form-control mb-3" placeholder="Enter review">
                                Enter review Here
                          </textarea>

                          <div id="error" class="alert alert-danger " style="display:none"><i class="fa-solid fa-circle-exclamation"></i>&nbsp;&nbsp;</div>
                          <button type="submit" class="btn btn-success" style="float: right"><i class="fa-solid fa-check"></i></button>
                          <button type="reset" class="btn btn-danger" style="float: left"><i class="fa-solid fa-xmark"></i></button>

                    </form>
                </div>


            </div>
        </div>
    </div>
</div>
<script>
    const name = document.getElementById('name');
    const Category = document.getElementById('Category');
    const poster = document.getElementById('poster');
    const rating = document.getElementById('rating');
    const cast = document.getElementById('cast');
    const director = document.getElementById('director');
    const award = document.getElementById('award');
    const releaseDate = document.getElementById('date');
    const episodes = document.getElementById('episodes');
    const trailer = document.getElementById('trailer');
    const seasons = document.getElementById('seasons');
    const language = document.getElementById('language');
    const review = document.getElementById('review');

    // const form = document.getElementById('form');
    // const error = document.getElementById('error');
// form.addEventListener('submit', (e)=>{
    function validate2(){


    let messages =[];

if(name.value === '' || name.value == null)
{
    messages.push('Name is required')
}
if(Category.value === '' || Category.value === 'null')
{
    messages.push('Category is required')
}
if(rating.value === '' || rating.value == null)
{
    messages.push('Rating is required')
}
if(cast.value === '' || cast.value == null)
{
    messages.push('Cast is required')
}
if(director.value === '' || director.value == null)
{
    messages.push('Director is required')
}
if(award.value === '' || award.value == null)
{
    messages.push('Award is required')
}
if(releaseDate.value === '' || releaseDate.value == null)
{
    messages.push('Release Date is required')
}
if(episodes.value === '' || episodes.value == null)
{
    messages.push('Number of episodes is required')
}
if(trailer.value === '' || trailer.value == null)
{
    messages.push('Trailer link is required')
}
if(seasons.value === '' || seasons.value == null)
{
    messages.push('Number of seasons is required')
}
if(language.value === '' || language.value == null)
{
    messages.push('Language is required')
}
if(review.value === '' || review.value == null)
{
    messages.push('Review is required')
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


@endsection
