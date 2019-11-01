<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Posts;
use App\Model\Category;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    //
    public function getPosts(){
        $data['items']=DB::table('posts')->join('category',
        'posts.post_cate','=','category.cate_id')->orderBy('post_id','desc')->get();
        return view('admin.posts',$data);
    }
    public function postPosts(){

    }
    public function getAddPosts(){
        $data['cate']=Category::all();
        return view('admin.addposts',$data);
    }
    public function postAddPosts(Request $request){
        $this->validate($request,
        [
            'title'=>'unique:posts,post_title|max:300|min:2',
            'summary'=>'max:300|min:3',
            'img'=>'image',
            'content'=>'required',
            'summary'=>'required'

        ],
        [
            'title.unique'=>'Tiêu đề bài viết đã bị trùng',
            'title.max'=>'Tiêu đề bài viết quá dài',
            'title.min'=>'Tiêu đề bài viết quá ngắn',
            'img.image'=>'Hình ảnh không đúng định dạng',
            'content.required'=>'Bạn chưa nhập nội dung',
            'summary.required'=>'Bạn chưa nhập tóm tắt',
            'summary.max'=>'Tóm tắt quá dài',
            'summary.min'=>'Tóm tắt quá ngắn'
        ]);


        $post=new Posts();
        $filename=$request->img->getClientOriginalName();
        $post->post_title=$request->title;
        $post->post_slug=str_slug($request->title);
        $post->post_summary=$request->summary;
        $post->post_content=$request->content;
        $post->post_highlight=$request->highlight;
        $post->post_cate=$request->cate;
        $post->post_img=$filename;

        $post->save();
        $request->img->storeAs('avatar',$filename);
        return redirect('admin/posts')->with('thongbao','Đã thêm thành công');
    }
    public function getEditPosts($id){
        $data['cate']=Category::all();
        $data['items']=Posts::find($id);
        return view('admin.editposts',$data);
    }
    public function postEditPosts(Request $request,$id){
        $this->validate($request,
        [
            'title'=>'max:300|min:5',
            'summary'=>'max:300|min:3',
            'img'=>'image',
            'content'=>'required',
            'summary'=>'required'

        ],
        [

            'img.image'=>'Hình ảnh không đúng định dạng',
            'title.max'=>'Tiêu đề bài viết quá dài',
            'title.min'=>'Tiêu đề bài viết quá ngắn',
            'summary.max'=>'Tóm tắt quá dài',
            'img.image'=>'Hình ảnh có định dạng không hợp lệ',
            'content.required'=>'Bạn chưa nhập nội dung',
            'summary.required'=>'Bạn chưa nhập tóm tắt'
        ]);
        $post=new Posts;
        $arr['post_title']=$request->title;
        $arr['post_slug']=str_slug($request->title);
        $arr['post_summary']=$request->summary;
        $arr['post_content']=$request->content;
        $arr['post_highlight']=$request->highlight;
        $arr['post_cate']=$request->cate;


        if($request->hasFile('img')){
            $filename=$request->img->getClientOriginalName();
            $arr['post_img']=$filename;
            $request->img->storeAs('avatar',$filename);
        }
        $post::where('post_id',$id)->update($arr);
        return redirect('admin/posts');
    }

    public function getDeletePosts($id){
        Posts::destroy($id);
        return back()->with('thongbao','Đã xóa thành công');
    }
}
