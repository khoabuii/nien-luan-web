@extends('admin.main')
@section('title','Sữa danh mục')
@section('main')
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh mục <strong>{{$cate->cate_name}}</strong></h1>
			</div>
		</div><!--/.row-->

		<div class="row">
        @include('noti.error')
        <form action="" method="post">
        {{csrf_field()}}
			<div class="col-xs-12 col-md-5 col-lg-5">
					<div class="panel panel-primary">
						<div class="panel-heading">
							Sửa danh mục
						</div>
						<div class="panel-body">
							<div class="form-group">
								<label>Tên danh mục:</label>
    							<input type="text" name="name" class="form-control"
                                value='{{$cate->cate_name}}' placeholder="Tên danh mục...">
							</div>
                            <div class='form-group'>
                            <input type="submit" name='submit' class='form-control btn btn-primary' value='Sữa'>
                            </div>
                            <div class='form-group'>
                            <a href="{{asset('admin/category')}}"  class='form-control btn btn-danger'>Hủy bỏ</a>
                            </div>
						</div>
					</div>
			</div>
        </form>
		</div><!--/.row-->
	</div>	<!--/.main-->
@endsection
