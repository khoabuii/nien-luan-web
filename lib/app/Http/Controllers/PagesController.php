<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Model\Category;
use App\Model\Posts;
use App\Model\Comments;
use Mockery\CountValidator\Exception;
use WindowsAzure\Common\Internal\Atom\Category as WindowsAzureCategory;

class PagesController extends Controller
{
    function __construct(){
        $cate['cate']=Category::all();

        view()->share($cate);
    }
    //
    public function getHome(){
        $data['category']=Category::all();
        $data['highlight']=Posts::where('post_highlight',1)->inRandomOrder()->paginate(15);
        return view('pages.index',$data);
    }
    public function getPosts($id){
       // $data['cate']=Category::find($id);
       $data= array();
        $data['posts']=Posts::find($id);
        $data['comments']=Comments::where('com_posts',$id)->orderBy('com_id','desc')->get();
        // $data['items']=Posts::where('post_cate',$posts->post_cate)->take(7)->get();
        $data['posts_lq']=Posts::where('post_cate',$data['posts']->post_cate)->take(7)->get();
        return view('pages.detail',$data);
    }
    public function postComments(Request $request,$id){
        $id_posts=$id;
        $comments=new Comments();
        $comments->com_users=Auth::user()->id;
        $comments->com_posts=$id_posts;
        $comments->com_content=$request->content;
        $comments->save();

        return back()->with('thongbao','Bình luận thành công');
    }
    public function getLogin(){
        return view('pages.login');
    }
    public function postLogin(Request $request){
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect('/');
        }
        else{
            return back()->with('error','Đăng nhập không thành công');
        }
    }
    public function getLogout(){
        Auth::logout();
        return back();
    }
    public function getRegister(){
        return view('pages.register');
    }

    public function postRegister(Request $request){
        $this->validate($request,
        [
            'email'=>'unique:users,email',
            'password'=>'min:3|max:32',
            're-password'=>'same:password'
        ],
        [
            'email.unique'=>'Email đã tồn tại',
            'password.min'=>'Mật khẩu quá ngắn',
            'password.max'=>'Mật khẩu quá dài',
            're-password.same'=>'Mật khẩu không trùng khớp'
        ]);
        $data=new User();
        $data->name=$request->name;
        $data->email=$request->email;
        $data->password=bcrypt($request->password);

        $data->save();
        return redirect('login')->with('thongbao','Bạn đã đăng ký thành công, xin mời đăng nhập vào hệ thống');
    }

    public function getAccount(){
        $data['user']=Auth::user();
        return view('pages.account',$data);
    }
    public function postAccount(Request $request){
        $data=Auth::user();
        $data->name=$request->name;
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
        $data->password=bcrypt($request->password);
        }

        $data->save();
        return back()->with('thongbao','Đã sửa thông tin của bạn thành công');
    }
    public function getCategory($id){
        $data['cates']=Category::find($id);
        $data['posts']=Posts::where('post_cate',$id)->orderBy('post_id','desc')->paginate(10);
        return view('pages.category',$data);

    }

    public function getAbout(){
        return view('pages.about');
    }
    public function getSearch(Request $request){
        $result=$request->result;
        $data['key']=$result;
        $result=str_replace(' ','%',$result);
        $data['items']=Posts::where('post_title','like','%'.$result.'%')->orWhere('post_summary','like'
        ,'%'.$result.'%')->paginate(8);
        return view('pages.search',$data);
    }

}

