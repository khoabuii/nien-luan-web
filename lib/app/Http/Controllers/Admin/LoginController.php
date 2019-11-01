<?php

namespace App\Http\Controllers\Admin;
use app\Model\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use WindowsAzure\Common\Internal\Atom\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    //
    public function getLoginAdmin(){
        return view('admin.login');
    }
    public function postLoginAdmin(Request $request){
        $arr=['email'=>$request->email,'password'=>$request->password];
        if(Auth::guard('admin')->attempt($arr)){
            return redirect('admin/category');
        }
        else{
            return back()->withInput()->with('error','Đăng nhập thất bại');
        }
    }
    public function getLogout(Request $request){
        Auth::guard('admin')->logout();
        if (!Auth::check() && !Auth::guard('admin')->check()) {
            $request->session()->flush();
            $request->session()->regenerate();
        }
        return redirect('admin/login');
    }
}
