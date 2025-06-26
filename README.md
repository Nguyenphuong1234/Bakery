<h1 align="center">WEB QUẢN LÝ TIỆM BÁNH NGỌT- CAKE SHOP</h1>

# Sinh viên thực hiện
- **Họ và tên:** Nguyễn Minh Phương  
- **Mã sinh viên:** 23015738  
- **Lớp:** Thiết kế web nâng cao-1-3-24 (COUR01.TH4)
  
# Mô Tả Dự Án
Ứng dụng Laravel giúp quản lý sản phẩm bánh ngọt, danh mục bánh ngọt và ngườ dùng. Hệ thống hỗ trợ đăng nhập, bảo mật, và thao tác CRUD với giao diện đơn giản.Giúp cả quản trị viên và khách hàng dễ dàng sử dụng.

Mục đích:
- Cung cấp công cụ cho quản trị viên để quản lý danh mục và sản phẩm bánh ngọt (CRUD), đồng thời phân quyền để bảo mật.
- Cho phép người dùng cuối đăng ký và đăng nhập an toàn, xem và tương tác với các sản phẩm.
  
# Công nghệ sử dụng
- Laravel 10
- Laravel Breeze (Xác thực)
- MySQL (qua XAMPP)
- Bootstrap

# Chức năng chính
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

