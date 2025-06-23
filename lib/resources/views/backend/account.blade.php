@extends('backend.master')
@section('title', 'Danh sách tài khoản')
@section('main')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    .account-item {
        border: 1px solid #337AB7;
        padding: 11px;
        box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.15) !important;
        margin-bottom: 10px;
        border-radius: 4px;
    }
    .close-btn {
        font-size: 21px;
        color: #337ab7;
        float: right;
        cursor: pointer;
    }
</style>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Tài khoản khách hàng</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-xs-12 col-md-5 col-lg-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Danh sách tài khoản
                    </div>
                    <div class="panel-body">
                        @foreach($accounts as $account)
                        <div class="account-item">
						    <a href="{{ asset('admin/account/delete/' . $account->id) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa tài khoản này không?')"><i class="fa fa-times close-btn" aria-hidden="true"></i></a>
                            <label class="customer-id">ID khách hàng: </label>
                                {{ $account->id }}
                            <br>
                            <label class="customer-phone">Email: </label>
                                {{ $account->email }}
                            <br>
                        </div>
                        @endforeach
                    </div>
                </div>
			</div>
		</div>
	</div>
@stop
