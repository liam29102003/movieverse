<?php

namespace App\Http\Controllers\admin;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RequestController extends Controller
{
    public function list()
    {
        $data = Contact::paginate(7);

        if(count($data)==0)
        $emptyStatus = 0;
        else
        $emptyStatus=1;
        // dd($data->toArray());
        return view('admin.requests.list')->with(['data'=>$data,'status'=>$emptyStatus]);
    }
    public function delete($id){
        Contact::where('contact_id',"=",$id)->delete();
        return back()->with(['deleteSuccess'=>'Delete Successfully']);
    }
    public function search( Request $request){
        $searchData = Contact::orwhere('name','like','%'.$request->table_search.'%')
                            ->orwhere('email','like','%'.$request->table_search.'%')
                            ->orwhere('type','like','%'.$request->table_search.'%')
                            ->orwhere('title','like','%'.$request->table_search.'%')
                            ->paginate(10);
        // Session::put("MOVIES_LIST",$request->table_search);
        $searchData->append($request->all());
        if(count($searchData)==0)
        $emptyStatus=0;
        else
        $emptyStatus=1;
        return view('admin.requests.list')->with(['data'=>$searchData,'status'=>$emptyStatus]);
}
}
