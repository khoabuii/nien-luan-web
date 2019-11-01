@extends('pages.main')
@section('title','Giới thiệu')
@section('main')
<div class="container">
    <div class="row">
        @include('pages.menu')

            <div class="col-md-9">
	            <div class="panel panel-default">
	            	<div class="panel-heading" style="background-color:#337AB7; color:white;" >
	            		<h2 style="margin-top:0px; margin-bottom:0px;">Giới thiệu</h2>
	            	</div>

	            	<div class="panel-body">
	            		<!-- item -->
                        <p>Đ&acirc;y l&agrave; trang web Blog do t&ocirc;i x&acirc;y dựng tr&ecirc;n dự &aacute;n ni&ecirc;n luận cơ sở ng&agrave;nh CNTT trường Đại học Cần Thơ do c&ocirc; Phạm Thị Xu&acirc;n Diễm hướng dẫn. Trang web được x&acirc;y dựng dựa tr&ecirc;n Framework Laravel.</p>

                        <p>---------------------------------------------------------------------------------------------------------------------------</p>

                        <p>Li&ecirc;n hệ:</p>

                        <p>Facebook:&nbsp;<a href="https://www.facebook.com/khoabuii">https://www.facebook.com/khoabuii</a></p>

                        <p>Twitter:&nbsp;<a href="https://twitter.com/KhoaBui98">https://twitter.com/KhoaBui98</a></p>

                        <p>Instagram:&nbsp;<a href="https://www.instagram.com/khoa.buii/">https://www.instagram.com/khoa.buii/</a></p>


					</div>
	            </div>
        	</div>
        </div>
        <!-- /.row -->
    </div>
    <!-- end Page Content -->
@endsection
