<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function adminlist(){
        $data = User::where('role','=','admin')->paginate(10);
        if(count($data)==0)
        $emptyStatus = 0;
        else
        $emptyStatus=1;
        return view('admin.user.adminlist')->with(['data'=>$data,'status'=>$emptyStatus]);
    }
    public function userlist(){
        $data = User::where('role','=','user')->paginate(10);
        if(count($data)==0)
        $emptyStatus = 0;
        else
        $emptyStatus=1;
        return view('admin.user.userlist')->with(['data'=>$data,'status'=>$emptyStatus]);
    }
    public function searchUser(Request $request){
        $data = User::where('role','=','user')->

        where('name','like','%'.$request->table_search.'%')
        ->paginate(10);
        Session::put("MOVIES_LIST",$request->table_search);
        $data->append($request->all());
        if(count($data)==0)
        $emptyStatus=0;
        else
        $emptyStatus=1;
        return view('admin.user.userlist')->with(['data'=>$data,'status'=>$emptyStatus]);
    }
    public function changeRole(Request $request){
        // dd($request->toArray());
        // $validator = Validator::make($request->all(),[
        //     'password'=>'required',
        // ]);
        // if($validator->fails()){
        //     return back()
        //     ->withErrors($validator)
        //     ->withInput();
        // }
        $password= $request->password;

        $passwordData = User::select('password')->where('id','=',auth()->user()->id)->get()->toArray();


        $hashPassword = $passwordData[0]['password'];
        if(Hash::check($password, $hashPassword)){

            $data = ["role"=>$request->role];
            User::where('id','=',$request->id)->update($data);
            return redirect()->route('user#list')->with(['editSuccess'=>'Category edited Successfully']);
        }

}
    public function searchAdmin(Request $request){
        $data = $this->search('admin',$request);
        return view('admin.user.adminlist')->with(['data'=>$data]);
    }
    public function deleteUser($id){
        User::where('id','=',$id)->delete();
        return back()->with(['deleteSuccess'=>"User delete successfully"]);
    }
    public function editUser($id){
        $data = User::where('id','=',$id)->first();

        return view('admin.user.edit')->with(['data'=>$data]);
    }

    private function search($role,$request){
        $data = User::where('role','=',$role)
                    ->where(function($query) use($request){
                    $query->orwhere('name','like','%'.$request->table_search.'%')
                    ->orwhere('email','like','%'.$request->table_search.'%');
                    // ->orwhere('phone','like','%'.$request->table_search.'%')
                    // ->orwhere('address','like','%'.$request->table_search.'%');
                    })->paginate(10);

        $data->append($request->all());
        return $data;
    }
}
