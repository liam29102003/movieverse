<?php

namespace App\Http\Controllers\admin;

use App\Models\Anime;
use App\Models\Episode;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\AnimeCategory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AnimeController extends Controller
{
    public function list(){
        // $data = Tvshow::orderBy('tvshows_id','asc')->paginate(10);
        // dd($data->toArray());
        $data = Anime::select('animes.anime_id','animes.trending','animes.anime_name','animes.poster',
        'animes.complete','animes.rating','animes.cast','animes.director','animes.award',
        'animes.release_date','animes.language','animes.review','animes.trailer','animes.category_id'
        ,DB::raw('COUNT(episodes.anime_id) as count'))->
                leftJoin('episodes','episodes.anime_id','animes.anime_id')->

                groupBy("animes.anime_id")->orderBy('anime_id','asc')
                ->paginate(10);
                // dd($data->toArray());
                $category = AnimeCategory::get();

        if(count($data)==0)
        $emptyStatus = 0;
        else
        $emptyStatus=1;
        return view('admin.anime.list')->with(['data'=>$data,'status'=>$emptyStatus,'heading'=>"Anime",'category'=>$category]);
       }
       public function namesort(){
        // dd($data->toArray());
        $data = Anime::select('animes.anime_id','animes.trending','animes.anime_name','animes.poster',
        'animes.complete','animes.rating','animes.cast','animes.director','animes.award',
        'animes.release_date','animes.language','animes.review','animes.trailer','animes.category_id'
        ,DB::raw('COUNT(episodes.anime_id) as count'))->
                leftJoin('episodes','episodes.anime_id','animes.anime_id')->
                groupBy("animes.anime_id")->orderBy('anime_name','asc')
                ->paginate(10);


        if(count($data)==0)
        $emptyStatus = 0;
        else
        $emptyStatus=1;
        return view('admin.anime.list')->with(['data'=>$data,'status'=>$emptyStatus,'heading'=>"Anime"]);

       }
       public function namesort1(){
        // dd($data->toArray());
        $data = Anime::select('animes.anime_id','animes.trending','animes.anime_name','animes.poster',
        'animes.complete','animes.rating','animes.cast','animes.director','animes.award',
        'animes.release_date','animes.language','animes.review','animes.trailer','animes.category_id'
        ,DB::raw('COUNT(episodes.anime_id) as count'))->
                leftJoin('episodes','episodes.anime_id','animes.anime_id')->
                groupBy("animes.anime_id")->orderBy('anime_name','desc')
                ->paginate(10);


        if(count($data)==0)
        $emptyStatus = 0;
        else
        $emptyStatus=1;
        return view('admin.anime.list')->with(['data'=>$data,'status'=>$emptyStatus,'heading'=>"Anime"]);

       }
       public function imdbsort(){
        $data = Anime::orderBy('rating','desc')->paginate(10);
        // dd($data->toArray());
        $data = Anime::select('animes.anime_id','animes.trending','animes.anime_name','animes.poster',
        'animes.complete','animes.rating','animes.cast','animes.director','animes.award',
        'animes.release_date','animes.language','animes.review','animes.trailer','animes.category_id'
        ,DB::raw('COUNT(episodes.anime_id) as count'))->
                leftJoin('episodes','episodes.anime_id','animes.anime_id')->
                groupBy("animes.anime_id")->orderBy('rating','asc')
                ->paginate(10);


        if(count($data)==0)
        $emptyStatus = 0;
        else
        $emptyStatus=1;
        return view('admin.anime.list')->with(['data'=>$data,'status'=>$emptyStatus,'heading'=>"Anime"]);

       }
       public function imdbsort1(){
        $data = Anime::orderBy('rating','desc')->paginate(10);
        // dd($data->toArray());
        $data = Anime::select('animes.anime_id','animes.trending','animes.anime_name','animes.poster',
        'animes.complete','animes.rating','animes.cast','animes.director','animes.award',
        'animes.release_date','animes.language','animes.review','animes.trailer','animes.category_id'
        ,DB::raw('COUNT(episodes.anime_id) as count'))->
                leftJoin('episodes','episodes.anime_id','animes.anime_id')->
                groupBy("animes.anime_id")->orderBy('rating','desc')
                ->paginate(10);


        if(count($data)==0)
        $emptyStatus = 0;
        else
        $emptyStatus=1;
        return view('admin.anime.list')->with(['data'=>$data,'status'=>$emptyStatus,'heading'=>"Anime"]);

       }
       public function idsort(){
        $data = Anime::orderBy('rating','desc')->paginate(10);
        // dd($data->toArray());
        $data = Anime::select('animes.anime_id','animes.trending','animes.anime_name','animes.poster',
        'animes.complete','animes.rating','animes.cast','animes.director','animes.award',
        'animes.release_date','animes.language','animes.review','animes.trailer','animes.category_id'
        ,DB::raw('COUNT(episodes.anime_id) as count'))->
                leftJoin('episodes','episodes.anime_id','animes.anime_id')->
                groupBy("animes.anime_id")->orderBy('anime_id','asc')
                ->paginate(10);


        if(count($data)==0)
        $emptyStatus = 0;
        else
        $emptyStatus=1;
        return view('admin.anime.list')->with(['data'=>$data,'status'=>$emptyStatus,'heading'=>"Anime"]);

       }
       public function idsort1(){
        $data = Anime::orderBy('rating','desc')->paginate(10);
        // dd($data->toArray());
        $data = Anime::select('animes.anime_id','animes.trending','animes.anime_name','animes.poster',
        'animes.complete','animes.rating','animes.cast','animes.director','animes.award',
        'animes.release_date','animes.language','animes.review','animes.trailer','animes.category_id'
        ,DB::raw('COUNT(episodes.anime_id) as count'))->
                leftJoin('episodes','episodes.anime_id','animes.anime_id')->
                groupBy("animes.anime_id")->orderBy('anime_id','desc')
                ->paginate(10);


        if(count($data)==0)
        $emptyStatus = 0;
        else
        $emptyStatus=1;
        return view('admin.anime.list')->with(['data'=>$data,'status'=>$emptyStatus,'heading'=>"Anime"]);

       }
       public function add(){
        $names = Anime::get();
        // dd($names->toArray());
        $data = AnimeCategory::get();

        return view('admin.anime.add')->with(['category'=>$data,'names'=>$names]);
    }
    public function edit($id){
        $category = AnimeCategory::get();
        // dd($category->toArray());
        $data = Anime::select('*')
                        ->join('anime_categories','animes.category_id','=','anime_categories.animeCategory_id')
                        ->where('anime_id','=',$id)
                        ->first();
// dd($data->toArray());

        return view('admin.anime.edit')->with(['data'=>$data, 'category'=>$category]);
    }
    public function insert(Request $request){
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name'=>'required',
             'Category'=>'required',
            'poster'=>'required',
            'background'=>'required',
            'rating'=>'required',
            'cast'=>'required',
            'director'=>'required',
            'award'=>'required',
            'releaseDate'=>'required',

            'trailer'=>'required',

            'language'=>'required',
            'review'=>'required'

        ]);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $file = $request->file('poster');
        $file2 = $request->file('background');

        // dd($file);
        $filename = uniqid().'_'.$file->getClientOriginalName();
        $filename2=uniqid().'_'.$file2->getClientOriginalName();
        $file->move(public_path().'/uploads/',$filename);
        $file2->move(public_path().'/uploads/',$filename2);

        $data = $this->createMovieData($request,$filename,$filename2);
        Anime::create($data);
        return redirect()->route('anime#list')->with(['addPizzaSuccess'=>'Pizza added successfully']);

    }
    public function delete($id){
        $data = Anime::select('poster')->where('anime_id','=',$id)->first();
// dd($data['poster']);

        $image = $data['poster'];

        Anime::where('anime_id','=',$id)->delete();
        if(File::exists(public_path().'/uploads/'.$image)){
            File::delete(public_path().'/uploads/'.$image);
        };

        return back()->with(['deleteSuccess'=>'Pizza delete successfully']);
    }
    public function details($id){
        $data = Anime::select('animes.anime_id','animes.anime_name','animes.poster',
        'animes.complete','animes.rating','animes.cast','animes.director','animes.award',
        'animes.release_date','animes.language','animes.review','animes.trailer','animes.category_id'
        ,DB::raw('COUNT(episodes.anime_id) as count'))->
                leftJoin('episodes','episodes.anime_id','animes.anime_id')->

                groupBy("animes.anime_id")->first();

        return view('admin.anime.details')->with(['data'=>$data]);
    }
    public function update($id,Request $request){
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name'=>'required',
             'Category'=>'required',
            // 'poster'=>'required',
            'rating'=>'required',
            'cast'=>'required',
            'director'=>'required',
            'award'=>'required',
            'releaseDate'=>'required',

            'trailer'=>'required',

            'language'=>'required',
            'review'=>'required'

        ]);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $updateData = $this->updateMoviesData($request);
        if(isset($updateData['poster'])){
            $data = Anime::where('anime_id','=',$id)->first();

            $filename = $data['poster'];
            if(File::exists(public_path().'/uploads/'.$filename)){
                File::delete(public_path().'/uploads/'.$filename);
            }
            $file = $request->file('poster');
            $filename=uniqid().'_'.$file->getClientOriginalName();
            $file->move(public_path().'/uploads/',$filename);
            $updateData['poster']=$filename;

        }
        if(isset($updateData['background'])){
            $data = Anime::where('anime_id','=',$id)->first();

            $filename2 = $data['background'];
            if(File::exists(public_path().'/uploads/'.$filename2)){
                File::delete(public_path().'/uploads/'.$filename2);
            }
            $file2 = $request->file('background');
            $filename2=uniqid().'_'.$file2->getClientOriginalName();
            $file2->move(public_path().'/uploads/',$filename2);
            $updateData['background']=$filename2;

        }

            Anime::where('anime_id','=',$id)->update($updateData);
            return redirect()->route('anime#list')->with(['success'=>'Pizza updated']);



    }
    public function search( Request $request){
        $searchData = Anime::orwhere('anime_name','like','%'.$request->table_search.'%')
                            // ->orwhere('','like','%'.$request->table_search.'%')
                            ->orwhere('cast','like','%'.$request->table_search.'%')
                            ->orwhere('director','like','%'.$request->table_search.'%')
                            ->orwhere('language','like','%'.$request->table_search.'%')

                            ->get();
        Session::put("TVSHOWS_LIST",$request->table_search);
        $searchData->append($request->all());
        if(count($searchData)==0)
        $emptyStatus=0;
        else
        $emptyStatus=1;
        return view('admin.anime.list')->with(['data'=>$searchData,'status'=>$emptyStatus]);
    }
    public function episodes(Request $request)
    {
        $names = Anime::get();
        // dd($names->toArray());
        return view('admin.anime.addEpi')->with(['names'=>$names]);
    }
    public function epiInsert(Request $request){
        // // dd($request->all());
        // $validator = Validator::make($request->all(), [
        //     'name'=>'required',
        //      'Category'=>'required',
        //     'poster'=>'required',
        //     'rating'=>'required',
        //     'cast'=>'required',
        //     'director'=>'required',
        //     'award'=>'required',
        //     'releaseDate'=>'required',

        //     'trailer'=>'required',

        //     'language'=>'required',
        //     'review'=>'required'

        // ]);

        // if ($validator->fails()) {
        //     return back()
        //                 ->withErrors($validator)
        //                 ->withInput();
        // }
        // $file = $request->file('poster');

        // dd($file);
        // $filename = uniqid().'_'.$file->getClientOriginalName();
        // $file->move(public_path().'/uploads/',$filename);
        $data = $this->insertEpisodeData($request);
        Episode::create($data);
        return redirect()->route('anime#list')->with(['addPizzaSuccess'=>'Pizza added successfully']);

    }
    public function episodes2($id){

        $data= Episode::where('tvshows_id','=',$id)->get();
        // dd($data[0]->tvshows_id);

        $names = Anime::where('anime_id','=',$data[0]->tvshows_id)->first();
        // dd($names->toArray());

        // dd($data->toArray());
        return view('admin.anime.episodes')->with(['data'=>$data,'names'=>$names]);
    }
    private function insertEpisodeData($request)
    {
        $arr=[
            'episodes_name'=>$request->name,
            'tvshows_id'=>$request->tvShows,
            // 'poster'=>$filename,
            'rating'=>$request->rating,
            'runtime'=>$request->runtime,
            'review'=>$request->review,
        ];
        return $arr;
    }
    private function updateMoviesData($request){
        $arr=[
            'anime_name'=>$request->name,
            'category_id'=>$request->Category,
            // 'poster'=>$filename,
            'rating'=>$request->rating,
            'cast'=>$request->cast,
            'director'=>$request->director,
            'award'=>$request->award,
            'trending'=>$request->trending,
            'release_date'=>$request->releaseDate,
            'complete'=>$request->complete,

            'language'=>$request->language,
            'trailer'=>$request->trailer,
            'review'=>$request->review,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ];
        if(isset($request->poster)){
            $arr['poster']=$request->poster;
        }
        if(isset($request->background)){
            $arr['background']=$request->background;
        }

        return $arr;
    }
    private function createMovieData($request,$filename,$filename2){
        return [
            'anime_name'=>$request->name,
            'category_id'=>$request->Category,
            'poster'=>$filename,
            'background'=>$filename2,
            'trending'=>$request->trending,
            'rating'=>$request->rating,
            'cast'=>$request->cast,
            'director'=>$request->director,
            'award'=>$request->award,
            'complete'=>$request->complete,
            'release_date'=>$request->releaseDate,

            'language'=>$request->language,
            'trailer'=>$request->trailer,
            'review'=>$request->review,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()

        ];
    }
}

