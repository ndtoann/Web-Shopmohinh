<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Review extends Model
{
    use HasFactory;

    protected $table = 'tbl_reviews';

    public function getAllReviews($filter = [])
    {
        $rs = DB::table($this->table)
            ->select('tbl_reviews.*', 'name_prd')
            ->join('tbl_products', 'tbl_reviews.product_id', '=', 'tbl_products.id')
            ->orderBy('created_at', 'DESC');
        if (!empty($filter)) {
            $rs = $rs->where($filter);
        }
        $rs = $rs->get();
        return $rs;
    }

    public function getDetailReview($id)
    {
        $rs = DB::table($this->table)
            ->select('*')
            ->where('id', '=', $id)
            ->get();
        return $rs;
    }

    public function addReview($data)
    {
        return DB::insert('INSERT INTO ' . $this->table . ' (name_user, email, rated, content, product_id, status, created_at) VALUES (?, ?, ?, ?, ?, ?, ?)', $data);
    }

    public function updateReview($data, $id)
    {
        $data[] = $id;
        return DB::update('UPDATE ' . $this->table . ' SET status=?, updated_at=? WHERE id=?', $data);
    }

    public function deleteReview($id)
    {
        return DB::delete('DELETE FROM ' . $this->table . ' WHERE id=?', [$id]);
    }
}
