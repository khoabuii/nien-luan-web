@extends('pages.main')
@section('title','Tìm kiếm')

@section('main')
<!-- Page Content -->
<div class="container">
    <div class="row">
        @include('pages.menu')
        <?php
                function changeColor($str,$key){
                  return  str_replace($key,"<span style='color:red;'>$key</span>",$str);
                }
        ?>
        <div class="col-md-9 ">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color:#337AB7; color:white;">
                    <h4>Tìm kiếm với từ khóa: <b style='color:red;'>{{$key}}</b></h4>
                </div>
                    @foreach($items as $item)
                <div class="row-item row">
                    <div class="col-md-3">

                        <a href="{{asset('posts/'.$item->post_id.'/'.$item->post_slug)}}">
                            <br>
                            <img width="320px" height="200px" class="img-responsive" src="{{asset('lib/storage/app/avatar/'.$item->post_img)}}" alt="">
                        </a>
                    </div>

                    <div class="col-md-9">
                        <a href="{{asset('posts/'.$item->post_id.'/'.$item->post_slug)}}"> <h3>{!! changeColor($item->post_title,$key) !!}</h3> </a>
                        <p><span class="glyphicon glyphicon-time"></span> {{$item->created_at}}  <span>Trong</span> <strong><a href="{{asset('category/'.$item->category->cate_id.'/'.$item->category->cate_slug)}}">{{$item->category->cate_name}}</a> </strong> </p>
                        <!-- <p class="lead">
                                by <a href="#">Start Bootstrap</a>
                            </p> -->
                        <p>{!! changeColor($item->post_summary,$key) !!}</p>

                    </div>
                    <div class="break"></div>
                </div>
                @endforeach
                <!-- Pagination -->
                <div class="row text-center">
                    <div class="col-lg-12">
                        <ul class="pagination">
                        {{-- {{$items->links()}} --}}
                {{$items->appends(Request::all())->links() }}
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
