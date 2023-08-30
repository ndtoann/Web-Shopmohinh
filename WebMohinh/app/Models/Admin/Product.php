<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    protected $table = 'tbl_products';

    public function getAllProducts($filter = [], $keywords = null)
    {
        $rs = DB::table($this->table)
            ->select('tbl_products.*', 'name_cate')
            ->join('tbl_categories', 'tbl_products.category_id', '=', 'tbl_categories.id');

        if (!empty($filter)) {
            $rs = $rs->where($filter);
        }
        if (!empty($keywords)) {
            $rs = $rs->where(function ($query) use ($keywords) {
                $query->orWhere('name_prd', 'like', '%' . $keywords . '%');
            });
        }
        $rs = $rs->get();
        return $rs;
    }

    public function getListImgProduct($product_id)
    {
        $rs = DB::table('tbl_product_imgs')
            ->select('*')
            ->where('tbl_product_imgs.product_id', '=', $product_id)
            ->get();
        return $rs;
    }

    public function getAllCategories()
    {
        $rs = DB::table('tbl_categories')
            ->select('*')
            ->get();
        return $rs;
    }

    public function getDetailProduct($id)
    {
        $rs = DB::table($this->table)
            ->select('tbl_products.*', 'name_cate', 'category_id')
            ->join('tbl_categories', 'tbl_products.category_id', '=', 'tbl_categories.id')
            ->where('tbl_products.id', '=', $id)
            ->get();
        return $rs;
    }

    public function getLastProduct()
    {
        $rs = DB::getPdo()->lastInsertId();
        return $rs;
    }

    public function addProduct($data)
    {
        return DB::insert('INSERT INTO ' . $this->table . ' (name_prd, price, image_prd, description, detail, category_id, status, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?)', $data);
    }

    public function addProductImg($data)
    {
        return DB::insert('INSERT INTO tbl_product_imgs (img, product_id, created_at) VALUES (?, ?, ?)', $data);
    }

    public function updateProduct($data, $id)
    {
        $data[] = $id;
        return DB::update('UPDATE ' . $this->table . ' SET name_prd=?, price=?, image_prd=?, description=?, detail=?, category_id=?, status=?, updated_at=? WHERE id=?', $data);
    }

    public function deleteProduct($id)
    {
        return DB::delete('DELETE FROM ' . $this->table . ' WHERE id=?', [$id]);
    }

    public function deleteProductImg($id)
    {
        return DB::delete('DELETE FROM tbl_product_imgs WHERE id=?', [$id]);
    }
}
