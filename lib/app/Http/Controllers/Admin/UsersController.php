<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UsersController extends Controller
{
    //
    public function getUsers(){
        $data['users']=User::all();
        return view('admin.user',$data);
    }
    public function getAddUser(){
        return view('admin.adduser');
    }
    public function postAddUser (Request $request){
        $this->validate($request,[
            'email'=>'unique:users,email',
            'password'=>'min:3|max:32',
            're_password'=>'same:password'
        ],[
            'email.unique'=>'Email đã tồn tại',
            'password.min'=>'Mật khẩu của bạn quá ngắn',
            'password.max'=>'Mật khẩu của bạn quá dài',
            're_password.same'=>'Mật khẩu không trùng khớp'
        ]);
        $data=new User;
        $data->name=$request->name;
        $data->password=bcrypt($request->password);
        $data->email=$request->email;

        $data->save();
        return redirect('admin/users')->with('thongbao','Đã thêm thành công');
    }
    public function getEditUser($id){
        $data['users']=User::find($id);
        return view('admin.edituser',$data);
    }
    public function postEditUser($id,Request $request){
        $arr['name']=$request->name;
        if($request->changePassword=='on'){
        $this->validate($request,[
            'password'=>'min:3|max:32',
            're_password'=>'same:password'
        ],
        [
            'password.min'=>'Mật khẩu của bạn quá ngắn',
            'password.max'=>'Mật khẩu của bạn quá dài',
            're_password.same'=>'Mật khẩu không trùng khớp'
        ]);
        $arr['password']=bcrypt($request->password);
        }
        $data=User::where('id',$id)->update($arr);
        return redirect('admin/users')->with('thongbao','Đã sửa thông tin tài khoản người dùng thành công');
    }
    public function getDeleteUser($id){

        $data=User::destroy($id);
        return back()->with('thongbao','Đã xóa thông tin người dùng thành công');
    }
}
