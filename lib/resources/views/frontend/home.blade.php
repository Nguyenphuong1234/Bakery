@extends('frontend.master')
@section('title', 'Trang chủ')
@section('main')
<style>
     .contact-icon {
                font-size: 31px;
                position: fixed;
                right: 51px;
                bottom: 88px;
                padding: 9px;
                background: #ffc107;
                border-radius: 50%;
                color: #fff;
                cursor: pointer;
            }
            .contact {
                width: 260px;
                position: fixed;
                right: 52px;
                bottom: 140px;
                padding: 9px;
                background: #fff;
                border-radius: 7px;
                cursor: pointer;
                border: 1.5px solid #ffc107 !important;
                box-sizing: border-box !important;
                box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.15) !important;
                border-radius: 7px !important;
            }
            .contact-title {
                font-size: 17px;
				margin-top: 7px;
            }
            .contact label {
                margin: 0;
            }
            .contact input {
				border: none;
                width: 100%;
                border: 1px solid #d8d8d8;
                border-radius: 3px ;
                padding: 3px;
                margin-bottom: 4px;
            }
            .contact input:focus {
                border: 1px solid #ffc107 ;
				outline: #ffc107;
            }
            .submit-contact-btn {
                padding: 4px 17px;
                border: none;
                border-radius: 5px;
                background: #ffc107;
                color: #fff;
                cursor: pos;
                cursor: pointer;
                margin-top: 6px;
                float: right;
            }
			.close-btn {
				position: absolute;
				right: 9px;
				top: 6px;
				font-size: 21px;
				color: #ffc107;
			}
</style>
<link rel="stylesheet" href="css/category.css">
	<div id="wrap-inner">
		<div class="products">
			<h3>sản phẩm nổi bật</h3>
			<div style="gap: 15px;" class="product-list row">
				@foreach($product_featured as $prod_featured)
				<div style="border-radius: 10px;" class="product-item col-md-3 col-sm-6 col-xs-12">
					<a href="#"><img height="150px" src="{{ asset('lib/storage/app/avatar/'.$prod_featured->prod_img) }}" class="img-thumbnail"></a>
					<p><a href="#">{{ $prod_featured->prod_name }}</a></p>
					<p class="price">{{ number_format($prod_featured->prod_price,0,',','.' )}} VND</p>
					<div class="marsk">
						<a href="{{ asset('/detail/' . $prod_featured->prod_id) }}">Xem chi tiết</a>
					</div>
				</div>
				@endforeach
			</div>
		</div>

		<div id="pagination">
			{{ $product_featured->links('vendor.pagination.default') }}
		</div>

		<div class="products">
			<h3>sản phẩm mới</h3>
			<div style="gap: 15px;" class="product-list row">
				@foreach($product_new as $prod_new)
				<div style="border-radius: 10px;" class="product-item col-md-3 col-sm-6 col-xs-12">
					<a href="#"><img src="{{ asset('lib/storage/app/avatar/'.$prod_new->prod_img) }}" class="img-thumbnail"></a>
					<p><a href="#">{{ $prod_new->prod_name }}</a></p>
					<p class="price">{{ number_format($prod_new->prod_price,0,',','.' ) }} VND</p>
					<div class="marsk">
						<a href="{{ asset('/detail/' . $prod_new->prod_id) }}">Xem chi tiết</a>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
@stop
