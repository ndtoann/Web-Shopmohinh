<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Models\Admin\Account;

class AccountAdminController extends AdminController
{
    private $account;
    public function __construct()
    {
        $this->account = new Account();
    }

    public function index(Request $request)
    {
        $title = 'Tất cả tài khoản';
        $filter = [];
        $keywords = null;
        if (!empty($request->role_id)){
            $role_id = $request->role_id;
            $filter[] = ['tbl_account.role_id', '=', $role_id];
        }
        if (!empty($request->name_prd)){
            $keywords = $request->name_prd;
        }
        $accounts = $this->account->getAllAccounts($filter, $keywords);
        return view('admin.accounts.index', [
            'web_title' => $title,
            'accountList' => $accounts
        ]);
    }

    public function detail(Request $request)
    {
        $title = 'Chi tiết tài khoản';
        $id = $request->id;
        $account = $this->account->getDetailAccount($id);
        if ($account == null) {
            return redirect('/admin/dashboard');
        }
        return view('admin.accounts.detail', [
            'web_title' => $title,
            'accountDetail' => $account
        ]);
    }

    public function create()
    {
        $title = 'Thêm tài khoản';
        $roles = $this->account->getAccountRoles();
        return view('admin.accounts.create', [
            'web_title' => $title,
            'roleList' => $roles
        ]);
    }

    public function postCreate(Request $request)
    {
        $request->validate([
            'fullname' => 'required',
            'email' => 'required|email|unique:tbl_account',
            'password' => 'required|min:8',
            'role_id' => 'required|integer',
        ], [
            'fullname.required' => 'Vui lòng nhập họ tên',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Định dạng email không chính xác',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu tối thiểu :min kí tự',
            'role_id.required' => 'Vui lòng chọn vai trò cho nhân viên',
            'role_id.integer' => 'Phân quyền không hợp lệ'
        ]);

        $data = [
            $request->fullname,
            $request->email,
            md5($request->password),
            $request->role_id,
            now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s')
        ];

        $isValue = $this->account->addAccount($data);
        if ($isValue) {
            return redirect('/admin/tai-khoan')->with('msg', 'Đã thêm tài khoản');
        }
        return redirect('/admin/tai-khoan/them-tai-khoan')->with('msg', 'Xảy ra lỗi, vui lòng thử lại sau');
    }

    public function changepass()
    {
        $title = 'Đổi mật khẩu';
        return view('admin.accounts.change_pass', [
            'web_title' => $title,
        ]);
    }

    public function postChangepass(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password_old' => 'required',
            'password_new' => 'required|min:8',
        ], [
            'email.required' => 'Vui lòng nhập email',
            'password_old.required' => 'Vui lòng nhập mật khẩu',
            'password_new.required' => 'Vui lòng nhập mật khẩu',
            'password_new.min' => 'Mật khẩu tối thiểu :min kí tự'
        ]);

        $email = $request->email;
        $password_old = md5($request->password_old);
        $password_new = md5($request->password_new);
        $updated_at = now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');

        $isAccount = $this->account->checkAccount($email, $password_old);
        if ($isAccount) {
            $isChangepass = $this->account->changePass($email, $updated_at, $password_new);
            if ($isChangepass) {
                return redirect('/admin/tai-khoan')->with('msg', 'Đổi mật khẩu thành công');
            }
            return redirect('/admin/tai-khoan/doi-mat-khau')->with('msg', 'Xảy ra lỗi, vui lòng thử lại sau');
        }
        return redirect('/admin/tai-khoan/doi-mat-khau')->with('msg', 'Tài khoản hoặc mật khẩu không chính xác');
    }

    public function delete(Request $request)
    {
        $id = $request->id;

        $account = $this->account->getDetailAccount($id);
        if ($account == null) {
            return redirect('/admin/dashboard');
        }

        $isValue = $this->account->deleteAccount($id);
        if ($isValue) {
            return redirect('/admin/tai-khoan')->with('msg', 'Đã xóa tài khoản');
        }
        return redirect('/admin/tai-khoan')->with('msg', 'Xảy ra lỗi, vui lòng thử lại sau');
    }
}
