@extends('admin.main')
@section('title','Quản lí bài viết')
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
					<div class="panel-heading">Danh sách bài viết</div>
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								<a href="{{asset('admin/posts/add')}}" class="btn btn-primary">Thêm Bài viết</a>
                                @include('noti.thongbao')
								<table class="table table-bordered" style="margin-top:20px;">
									<thead>
										<tr class="bg-primary">
											<th>ID</th>
											<th width="30%">Tiêu đề</th>
											<th width="30%">Tóm tắt</th>
											<th width="12.5%">Danh mục</th>
											<th>Nổi bật</th>
											<th>Tùy chọn</th>
										</tr>
									</thead>
									<tbody>
                                    @foreach($items as $item)
										<tr>
											<td>{{$item->post_id}}</td>
											<td>{{$item->post_title}}
                                            <img width="200px" src="{{asset('lib/storage/app/avatar/'.$item->post_img)}}" class="thumbnail">
                                            </td>
											<td>{{$item->post_summary}}</td>
											<td>
                                                {{$item->cate_name}}
											</td>
											<td>
                                            @if($item->post_highlight==1)
                                                Có
                                            @else
                                                Không
                                            @endif
                                            </td>
											<td>
												<a href="{{asset('admin/posts/edit/'.$item->post_id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
												<a href="{{asset('admin/posts/delete/'.$item->post_id)}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
											</td>
										</tr>
                                    @endforeach
									</tbody>
								</table>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
