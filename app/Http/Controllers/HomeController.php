<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Anime;
use App\Models\Movies;
use App\Models\Tvshow;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\AnimeCategory;
use App\Models\TvshowCategory;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = auth()->user()->id;

        $data = User::where('id','=',$id)->first()->toArray();

        if(Auth::check()){
            if(Auth::user()->role =='admin'){
                return view('admin.profile.index')->with(['data'=>$data]);
            }
            else if(Auth::user()->role =='user'){
                $data = Movies::where('trending','=','0')->get();
        $data1 = Tvshow::where('trending','=','0')->get();

        $new = Movies::orderBy('release_date','asc')
        ->get();
        $new1 = Tvshow::orderBy('release_date','asc')
        ->get();
        $seriesdata= Tvshow::where('trending','=','0')->get();
        $animedata = Anime::where('trending','=','0')->get();
        $animedata = Anime::where('trending','=','0')->get();
                $catData1 = Category::get();
                $catData2 = TvshowCategory::get();
                $catData3 = AnimeCategory::get();
                return view('user.home')->with(['new'=>$new, 'new1'=>$new1, 'data'=>$data, 'data1'=>$data1, 'catData1'=>$catData1,'catData2'=>$catData2,'catData3'=>$catData3,'tvshow'=>$seriesdata,'anime'=>$animedata]);
}
        // return view('admin.profile.index')->with(['data'=>$data]);
        // return view('admin.profile.index');
    }
}}
