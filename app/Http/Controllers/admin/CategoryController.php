<?php

namespace App\Http\Controllers\admin;

use App\Models\Movies;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Validation\Validator;

class CategoryController extends Controller
{
    public function list(){
        $data = Category::select('categories.category_id','categories.category_name',DB::raw('COUNT(movies.category_id) as count'))->
        leftJoin('movies','movies.category_id','categories.category_id')->
        groupBy("categories.category_id")
        ->paginate(10);
        // $data = Category::
        // paginate(10);
        // dd($data->toArray());
        if(count($data)==0)
        $emptyStatus = 0;
        else
        $emptyStatus=1;
       return view('admin.category.list',['data'=>$data,'status'=>$emptyStatus,]);
    }
    public function categoryItem($id){
        $data= Movies::select('categories.category_name as cName', 'movies.*')
                ->join('categories','movies.category_id','categories.category_id')
                ->where('movies.category_id',$id)
                ->paginate(5);
// dd($data->toArray());
if(count($data)==0)
$emptyStatus = 0;
else
$emptyStatus=1;
        return view('admin.movies.list')->with(['data'=>$data,'status'=>$emptyStatus]);
    }
   public function add(){
    return view('admin.category.add');
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
        "category_name"=>$request->category,
    ];
    Category::create($data);
    return redirect()->route('category#list')->with(["categorySuccess"=>"Category Added......"]);

}
public function delete($id){
    Category::where('category_id',"=",$id)->delete();
    return back()->with(['deleteSuccess'=>'Delete Successfully']);
}
public function edit($id){
        $data = Category::where('category_id','=',$id)->first();
        return view('admin.category.edit')->with(['data'=>$data]);
    }
    public function update(Request $request){

        $updateData = [
            'category_name'=>$request->category
        ];
        Category::where('category_id','=',$request->id)->update($updateData);
        return redirect()->route('category#list')->with(['editSuccess'=>'Category edited Successfully']);
    }
    public function search(Request $request){
        // dd($request->table_search);
        $data = Category
                ::where('categories.category_name','like','%'.$request->table_search.'%')
                ->paginate(10);
        // Session::put("CATEGORY_SEARCH",$request->table_search);
        $data->append($request->all());
        if(count($data)==0)
        $emptyStatus = 0;
        else
        $emptyStatus=1;
       return view('admin.category.list',['data'=>$data,'status'=>$emptyStatus,]);

    }
}