Bảo mật:CSRF, Validation, Auth, Authorization,...
# Sơ đồ hệ thống Website
## Sơ đồ chức năng
![Screenshot 2025-06-26 104315](https://github.com/user-attachments/assets/bbdea1d5-d896-4c1e-9f2b-bdd5a1563a75)

## Sơ đồ thuật toán
### Đăng nhập 
![Screenshot 2025-06-19 111155](https://github.com/user-attachments/assets/39dc9222-15d0-4b30-a014-df7edbd807e6)

### Đăng ký
![Screenshot 2025-06-19 113019](https://github.com/user-attachments/assets/15bae9cb-01a9-427f-a261-cf5362343ffb)

### Người dùng truy cập web khi đã đăng nhập
![image](https://github.com/user-attachments/assets/052b3f9f-4394-4b67-86f9-c76a9c8d8270)

### Admin truy cập hệ thống sau khi đăng nhập
![image](https://github.com/user-attachments/assets/50e25858-4185-42e6-92e5-bbd2b0ff16f9)

## Sơ đồ khối
![gen-h-z6739914805235_5fa9cb3881d6eedb44a8993527471a5f](https://github.com/user-attachments/assets/909066da-479f-40df-8092-82ee1153bb55)

## Sơ đồ cấu trúc (Class Diagram)
![Screenshot 2025-06-26 102851](https://github.com/user-attachments/assets/f22350a1-f29e-48c8-9f97-c841ac3b4803)

***
# Code minh hoạ Project
## Model
User Model
```bash
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\VpProduct;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class VpUser extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $table = 'vp_users';

    protected $fillable = [
        'email',
        'password',
        'level',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function favoriteProducts()
    {
        return $this->belongsToMany(VpProduct::class, 'vp_favourite_products', 'user_id', 'favou_product');
    }
}
```
Product Model
```bash
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\VpFavouriteProduct;

class VpProduct extends Model
{
    use HasFactory;
    protected $primaryKey = 'prod_id';
    protected $guarded = [];

    public function favorite()
    {
        return $this->hasMany(VpFavouriteProduct::class, 'favou_product', 'prod_id');
    }
}
```
VpCategory Model
```bash
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VpCategory extends Model
{
    use HasFactory;

    protected $primaryKey = 'cate_id';
    protected $guarded = [];
}
```
VpComment Model
```bash
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VpComment extends Model
{
    use HasFactory;

    protected $primaryKey = 'com_id';

}
```



## Controller
ProductController

```bash
 <?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddProductRequest;
use App\Models\VpCategory;
use App\Models\VpProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function getProduct()
    {
        $product_list = DB::table('vp_products')->join('vp_categories','vp_products.prod_cate', '=', 'vp_categories.cate_id')->orderBy('prod_id','desc')->get();
        return view('backend.product', compact('product_list'));
    }

    public function getCreateProduct()
    {
        $categories = VpCategory::all();
        return view('backend.addproduct', compact('categories'));
    }

    public function postCreateProduct(AddProductRequest $request)
    {
        $filename = $request->img->getClientOriginalName(); // lay file anh

        $product = new VpProduct;

        $product->prod_name = $request->product_name;
        $product->prod_slug = Str::slug( $request->product_name);
        $product->prod_img = $filename;
        $product->prod_price = $request->price;
        $product->prod_condition = $request->condition;
        $product->prod_status = $request->status;
        $product->prod_description = $request->description;
        $product->prod_cate = $request->cate;
        $product->prod_featured = $request->featured;
        $request->img->storeAs('avatar',$filename);
        $product->save();

        return redirect()->intended('admin/product')->with('success', 'Thêm sản phẩm thành công!');;
    }

    public function getEditProduct($id)
    {
        $product = VpProduct::find($id);
        $categories = VpCategory::all();
        return view('backend.editproduct', compact('product', 'categories'));
    }

    public function putUpdateProduct(AddProductRequest $request, $id)
    {
        $product = VpProduct::find($id);

        $product->prod_name = $request->product_name;
        $product->prod_slug = Str::slug($request->product_name);
        $product->prod_price = $request->price;
        $product->prod_condition = $request->condition;
        $product->prod_status = 1;
        $product->prod_description = $request->description;
        $product->prod_cate = $request->cate;
        $product->prod_featured = $request->featured;
        if($request->hasFile('img')) {
            $img = $request->img->getClientOriginalName();
            $product->prod_img = $img;
        $request->img->storeAs('avatar',$img);
        }
        $product->save();
        return redirect()->intended('admin/product')->with('success', 'Chỉnh sửa sản phẩm thành công!');;
    }

    public function getDeleteProduct($id)
    {
        $product = VpProduct::find($id);

        $product->delete();

        return redirect()->intended('admin/product')->with('success', 'Xóa sản phẩm thành công!');;
    }
}
```
CategoryController
```bash
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VpCategory;
use Illuminate\Http\Request;
use App\Http\Requests\AddCategoryRequest;
use App\Http\Requests\EditCategoryRequest;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function getCategory()
    {
        $categories = VpCategory::all();

        return view('backend.category', compact('categories'));
    }
    public function postCreateCategory(AddCategoryRequest $request)
    {
        $category = new VpCategory;
        $category->cate_name = $request->category_name;
        $category->cate_slug = Str::slug($request->category_name);

        $category->save();
        return back()->with('success', 'Thêm mới danh mục thành công!');
    }
    public function getEditCategory($id)
    {
        $category = VpCategory::find($id);

        return view('backend.editcategory', compact('category'));
    }
    public function putUpdateCategory(EditCategoryRequest $request, $id)
    {
        $category = VpCategory::find($id);

        $category->cate_name = $request->category_name;
        $category->cate_slug = Str::slug($request->category_name);

        $category->save();
        return redirect()->intended('admin/category')->with('success', 'Chỉnh sửa danh mục thành công!');
    }
    public function getDeleteCategory($id)
    {
        $category = VpCategory::find($id);

        $category->delete();

        return redirect()->intended('admin/category')->with('success', 'Xóa danh mục thành công!');
    }
}
```
CommentController
```bash
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VpComment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function getComment()
    {
        $comment_not_confirm = VpComment::Where('com_status', 0)->get();
        $comment_confirmed = VpComment::Where('com_status', 1)->get();

        return view('backend.comment', compact('comment_not_confirm', 'comment_confirmed'));
    }
    public function getDeleteComment($id)
    {
        $comment = VpComment::find($id);
        $comment->delete();

        return redirect()->intended('admin/comment')->with('success', 'Xóa bình luận thành công!');
    }
    public function confirmComment($id)
    {
        $comment = VpComment::find($id);
        $comment->com_status = 1;
        $comment->save();

        return redirect()->intended('admin/comment')->with('success', 'Duyệt bình luận thành công!');
    }
}
```
***


## View
Cấu trúc chính của view

<img src="https://github.com/user-attachments/assets/609e0249-c586-45f0-a24f-a548b25121d2" style="width:500px; height:auto;" />


## 🔒 Security Setup
### Auth
- Xác thực là quá trình kiểm tra danh tính của người dùng. Bắt buộc người dùng phải có tài khoản và đăng nhập
  ![Screenshot 2025-06-25 232631](https://github.com/user-attachments/assets/aa8d317c-1679-4377-9ee6-9c325b6b8df9)
### Validation
- Kiểm tra dữ liệu đầu vào (mật khẩu không rỗng, đủ dài, khớp nhau), Ngăn lỗi logic, Cải thiện bảo mật, Hiển thị lỗi người dùng rõ ràng.
  ![Screenshot 2025-06-26 002143](https://github.com/user-attachments/assets/28f61de9-130f-4d13-aeaa-ce6ca00d9ff2)
  
### Authorization
- Bảo vệ chức năng quan trọng (Chỉ admin mới được xóa tài khoản, duyệt bình luận, v.v.)
- Chia quyền người dùng (Phân biệt quyền của khách, nhân viên, quản lý...)
- Tránh lạm quyền (Người dùng thường không thể làm việc của admin)
![Screenshot 2025-06-26 003323](https://github.com/user-attachments/assets/ec735b90-065a-4b0a-8d01-f00f0c74c9dd)

### CSRF
- Sử dụng @csrf để bảo vệ chống tấn công giả mạo yêu cầu từ phía người dùng:
![Screenshot 2025-06-26 010013](https://github.com/user-attachments/assets/8ff970ef-c9bc-4a69-9d45-6613c9df9ff4)





****
# Một Số Hình Ảnh Chức Năng Chính
## Trang Chủ
![Screenshot 2025-06-19 033333](https://github.com/user-attachments/assets/62d3392c-cdd7-4a0c-8012-e73f5de9ce72)

***
## Xác thực người dùng (Breeze)
- Đăng nhập
![Screenshot 2025-06-19 022554](https://github.com/user-attachments/assets/0c0adbb8-d516-4c63-ae0e-2b748c9fb81c)

- Đăng kí
![Screenshot 2025-06-19 022615](https://github.com/user-attachments/assets/9e467f05-0e4b-4941-977f-ca0234465335)

- Đổi mật khẩu
![Screenshot 2025-06-19 022642](https://github.com/user-attachments/assets/1aed320e-f3f1-4408-807b-a6e5292e97be)

## Trang Admin
![image](https://github.com/user-attachments/assets/4b3919ca-f426-4593-83e2-746b8c43eb4a)

- Trang quản lí người dùng- Tài khoản khách hàng
![Screenshot 2025-06-19 023704](https://github.com/user-attachments/assets/ca22ea28-b81c-4212-9e61-08936ae2e3d3)

- Trang danh sách sản phẩm
  +Thêm, sửa, xóa sản phẩm
![Screenshot 2025-06-19 023926](https://github.com/user-attachments/assets/d204d28d-3da5-4ef3-b118-7338f917253b)

- Thêm sản phẩm
   + Tên bánh – nhập tên sản phẩm.
   + Danh mục – chọn loại bánh (VD: Bánh sinh nhật, Bánh vẽ tay,...).
   + Ảnh bánh – chọn file hình ảnh từ máy (upload).
   + Trạng thái – tình trạng bánh (Còn hàng/Hết hàng) và trạng thái hiển thị (Hiện/Ẩn).
   + Mô tả chi tiết – thông tin về nguyên liệu, kích cỡ, hương vị,...
   + Sản phẩm nổi bật – tùy chọn: Có hoặc Không (dùng để hiển thị ở trang chủ hoặc danh mục nổi bật).
![Screenshot 2025-06-19 033512](https://github.com/user-attachments/assets/1cb2162c-4b95-46c2-b088-40d616a899f1)


- Trang danh mục sản phẩm ( Thêm mới, sửa, xóa )
![Screenshot 2025-06-19 030144](https://github.com/user-attachments/assets/bec41b0b-435b-462e-a22e-729dba611e30)

- Trang bình luận đánh giá
  + Sau khi đặt bánh thành công, người dùng có thể gửi đánh giá và bình luận về sản phẩm đã mua.
  + Mỗi đánh giá sẽ được gửi đến admin và chờ phê duyệt trước khi hiển thị công khai.
  + Chỉ những bình luận đã được duyệt mới được hiển thị trên giao diện người dùng.
![Screenshot 2025-06-19 030358](https://github.com/user-attachments/assets/b7b666a7-6c21-46df-a6c2-4a3df48d35a4)

# Trang khách hàng(User)
- Tìm kiếm bánh mong muốn 
![Screenshot 2025-06-19 031528](https://github.com/user-attachments/assets/d4f95e77-ebc9-4491-aaa4-41ac7f1ab690)

- Chức năng cho phép người dùng lọc sản phẩm theo từng loại bánh, giúp dễ dàng tìm kiếm sản phẩm phù hợp.
![image](https://github.com/user-attachments/assets/b25a8e72-c976-468d-bba4-28089c7d3ff7)

- Người dùng có thể click vào một sản phẩm bất kỳ từ danh sách để chuyển đến trang chi tiết, nơi hiển thị đầy đủ thông tin về sản phẩm.
![image](https://github.com/user-attachments/assets/ce8c2cca-2cc4-46e6-94c4-e02ce76cfcec)

- Chức năng cho phép khách hàng chọn mua sản phẩm, lưu vào giỏ hàng và tiến hành thanh toán.
![image](https://github.com/user-attachments/assets/3e4da628-7201-4619-8454-05da8f21a187)
***
# Cài đặt
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
```
***
# Liên kết
- Link Repo: https://github.com/Nguyenphuong1234/Cakeshop
- Link Page:  https://nguyenphuong1234.github.io/Cakeshop/
