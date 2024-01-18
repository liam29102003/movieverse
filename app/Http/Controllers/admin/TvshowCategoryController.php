<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\TvshowCategory;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TvshowCategoryController extends Controller
{

    public function list(){
        $data = TvshowCategory::select('tvshow_categories.tvshowCategory_id','tvshow_categories.tvshowCategory_name',DB::raw('COUNT(movies.category_id) as count'))->
        leftJoin('movies','movies.category_id','tvshow_categories.tvshowCategory_id')->
        groupBy("tvshow_categories.tvshowCategory_id")
        ->paginate(10);

        if(count($data)==0)
        $emptyStatus = 0;
        else
        $emptyStatus=1;
       return view('admin.tvshowCategory.list',['data'=>$data,'status'=>$emptyStatus,]);
    }
   public function add(){
    return view('admin.tvshowCategory.add');
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
        "tvshowCategory_name"=>$request->category,
    ];
    // dd($data);
    TvshowCategory::create($data);
    return redirect()->route('tvshowCategory#list')->with(["categorySuccess"=>"Category Added......"]);

}
public function delete($id){
    TvshowCategory::where('tvshowCategory_id',"=",$id)->delete();
    return back()->with(['deleteSuccess'=>'Delete Successfully']);
}
public function edit($id){
        $data = TvshowCategory::where('tvshowCategory_id','=',$id)->first();
        return view('admin.tvshowCategory.edit')->with(['data'=>$data]);
    }
    public function update(Request $request){

        $updateData = [
            'tvshowCategory_name'=>$request->category
        ];
        TvshowCategory::where('tvshowCategory_id','=',$request->id)->update($updateData);
        return redirect()->route('tvshowCategory#list')->with(['editSuccess'=>'Category edited Successfully']);
    }
    public function search(Request $request){
        // dd($request->table_search);
        $data = TvshowCategory
                ::where('tvshow_categories.animeCategory_name','like','%'.$request->table_search.'%')
                ->paginate(10);
        // Session::put("CATEGORY_SEARCH",$request->table_search);
        $data->append($request->all());
        if(count($data)==0)
        $emptyStatus = 0;
        else
        $emptyStatus=1;
       return view('admin.tvshowCategory.list',['data'=>$data,'status'=>$emptyStatus,]);

    }
}
