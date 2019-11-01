<div class="col-md-3 ">
        <ul class="list-group" id="menu">
            <li href="#" class="list-group-item menu1 active">
                Danh mục bài viết
            </li>
                @foreach($cate as $ca)
            <li href="#" class="list-group-item menu1">
                <a href="{{asset('category/'.$ca->cate_id.'/'.$ca->cate_slug)}}">{{$ca->cate_name}}</a>
            </li>
                @endforeach


        </ul>
    </div>
