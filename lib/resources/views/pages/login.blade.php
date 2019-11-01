@extends('pages.main')
@section('title','Đăng nhập')
@section('main')
    <!-- Page Content -->
    <div class="container">

    	<!-- slider -->

    		<div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="panel panel-default">
				  	<div class="panel-heading">Đăng nhập</div>
				  	<div class="panel-body">
                      @include('noti.error')
                      @include('noti.thongbao')
				    	<form method="post">
                        {{csrf_field()}}
							<div>
				    			<label>Email</label>
							  	<input type="email" value="{{old('email') }}" class="form-control" placeholder="Email" name="email" autofocus=""
							  	>
							</div>
							<br>
							<div>
				    			<label>Mật khẩu</label>
							  	<input type="password" required class="form-control" placeholder="Mật khẩu" name="password">
							</div>
							<br>
							<button type="submit" class="btn btn-default">Đăng nhập
							</button>
				    	</form>
				  	</div>
				</div>
            </div>
            <div class="col-md-4"></div>

    </div>
    <!-- end Page Content -->

 @endsection
