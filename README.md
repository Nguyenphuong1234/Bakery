 Cake Shop - Hệ thống quản lý bánh ngọt

## Mô tả
Ứng dụng Laravel giúp quản lý sản phẩm bánh ngọt, danh mục bánh ngọt và ngườ idunfg. Hệ thống hỗ trợ đăng nhập, bảo mật, và thao tác CRUD với giao diện đơn giản.

## Công nghệ sử dụng
- Laravel 10
- Laravel Breeze (Xác thực)
- MySQL (qua XAMPP)
- Bootstrap

## Chức năng chính
- Đăng ký / Đăng nhập
- Quản lý bánh ngọt (CRUD)
- Quản lý danh mục bánh
- Quản lý người dùng
- Bảo mật: XSS, CSRF, Validation, Auth, Authorization

## Cài đặt
```bash
git clone 'url'
composer install
cp .env.example .env
php artisan key:generate
# Cập nhật thông tin DB trong .env
php artisan migrate --seed
Tài khoản mẫu
//admin
Email: admin@gmail.com
Pass: 123456
//user
Email: user@gmail.com
Pass: 123456