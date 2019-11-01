@extends('pages.main')

<head><title>{{$cates->cate_name}}</title></head>
@section('main')
<div class="container">
    <div class="row">
        @include('pages.menu')

        <div class="col-md-9 ">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color:#337AB7; color:white;">
                    <h4><b>{{$cates->cate_name}}</b></h4>
                </div>
                    @foreach($posts as $post)
                <div class="row-item row">
                    <div class="col-md-3">

                        <a href="{{asset('posts/'.$post->post_id.'/'.$post->post_slug)}}">
                            <br>
                            <img width="320px" height="200px" class="img-responsive" src="{{asset('lib/storage/app/avatar/'.$post->post_img)}}" alt="">
                        </a>
                    </div>

                    <div class="col-md-9">
                        <a href="{{asset('posts/'.$post->post_id.'/'.$post->post_slug)}}"> <h3>{{$post->post_title}}</h3> </a>
                        <p> <span class="glyphicon glyphicon-time"></span> {{$post->created_at}}   </p>
                        <!-- <p class="lead">
                                by <a href="#">Start Bootstrap</a>
                            </p> -->
                        <p>{{$post->post_summary}}</p>

                    </div>
                    <div class="break"></div>
                </div>
                @endforeach
                <!-- Pagination -->
                <div class="row text-center">
                    <div class="col-lg-12">
                        <ul class="pagination">
                        {{$posts->links()}}
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
