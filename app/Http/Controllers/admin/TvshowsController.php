<?php

namespace App\Http\Controllers\admin;

use App\Models\Tvshow;
use App\Models\Episode;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\TvshowCategory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class TvshowsController extends Controller
{
    public function list(){
        // $data = Tvshow::orderBy('tvshows_id','asc')->paginate(10);
        // dd($data->toArray());
        $data = Tvshow::select('tvshows.tvshows_id','tvshows.tvshows_name','tvshows.poster',
        'tvshows.complete','tvshows.rating','tvshows.cast','tvshows.director','tvshows.trending','tvshows.award',
        'tvshows.release_date','tvshows.language','tvshows.review','tvshows.trailer','tvshows.category_id'
        ,DB::raw('COUNT(episodes.tvshows_id) as count'))->
                leftJoin('episodes','episodes.tvshows_id','tvshows.tvshows_id')->

                groupBy("tvshows.tvshows_id")->orderBy('tvshows_id','asc')
                ->paginate(10);
                // dd($data->toArray());
                $category = TvshowCategory::get();
        if(count($data)==0)
        $emptyStatus = 0;
        else
        $emptyStatus=1;
        return view('admin.tv shows.list')->with(['category'=>$category,'data'=>$data,'status'=>$emptyStatus,'heading'=>"Tv Shows"]);
       }
       public function namesort(){
        // dd($data->toArray());
        $data = Tvshow::select('tvshows.tvshows_id','tvshows.trending','tvshows.tvshows_name','tvshows.poster',
        'tvshows.complete','tvshows.rating','tvshows.cast','tvshows.director','tvshows.award',
        'tvshows.release_date','tvshows.language','tvshows.review','tvshows.trailer','tvshows.category_id'
        ,DB::raw('COUNT(episodes.tvshows_id) as count'))->
                leftJoin('episodes','episodes.tvshows_id','tvshows.tvshows_id')->
                groupBy("tvshows.tvshows_id")->orderBy('tvshows_name','asc')
                ->paginate(10);
                $category = TvshowCategory::get();


        if(count($data)==0)
        $emptyStatus = 0;
        else
        $emptyStatus=1;
        return view('admin.tv shows.list')->with(['category'=>$category,'data'=>$data,'status'=>$emptyStatus,'heading'=>"Tv Shows"]);

       }
       public function namesort1(){
        // dd($data->toArray());
        $data = Tvshow::select('tvshows.tvshows_id','tvshows.trending','tvshows.tvshows_name','tvshows.poster',
        'tvshows.complete','tvshows.rating','tvshows.cast','tvshows.director','tvshows.award',
        'tvshows.release_date','tvshows.language','tvshows.review','tvshows.trailer','tvshows.category_id'
        ,DB::raw('COUNT(episodes.tvshows_id) as count'))->
                leftJoin('episodes','episodes.tvshows_id','tvshows.tvshows_id')->
                groupBy("tvshows.tvshows_id")->orderBy('tvshows_name','desc')
                ->paginate(10);

                $category = TvshowCategory::get();

        if(count($data)==0)
        $emptyStatus = 0;
        else
        $emptyStatus=1;
        return view('admin.tv shows.list')->with(['category'=>$category,'data'=>$data,'status'=>$emptyStatus,'heading'=>"Tv Shows"]);

       }
       public function imdbsort(){
        $data = Tvshow::orderBy('rating','desc')->paginate(10);
        // dd($data->toArray());
        $data = Tvshow::select('tvshows.tvshows_id','tvshows.trending','tvshows.tvshows_name','tvshows.poster',
        'tvshows.complete','tvshows.rating','tvshows.cast','tvshows.director','tvshows.award',
        'tvshows.release_date','tvshows.language','tvshows.review','tvshows.trailer','tvshows.category_id'
        ,DB::raw('COUNT(episodes.tvshows_id) as count'))->
                leftJoin('episodes','episodes.tvshows_id','tvshows.tvshows_id')->
                groupBy("tvshows.tvshows_id")->orderBy('rating','asc')
                ->paginate(10);

                $category = TvshowCategory::get();

        if(count($data)==0)
        $emptyStatus = 0;
        else
        $emptyStatus=1;
        return view('admin.tv shows.list')->with(['category'=>$category,'data'=>$data,'status'=>$emptyStatus,'heading'=>"Tv Shows"]);

       }
       public function imdbsort1(){
        $data = Tvshow::orderBy('rating','desc')->paginate(10);
        // dd($data->toArray());
        $data = Tvshow::select('tvshows.tvshows_id','tvshows.trending','tvshows.tvshows_name','tvshows.poster',
        'tvshows.complete','tvshows.rating','tvshows.cast','tvshows.director','tvshows.award',
        'tvshows.release_date','tvshows.language','tvshows.review','tvshows.trailer','tvshows.category_id'
        ,DB::raw('COUNT(episodes.tvshows_id) as count'))->
                leftJoin('episodes','episodes.tvshows_id','tvshows.tvshows_id')->
                groupBy("tvshows.tvshows_id")->orderBy('rating','desc')
                ->paginate(10);

                $category = TvshowCategory::get();

        if(count($data)==0)
        $emptyStatus = 0;
        else
        $emptyStatus=1;
        return view('admin.tv shows.list')->with(['category'=>$category,'data'=>$data,'status'=>$emptyStatus,'heading'=>"Tv Shows"]);

       }
       public function idsort(){
        $data = Tvshow::orderBy('rating','desc')->paginate(10);
        // dd($data->toArray());
        $data = Tvshow::select('tvshows.tvshows_id','tvshows.trending','tvshows.tvshows_name','tvshows.poster',
        'tvshows.complete','tvshows.rating','tvshows.cast','tvshows.director','tvshows.award',
        'tvshows.release_date','tvshows.language','tvshows.review','tvshows.trailer','tvshows.category_id'
        ,DB::raw('COUNT(episodes.tvshows_id) as count'))->
                leftJoin('episodes','episodes.tvshows_id','tvshows.tvshows_id')->
                groupBy("tvshows.tvshows_id")->orderBy('tvshows_id','asc')
                ->paginate(10);

                $category = TvshowCategory::get();

        if(count($data)==0)
        $emptyStatus = 0;
        else
        $emptyStatus=1;
        return view('admin.tv shows.list')->with(['category'=>$category,'data'=>$data,'status'=>$emptyStatus,'heading'=>"Tv Shows"]);

       }
       public function idsort1(){
        // dd($data->toArray());
        $data = Tvshow::select('tvshows.tvshows_id','tvshows.trending','tvshows.tvshows_name','tvshows.poster',
        'tvshows.complete','tvshows.rating','tvshows.cast','tvshows.director','tvshows.award',
        'tvshows.release_date','tvshows.language','tvshows.review','tvshows.trailer','tvshows.category_id'
        ,DB::raw('COUNT(episodes.tvshows_id) as count'))->
                leftJoin('episodes','episodes.tvshows_id','tvshows.tvshows_id')->
                groupBy("tvshows.tvshows_id")->orderBy('tvshows_id','desc')
                ->paginate(10);

                $category = TvshowCategory::get();

        if(count($data)==0)
        $emptyStatus = 0;
        else
        $emptyStatus=1;
        return view('admin.tv shows.list')->with(['category'=>$category,'data'=>$data,'status'=>$emptyStatus,'heading'=>"Tv Shows"]);

       }
       public function add(){
        $trending = Tvshow::where('trending','=','0')->get();
        if(count($trending) >= 4)
        {
            $limit ='yes';
        }
        else
        {
            $limit ='no';

        };
        $names = Tvshow::get();
        // dd($names->toArray());
        $data = TvshowCategory::get();

        return view('admin.tv shows.add')->with(['category'=>$data,'names'=>$names,'limit'=>$limit]);
    }
    public function edit($id){
        $trending = Tvshow::where('trending','=','0')->get();
        if(count($trending) >= 4)
        {
            $limit ='yes';
        }
        else
        {
            $limit ='no';

        };
        $category = Category::get();
        $data = Tvshow::select('*')
                        ->join('categories','tvshows.category_id','=','categories.category_id')
                        ->where('tvshows_id','=',$id)
                        ->first();


        return view('admin.tv shows.edit')->with(['data'=>$data, 'category'=>$category,'limit'=>$limit]);
    }
    public function insert(Request $request){
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name'=>'required',
             'Category'=>'required',
            'poster'=>'required',
            'background'=>'required',
            'trending'=>'required',
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
        Tvshow::create($data);
        return redirect()->route('tvshows#list')->with(['addPizzaSuccess'=>'Tvshows added successfully','heading'=>"Tv Shows"]);

    }
    public function delete($id){
        $data = Tvshow::select('poster')->where('tvshows_id','=',$id)->first();
// dd($data['poster']);

        $image = $data['poster'];

        Tvshow::where('tvshows_id','=',$id)->delete();
        if(File::exists(public_path().'/uploads/'.$image)){
            File::delete(public_path().'/uploads/'.$image);
        };

        return back()->with(['deleteSuccess'=>'Tvshows delete successfully']);
    }
    public function details($id){
        $data = Tvshow::where('tvshows_id','=',$id)->first();
        // dd($data->toArray());
        return view('admin.tv shows.details')->with(['data'=>$data]);
    }
    public function update($id,Request $request){
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
            $data = Tvshow::where('tvshows_id','=',$id)->first();

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
            $data = Tvshow::where('tvshows_id','=',$id)->first();

            $filename2 = $data['background'];
            if(File::exists(public_path().'/uploads/'.$filename2)){
                File::delete(public_path().'/uploads/'.$filename2);
            }
            $file2 = $request->file('background');
            $filename2=uniqid().'_'.$file2->getClientOriginalName();
            $file2->move(public_path().'/uploads/',$filename2);
            $updateData['background']=$filename2;

        }

            Tvshow::where('tvshows_id','=',$id)->update($updateData);
            return redirect()->route('tvshows#list')->with(['success'=>'Tvshows updated']);



    }
    public function search( Request $request){
        $searchData = Tvshow
        ::select('tvshows.tvshows_id','tvshows.trending','tvshows.tvshows_name','tvshows.poster',
        'tvshows.complete','tvshows.rating','tvshows.cast','tvshows.director','tvshows.award',
        'tvshows.release_date','tvshows.language','tvshows.review','tvshows.trailer','tvshows.category_id'
        ,DB::raw('COUNT(episodes.tvshows_id) as count'))->
                leftJoin('episodes','episodes.tvshows_id','tvshows.tvshows_id')->
                groupBy("tvshows.tvshows_id")->orwhere('tvshows_name','like','%'.$request->table_search.'%')
                            // ->orwhere('','like','%'.$request->table_search.'%')
                            ->orwhere('cast','like','%'.$request->table_search.'%')
                            ->orwhere('director','like','%'.$request->table_search.'%')
                            ->orwhere('language','like','%'.$request->table_search.'%')

                            ->paginate(10);
        //                     $data = Tvshow::select('tvshows.tvshows_id','tvshows.trending','tvshows.tvshows_name','tvshows.poster',
        // 'tvshows.complete','tvshows.rating','tvshows.cast','tvshows.director','tvshows.award',
        // 'tvshows.release_date','tvshows.language','tvshows.review','tvshows.trailer','tvshows.category_id'
        // ,DB::raw('COUNT(episodes.tvshows_id) as count'))->
        //         leftJoin('episodes','episodes.tvshows_id','tvshows.tvshows_id')->
        //         groupBy("tvshows.tvshows_id")->orderBy('tvshows_name','asc')
        //         ->paginate(10);
        Session::put("TVSHOWS_LIST",$request->table_search);
        $searchData->append($request->all());
        $category = Category::get();

        if(count($searchData)==0)
        $emptyStatus=0;
        else
        $emptyStatus=1;
        return view('admin.tv shows.list')->with(['data'=>$searchData,'status'=>$emptyStatus,'category'=>$category]);
    }
    public function episodes(Request $request)
    {
        $names = Tvshow::get();
        // dd($names->toArray());
        return view('admin.tv shows.addEpi')->with(['names'=>$names]);
    }
    public function epiInsert(Request $request){
        // // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name'=>'required',

            'rating'=>'required',
            'runtime'=>'required',

            'releaseDate'=>'required',


            'review'=>'required'

        ]);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }
        // $file = $request->file('poster');

        // dd($file);
        // $filename = uniqid().'_'.$file->getClientOriginalName();
        // $file->move(public_path().'/uploads/',$filename);
        $data = $this->insertEpisodeData($request);
        Episode::create($data);
        return redirect()->route('tvshows#list')->with(['addPizzaSuccess'=>'Pizza added successfully']);

    }
    public function episodes2($id){

        $data= Episode::where('tvshows_id','=',$id)->get();
        // dd($data[0]->tvshows_id);

        $names = Tvshow::where('tvshows_id','=',$data[0]->tvshows_id)->first();
        // dd($names->toArray());

        // dd($data->toArray());
        return view('admin.tv shows.episodes')->with(['data'=>$data,'names'=>$names]);
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
            'tvshows_name'=>$request->name,
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
            'tvshows_name'=>$request->name,
            'category_id'=>$request->Category,
            'poster'=>$filename,
            'background'=>$filename2,

            'rating'=>$request->rating,
            'cast'=>$request->cast,
            'director'=>$request->director,
            'award'=>$request->award,
            'complete'=>$request->complete,
            'release_date'=>$request->releaseDate,
            'trending'=>$request->trending,

            'language'=>$request->language,
            'trailer'=>$request->trailer,
            'review'=>$request->review,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()

        ];
    }
}

