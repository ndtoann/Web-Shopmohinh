<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Models\Admin\Home;

class HomeAdminController extends AdminController
{
    private $home;
    public function __construct()
    {
        $this->home = new Home();
    }

    public function index()
    {
        $title = 'Đăng nhập';
        return view('admin.index', [
            'web_title' => $title,
        ]);
    }

    public function login(Request $request)
    {
        $email = $request->email;
        $password = md5($request->password);

        $account = $this->home->isLogin($email, $password);

        if ($account != null) {
            $checkRole = $this->home->checkRole($account[0]->id);
            if ($checkRole != null) {
                $fullname = $account[0]->fullname;
                $request->session()->put('email', $email);
                $request->session()->put('fullname', $fullname);
                return redirect(route('dashboard'));
            }
            return redirect('/admin')->with('msg', 'Tài khoản không hợp lệ');
        }
        return redirect('/admin')->with('msg', 'Tài khoản hoặc mật khẩu không chính xác');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('email');
        $request->session()->forget('fullname');
        return redirect('/admin');
    }

    public function dashboard()
    {
        $title = 'Dashboard';
        $countProduct = $this->home->count('tbl_products');
        $countReview = $this->home->count('tbl_reviews');
        $countReviewNew = $this->home->countReviewNew();
        $countOrder = $this->home->count('tbl_orders');
        $countOrderNew = $this->home->countOrderNew();


        return view('admin.dashboard', [
            'web_title' => $title,
            'countProduct' => $countProduct,
            'countReview' => $countReview,
            'countReviewNew' => $countReviewNew,
            'countOrder' => $countOrder,
            'countOrderNew' => $countOrderNew,
        ]);
    }
}
