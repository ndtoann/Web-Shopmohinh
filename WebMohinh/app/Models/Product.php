<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    protected $table = 'tbl_products';

    public function categoryList()
    {
        $rs = DB::table('tbl_categories')
            ->select('*')
            ->where('status', '=', 1)
            ->get();
        return $rs;
    }

    public function productList()
    {
        $rs = DB::table('tbl_products')
            ->select('id', 'name_prd', 'category_id')
            ->where('status', '=', 1)
            ->orderBy('created_at', 'DESC')
            ->get();
        return $rs;
    }

    public function getProducts($category_id){
        $rs = DB::table($this->table)
            ->select('*')
            ->where('status', '=', 1)
            ->where('category_id', '=', $category_id)
            ->get();
        return $rs;
    }

    public function getCategory($id){
        $rs = DB::table('tbl_categories')
            ->select('*')
            ->where('status', '=', 1)
            ->where('id', '=', $id)
            ->get();
        return $rs;
    }

    public function getDetailProduct($id){
        $rs = DB::table($this->table)
            ->select('*')
            ->where('status', '=', 1)
            ->where('id', '=', $id)
            ->get();
        return $rs;
    }

    public function getListImgProduct($product_id){
        $rs = DB::table('tbl_product_imgs')
            ->select('*')
            ->where('product_id', '=', $product_id)
            ->get();
        return $rs;
    }

    public function getReviews($product_id){
        $rs = DB::table('tbl_reviews')
            ->select('*')
            ->where('status', '=', 1)
            ->where('product_id', '=', $product_id)
            ->orderBy('rated', 'DESC')
            ->limit(10)
            ->get();
        return $rs;
    }

    public function getRelatedProducts($category_id){
        $rs = DB::table($this->table)
            ->select('*')
            ->where('status', '=', 1)
            ->where('category_id', '=', $category_id)
            ->limit(5)
            ->get();
        return $rs;
    }

    public function addReview($data)
    {
        return DB::insert('INSERT INTO tbl_reviews (name_user, email, rated, content, product_id, status, created_at) VALUES (?, ?, ?, ?, ?, ?, ?)', $data);
    }
}
