<!DOCTYPE html>
<html lang="eng">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.3.0/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('dist/css/home_style.css')}}">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Aboreto&display=swap" rel="stylesheet">
    <style>
         body{
            font-family: 'Aboreto', cursive;

        }
        .nav-link:hover{
            background-color:#189AB4;
        }
        .nav-link{
            border-radius:5px;
        }
     .resultContainer{
        /* height: 500px; */
        background-color: white;
    }
    .autoCompleteInput{
        border-bottom-left-radius: 0px;
        border-bottom-right-radius: 0px;

    }
    .productItemContainer{
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        padding: 0 10px;
        align-items: center;
        height: 50px;
        border-bottom: 1px solid lightgray;

    }
    .productName{
        font-size: 14px;
        width: 80%;
        color: black
    }
    </style>
</head>

<body class="main-body" style="background-image: url('{{asset('images/anime-school-couple-od.jpg')}}');
background-size: cover;">
    <!-- <nav id="navbar">
        <h1>MOVIESVERSE</h1>
        <ul class="nav-links" id="navMenu">
            <div class="nav-content">
                <li><a href=""><span style="color:antiquewhite">Movieverse</span></a></li>
                <li><a href="index.html">Home</a></li>
                <li><a href="movies.html">Movies</a></li>
                <li><a href="">TV-series</a></li>
                <li><a href="">Animes</a></li>
            </div>
        </ul>
    </nav> -->
    <header id='header'>
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
                    <a href="{{route('user#animes')}}" class="nav-link text-white mt-2">Animes</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('user#contact')}}" class="nav-link text-white mt-2">Requests</a>
                </li>
                <li class="nav-item">
                    <button class="btn btn-secondary mt-2 ps-2 pe-2 me-0 search" onclick="myFunction()"><i class="fa-solid fa-magnifying-glass"></i></button>
                </li>
                <form action="{{route('logout')}}" method="POST" class="mt-2">
                    @csrf
                    <li class="nav-item">
                        <button class="btn btn-secondary" type="submit">Logout</button>
                    </li>
                </form>
            </ul>
            <div class="hamburger">
                <span class="bar"> </span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>
    </header>
    <div class="container  " id="search">
        <div class="row height d-flex justify-content-center align-items-center">
            <div class="col-md-8">
                <form action="{{route('user#search')}}" method="get">
                <div class="search">
                    <i class="fa fa-search"></i>
                    <input type="text"  autocomplete = 'off' onfocus = "darken()" onblur = 'lighten()' onkeyup="auto(event)" class="form-control autoCompleteInput" placeholder="Search Movies, Series, Animes" name='user_search'>
                    <button class=" btn btn-primary ">search</button>
                    <div class="resultContainer"></div>

                </div>
            </form>
            </div>
            <!-- <div class="col-4">
            <button class="btn btn-primary">Quick Search</button>

        </div> -->
        </div>
    </div>
    <div class="card mt-3 m-4" id="movie-card">
        <div class="card-header">
            <div style="display:flex; justify-content: space-between;">
                <h2 class="">Movies</h2>
                <button class="mt-2 btn text-white">Total - {{$data->total()}}</button>
            </div>
        </div>
        <div class="card-body">
            <div class="line">
                <div class="movierow ">
                    @foreach ($data as $item)
                    <a class="column" style="position: relative;" href="{{route('user#moviesDetails',$item->anime_id)}}">
                        <div class="moviecard" onmouseover="myOpacity()" onmouseleave="myNoOpacity()">
                            <img src="{{asset('uploads/'.$item->poster)}}" alt=" " width="200px " height="300px " class="image ">
                            <p class="text-center p-1 ">{{$item->anime_name}}</p>
                        </div>
                    </a>
                    @endforeach



            </div>
        </div>

    </div>
    </div>


    <br>
    <hr>
    <!-- <div class="row">
        <div class="column">
            <img src="" alt="" width="200px" height="250px">
            <p>Bubble</p>
        </div>
        <div class="column">
            <img src="" alt="" width="200px" height="250px">
            <p>Bubble</p>
        </div>
        <div class="column">
            <img src="" alt="" width="200px" height="250px">
            <p>Bubble</p>
        </div>
        <div class="column">
            <img src="" alt="" width="200px" height="250px">
            <p>Bubble</p>
        </div>
    </div>
    <br>
    <hr>
    <div class="row">
        <div class="column">
            <img src="" alt="" width="200px" height="250px">
            <p>Bubble</p>
        </div>
        <div class="column">
            <img src="" alt="" width="200px" height="250px">
            <p>Bubble</p>
        </div>
        <div class="column">
            <img src="" alt="" width="200px" height="250px">
            <p>Bubble</p>
        </div>
        <div class="column">
            <img src="" alt="" width="200px" height="250px">
            <p>Bubble</p>
        </div>
    </div>
    <br>
    <hr> -->
