<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Movies;
use App\Models\Episode;
use App\Models\Download;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DownloadController extends Controller
{
    public function insert(Request $request,$id){
        $moviedata = Movies::where('movies_id','=',$id)->first();

        $data = [
            'user_id'=>Auth::user()->id,
            "movies_id"=>$moviedata->movies_id,
        ];

        Download::create($data);
        return redirect()->route('user#moviesDetails',$id)->with(["categorySuccess"=>"Category Added......"]);
}
public function insertTvshows(Request $request,$id){
    $seriesdata = Episode::where('episodes_id','=',$id)->first();

    $data = [
        'user_id'=>Auth::user()->id,
        "movies_id"=>$seriesdata->episodes_id,
    ];

    Download::create($data);
    return redirect()->route('user#episodeDetails',$id)->with(["categorySuccess"=>"Category Added......"]);
}
public function userProfile($id)
{
    $user = User::where('id','=',$id)->first();
    $data = Download::select('*')->
    join('movies','movies.movies_id','downloads.movies_id')->where('user_id','=',$id)
    ->paginate(5);
    $data2 = Download::select('*')->
    join('episodes','episodes.episodes_id','downloads.movies_id')
    ->join('tvshows','tvshows.tvshows_id','episodes.episodes_id')->where('user_id','=',$id)
    ->get();
// dd($data2->toArray());

    return view('user.user')->with(['data'=>$data,'user'=>$user,'data2'=>$data2,]);
}
}
