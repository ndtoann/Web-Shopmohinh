<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class ProductController extends Controller
{
    private $product;
    const _PER_PAGE = 10;
    public function __construct()
    {
        $this->product = new Product();
    }

    public function index(Request $request)
    {
        $title = 'Tất cả sản phẩm';
        $categories = $this->product->categoryList();
        $productList = $this->product->productList();

        $category_id = $request->category_id;
        $category = $this->product->getCategory($category_id);

        $sortBy = $request->input('sort-by');
        $sortType = $request->input('sort-type');
        $sortArr = [
            'sortBy' => $sortBy,
            'sortType' => $sortType
        ];

        $products = $this->product->getProducts($category_id, $sortArr, self::_PER_PAGE);
        
        return view('products.index', [
            'web_title' => $title,
            'categoryList' => $categories,
            'productList' => $productList,
            'category' => $category[0],
            'products' => $products,
        ]);
    }

    public function detail(Request $request)
    {
        $title = 'Chi tiết sản phẩm';
        $categories = $this->product->categoryList();
        $productList = $this->product->productList();
        $id = $request->id;
        $product = $this->product->getDetailProduct($id);
        if(empty($product)){
            return redirect(route('home'));
        }
        $productImgList = $this->product->getListImgProduct($id);
        $reviews = $this->product->getReviews($id);
        $productSame = $this->product->getRelatedProducts($product[0]->category_id);
        return view('products.detail', [
            'web_title' => $title,
            'categoryList' => $categories,
            'productList' => $productList,
            'productDetail' => $product[0],
            'productImgList' => $productImgList,
            'reviewList' => $reviews,
            'productSame' => $productSame
        ]);
    }

    public function review(Request $request){
        $request->validate([
            'name_user' => 'required|min:3',
            'email' => 'required|email|unique:tbl_reviews',
            'rated' => 'required|integer',
            'comment' => 'required'
        ]);
        $prd_id = $request->prd_id;
        $today = now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
        $data = [
            $request->name_user,
            $request->email,
            $request->rated,
            $request->comment,
            $prd_id,
            0,
            $today
        ];

        $isValue = $this->product->addReview($data);
        if ($isValue) {
            return redirect(route('product.detail', $prd_id))->with('stt-review', 'success');
        }
        return redirect(route('product.detail', $prd_id))->with('stt-review', 'failed');
    }
}
