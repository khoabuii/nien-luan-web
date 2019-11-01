<?php

namespace App\Http\Controllers\Admin;

use App\Model\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rules\Unique;

class CateController extends Controller
{
    //
    public function getCate(){
        $data['cate_list']=Category::all();
        return view('admin.category',$data);
    }
    public function postCate(Request $request){
        $this->validate($request,[
            'name'=>'unique:category,cate_name'
        ],
        [
            'name.unique'=>'Tên danh mục đã tồn tại'
        ]);
        $cate=new Category;
        $cate->cate_name=$request->name;
        $cate->cate_slug=str_slug($request->name);
        $cate->save();
        return back();
    }
    public function getEditCate($id){
        $data['cate']=Category::find($id);
        return view('admin.editcategory',$data);
    }
    public function postEditCate(Request $request,$id){
        $data=Category::find($id);
        $this->validate($request,[
            'name'=>'unique:category,cate_name'
        ],[
            'name.unique'=>'Danh mục bài viết này đã tồn tại'
        ]);
        $data->cate_name=$request->name;
        $data->cate_slug=str_slug($request->name);
        $data->save();

        return redirect('admin/category')->with('thongbao','Thao tác thành công');
    }
    public function getDeleteCate($id){
        $data=Category::find($id);
        $data=Category::destroy($id);

        return back()->with('thongbao','Đã xóa thành công');
    }
}
