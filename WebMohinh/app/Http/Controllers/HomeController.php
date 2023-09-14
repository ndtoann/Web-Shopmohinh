<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Home;

class HomeController extends Controller
{
    private $home;
    const _PER_PAGE = 10;
    public function __construct()
    {
        $this->home = new Home();
    }

    public function index()
    {
        $title = 'Trang chủ';
        $categories = $this->home->categoryList();
        $productList = $this->home->productList();

        $carList = $this->home->newProducts(1);
        $motorList = $this->home->newProducts(3);
        $planeList = $this->home->newProducts(5);

        $orderProducts = $this->home->orderProducts();
        return view('home.index', [
            'web_title' => $title,
            'categoryList' => $categories,
            'productList' => $productList,
            'carList' => $carList,
            'motorList' => $motorList,
            'planeList' => $planeList,
            'orderProducts' => $orderProducts
        ]);
    }

    public function search(Request $request)
    {
        $title = 'Tìm kiếm';
        $categories = $this->home->categoryList();
        $productList = $this->home->productList();
        
        $key_search = $request->s;
        $rs = $this->home->search($key_search, self::_PER_PAGE);
        $count_rs = count($rs);
        return view('home.search', [
            'web_title' => $title,
            'categoryList' => $categories,
            'productList' => $productList,
            'key_search' => $key_search,
            'result' => $rs,
            'count_rs' => $count_rs
        ]);
    }
}
