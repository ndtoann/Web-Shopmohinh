<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'tbl_orders';

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

    public function getDetailProduct($id){
        $rs = DB::table('tbl_products')
            ->select('*')
            ->where('status', '=', 1)
            ->where('id', '=', $id)
            ->get();
        return $rs;
    }

    public function addOrderInfo($data)
    {
        return DB::insert('INSERT INTO ' . $this->table . ' (name_customer, tel, email, city_id, district_id, ward_id, address, method_pack, method_checkout, note, total_money, status, code, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', $data);
    }

    public function addOrderProduct($data)
    {
        return DB::insert('INSERT INTO tbl_order_detail (name_prd, img_prd, price_prd, quantity, order_code) VALUES (?, ?, ?, ?, ?)', $data);
    }
}
