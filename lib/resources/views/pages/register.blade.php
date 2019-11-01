@extends('pages.main')
@section('title','Đăng ký')
@section('main')
    <!-- Page Content -->
    <div class="container">

    	<!-- slider -->
    	<div class="row carousel-holder">
            <div class="col-md-2">
            </div>

            <div class="col-md-8">
                <div class="panel panel-default">
				  	<div class="panel-heading">Đăng ký tài khoản</div>
				  	<div class="panel-body">
                      @include('noti.error')
                      @include('noti.thongbao')
				    	<form method="post">
				    		<div>
                            {{csrf_field()}}
				    			<label>Họ tên</label>
							  	<input type="text" class="form-control" required value="{{old('name')}}" placeholder="Họ tên" name="name" aria-describedby="basic-addon1">
							</div>
							<br>
							<div>
				    			<label>Email</label>
							  	<input type="email" class="form-control" required value="{{old('email')}}" placeholder="Email" name="email" aria-describedby="basic-addon1"
							  	>
							</div>
							<br>
							<div>
								<!-- <input type="checkbox" class="" name="checkpassword"> -->
				    			<label>Nhập mật khẩu</label>
							  	<input type="password" class="form-control" required placeholder="Nhập mật khẩu" name="password" aria-describedby="basic-addon1">
							</div>
							<br>
							<div>
				    			<label>Nhập lại mật khẩu</label>
							  	<input type="password" class="form-control" required placeholder="Nhập lại mật khẩu" name="re-password" aria-describedby="basic-addon1">
							</div>
							<br>
							<button type="submit" class="btn btn-default">Đăng ký
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
