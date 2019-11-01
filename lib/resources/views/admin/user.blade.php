@extends('admin.main')
@section('title','Users list')
@section('main')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Users</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">

				<div class="panel panel-primary">
                @include('noti.thongbao')
					<div class="panel-heading">Danh sách Users</div>
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								<a href="{{asset('admin/users/add')}}" class="btn btn-primary">Thêm Users</a>
								<table class="table table-bordered" style="margin-top:20px;">
									<thead>
										<tr class="bg-primary">
											<th>ID</th>
											<th width="30%">Tên</th>
											<th width="12.5%">Level</th>
											<th width="40%">Email</th>
											<th width="20%">Tùy chọn</th>
										</tr>
									</thead>
									<tbody>
                                    @foreach($users as $u)
										<tr>
											<td>{{$u->id}}</td>
											<td>{{$u->name}}</td>
											<td>@if($u->level==1)
                                                Admin
                                                @else
                                                Thường
                                                @endif
                                            </td>
											<td>
                                                {{$u->email}}
											</td>
											<td>
                                                <a href="{{asset('admin/users/edit/')}}/{{$u->id}}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Sửa</a>
			                    		        <a href="{{asset('admin/users/delete/')}}/{{$u->id}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Xóa</a>
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
@endsection
