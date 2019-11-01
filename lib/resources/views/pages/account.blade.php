@extends('pages.main')
@section('title','Thông tin tài khoản')
@section('main')
    <!-- Page Content -->
    <div class="container">

    	<!-- slider -->
    	<div class="row carousel-holder">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
				  	<div class="panel-heading">Thông tin tài khoản</div>
				  	<div class="panel-body">
				    	<form method="post">
                        {{csrf_field()}}
				    		<div>
				    			<label>Họ tên</label>
							  	<input type="text" class="form-control" value="{{$user->name}}" placeholder="Username" name="name" aria-describedby="basic-addon1">
							</div>
							<br>
							<div>
				    			<label>Email</label>
							  	<input type="email" class="form-control"  value="{{$user->email}}" placeholder="Email" name="email" aria-describedby="basic-addon1"
							  	disabled
							  	>
							</div>
							<br>
							<div>
								<input type="checkbox" class=""  name='changePassword' id='changePassword'>
				    			<label>Đổi mật khẩu</label>
							  	<input type="password" class="form-control password" disabled='' name="password" aria-describedby="basic-addon1">
							</div>
							<br>
							<div>
				    			<label>Nhập lại mật khẩu</label>
							  	<input type="password" class="form-control password" disabled='' name="re-password" aria-describedby="basic-addon1">
							</div>
							<br>
							<button type="submit" class="btn btn-default">Sửa
							</button>

				    	</form>
				  	</div>
				</div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
        <!-- end slide -->
    </div>
    <!-- end Page Content -->
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
