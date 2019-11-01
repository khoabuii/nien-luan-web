<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <base href="{{asset('public/pages')}}/">
    <title>@yield('title')</title>
    <link href="image/icon_loop.png" rel="shorcut icon" type="image/x-ico" >

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">
    <link href="css/my.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <img src="image/icon_loop.png" alt="writerpro" width=42px heigh=42px>


            </div>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{asset('/')}}">Writer Ctrl+C</a>

            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{asset('about')}}">Giới thiệu</a>
                    </li>
                    <!-- <li>
                        <a href="#">Liên hệ</a>
                    </li> -->
                </ul>

                <form class="navbar-form navbar-left" role="search" method="get" action="{{asset('search/')}}">
			        <div class="form-group">
			          <input type="text" class="form-control" placeholder="Tìm kiếm" name="result">
			        </div>
			        <button type="submit" class="btn btn-default glyphicon glyphicon-search"></button>
			    </form>

			    <ul class="nav navbar-nav pull-right">
                @if(Auth::user()==null)
                    <li>
                        <a href="{{asset('/register')}}">Đăng ký</a>
                    </li>
                    <li>
                        <a href="{{asset('/login')}}">Đăng nhập</a>
                    </li>
                @endif
                    <li>
                    @if(Auth::user())
                    	<a href="{{asset('account')}}">
                    		<span class ="glyphicon glyphicon-user"></span>

                    		{{Auth::user()->name}}

                    	</a>
                    </li>


                    <li>
                    	<a href="{{asset('/logout')}}">Đăng xuất</a>
                    </li>
                @endif
                </ul>
            </div>



            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>


@yield('main')

 <!-- Footer -->
 <hr>
    <footer>
        <div class="row">
            <div class="col-md-12">
                <p>Copyright &copy; Your Website 2019</p>
                <!-- <p>Người chịu trách nhiệm nội dung: Khoa Bui </p> -->
            </div>
        </div>
    </footer>
    <!-- end Footer -->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/my.js"></script>
    @yield('script')

</body>

</html>
