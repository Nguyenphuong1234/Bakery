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
