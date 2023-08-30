<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;

    protected $table = 'tbl_categories';

    public function getAllCategories($filter = [], $keywords = null)
    {
        $rs = DB::table($this->table)
            ->select('*');
        if (!empty($filter)) {
            $rs = $rs->where($filter);
        }
        if (!empty($keywords)) {
            $rs = $rs->where(function ($query) use ($keywords) {
                $query->orWhere('name_cate', 'like', '%' . $keywords . '%');
            });
        }
        $rs = $rs->get();
        return $rs;
    }

    public function getDetailCategory($id)
    {
        $rs = DB::table($this->table)
            ->select('*')
            ->where('id', '=', $id)
            ->get();
        return $rs;
    }

    public function addCategory($data)
    {
        return DB::insert('INSERT INTO ' . $this->table . ' (name_cate, image_cate, banner, status, created_at) VALUES (?, ?, ?, ?, ?)', $data);
    }

    public function updateCategory($data, $id)
    {
        $data[] = $id;
        return DB::update('UPDATE ' . $this->table . ' SET name_cate=?, image_cate=?, banner=?, status=?, updated_at=? WHERE id=?', $data);
    }

    public function deleteCategory($id)
    {
        return DB::delete('DELETE FROM ' . $this->table . ' WHERE id=?', [$id]);
    }
}
