<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Models\Admin\Product;

class ProductAdminController extends AdminController
{
    private $product;
    public function __construct()
    {
        $this->product = new Product();
    }

    public function index(Request $request)
    {
        $title = 'Tất cả sản phẩm';
        $categories = $this->product->getAllCategories();

        $filter = [];
        $keywords = null;
        if (!empty($request->status)){
            $status = $request->status;
            $status = $status == 'active' ? 1 : 0;
            $filter[] = ['tbl_products.status', '=', $status];
        }
        if (!empty($request->category_id)){
            $category_id = $request->category_id;
            $filter[] = ['tbl_products.category_id', '=', $category_id];
        }
        if (!empty($request->name_prd)){
            $keywords = $request->name_prd;
        }

        $products = $this->product->getAllProducts($filter, $keywords);
        return view('admin.products.index', [
            'web_title' => $title,
            'categoryList' => $categories,
            'productList' => $products,
        ]);
    }

    public function detail(Request $request)
    {
        $title = 'Chi tiết sản phẩm';
        $id = $request->id;
        $product = $this->product->getDetailProduct($id);
        if (empty($product)) {
            return redirect(route('dashboard'));
        }
        $productImgList = $this->product->getListImgProduct($id);
        return view('admin.products.detail', [
            'web_title' => $title,
            'productDetail' => $product[0],
            'productImgList' => $productImgList
        ]);
    }

    public function create()
    {
        $title = 'Thêm sản phẩm';
        $categories = $this->product->getAllCategories();
        return view('admin.products.create', [
            'web_title' => $title,
            'categoryList' => $categories
        ]);
    }

    public function postCreate(Request $request)
    {
        $request->validate([
            'name_prd' => 'required',
            'image' => 'required|image|mimes:webp,jpeg,png,jpg,gif|max:5048',
            'list_img.*' => 'required|image|mimes:webp,jpeg,png,jpg,gif|max:5048',
            'price' => 'required|integer|min:1',
            'description' => 'required',
            'detail' => 'required',
            'category_id' => 'required|integer',
            'status' => 'required|integer'
        ], [
            'name_prd.required' => 'Vui lòng nhập tên sản phẩm',
            'image.required' => 'Vui lòng chọn file ảnh',
            'image.mimes' => 'Định dạng cho phép webp,jpeg,png,jpg,gif',
            'image.max' => 'Kích thước ảnh không quá 5mb',
            'list_img.*.required' => 'Vui lòng chọn file ảnh',
            'list_img.*.mimes' => 'Định dạng cho phép webp,jpeg,png,jpg,gif',
            'list_img.*.max' => 'Kích thước ảnh không quá 5mb',
            'price.required' => 'Vui lòng nhập giá cho sản phẩm',
            'price.integer' => 'Vui lòng nhập số',
            'price.min' => 'Giá trị tối thiểu là :min đ',
            'description.required' => 'Vui lòng nhập mô tả',
            'detail.required' => 'Vui lòng nhập thông tin chi tiết',
            'category_id.required' => 'Vui lòng chọn danh mục',
            'category_id.integer' => 'Danh mục không hợp lệ',
            'status.required' => 'Trạng thái không được để trống',
            'status.integer' => 'Trạng thái không hợp lệ',
        ]);
        $dateNow = now('Asia/Ho_Chi_Minh')->format('m-d');
        $genImgName = md5(preg_replace('/\s+/', '', $request->name_prd));
        $imgName = $genImgName . '-' . $dateNow . '.' .  $request->file('image')->extension();
        $request->image->move(public_path('uploads/product'), $imgName);
        $today = now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');

        $data = [
            $request->name_prd,
            $request->price,
            $imgName,
            $request->description,
            $request->detail,
            $request->category_id,
            $request->status,
            $today
        ];

        $isProductAdd = $this->product->addProduct($data);

        if ($isProductAdd) {
            $idLastProduct = $this->product->getLastProduct();
            $i = 1;
            while ($i <= count($request->file('list_img'))) {
                $imgName = $genImgName . '-' . $i . '-' . $dateNow . '.' . $request->file('list_img')[$i - 1]->extension();
                $request->file('list_img')[$i - 1]->move(public_path('uploads/product'), $imgName);

                $dataImg = [
                    $imgName,
                    $idLastProduct,
                    $today
                ];

                $isImgProductAdd = $this->product->addProductImg($dataImg);
                $i = $i + 1;
            }
            if ($isImgProductAdd) {
                return redirect('/admin/san-pham')->with('msg', 'Đã thêm sản phẩm');
            }
        }
        return redirect('/admin/san-pham/them-san-pham')->with('msg', 'Xảy ra lỗi, vui lòng thử lại sau');
    }

