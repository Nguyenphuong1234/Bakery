 Cake Shop - Hệ thống quản lý bánh ngọt

# WEB QUẢN LÝ TIỆM BÁNH NGỌT- CAKE SHOP
# Sinh viên thực hiện
- **Họ và tên:** Nguyễn Minh Phương  
- **Mã sinh viên:** 23015738  
- **Lớp:** Thiết kế web nâng cao-1-3-24 (COUR01.TH4)
***
# Mô Tả Dự Án
Ứng dụng Laravel giúp quản lý sản phẩm bánh ngọt, danh mục bánh ngọt và ngườ dùng. Hệ thống hỗ trợ đăng nhập, bảo mật, và thao tác CRUD với giao diện đơn giản.Giúp cả quản trị viên và khách hàng dễ dàng sử dụng.

Mục đích:
- Cung cấp công cụ cho quản trị viên để quản lý danh mục và sản phẩm bánh ngọt (CRUD), đồng thời phân quyền để bảo mật.
- Cho phép người dùng cuối đăng ký và đăng nhập an toàn, xem và tương tác với các sản phẩm.
  
## Công nghệ sử dụng
- Laravel 10
- Laravel Breeze (Xác thực)
- MySQL (qua XAMPP)
- Bootstrap

## Chức năng chính
Quản lý Người dùng (User)
- Đăng ký/đăng nhập/reset mật khẩu (Laravel Breeze)

Quản lý Danh mục bánh (Category)
- Thêm mới danh mục bánh ngọt (ví dụ: bánh kem, bánh quy, bánh su kem...)
- Thêm / Sửa / xóa danh mục
- Xem danh sách các danh mục

Quản lý bánh ngọt (CRUD)
- Thêm sản phẩm mới (gắn với một danh mục)
- Sửa / xóa sản phẩm
- Xem danh sách sản phẩm theo danh mục
- Upload hình ảnh, giá bán, mô tả sản phẩm

Bảo mật: XSS, CSRF, Validation, Auth, Authorization
***
