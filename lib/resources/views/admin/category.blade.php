@extends('admin.main')
@section('title','Danh mục loại tin')
@section('main')
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh mục loại tin</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-xs-12 col-md-5 col-lg-5">
					<div class="panel panel-primary">
						<div class="panel-heading">
							Thêm danh mục
						</div>
                        @include('noti.error')

						<form action="" method='post'>
                        {{csrf_field()}}
							<div class="form-group">
								<label>Tên danh mục:</label>
    							<input type="text" name="name" require class="form-control" placeholder="Tên danh mục...">
							</div>
                            <div class='form-group'>
                                <input type="submit" name='submit' class='form-control btn btn-primary' value='Thêm'>
                            </div>
                        </form>
					</div>
			</div>
			<div class="col-xs-12 col-md-7 col-lg-7">
				<div class="panel panel-primary">
					<div class="panel-heading">Danh sách danh mục bài viết</div>
					<div class="panel-body">
						<div class="bootstrap-table">
                        @include('noti.thongbao')
							<table class="table table-bordered">
				              	<thead>
					                <tr class="bg-primary">
					                  <th>Tên danh mục</th>
					                  <th style="width:30%">Tùy chọn</th>
					                </tr>
				              	</thead>
				              	<tbody>
                                  @foreach($cate_list as $cate)
								<tr>
									<td>{{$cate->cate_name}}</td>
									<td>
			                    		<a href="{{asset('admin/category/edit/')}}/{{$cate->cate_id}}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Sửa</a>
			                    		<a href="{{asset('admin/category/delete/')}}/{{$cate->cate_id}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Xóa</a>
			                  		</td>
			                  	</tr>
			                  	@endforeach
				                </tbody>
				            </table>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
@endsection
