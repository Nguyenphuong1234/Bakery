@extends('frontend.master')
@section('title', 'Danh mục sản phẩm')
@section('main')
	<link rel="stylesheet" href="css/category.css">
	<div id="wrap-inner">
		<div class="products">
			<h3>{{ $category->cate_name }}</h3>
			<div style="gap: 15px;" class="product-list row">
				@foreach($product_cate as $prod_cate)
				<div style="border-radius: 15px;" class="product-item col-md-3 col-sm-6 col-xs-12">
					<a href="#"><img height="150px" src="{{ asset('lib/storage/app/avatar/'.$prod_cate->prod_img) }}" class="img-thumbnail"></a>
					<p><a href="#">{{ $prod_cate->prod_name }}</a></p>
					<p class="price">{{ number_format($prod_cate->prod_price,0,',','.' )}} VND</p>
					<div class="marsk">
						<a href="{{ asset('/detail/' . $prod_cate->prod_id) }}">Xem chi tiết</a>
					</div>
				</div>
				@endforeach
			</div>
		</div>

		<div id="pagination">
			{{ $product_cate->links('vendor.pagination.default') }}
		</div>
	</div>
@stop