</body>
<!-- MDB -->

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.3.0/mdb.min.js"></script>
<script type="text/javascript" src="{{asset('dist/js/home2.js')}}"></script>
<script>
    var data = {!! json_encode($data1->toArray(), JSON_HEX_TAG) !!};
    // var data = JSON.parse(sites);
    // document.write(data);
    const autoCompleteTag = document.getElementsByClassName('autoCompleteInput')[0];
    const resultItemContainer = document.getElementsByClassName('resultContainer')[0];
    let filteredProduct = [];

        function auto(event){
            console.log(event.key)
            if (
    event.key === "ArrowDown" ||
    event.key === "ArrowUp" ||
    event.key === "Enter"
  ) {
    navigateAndSelectProduct(event.key);
    return;
  }
            resultItemContainer.innerHTML = "";

            const search = event.target.value.toLowerCase();
            if(search.length === 0)
            {
                return;
            }
            filteredProduct = data.filter((datas) =>{
            return datas.movies_name.toLowerCase().includes(search);
            })
        //  console.log(filteredProduct[0].anime_id.toString());
        const hasProductToShow = filteredProduct.length > 0;
        // console.log(hasProductToShow);
        if(hasProductToShow){
            for(let i = 0; i<filteredProduct.length; i++)

            {
                const productItemContainer = document.createElement('div');
                productItemContainer.id = filteredProduct[i].anime_id;
                productItemContainer.classList.add('productItemContainer');

                const productName = document.createElement('div');
                productName.classList.add('productName');
                productName.append(filteredProduct[i].movies_name);

//                 const productImage = document.createElement("img");
//                 productImage.classList.add("productImage");
//                 // console.log(filteredProduct[i].poster)
//                 productImage.src = "{{asset('uploads/'." + filteredProduct[i].poster + ")}}" ;
// console.log(productImage.src);
                productItemContainer.append(productName);
                resultItemContainer.append(productItemContainer);
            }
        }
        }
        let indexToSelect = -1;
const navigateAndSelectProduct = (key) => {
  if (key === "ArrowDown") {
    if (indexToSelect === filteredProduct.length - 1) {
      indexToSelect = -1;
      deselectProduct();
      return;
    }
    indexToSelect += 1;
    const productItemContainerToSelect = selectProduct(indexToSelect);
    if (indexToSelect > 0) {
      deselectProduct();
    }
    productItemContainerToSelect.classList.add("selected");
  } else if (key === "ArrowUp") {
    if (indexToSelect === -1) {
      return;
    }

    if (indexToSelect === 0) {
      deselectProduct();
      indexToSelect = -1;
      return;
    }
    indexToSelect -= 1;
    deselectProduct();
    const productItemContainerToSelect = selectProduct(indexToSelect);
    productItemContainerToSelect.classList.add("selected");
  } else {
    const enteredProduct = selectProduct(indexToSelect);
    console.log("Entered product: ", enteredProduct);
  }
};

const selectProduct = (index) => {
  const productIdToSelect = filteredProduct[index].anime_id.toString();

  const productItemContainerToSelect = document.getElementById(
    productIdToSelect
  );
  productItemContainerToSelect.style.backgroundColor = "#237BFF";
  productItemContainerToSelect.firstChild.style.color = "white";
  autoCompleteTag.value = filteredProduct[index].movies_name;
  return productItemContainerToSelect;
};

const deselectProduct = () => {
  const productToDeselect = document.getElementsByClassName("selected")[0];
  productToDeselect.style.backgroundColor = "white";
  productToDeselect.firstChild.style.color = "black";
  productToDeselect.classList.remove("selected");
};
 function darken()
{
    document.querySelector('#movie-card').style.filter = 'brightness(50%)';
    document.querySelector('#header').style.filter = 'brightness(50%)';

}
function lighten()
{
    document.querySelector('#movie-card').style.filter = 'brightness(100%)';
    document.querySelector('#header').style.filter = 'brightness(100%)';


}

</script>

</html>
