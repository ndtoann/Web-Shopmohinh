<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Home extends Model
{
    use HasFactory;

    public function search($key_search)
    {
        $rs = DB::table('tbl_products')
            ->select('*')
            ->where('status', '=', 1)
            ->where(function ($query) use ($key_search) {
                $query->orWhere('name_prd', 'like', '%' . $key_search . '%');
            })
            ->get();
        return $rs;
    }

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

    public function newProducts($category_id)
    {
        $rs = DB::table('tbl_products')
            ->select('*')
            ->where('category_id', '=', $category_id)
            ->orderBy('created_at', 'DESC')
            ->limit(4)
            ->get();
        return $rs;
    }

    public function orderProducts()
    {
        $rs = DB::table('tbl_products')
            ->select('*')
            ->orderBy('created_at', 'DESC')
            ->limit(4)
            ->get();
        return $rs;
    }
}
