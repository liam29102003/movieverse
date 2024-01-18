<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\AnimeCategory;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AnimeCategoryController extends Controller
{
    public function list(){
        $data = AnimeCategory::select('anime_categories.animeCategory_id','anime_categories.animeCategory_name',DB::raw('COUNT(movies.category_id) as count'))->
        leftJoin('movies','movies.category_id','anime_categories.animeCategory_id')->
        groupBy("anime_categories.animeCategory_id")
        ->paginate(10);
        if(count($data)==0)
        $emptyStatus = 0;
        else
        $emptyStatus=1;
       return view('admin.animeCategory.list',['data'=>$data,'status'=>$emptyStatus,]);
    }
   public function add(){
    return view('admin.animeCategory.add');
   }
   public function create(Request $request){
    $validator = Validator::make($request->all(), [
        'category' => 'required',

    ]);

    if ($validator->fails()) {
        return back()
                    ->withErrors($validator)
                    ->withInput();
    }
    // dd($request->all());
    $data = [
        "animeCategory_name"=>$request->category,
    ];
    // dd($data);
    AnimeCategory::create($data);
    return redirect()->route('animeCategory#list')->with(["categorySuccess"=>"Category Added......"]);

}
public function delete($id){
    AnimeCategory::where('animeCategory_id',"=",$id)->delete();
    return back()->with(['deleteSuccess'=>'Delete Successfully']);
}
public function edit($id){
        $data = AnimeCategory::where('animeCategory_id','=',$id)->first();
        return view('admin.animeCategory.edit')->with(['data'=>$data]);
    }
    public function update(Request $request){

        $updateData = [
            'AnimeCategory_name'=>$request->category
        ];
        AnimeCategory::where('animeCategory_id','=',$request->id)->update($updateData);
        return redirect()->route('animeCategory#list')->with(['editSuccess'=>'Category edited Successfully']);
    }
    public function search(Request $request){
        // dd($request->table_search);
        $data = AnimeCategory
                ::where('anime_categories.animeCategory_name','like','%'.$request->table_search.'%')
                ->paginate(10);
        // Session::put("CATEGORY_SEARCH",$request->table_search);
        $data->append($request->all());
        if(count($data)==0)
        $emptyStatus = 0;
        else
        $emptyStatus=1;
       return view('admin.animeCategory.list',['data'=>$data,'status'=>$emptyStatus,]);

    }
}
