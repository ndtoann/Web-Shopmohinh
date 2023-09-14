<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

use Illuminate\Support\Facades\DB;

class Home extends Model
{
    use HasFactory;

    public function isLogin($email, $password)
    {
        $account = DB::table('tbl_account')
            ->select('*')
            ->where('email', '=', $email)
            ->where('password', '=', $password)
            ->get();
        return $account;
    }

    public function checkRole($id)
    {
        $account = DB::table('tbl_account')
            ->select('tbl_account.*', 'name_role')
            ->join('tbl_account_role', 'tbl_account.role_id', '=', 'tbl_account_role.id')
            ->where('tbl_account.id', '=', $id)
            ->where('name_role', '=', 'Admin')
            ->get();
        return $account;
    }

    public function count($table)
    {
        $list = DB::table($table)
            ->select('*')
            ->get();
        $count = count($list);
        return $count;
    }

    public function countReviewNew()
    {
        $list = DB::table('tbl_reviews')
            ->select('*')
            ->where('status', '=', 0)
            ->get();
        $count = count($list);
        return $count;
    }

    public function countOrderNew()
    {
        $from = Carbon::yesterday('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
        $to = now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
        $list = DB::table('tbl_orders')
            ->select('*')
            ->whereBetween('created_at', [$from, $to])
            ->get();
        $count = count($list);
        return $count;
    }
}
