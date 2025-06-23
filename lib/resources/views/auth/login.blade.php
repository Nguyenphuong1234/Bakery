<!DOCTYPE html>
<html>
<head>
    <base href="{{ asset('public/layout/backend')}}/">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đăng nhập</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
</head>

<body>
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">Đăng nhập</div>
                <div class="panel-body">
                    <form role="form" method="POST" action="{{ route('login') }}">
                        @csrf
                        <fieldset>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="form-group">
                                <input class="form-control" placeholder="E-mail" name="email" type="email" value="{{ old('email') }}" required autofocus>
                            </div>

                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" required>
                            </div>

                            <input type="submit" value="Đăng nhập" class="btn btn-primary">

                            <p style="margin-top: 5px">
                                Bạn chưa có tài khoản ?
                                <a style="text-decoration: none;" href="{{ route('register') }}">Đăng ký ngay</a>
                            </p>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/chart.min.js"></script>
    <script src="js/chart-data.js"></script>
    <script src="js/easypiechart.js"></script>
    <script src="js/easypiechart-data.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script>
        !function ($) {
            $(document).on("click","ul.nav li.parent > a > span.icon", function(){
                $(this).find('em:first').toggleClass("glyphicon-minus");
            });
            $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
        }(window.jQuery);

        $(window).on('resize', function () {
            if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
        })
        $(window).on('resize', function () {
            if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
        })
    </script>
</body>
</html>