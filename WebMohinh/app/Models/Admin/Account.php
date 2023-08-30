<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Account extends Model
{
    use HasFactory;

    protected $table = 'tbl_account';

    public function getAllAccounts($filter = [], $keywords = null)
    {
        $rs = DB::table($this->table)
            ->select('tbl_account.*', 'name_role')
            ->join('tbl_account_role', 'tbl_account.role_id', '=', 'tbl_account_role.id');
        if (!empty($filter)) {
            $rs = $rs->where($filter);
        }
        if (!empty($keywords)) {
            $rs = $rs->where(function ($query) use ($keywords) {
                $query->orWhere('fullname', 'like', '%' . $keywords . '%');
                $query->orWhere('email', 'like', '%' . $keywords . '%');
            });
        }
        $rs = $rs->get();
        return $rs;
    }

    public function getAccountRoles()
    {
        $rs = DB::table('tbl_account_role')
            ->select('*')
            ->get();
        return $rs;
    }

    public function getDetailAccount($id)
    {
        $rs = DB::table($this->table)
            ->select('*')
            ->where('id', '=', $id)
            ->get();
        return $rs;
    }

    public function addAccount($data)
    {
        return DB::insert('INSERT INTO ' . $this->table . ' (fullname, email, password, role_id, created_at) VALUES (?, ?, ?, ?, ?)', $data);
    }

    public function updateAccount($data, $id)
    {
        $data[] = $id;
        return DB::update('UPDATE ' . $this->table . ' SET fullname=?, email=?, password=?, role_id=?, updated_at=? WHERE id=?', $data);
    }

    public function deleteAccount($id)
    {
        return DB::delete('DELETE FROM ' . $this->table . ' WHERE id=?', [$id]);
    }

    public function checkAccount($email, $password)
    {
        $account = DB::select('SELECT * FROM ' . $this->table . ' WHERE email=? AND password=?', [$email, $password]);

        return $account;
    }

    public function changePass($email, $updated_at, $password)
    {
        return DB::update('UPDATE ' . $this->table . ' SET password=?, updated_at=? WHERE email=?', [$password, $updated_at, $email]);
    }
}
