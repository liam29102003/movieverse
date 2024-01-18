<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Anime;
use App\Models\Movies;
use App\Models\Review;
use App\Models\Tvshow;
use App\Models\Contact;
use App\Models\Episode;
use App\Models\Category;
use App\Models\Download;
use Illuminate\Http\Request;
use App\Models\AnimeCategory;
use App\Models\TvshowCategory;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ClientMoviesController extends Controller
{


    public function welcome()
    {
        return view('welcome');
    }


    public function userSearch(Request $request)
    {
        // dd($request->all());

            $searchData1 = Movies::orwhere('movies_name','like','%'.$request->user_search.'%')
                                ->orwhere('cast','like','%'.$request->user_search.'%')
                                ->orwhere('director','like','%'.$request->user_search.'%')
                                ->orwhere('language','like','%'.$request->user_search.'%')
                                ->orwhere('genre','like','%'.$request->user_search.'%')
                                ->paginate(10);
                                $searchData2 = Tvshow::orwhere('tvshows_name','like','%'.$request->user_search.'%')
                                ->orwhere('cast','like','%'.$request->user_search.'%')
                                ->orwhere('director','like','%'.$request->user_search.'%')
                                ->orwhere('language','like','%'.$request->user_search.'%')
                                // ->orwhere('genre','like','%'.$request->user_search.'%')
                                ->paginate(10);
                                $searchData3 = Anime::orwhere('anime_name','like','%'.$request->user_search.'%')
                                ->orwhere('cast','like','%'.$request->user_search.'%')
                                ->orwhere('director','like','%'.$request->user_search.'%')
                                ->orwhere('language','like','%'.$request->user_search.'%')
                                // ->orwhere('genre','like','%'.$request->user_search.'%')
                                ->paginate(10);
            Session::put("MOVIES_LIST",$request->table_search);
            $searchData1->append($request->all());
            $searchData2->append($request->all());
            $searchData3->append($request->all());

            // if(count($searchData)==0)
            // $emptyStatus=0;
            // else
            // $emptyStatus=1;
            return view('user.searchResult')->with(['data1'=>$searchData1,'data2'=>$searchData2,'data3'=>$searchData3,]);

    }
    public function home()
    {

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
    public function movies()
    {
        $data = Movies::paginate(15);
        $data1 = Movies::get();

        // dd($data);

        return view('user.movie')->with(['data'=>$data,'data1' => $data1]);
    }
    public function tvshows()
    {
        $data = Tvshow::paginate(15);
        $data1 = Tvshow::get();


        return view('user.tvshows')->with(['data'=>$data,'data1' => $data1]);
    }
    public function animes()
    {
        $data = Anime::paginate(15);
        $data1 = Anime::get();


        return view('user.anime')->with(['data'=>$data,'data1' => $data1]);
    }
    public function movieDetails($id)
    {
        $downloadCount = Download::where('movies_id','=',$id)->get();
        $count = count($downloadCount);
        $data = Movies::where('movies_id','=',$id)->first();
        // dd($data->toArray());
        return view('user.movieDetails')->with(['data'=>$data, 'count' =>$count]);
    }
    public function addReview()
    {
        // $data = Download::where('user_id','=',Auth::user()->id)->get();
        // $arr = (array)null;
        // // dd($arr);
        // for($i=0; $i<count($data); $i++)
        // {
        //     $data1 = Movies::where('movies_id','=',$data[$i]->movies_id)->get();
        //     $arr[$i] = $data1->toArray();

        // }
        $data = review::select()->
        join('users','users.id','reviews.user_id')
        ->paginate(5);
        $data1 = review::select()->
        join('users','users.id','reviews.user_id')
        ->get();
     $star = (array)null;
        // dd($arr);
        for($i=0; $i<count($data1); $i++)
        {

            $star[$i] = $data1[$i]->star;

        }

// dd($arr);
// dd($data->toArray());

        return view('user.review')->with(['data'=>$data,'data1'=>$data1,'star'=>$star]);
    }
    public function back()
    {
if(Auth::check())
{
    return redirect()->route('user#home');
}
else{
    return redirect()->route('welcome');
}
    }
   public function updateProfile()
   {
    $data = User::where('id','=',Auth::user()->id)->first();
    return view('user.edituser')->with(['data'=>$data]);
   }
   public function updatePassword()
   {
    return view('user.userPassword');
   }
    public function insertReview(Request $request,$id)
    {


        $data = [
            "user_id"=>$id,
            "star"=>$request->star,
            "review" => $request->review,
        ];

        Review::create($data);
        return redirect()->route('user#home')->with(["categorySuccess"=>"Category Added......"]);
    }
    public function tvshowDetails($id)
    {
        $data = Tvshow::where('tvshows_id','=',$id)->first();
        $data1 = Episode::where('tvshows_id','=',$id)->get();
        // dd($data->toArray());
        return view('user.tvshowsDetails')->with(['data'=>$data,'data1'=>$data1]);
    }

    public function episodeDetails($id)
    {
        $data1 = Episode::where('episodes_id','=',$id)->first();
        // dd($data1->toArray());
        $data = Tvshow::where('tvshows_id','=',$data1->tvshows_id)->first();

        // dd($data->toArray());
        return view('user.episode')->with(['data'=>$data,'data1'=>$data1]);
    }
    public function userContact()
    {
        // $data = Movies::where('movies_id','=',$id)->first();
        // dd($data->toArray());
        return view('user.request_page');
    }

    public function addContact(Request $request)
    {

        // $validator = Validator::make($request->all(), [
        //     'fname'=>'required',
        //      'Mname'=>'required',
        //     //  'title'=>'required',
        //      'type'=>'required',
        //      'message'=>'required',

        // ]);

        // if ($validator->fails()) {
        //     return back()
        //                 ->withErrors($validator)
        //                 ->withInput();
        // }

        $data = $this->createContactData($request);
        // dd($data);

        Contact::create($data);
        return redirect()->route('user#contact')->with(['addPizzaSuccess'=>'Pizza added successfully']);
    }
    public function moviesearch($id){
        $data = Movies::where('category_id',$id)
        ->paginate(15);
        $data1 = Movies::where('category_id',$id)
        ->get();
        $new = Movies::orderBy('release_date','asc')
                ->get();
                $seriesdata= Tvshow::get();
                $animedata = Anime::get();
        $category = Category::get();
        $status = count($data) == 0 ? 0 : 1;

        return view('user.movie')->with(['new'=>$new,'data'=>$data, 'data1'=>$data1,'catData1'=>$category,'tvshow'=>$seriesdata,'anime'=>$animedata]);
    }
    public function tvshowsearch($id){
        $data = Tvshow::where('category_id',$id)
        ->paginate(15);
        $data1 = Tvshow::where('category_id',$id)
        ->get();
        $new = Movies::orderBy('release_date','asc')
                ->get();
                $seriesdata= Tvshow::get();
                $animedata = Anime::get();
        $category = TvshowCategory::get();
        $status = count($data) == 0 ? 0 : 1;

        return view('user.tvshows')->with(['new'=>$new,'data'=>$data,'data1'=>$data1,'catData2'=>$category,'tvshow'=>$seriesdata,'anime'=>$animedata]);
    }
    public function animesearch($id){
        $data = Anime::where('category_id',$id)
        ->paginate(15);
        $data1 = Anime::where('category_id',$id)
        ->get();
        $new = Movies::orderBy('release_date','asc')
                ->get();
                $seriesdata= Tvshow::get();
                $animedata = Anime::get();
        $category = AnimeCategory::get();
        $status = count($data) == 0 ? 0 : 1;

        return view('user.anime')->with(['new'=>$new,'data'=>$data,'data1'=>$data1,'catData3'=>$category,'tvshow'=>$seriesdata,'anime'=>$animedata]);
    }


    public function searchByDate(Request $request){
        // dd($request->all());
        $data1 = Movies::select('*');
        $data2 = Tvshow::select('*');
        $data3 = Anime::select('*');
        if(!is_null($request->start_date) && is_null($request->end_date))
        {
            $data1 = $data1->whereDate('release_date','>=',$request->start_date );
            $data2 = $data2->whereDate('release_date','>=',$request->start_date );
            $data3 = $data3->whereDate('release_date','>=',$request->start_date );
        }

        elseif(is_null($request->start_date) && !is_null($request->end_date))
        {
            $data1 = $data1->whereDate('release_date','<=',$request->end_date );
            $data2 = $data2->whereDate('release_date','<=',$request->end_date );
            $data3 = $data3->whereDate('release_date','<=',$request->end_date );
        }
        elseif(!is_null($request->start_date) && !is_null($request->end_date)){
            $data1 = $data1->whereDate('release_date','>=',$request->start_date )
                    ->whereDate('release_date','<=',$request->end_date );
                    $data2= $data2->whereDate('release_date','>=',$request->start_date )
                    ->whereDate('release_date','<=',$request->end_date );
                    $data3 = $data3->whereDate('release_date','>=',$request->start_date )
                    ->whereDate('release_date','<=',$request->end_date );
    }
    // if(!is_null($request->min_rating) && is_null($request->max_rating))
    // {
    //     $data1 = $data1->where('rating','>=',$request->min_rating);
    //     $data2 = $data2->where('rating','>=',$request->min_rating);
    //     $data3 = $data3->where('rating','>=',$request->min_rating);
    // }
    // elseif(is_null($request->min_rating) && !is_null($request->max_rating))
    // {
    //     $data1 = $data1->where('rating','<=',$request->max_rating );
    //     $data2 = $data2->where('rating','<=',$request->max_rating );
    //     $data3 = $data3->where('rating','<=',$request->max_rating );
    // }
    // elseif(!is_null($request->min_rating) && !is_null($request->max_rating)){
    //     $data1= $data1->where('rating','>=',$request->min_rating )
    //                 ->where('rating','<=',$request->max_rating );
    //                 $data2 = $data2->where('rating','>=',$request->min_rating )
    //                 ->where('rating','<=',$request->max_rating );
    //                 $data3 = $data3->where('rating','>=',$request->min_rating )
    //                 ->where('rating','<=',$request->max_rating );
    // }


    $data1 = $data1->paginate(10);
    $data2 = $data2->paginate(10);
    $data3 = $data3->paginate(10);
    // $category = category::get();
    // dd($data1->toArray());
        $status1 = count($data1) == 0 ? 0 : 1;
        $status2 = count($data2) == 0 ? 0 : 1;
        $status3 = count($data3) == 0 ? 0 : 1;
        $data1->append($request->all());
        $data2->append($request->all());
        $data3->append($request->all());

        return view('user.searchResult')->with(['data1'=>$data1,'data2'=>$data2,'data3'=>$data3, 'status1' => $status1, 'status2' => $status2, 'status3' => $status3]);

    }
    public function searchByRating(Request $request){
        // dd($request->all());
        $data1 = Movies::select('*');
        $data2 = Tvshow::select('*');
        $data3 = Anime::select('*');
    //     if(!is_null($request->start_date) && is_null($request->end_date))
    //     {
    //         $data1 = $data1->whereDate('release_date','>=',$request->start_date );
    //         $data2 = $data2->whereDate('release_date','>=',$request->start_date );
    //         $data3 = $data3->whereDate('release_date','>=',$request->start_date );
    //     }

    //     elseif(is_null($request->start_date) && !is_null($request->end_date))
    //     {
    //         $data1 = $data1->whereDate('release_date','<=',$request->end_date );
    //         $data2 = $data2->whereDate('release_date','<=',$request->end_date );
    //         $data3 = $data3->whereDate('release_date','<=',$request->end_date );
    //     }
    //     elseif(!is_null($request->start_date) && !is_null($request->end_date)){
    //         $data1 = $data1->whereDate('release_date','>=',$request->start_date )
    //                 ->whereDate('release_date','<=',$request->end_date );
    //                 $data2= $data2->whereDate('release_date','>=',$request->start_date )
    //                 ->whereDate('release_date','<=',$request->end_date );
    //                 $data3 = $data3->whereDate('release_date','>=',$request->start_date )
    //                 ->whereDate('release_date','<=',$request->end_date );
    // }
    if(!is_null($request->min_rating) && is_null($request->max_rating))
    {
        $data1 = $data1->where('rating','>=',$request->min_rating);
        $data2 = $data2->where('rating','>=',$request->min_rating);
        $data3 = $data3->where('rating','>=',$request->min_rating);
    }
    elseif(is_null($request->min_rating) && !is_null($request->max_rating))
    {
        $data1 = $data1->where('rating','<=',$request->max_rating );
        $data2 = $data2->where('rating','<=',$request->max_rating );
        $data3 = $data3->where('rating','<=',$request->max_rating );
    }
    elseif(!is_null($request->min_rating) && !is_null($request->max_rating)){
        $data1= $data1->where('rating','>=',$request->min_rating )
                    ->where('rating','<=',$request->max_rating );
                    $data2 = $data2->where('rating','>=',$request->min_rating )
                    ->where('rating','<=',$request->max_rating );
                    $data3 = $data3->where('rating','>=',$request->min_rating )
                    ->where('rating','<=',$request->max_rating );
    }


    $data1 = $data1->paginate(10);
    $data2 = $data2->paginate(10);
    $data3 = $data3->paginate(10);
    // $category = category::get();
    // dd($data1->toArray());
        $status1 = count($data1) == 0 ? 0 : 1;
        $status2 = count($data2) == 0 ? 0 : 1;
        $status3 = count($data3) == 0 ? 0 : 1;
        $data1->append($request->all());
        $data2->append($request->all());
        $data3->append($request->all());

        return view('user.searchResult')->with(['data1'=>$data1,'data2'=>$data2,'data3'=>$data3, 'status1' => $status1, 'status2' => $status2, 'status3' => $status3]);

    }
        private function createContactData($request){
        if($request->type == '1')

                $type = 'Movie Request';

        elseif($request->type == '2')

            $type = 'Ads';

        elseif($request->type == '3')

            $type = 'Suggestion';

        elseif($request->type == '4')

            $type = 'Others';

        return [
            'name'=>$request->fname,
            'email'=>$request->email,
            'title'=>$request->Mname,
            'type'=>$type,
            'message'=>$request->comment,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()

        ];
    }
}
