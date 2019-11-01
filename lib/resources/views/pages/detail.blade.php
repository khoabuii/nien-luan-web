@extends('pages.main')
<head><title>{{$posts->post_title}}</title></head>
@section('main')

    <!-- Page Content -->
    <div class="container">
        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-9">

                <!-- Blog Post -->

                <!-- Title -->
                <h1>{{$posts->post_title}}</h1>

                <!-- Author -->
                <p class="lead">
                    Trong <b> <a href="{{asset('category/'.$posts->category->cate_id.'/'.$posts->category->cate_slug)}}">{{$posts->category->cate_name}}</a> </b>
                </p>
                <!-- Date/Time -->
                <p>Ngày đăng:          <span class="glyphicon glyphicon-time"></span>{{$posts->created_at}}</p>
                <p>Cập nhật mới nhất:  <span class="glyphicon glyphicon-time"></span>{{$posts->updated_at}}</p>
                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="{{asset('lib/storage/app/avatar/'.$posts->post_img)}}" width='900px' height='270px' alt="">


                <!-- Post Content -->
                <p class="lead">{!!$posts->post_content!!}</p>

                <hr>

                <!-- Blog Comments -->
                    @include('noti.thongbao')
                <!-- Comments Form -->
                @if(Auth::user())
                <div class="well">
                    <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
                    <form role="form" method="post">
                    {{csrf_field()}}
                        <div class="form-group">
                            <textarea class="form-control" name="content" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Gửi</button>
                    </form>
                </div>
                @endif
                <hr>

                <!-- Posted Comments -->
                <div class="well">
                    <h2>Bình luận<span ></span></h2>


                </div>
                 <!-- Comment -->
                @foreach($comments as $cm)
                <div class="media">

                    <div class="media-body">
                        <h4 class="media-heading">{{$cm->user->name}}
                            <small>{{$cm->created_at}}</small>
                        </h4>
                        {{$cm->com_content}}
                    </div>
                </div>

                @endforeach

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-3">

                <div class="panel panel-default">
                    <div class="panel-heading"><b>Bạn có thể đọc thêm</b></div>
                    <div class="panel-body">

                    @foreach($posts_lq as $lq)
                        <!-- item -->
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-5">
                                <a href="{{asset('posts/'.$lq->post_id.'/'.$lq->post_slug)}}">
                                    <img class="img-responsive" src="{{asset('lib/storage/app/avatar/'.$lq->post_img)}}" alt="">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <a href="{{asset('posts/'.$lq->post_id.'/'.$lq->post_slug)}}"><b>{{$lq->post_title}}</b></a>
                            </div>
                            <!-- <p>{{$lq->post_summary}}</p> -->
                            <div class="break"></div>
                        </div>
                        <!-- end item -->
                    @endforeach
                    </div>
                </div>



            </div>

        </div>
        <!-- /.row -->
    </div>
    <!-- end Page Content -->
@endsection
