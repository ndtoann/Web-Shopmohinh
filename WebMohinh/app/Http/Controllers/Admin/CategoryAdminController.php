<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Models\Admin\Category;

class CategoryAdminController extends AdminController
{
    private $category;
    public function __construct()
    {
        $this->category = new Category();
    }

    public function index(Request $request)
    {
        $title = 'Tất cả danh mục';
        $filter = [];
        $keywords = null;
        if (!empty($request->status)){
            $status = $request->status;
            $status = $status == 'active' ? 1 : 0;
            $filter[] = ['tbl_categories.status', '=', $status];
        }
        if (!empty($request->name_cate)){
            $keywords = $request->name_cate;
        }
        $categories = $this->category->getAllCategories($filter, $keywords);
        return view('admin.categories.index', [
            'web_title' => $title,
            'categoryList' => $categories
        ]);
    }

    public function detail(Request $request)
    {
        $title = 'Chi tiết danh mục';
        $id = $request->id;
        $category = $this->category->getDetailCategory($id);
        if (empty($category)) {
            return redirect(route('dashboard'));
        }

        return view('admin.categories.detail', [
            'web_title' => $title,
            'categoryDetail' => $this->category
        ]);
    }

    public function create()
    {
        $title = 'Thêm danh mục';
        return view('admin.categories.create', [
            'web_title' => $title,
        ]);
    }

    public function postCreate(Request $request)
    {
        $request->validate([
            'name_cate' => 'required|unique:tbl_categories',
            'image' => 'required|image|mimes:webp,jpeg,png,jpg,gif|max:5048',
            'banner' => 'required|image|mimes:webp,jpeg,png,jpg,gif|max:5048',
            'status' => 'required|integer',
        ], [
            'name_cate.required' => 'Vui lòng nhập tên danh mục',
            'name_cate.unique' => 'Danh mục đã tồn tại',
            'image.required' => 'Vui lòng chọn file ảnh',
            'image.image' => 'Vui lòng chọn đúng file ảnh',
            'image.mimes' => 'Định dạng cho phép webp,jpeg,png,jpg,gif',
            'image.max' => 'Kích thước ảnh không quá 5mb',
            'banner.required' => 'Vui lòng chọn file ảnh',
            'banner.image' => 'Vui lòng chọn đúng file ảnh',
            'banner.mimes' => 'Định dạng cho phép webp,jpeg,png,jpg,gif',
            'banner.max' => 'Kích thước ảnh không quá 5mb',
            'status.required' => 'Trạng thái không được để trống',
            'status.integer' => 'Trạng thái không hợp lệ',
        ]);
        $today = now('Asia/Ho_Chi_Minh')->format('Y-m-d');

        $imgName = $request->name_cate . "-" . $today . "." .  $request->file('image')->extension();
        $request->image->move(public_path('uploads/category'), $imgName);

        $bannerName = "banner-" .  $request->name_cate . "-" . $today . "." .  $request->file('banner')->extension();
        $request->banner->move(public_path('uploads/category'), $bannerName);

        $today = now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
        $data = [
            $request->name_cate,
            $imgName,
            $bannerName,
            $request->status,
            $today
        ];

        $isValue = $this->category->addCategory($data);
        if ($isValue) {
            return redirect('/admin/danh-muc')->with('msg', 'Đã thêm danh mục');
        }
        return redirect('/admin/danh-muc/them-danh-muc')->with('msg', 'Xảy ra lỗi, vui lòng thử lại sau');
    }

    public function edit(Request $request)
    {
        $title = 'Chỉnh sửa danh mục';
        $id = $request->id;
        $category = $this->category->getDetailCategory($id);
        if (empty($category)) {
            return redirect(route('dashboard'));
        }
        $category = $category[0];

        return view('admin.categories.edit', [
            'web_title' => $title,
            'categoryDetail' => $category
        ]);
    }

    public function postEdit(Request $request, $id = 0)
    {
        $request->validate([
            'name_cate' => 'required|unique:tbl_categories,name_cate,' . $id,
            'image' => 'image|mimes:webp,jpeg,png,jpg,gif|max:5048',
            'banner' => 'image|mimes:webp,jpeg,png,jpg,gif|max:5048',
            'status' => 'required|integer',
        ], [
            'name_cate.required' => 'Vui lòng nhập tên danh mục',
            'name_cate.unique' => 'Danh mục đã tồn tại',
            'image.image' => 'Vui lòng chọn đúng file ảnh',
            'image.mimes' => 'Định dạng cho phép webp,jpeg,png,jpg,gif',
            'image.max' => 'Kích thước ảnh không quá 5mb',
            'banner.image' => 'Vui lòng chọn đúng file ảnh',
            'banner.mimes' => 'Định dạng cho phép webp,jpeg,png,jpg,gif',
            'banner.max' => 'Kích thước ảnh không quá 5mb',
            'status.required' => 'Trạng thái không được để trống',
            'status.integer' => 'Trạng thái không hợp lệ',
        ]);
        $today = now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
        $imgName = $request->imgNameOld;
        if ($request->hasfile('image')) {
            $imgName = $request->name . "-" . $today . "." .  $request->file('image')->extension();
            $request->image->move(public_path('uploads/category'), $imgName);
        }

        $bannerName = $request->bannerNameOld;
        if ($request->hasfile('banner')) {
            $bannerName = "banner-" .  $request->name_cate . "-" . $today . "." .  $request->file('banner')->extension();
            $request->banner->move(public_path('uploads/category'), $bannerName);
        };

        $data = [
            $request->name_cate,
            $imgName,
            $bannerName,
            $request->status,
            $today
        ];

        $isValue = $this->category->updateCategory($data, $id);;
        if ($isValue) {
            return redirect('/admin/danh-muc')->with('msg', 'Đã cập nhật danh mục');
        }
        return redirect('/admin/danh-muc/cap-nhat-danh-muc/' . $id)->with('msg', 'Xảy ra lỗi, vui lòng thử lại sau');
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $category = $this->category->getDetailCategory($id);
        if (empty($category)) {
            return redirect('/admin/dashboard');
        }
        $isValue = $this->category->deleteCategory($id);;
        if ($isValue) {
            return redirect('/admin/danh-muc')->with('msg', 'Đã xóa danh mục');
        }
        return redirect('/admin/danh-muc')->with('msg', 'Xảy ra lỗi, vui lòng thử lại sau');
    }
}
