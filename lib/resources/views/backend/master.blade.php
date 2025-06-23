<!DOCTYPE html>
<html>
    <head>
        <base href="{{ asset('public/layout/backend')}}/">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title') | Cake Shop</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/datepicker3.css" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script type="text/javascript" src="../../editor/ckeditor/ckeditor.js"></script>
        <script src="js/lumino.glyphs.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
            @endif
            <div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="{{ asset('admin/home') }}"> Cake Shop Admin</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> {{ Auth::user()->email }} <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="{{ asset('logout') }}"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Đăng xuất</a></li>
						</ul>
					</li>
				</ul>
			</div>

		</div><!-- /.container-fluid -->
	</nav>

	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<ul class="nav menu">
			<li role="presentation" class="divider"></li>
			<li class="home-btn"><a style="display: flex !important; align-items: center;" href="{{ asset('admin/home') }}"><i style="font-size: 17px; margin-right: 8px;" class="fa fa-home" aria-hidden="true"></i> Trang chủ</a></li>
			<li class="account-btn"><a style="display: flex !important; align-items: center;" href="{{ asset('admin/account') }}"><i style="font-size: 17px; margin-right: 7px;" class="fa fa-users" aria-hidden="true"></i> Người dùng</a></li>
			<li class="product-btn"><a style="display: flex !important; align-items: center;" href="{{ asset('admin/product') }}"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg> Sản phẩm</a></li>
			<li class="category-btn"><a style="display: flex !important; align-items: center;" href="{{ asset('admin/category') }}"><svg class="glyph stroked app-window-with-content"><use xlink:href="#stroked-app-window-with-content"></use></svg> Danh mục</a></li>
			<li class="comment-btn"><a style="display: flex !important; align-items: center;" href="{{ asset('admin/comment') }}"><i style="font-size: 18px; margin-right: 8px;" class="fa fa-pencil-square-o" aria-hidden="true"></i> Bình luận</a></li>
            <li role="presentation" class="divider"></li>
		</ul>
	</div><!--/.sidebar-->

    <!--/Main-->
    @yield('main')

    <script>
		let home = document.querySelector('.home-btn');
		let product = document.querySelector('.product-btn');
		let category = document.querySelector('.category-btn');
		let account = document.querySelector('.account-btn');
		let comment = document.querySelector('.comment-btn');

		home.addEventListener('click', function() {
			home.classList.add('active');
		});
		product.addEventListener('click', function() {
			product.classList.add('active');
		});
		category.addEventListener('click', function() {
			category.classList.add('active');
		});
        account.addEventListener('click', function() {
			account.classList.add('active');
		});
        comment.addEventListener('click', function() {
			comment.classList.add('active');
		});
	</script>
    <script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
		$('#calendar').datepicker({
		});

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
