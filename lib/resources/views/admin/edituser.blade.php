@extends('admin.main')
@section('title','Sửa thông tin người dùng')
@section('main')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Sửa thông tin người dùng</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				<div class="panel panel-primary">
					<div class="panel-heading">{{$users->name}}</div>
					<div class="panel-body">
                    @include('noti.error')
						<form method="post">
							<div class="row" style="margin-bottom:40px">
								<div class="col-xs-8">
									<div class="form-group" >
										<label>Họ và tên</label>
										<input required type="text" value='{{$users->name}}' name="name" class="form-control">
									</div>

									<div class="form-group" >
										<label>Email</label>
										<input type="email" disabled value='{{$users->email}}' name="email" class="form-control">
									</div>

									<div class="form-group" >
                                        <input type="checkbox" name='changePassword' id='changePassword' >
                                         <label>Đổi mật khẩu</label> <br><br>
										<label>Mật khẩu</label>
										<input type="password" disabled='' name="password" class="form-control password">
									</div>
									<div class="form-group" >
										<label>Nhập lại mật khẩu</label>
										<input type="password" disabled='' name="re_password" class="form-control password">
									</div>
									<input type="submit" name="submit" value="Sửa" class="btn btn-primary">
									<a href="{{asset('admin/users')}}" class="btn btn-danger">Hủy bỏ</a>
								</div>
							</div>
                            {{csrf_field()}}
						</form>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->

@endsection

@section('script')
        <script>
            $(document).ready(function(){
                $("#changePassword").change(function(){
                    if($(this).is(":checked")){
                        $(".password").removeAttr('disabled');
                    }else{
                        $(".password").attr('disabled','');
                    }
                });
            });
        </script>
@endsection
