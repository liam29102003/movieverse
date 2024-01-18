<?php

namespace App\Http\Controllers\admin;

use App\Models\Movies;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class MovieController extends Controller
{
    public function sortByRating()
    {
        $data = Movies::
        orderBy('rating','desc')
        // leftJoin('movies','movies.category_id','categories.category_id')->
        ->paginate(5);
        // dd($data->toArray());
        // dd(count($data));
        $category = Category::get();

        // dd($category->toArray());
        if(count($data)==0)
        $emptyStatus = 0;
        else
        $emptyStatus=1;
        return view('admin.movies.list')->with(['data'=>$data,'status'=>$emptyStatus,'category'=>$category]);
       }
       public function sortByRating1()
    {
        $data = Movies::
        orderBy('rating','asc')
        // leftJoin('movies','movies.category_id','categories.category_id')->
        ->paginate(5);
        // dd($data->toArray());
        // dd(count($data));
        $category = Category::get();

        // dd($category->toArray());
        if(count($data)==0)
        $emptyStatus = 0;
        else
        $emptyStatus=1;
        return view('admin.movies.list')->with(['data'=>$data,'status'=>$emptyStatus,'category'=>$category]);
       }
    public function sortById()
    {
        $data = Movies::
        orderBy('movies_id','desc')
        // leftJoin('movies','movies.category_id','categories.category_id')->
        ->paginate(5);
        // dd($data->toArray());
        // dd(count($data));
        $category = Category::get();

        // dd($category->toArray());
        if(count($data)==0)
        $emptyStatus = 0;
        else
        $emptyStatus=1;
        return view('admin.movies.list')->with(['data'=>$data,'status'=>$emptyStatus,'category'=>$category]);
       }
       public function sortById1()
       {
           $data = Movies::
           orderBy('movies_id','asc')
           // leftJoin('movies','movies.category_id','categories.category_id')->
           ->paginate(5);
           // dd($data->toArray());
           // dd(count($data));
           $category = Category::get();

           // dd($category->toArray());
           if(count($data)==0)
           $emptyStatus = 0;
           else
           $emptyStatus=1;
           return view('admin.movies.list')->with(['data'=>$data,'status'=>$emptyStatus,'category'=>$category]);
          }
          public function sortByMovie1()
       {
           $data = Movies::
           orderBy('movies_name','asc')
           // leftJoin('movies','movies.category_id','categories.category_id')->
           ->paginate(5);
           // dd($data->toArray());
           // dd(count($data));
           $category = Category::get();

           // dd($category->toArray());
           if(count($data)==0)
           $emptyStatus = 0;
           else
           $emptyStatus=1;
           return view('admin.movies.list')->with(['data'=>$data,'status'=>$emptyStatus,'category'=>$category]);
          }
          public function sortByMovie()
       {
           $data = Movies::
           orderBy('movies_id','desc')
           // leftJoin('movies','movies.category_id','categories.category_id')->
           ->paginate(5);
           // dd($data->toArray());
           // dd(count($data));
           $category = Category::get();

           // dd($category->toArray());
           if(count($data)==0)
           $emptyStatus = 0;
           else
           $emptyStatus=1;
           return view('admin.movies.list')->with(['data'=>$data,'status'=>$emptyStatus,'category'=>$category]);
          }
    public function list(){
        $data = Movies::

        // leftJoin('movies','movies.category_id','categories.category_id')->
        paginate(5);
        // dd($data->toArray());
        // dd(count($data));
        $category = Category::get();

        // dd($category->toArray());
        if(count($data)==0)
        $emptyStatus = 0;
        else
        $emptyStatus=1;
        return view('admin.movies.list')->with(['data'=>$data,'status'=>$emptyStatus,'category'=>$category]);
       }
       public function add(){
        $data = Category::get();
        $trending = Movies::where('trending','=','0')->get();
        if(count($trending) >= 4)
        {
            $limit ='yes';
        }
        else
        {
            $limit ='no';

        };
        return view('admin.movies.add')->with(['category'=>$data,'limit'=>$limit]);
    }
    public function insert(Request $request){
        // dd($request->trending);
        $validator = Validator::make($request->all(), [
            'name'=>'required',
             'Category'=>'required',
             'genre'=>'required',
            'poster'=>'required',
            'trending'=>'required',

            'background'=>'required',
            'rating'=>'required',
            'cast'=>'required',
            'director'=>'required',
            'award'=>'required',
            'releaseDate'=>'required',
            'runtime'=>'required',
            'trailer'=>'required',
            'quality'=>'required',
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
        $filename2 = uniqid().'_'.$file2->getClientOriginalName();
        $file->move(public_path().'/uploads/',$filename);
        $file2->move(public_path().'/uploads/',$filename2);

        $data = $this->createMovieData($request,$filename,$filename2);
        Movies::create($data);
        return redirect()->route('movies#list')->with(['addPizzaSuccess'=>'Movie added successfully']);

    }
    public function delete($id){
        $data = Movies::select('poster')->where('movies_id','=',$id)->first();


        $image = $data['poster'];

        Movies::where('movies_id','=',$id)->delete();
        if(File::exists(public_path().'/uploads/'.$image)){
            File::delete(public_path().'/uploads/'.$image);
        };

        return back()->with(['deleteSuccess'=>'Movie delete successfully']);
    }
    public function details($id){
        $data = Movies::where('movies_id','=',$id)->first();

        return view('admin.movies.details')->with(['data'=>$data]);
    }
    public function edit($id){

        $trending = Movies::where('trending','=','0')->get();
        if(count($trending) >= 4)
        {
            $limit ='yes';
        }
        else
        {
            $limit ='no';

        };
        $category = Category::get();
        $data = Movies::select('*')
                        ->join('categories','movies.category_id','=','categories.category_id')
                        ->where('movies_id','=',$id)
                        ->first();


        return view('admin.movies.edit')->with(['data'=>$data, 'category'=>$category,'limit'=>$limit]);
    }
    public function update($id,Request $request){
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name'=>'required',
             'Category'=>'required',
            // 'poster'=>'required',
            'genre'=>'required',
            'rating'=>'required',
            'trending'=>'required',
            'cast'=>'required',
            'director'=>'required',
            'award'=>'required',
            'releaseDate'=>'required',
            'runtime'=>'required',
            'trailer'=>'required',
            'quality'=>'required',
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
            $data = Movies::where('movies_id','=',$id)->first();
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
            $data = Movies::where('movies_id','=',$id)->first();

            $filename2 = $data['background'];
            if(File::exists(public_path().'/uploads/'.$filename2)){
                File::delete(public_path().'/uploads/'.$filename2);
            }
            $file2 = $request->file('background');
            $filename2=uniqid().'_'.$file2->getClientOriginalName();
            $file2->move(public_path().'/uploads/',$filename2);
            $updateData['background']=$filename2;
        }
        Movies::where('movies_id','=',$id)->update($updateData);
        return redirect()->route('movies#list')->with(['success'=>'Movie updated']);


    }
    public function search( Request $request){
        $searchData = Movies::orwhere('movies_name','like','%'.$request->table_search.'%')
                            ->orwhere('poster','like','%'.$request->table_search.'%')
                            ->orwhere('cast','like','%'.$request->table_search.'%')
                            ->orwhere('director','like','%'.$request->table_search.'%')
                            ->orwhere('language','like','%'.$request->table_search.'%')
                            ->paginate(10);
        Session::put("MOVIES_LIST",$request->table_search);
        $searchData->append($request->all());
        $category = Category::get();
        if(count($searchData)==0)
        $emptyStatus=0;
        else
        $emptyStatus=1;
        return view('admin.movies.list')->with(['data'=>$searchData,'status'=>$emptyStatus,'category'=>$category]);
    }
    private function updateMoviesData($request){
        $arr=[
            'movies_name'=>$request->name,
            'category_id'=>$request->Category,
            // 'poster'=>$filename,
            'genre'=>$request->genre,
            'trending'=>$request->trending,

            'rating'=>$request->rating,
            'cast'=>$request->cast,
            'director'=>$request->director,
            'award'=>$request->award,
            'quality'=>$request->quality,
            'release_date'=>$request->releaseDate,
            'runtime'=>$request->runtime,
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
            'movies_name'=>$request->name,
            'category_id'=>$request->Category,
            'poster'=>$filename,
            'background'=>$filename2,
            'trending'=>$request->trending,
            'genre'=>$request->genre,
            'rating'=>$request->rating,
            'cast'=>$request->cast,
            'director'=>$request->director,
            'award'=>$request->award,
            'quality'=>$request->quality,
            'release_date'=>$request->releaseDate,
            'runtime'=>$request->runtime,
            'language'=>$request->language,
            'trailer'=>$request->trailer,
            'review'=>$request->review,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()

        ];
    }
}
