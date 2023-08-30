<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'tbl_blogs';

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

    public function getAllBlogs()
    {
        $rs = DB::table($this->table)
            ->select('*')
            ->where('status', '=', 1)
            ->get();
        return $rs;
    }

    public function getDetailBlog($id)
    {
        $rs = DB::table($this->table)
            ->select('*')
            ->where('status', '=', 1)
            ->where('id', '=', $id)
            ->get();
        return $rs;
    }
}
