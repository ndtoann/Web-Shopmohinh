<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Order extends Model
{
    use HasFactory;

    protected $table = 'tbl_orders';

    public function getAllOrders($filter = [], $keywords = null)
    {
        $rs = DB::table($this->table)
            ->select('*')
            ->where('status', '=', '1')
            ->orderBy('created_at', 'DESC');
        if (!empty($filter)) {
            $rs = $rs->where($filter);
        }
        if (!empty($keywords)) {
            $rs = $rs->where(function ($query) use ($keywords) {
                $query->orWhere('name_customer', 'like', '%' . $keywords . '%');
                $query->orWhere('email', 'like', '%' . $keywords . '%');
            });
        }
        $rs = $rs->get();
        return $rs;
    }

    public function getDetailOrder($id)
    {
        $rs = DB::table($this->table)
            ->select('*')
            ->where('id', '=', $id)
            ->get();
        return $rs;
    }

    public function getOrderProduct($order_code)
    {
        $rs = DB::table('tbl_order_detail')
            ->select('*')
            ->where('order_code', '=', $order_code)
            ->get();
        return $rs;
    }

    public function addOrderInfo($data)
    {
        return DB::insert('INSERT INTO ' . $this->table . ' (name_customer, tel, email, city_id, district_id, ward_id, address, method_pack, method_checkout, note, total_money, status, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', $data);
    }

    public function addOrderProduct($data)
    {
        return DB::insert('INSERT INTO tbl_order_detail (name_prd, img_prd, quantity, order_id) VALUES (?, ?, ?, ?)', $data);
    }

    public function updateOrder($data, $id)
    {
        $data[] = $id;
        return DB::update('UPDATE ' . $this->table . ' SET name_customer=?, tel=?, email=?, city_id=?, district_id,=? ward_id=?, address=?, method_pack=?, method_checkout=?, note=?, total_money=?, status=?, updated_at=? WHERE id=?', $data);
    }

    public function updateStatus($data, $id)
    {
        $data[] = $id;
        return DB::update('UPDATE ' . $this->table . ' SET status=?, updated_at=? WHERE id=?', $data);
    }

    public function deleteOrder($id)
    {
        return DB::delete('DELETE FROM ' . $this->table . ' WHERE id=?', [$id]);
    }
}
