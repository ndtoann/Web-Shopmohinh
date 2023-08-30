<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Blog;

class BlogController extends Controller
{
    private $blog;
    public function __construct()
    {
        $this->blog = new Blog();
    }

    public function index(){
        $title = 'Tất cả blog';
        $categories = $this->blog->categoryList();
        $productList = $this->blog->productList();

        $blogs = $this->blog->getAllBlogs();
        return view('blogs.index', [
            'web_title' => $title,
            'categoryList' => $categories,
            'productList' => $productList,
            'blogList' => $blogs
        ]);
    }

    public function detail(Request $request){
        $title = 'Chi tiết blog';
        $categories = $this->blog->categoryList();
        $productList = $this->blog->productList();
        $id = $request->id;
        $blog = $this->blog->getDetailBlog($id);
        if(empty($blog)){
            return redirect(route('home'));
        }
        return view('blogs.detail', [
            'web_title' => $title,
            'categoryList' => $categories,
            'productList' => $productList,
            'blogDetail' => $blog
        ]);
    }
}
