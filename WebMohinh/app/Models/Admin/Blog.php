<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'tbl_blogs';

    public function getAllBlogs()
    {
        $rs = DB::table($this->table)
            ->select('*')
            ->get();
        return $rs;
    }

    public function getDetailBlog($id)
    {
        $rs = DB::table($this->table)
            ->select('*')
            ->where('id', '=', $id)
            ->get();
        return $rs;
    }

    public function addBlog($data)
    {
        return DB::insert('INSERT INTO ' . $this->table . ' (title, image_blog, content, status, created_at) VALUES (?, ?, ?, ?)', $data);
    }

    public function updateBlog($data, $id)
    {
        $data[] = $id;
        return DB::update('UPDATE ' . $this->table . ' SET title=?, image_blog=?, content=?, status=?, updated_at=? WHERE id=?', $data);
    }

    public function deleteBlog($id)
    {
        return DB::delete('DELETE FROM ' . $this->table . ' WHERE id=?', [$id]);
    }
}
