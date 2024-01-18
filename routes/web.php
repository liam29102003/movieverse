<?php

use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyLoginController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\AnimeController;
use App\Http\Controllers\admin\MovieController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\admin\RequestController;
use App\Http\Controllers\admin\TvshowsController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\User\ClientMoviesController;
use App\Http\Controllers\admin\AnimeCategoryController;
use App\Http\Controllers\admin\TvshowCategoryController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/welcome', function () {
    // $data = review::select()->
    //     join('users','users.id','reviews.user_id')
    //     ->get();
    // dd($data->toArray());
    return view('welcome');
})->name('welcome');
Route::get('/home', function () {
    // $data = review::select()->
    //     join('users','users.id','reviews.user_id')
    //     ->get();
    // dd($data->toArray());
    if(Auth::user()->role =='admin')
    {
        return redirect()->route('category#list');
    }else
    {
        return redirect()->route('user#movies');

    }
})->name('welcome');
Route::get('/', function () {
    // $data = review::select()->
    //     join('users','users.id','reviews.user_id')
    //     ->get();
    // dd($data->toArray());
    return view('dashboard');
})->name('welcome');
Route::get('/dashboard', function () {
   dd('hello');
 })->name('dashboard');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'admin', 'namespace'=>'admin'],function(){
    Route::get('categoryList',[CategoryController::class,'list'])->name('category#list');
    Route::get('categoryAdd',[CategoryController::class,'add'])->name('category#add');
    Route::post('createCategory',[CategoryController::class,'create'])->name('category#create');
    Route::get('categoryDelete/{id}',[CategoryController::class,'delete'])->name('category#delete');
    Route::get('editCategory/{id}',[CategoryController::class,'edit'])->name('category#edit');
    Route::post('updateCategory',[CategoryController::class,'update'])->name('category#update');
    Route::get('searchCategory',[CategoryController::class,'search'])->name('category#search');
    Route::get('itemCategory/{id}',[CategoryController::class,'categoryItem'])->name('category#item');


    Route::get('animeCategoryList',[AnimeCategoryController::class,'list'])->name('animeCategory#list');
    Route::get('animeCategoryAdd',[AnimeCategoryController::class,'add'])->name('animeCategory#add');
    Route::post('createAnimeCategory',[AnimeCategoryController::class,'create'])->name('animeCategory#create');
    Route::get('animeCategoryDelete/{id}',[AnimeCategoryController::class,'delete'])->name('animeCategory#delete');
    Route::get('editAnimeCategory/{id}',[AnimeCategoryController::class,'edit'])->name('animeCategory#edit');
    Route::post('updateAnimeCategory',[AnimeCategoryController::class,'update'])->name('animeCategory#update');
    Route::get('searchAnimeCategory',[AnimeCategoryController::class,'search'])->name('animeCategory#search');

    Route::get('tvshowCategoryList',[TvshowCategoryController::class,'list'])->name('tvshowCategory#list');
    Route::get('tvshowCategoryAdd',[TvshowCategoryController::class,'add'])->name('tvshowCategory#add');
    Route::post('createTvshowCategory',[TvshowCategoryController::class,'create'])->name('tvshowCategory#create');
    Route::get('tvshowCategoryDelete/{id}',[TvshowCategoryController::class,'delete'])->name('tvshowCategory#delete');
    Route::get('editTvshowCategory/{id}',[TvshowCategoryController::class,'edit'])->name('tvshowCategory#edit');
    Route::post('updateTvshowCategory',[TvshowCategoryController::class,'update'])->name('tvshowCategory#update');
    Route::get('searchTvshowCategory',[TvshowCategoryController::class,'search'])->name('tvshowCategory#search');


    // Route::post('update/{id}',[ProfileController::class,'update'])->name('profile#update');
    Route::get('changePassword',[ProfileController::class,'changePassword'])->name('profile#changePassword');
    Route::post('confirmPassword/{id}',[ProfileController::class,'confirmPassword'])->name('profile#confirmPassword');
    // Route::post('update/{id}',[ProfileController::class,'update'])->name('profile#update');

    Route::get('userList',[UserController::class,'userlist'])->name('user#list');
    Route::get('adminList',[UserController::class,'adminlist'])->name('admin#list');
    Route::get('editUser/{id}',[UserController::class,'editUser'])->name('adminUser#edit');
    Route::get('userlist/search',[UserController::class,'searchUser'])->name('user#search2');
    Route::get('adminlist/search',[UserController::class,'searchAdmin'])->name('admin#search');
    Route::get('deleteUser/{id}',[UserController::class,'deleteUser'])->name('adminUser#delete');
    Route::post('update',[UserController::class,'changeRole'])->name('adminUser#update');

    Route::get('requestList',[RequestController::class,'list'])->name('request#list');
    Route::get('deleteContact/{id}',[RequestController::class,'delete'])->name('delete#contact');
    Route::get('requestSearch',[RequestController::class,'search'])->name('contact#search');

    Route::get('moviesListsortByRating',[MovieController::class,'sortByRating'])->name('movies#sortByRating');
    Route::get('moviesListsortByRating1',[MovieController::class,'sortByRating1'])->name('movies#sortByRating1');
    Route::get('moviesListsortById',[MovieController::class,'sortById'])->name('movies#sortById');
    Route::get('moviesListsortById1',[MovieController::class,'sortById1'])->name('movies#sortById1');
    Route::get('moviesListsortByMovie',[MovieController::class,'sortByMovie'])->name('movies#sortByMovie');
    Route::get('moviesListsortByMovie1',[MovieController::class,'sortByMovie1'])->name('movies#sortByMovie1');
    Route::get('moviesList',[MovieController::class,'list'])->name('movies#list');
    Route::get('moviesadd',[MovieController::class,'add'])->name('movies#add');
    Route::post('moviesinsert',[MovieController::class,'insert'])->name('movies#insert');
    Route::get('moviesdelete/{id}',[MovieController::class,'delete'])->name('movies#delete');
    Route::get('moviesdetails/{id}',[MovieController::class,'details'])->name('movies#details');
    Route::get('moviesedit/{id}',[MovieController::class,'edit'])->name('movies#edit');
    Route::post('moviesupdate/{id}',[MovieController::class,'update'])->name('movies#update');
    Route::get('moviessearch',[MovieController::class,'search'])->name('movies#search');

    // Route::get('moviesdetails/{id}',[Moviecontroller::class,'details'])->name('movies#details');



    Route::get('episodesAdd',[TvshowsController::class,'episodes'])->name('episodes#add');
    Route::post('episodesInsert',[TvshowsController::class,'epiInsert'])->name('episodes#insert');
    Route::get('namesort',[TvshowsController::class,'namesort'])->name('name#sort');
    Route::get('imdbsort',[TvshowsController::class,'imdbsort'])->name('imdb#sort');
    // Route::get('episodesAdd',[TvshowsController::class,'episodes'])->name('episodes#add');
    // Route::get('episodesAdd',[TvshowsController::class,'episodes'])->name('episodes#add');

    Route::get('tvshowsList',[TvshowsController::class,'list'])->name('tvshows#list');
    Route::get('tvshowsadd',[TvshowsController::class,'add'])->name('tvshows#add');
    Route::post('tvshowsinsert',[TvshowsController::class,'insert'])->name('tvshows#insert');
    Route::get('tvshowsdelete/{id}',[TvshowsController::class,'delete'])->name('tvshows#delete');
    Route::get('tvshowsedit/{id}',[TvshowsController::class,'edit'])->name('tvshows#edit');
    Route::post('tvshowsupdate/{id}',[TvshowsController::class,'update'])->name('tvshows#update');
    Route::get('tvshowssearch',[TvshowsController::class,'search'])->name('tvshows#search');
    Route::get('tvshowssdetails/{id}',[TvshowsController::class,'details'])->name('tvshows#details');
    Route::get('tvshowssepisodes/{id}',[TvshowsController::class,'episodes2'])->name('tvshows#episodes');

    Route::get('profile',[ProfileController::class,'profile'])->name('admin#profile');
    Route::post('update/{id}',[ProfileController::class,'update'])->name('profile#update');


    Route::get('episodesAdd',[TvshowsController::class,'episodes'])->name('episodes#add');
    Route::post('episodesInsert',[TvshowsController::class,'epiInsert'])->name('episodes#insert');
    Route::get('tvnamesort',[TvshowsController::class,'namesort'])->name('tvshowsname#sort');
    Route::get('tvnamesort1',[TvshowsController::class,'namesort1'])->name('tvshowsname#sort1');
    Route::get('tvimdbsort',[TvshowsController::class,'imdbsort'])->name('tvshowsimdb#sort');
    Route::get('tvimdbsort1',[TvshowsController::class,'imdbsort1'])->name('tvshowsimdb#sort1');
    Route::get('tvidsort',[TvshowsController::class,'idsort'])->name('tvshowsid#sort');
    Route::get('tvidsort1',[TvshowsController::class,'idsort1'])->name('tvshowsid#sort1');
    // Route::get('episodesAdd',[TvshowsController::class,'episodes'])->name('episodes#add');
    // Route::get('episodesAdd',[TvshowsController::class,'episodes'])->name('episodes#add');

    Route::get('animeList',[AnimeController::class,'list'])->name('anime#list');
    Route::get('animeadd',[AnimeController::class,'add'])->name('anime#add');
    Route::post('animeinsert',[AnimeController::class,'insert'])->name('anime#insert');
    Route::get('animedelete/{id}',[AnimeController::class,'delete'])->name('anime#delete');
    Route::get('animeedit/{id}',[AnimeController::class,'edit'])->name('anime#edit');
    Route::post('animeupdate/{id}',[AnimeController::class,'update'])->name('anime#update');
    Route::get('animesearch',[AnimeController::class,'search'])->name('anime#search');
    Route::get('animesdetails/{id}',[AnimeController::class,'details'])->name('anime#details');
    Route::get('animesepisodes/{id}',[AnimeController::class,'episodes2'])->name('anime#episodes');
    Route::get('namesort',[AnimeController::class,'namesort'])->name('animename#sort');
    Route::get('namesort1',[AnimeController::class,'namesort1'])->name('animename#sort1');
    Route::get('imdbsort',[AnimeController::class,'imdbsort'])->name('animeimdb#sort');
    Route::get('imdbsort1',[AnimeController::class,'imdbsort1'])->name('animeimdb#sort1');
    Route::get('idsort',[AnimeController::class,'idsort'])->name('animeid#sort');
    Route::get('idsort1',[AnimeController::class,'idsort1'])->name('animeid#sort1');
});
Route::group(['prefix'=>'User', 'namespace'=>'User'],function(){
    Route::get('userMovies',[ClientMoviesController::class,'movies'])->name('user#movies');
    Route::get('userTvshows',[ClientMoviesController::class,'tvshows'])->name('user#tvshows');
    Route::get('userAnimes',[ClientMoviesController::class,'animes'])->name('user#animes');
    Route::get('userHome',[ClientMoviesController::class,'home'])->name('user#home');

    Route::get('userMoviesDetails/{id}',[ClientMoviesController::class,'movieDetails'])->name('user#moviesDetails');
    Route::post('addContact',[ClientMoviesController::class,'addContact'])->name('add#contact');
    Route::get('userContact',[ClientMoviesController::class,'userContact'])->name('user#contact');
    Route::get('movie/search/{id}',[ClientMoviesController::class,'moviesearch'])->name('user#moviesearch');
    Route::get('tvshows/search/{id}',[ClientMoviesController::class,'tvshowsearch'])->name('user#tvshowsearch');
    Route::get('anime/search/{id}',[ClientMoviesController::class,'animesearch'])->name('user#animesearch');
    Route::get('anime/searchDate',[ClientMoviesController::class,'searchByDate'])->name('user#searchDate');
    Route::get('usersearch',[ClientMoviesController::class,'userSearch'])->name('user#search');
    Route::get('userTvshowDetails/{id}',[ClientMoviesController::class,'tvshowDetails'])->name('user#tvshowDetails');
    Route::get('userepisodeDetails/{id}',[ClientMoviesController::class,'episodeDetails'])->name('user#episodeDetails');
    Route::get('anime/searchRating',[ClientMoviesController::class,'searchByRating'])->name('user#searchRating');
    Route::get('addReview',[ClientMoviesController::class,'addReview'])->name('add#review');
    Route::post('insertReview/{id}',[ClientMoviesController::class,'insertReview'])->name('insert#review');
    Route::get('updateProfile',[ClientMoviesController::class,'updateProfile'])->name('update#profile');
    Route::get('updatepass',[ClientMoviesController::class,'updatePassword'])->name('user#changePassword');
    // Route::get('/',[ClientMoviesController::class,'welcome'])->name('welcome');
    Route::get('back',[ClientMoviesController::class,'back'])->name('user#back');


});
Route::post('download2/{id}',[DownloadController::class,'insertTvshows'])->name('download#insert2');

Route::post('download/{id}',[DownloadController::class,'insert'])->name('download#insert');
Route::get('userProfile/{id}',[DownloadController::class,'userProfile'])->name('user#profile');

Route::get('login1',[MyLoginController::class,'login'])->name('my#login');
Route::post('loginProcess',[MyLoginController::class,'loginProcess'])->name('my#loginProcess');

