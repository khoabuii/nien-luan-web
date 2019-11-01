@extends('pages.main')
@section('title','Trang chủ')

@section('main')
<!-- Page Content -->
<div class="container">
    <div class="row">
        @include('pages.menu')

        <div class="col-md-9 ">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color:#337AB7; color:white;">
                    <h4><b>Trang chủ</b></h4>
                </div>
                    @foreach($highlight as $hl)
                <div class="row-item row">
                    <div class="col-md-3">

                        <a href="{{asset('posts/'.$hl->post_id.'/'.$hl->post_slug)}}">
                            <br>
                            <img width="320px" height="200px" class="img-responsive" src="{{asset('lib/storage/app/avatar/'.$hl->post_img)}}" alt="">
                        </a>
                    </div>

                    <div class="col-md-9">
                        <a href="{{asset('posts/'.$hl->post_id.'/'.$hl->post_slug)}}"> <h3>{{$hl->post_title}}</h3> </a>
                        <p><span class="glyphicon glyphicon-time"></span> <b> {{$hl->created_at}}</b>  <span>Trong</span> <b><a style='color:blue;' hover="color:ffff;" href="{{asset('category/'.$hl->category->cate_id.'/'.$hl->category->cate_slug)}}">{{$hl->category->cate_name}}</a> </b> </p>
                        <!-- <p class="lead">
                                by <a href="#">Start Bootstrap</a>
                            </p> -->
                        <p>{{$hl->post_summary}}</p>

                    </div>
                    <div class="break"></div>
                </div>
                @endforeach
                <!-- Pagination -->
                <div class="row text-center">
                    <div class="col-lg-12">
                        <ul class="pagination">
                        {{$highlight->links()}}
                        </ul>
                    </div>
                </div>
                <!-- /.row -->

            </div>
        </div>

    </div>

</div>
<!-- end Page Content -->
@endsection
