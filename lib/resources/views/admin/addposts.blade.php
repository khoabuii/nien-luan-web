@extends('admin.main')
@section('title','Thêm bài đăng')
@section('main')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Bài viết</h1>
        </div>
    </div><!--/.row-->

    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">

            <div class="panel panel-primary">
                <div class="panel-heading">Thêm bài viết</div>
                <div class="panel-body">
                @include('noti.error')
                    <form method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                        <div class="row" style="margin-bottom:40px">
                            <div class="col-xs-8">
                                <div class="form-group" >
                                    <label>Tiêu đề</label>
                                    <input required type="text" value="{{old('title')}}" name="title" class="form-control">
                                </div>
                                <div class="form-group" >
                                    <label>Danh mục</label>
                                    <select required name="cate" class="form-control">
                                    @foreach($cate as $cat)
                                        <option value="{{$cat->cate_id}}">{{$cat->cate_name}}</option>
                                     @endforeach
                                    </select>
                                </div>
                                <div class="form-group" >
                                    <label>Ảnh</label>
                                    <input required id="img" type="file" name="img" class="form-control" onchange="changeImg(this)">
                                    <img id="avatar" class="thumbnail" width="300px" src="img/new_seo-10-512.png">
                                </div>

                                <div class="form-group" >
                                    <label>Tóm tắt</label>
                                    <textarea class="form-control" required name="summary"></textarea>
                                </div>

                                <div class="form-group" >
                                    <label>Nội dung</label>
                                    <textarea class='ckeditor' required name="content"></textarea>
                                </div>
                                <script type="text/javascript">
                                    var editor = CKEDITOR.replace('content',{
                                        language:'vi',
                                        filebrowserImageBrowseUrl: '../../public/admin/ckfinder/ckfinder.html?Type=Images',
                                        filebrowserFlashBrowseUrl: '../../public/admin/ckfinder/ckfinder.html?Type=Flash',
                                        filebrowserImageUploadUrl: '../../public/admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                        filebrowserFlashUploadUrl: '../../public/admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                                    });
                                </script>

                                <div class="form-group" >
                                    <label>Bài viết nổi bật</label><br>
                                    Có: <input type="radio" name="highlight" value="1">
                                    Không: <input type="radio" checked name="highlight" value="0">
                                </div>
                                <input type="submit" name="submit" value="Thêm" class="btn btn-primary">
                                <a href="{{asset('admin/posts')}}" class="btn btn-danger">Hủy bỏ</a>
                            </div>
                        </div>
                    </form>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div><!--/.row-->
</div>	<!--/.main-->
@endsection
