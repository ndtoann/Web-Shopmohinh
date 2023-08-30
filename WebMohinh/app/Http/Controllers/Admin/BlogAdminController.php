<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Models\Admin\Blog;

class BlogAdminController extends AdminController
{
    private $blog;
    public function __construct()
    {
        $this->blog = new Blog();
    }

    public function index(Request $request)
    {
        $title = 'Tất cả blog';
        $blogs = $this->blog->getAllBlogs();
        return view('admin.blogs.index', [
            'web_title' => $title,
            'blogList' => $blogs
        ]);
    }

    public function detail(Request $request)
    {
        $title = 'Chi tiết blog';
        $id = $request->id;
        $blog = $this->blog->getDetailBlog($id);
        if (empty($blog)) {
            return redirect(route('dashboard'));
        }
        return view('admin.blogs.detail', [
            'web_title' => $title,
            'blogDetail' => $blog
        ]);
    }

    public function create()
    {
        $title = 'Thêm blog';
        return view('admin.blogs.create', [
            'web_title' => $title,
        ]);
    }

    public function postCreate(Request $request)
    {
    }

    public function edit(Request $request)
    {
        $title = 'Chỉnh sửa blog';
        $id = $request->id;
        $blog = $this->blog->getDetailBlog($id);
        if (empty($blog)) {
            return redirect(route('dashboard'));
        }
        return view('admin.blogs.edit', [
            'web_title' => $title,
            'blogDetail' => $blog
        ]);
    }

    public function postEdit(Request $request)
    {
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $blog = $this->blog->getDetailBlog($id);
        if (empty($blog)) {
            return redirect('/admin/dashboard');
        }
        $isValue = $this->blog->deleteBlog($id);
        if ($isValue) {
            return redirect('/admin/blog')->with('msg', 'Đã xóa blog');
        }
        return redirect('/admin/blog')->with('msg', 'Xảy ra lỗi, vui lòng thử lại sau');
    }
}