    public function edit(Request $request)
    {
        $title = 'Chỉnh sửa sản phẩm';
        $id = $request->id;
        $product = $this->product->getDetailProduct($id);
        if (empty($product)) {
            return redirect(route('dashboard'));
        }
        $categories = $this->product->getAllCategories();
        return view('admin.products.edit', [
            'web_title' => $title,
            'productDetail' => $product[0],
            'categoryList' => $categories
        ]);
    }

    public function postEdit(Request $request)
    {
        $request->validate([
            'name_prd' => 'required',
            'image' => 'mimes:webp,jpeg,png,jpg,gif|max:5048',
            'list_img.*' => 'mimes:webp,jpeg,png,jpg,gif|max:5048',
            'price' => 'required|integer|min:1',
            'description' => 'required',
            'detail' => 'required',
            'category_id' => 'required|integer',
            'status' => 'required|integer'
        ], [
            'name_prd.required' => 'Vui lòng nhập tên danh mục',
            'image.mimes' => 'Định dạng cho phép webp,jpeg,png,jpg,gif',
            'image.max' => 'Kích thước ảnh không quá 5mb',
            'list_img.*.mimes' => 'Định dạng cho phép webp,jpeg,png,jpg,gif',
            'list_img.*.max' => 'Kích thước ảnh không quá 5mb',
            'price.required' => 'Vui lòng nhập giá cho sản phẩm',
            'price.integer' => 'Vui lòng nhập số',
            'price.min' => 'Giá trị tối thiểu là :min đ',
            'description.required' => 'Vui lòng nhập mô tả',
            'detail.required' => 'Vui lòng nhập thông tin chi tiết',
            'category_id.required' => 'Vui lòng chọn danh mục',
            'category_id.integer' => 'Danh mục không hợp lệ',
            'status.required' => 'Trạng thái không được để trống',
            'status.integer' => 'Trạng thái không hợp lệ',
        ]);
        $dateNow = now('Asia/Ho_Chi_Minh')->format('m-d');
        $id = $request->id;
        $imgName = $request->imgNameOld;
        $genImgName = md5(preg_replace('/\s+/', '', $request->name_prd));
        if ($request->hasfile('image')) {
            $imgName = $genImgName . '-' . $dateNow .  '.' .  $request->file('image')->extension();
            $request->image->move(public_path('uploads/product'), $imgName);
        }
        $today = now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
        $data = [
            $request->name_prd,
            $request->price,
            $imgName,
            $request->description,
            $request->detail,
            $request->category_id,
            $request->status,
            $today
        ];
        $isProductEdit = $this->product->updateProduct($data, $id);
        if ($isProductEdit) {
            if ($request->hasfile('list_img')) {
                $i = 1;
                while ($i <= count($request->file('list_img'))) {
                    $imgName = $genImgName . '-' . $i . '-' . $dateNow . '.' . $request->file('list_img')[$i - 1]->extension();
                    $request->file('list_img')[$i - 1]->move(public_path('uploads/product'), $imgName);

                    $dataImg = [
                        $imgName,
                        $id,
                        $today
                    ];

                    $isImgProductAdd = $this->product->addProductImg($dataImg);
                    $i = $i + 1;
                }
                if (!$isImgProductAdd) {
                    return redirect('/admin/san-pham/cap-nhat-san-pham/' . $id)->with('msg', 'Xảy ra lỗi, vui lòng thử lại sau');
                }
            }
            return redirect('/admin/san-pham')->with('msg', 'Đã cập nhật sản phẩm');
        }
        return redirect('/admin/san-pham/cap-nhat-san-pham/' . $id)->with('msg', 'Xảy ra lỗi, vui lòng thử lại sau');
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $product = $this->product->getDetailProduct($id);
        if (empty($product)) {
            return redirect('/admin/dashboard');
        }
        $isValue = $this->product->deleteProduct($id);
        if ($isValue) {
            return redirect('/admin/san-pham')->with('msg', 'Đã xóa sản phẩm');
        }
        return redirect('/admin/san-pham')->with('msg', 'Xảy ra lỗi, vui lòng thử lại sau');
    }

    public function deleteImgProduct(Request $request){
        $id_prd = $request->id_prd;
        $id = $request->id;
        $isValue = $this->product->deleteProductImg($id);
        if ($isValue) {
            return redirect('/admin/san-pham/chi-tiet-san-pham/'.$id_prd)->with('msg', 'Đã xóa ảnh');
        }
        return redirect('/admin/san-pham/chi-tiet-san-pham/'.$id_prd)->with('msg', 'Xảy ra lỗi, vui lòng thử lại sau');
    }
}
