@extends('frontend.master')
@section('title', 'Đổi mật khẩu')
@section('main')
<style>
    .form-changepass {
        width: 433px;
        margin: auto;
        margin-top: 25px;
        padding: 22px;
        border: 1px solid #ddd;
    }
    .form-title {
        text-align: center;
    }
</style>
	<div id="wrap-inner">
        <form class="form-changepass" method="POST">
            @csrf
            @include('errors.note')
            <h1 class="form-title">Đổi mật khẩu</h1>
            <div class="form-group">
                <label for="current_password">Mật khẩu hiện tại</label>
                <input type="password" id="current_password" name="current_password" class="form-control" value="{{ old('current_password') }}">
            </div>

            <div class="form-group">
                <label for="new_password">Mật khẩu mới</label>
                <input type="password" id="new_password" name="new_password" class="form-control"  value="{{ old('new_password') }}">
            </div>

            <div class="form-group">
                <label for="new_password_confirmation">Xác nhận mật khẩu mới</label>
                <input type="password" id="new_password_confirmation" name="new_password_confirmation" class="form-control">
            </div>

            <input style="display: flex; cursor: pointer;" type="submit" class="btn btn-primary m-auto" value="Đổi mật khẩu">
        </form>

	</div>
@stop
