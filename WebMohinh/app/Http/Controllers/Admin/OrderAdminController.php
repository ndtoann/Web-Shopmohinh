<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Models\Admin\Order;

class OrderAdminController extends AdminController
{
    private $order;
    public function __construct()
    {
        $this->order = new Order;
    }

    public function index(Request $request)
    {
        $title = 'Tất cả đơn hàng';
        $filter = [];
        $keywords = null;
        if (!empty($request->status)){
            $status = $request->status;
            if ($status == 'waitting'){
                $status = 1;
            }elseif($status == 'deliver'){
                $status = 2;
            }elseif($status == 'success'){
                $status = 3;
            }elseif($status == 'cancel'){
                $status = 0;
            }
            $filter[] = ['tbl_orders.status', '=', $status];
        }
        if (!empty($request->name_customer)){
            $keywords = $request->name_customer;
        }
        $orders = $this->order->getAllOrders($filter, $keywords);
        return view('admin.orders.index', [
            'web_title' => $title,
            'orderList' => $orders
        ]);
    }

    public function detail(Request $request)
    {
        $title = 'Chi tiết đơn hàng';
        $id = $request->id;
        $order = $this->order->getDetailOrder($id);
        $order = $order[0];
        if (empty($order)) {
            return redirect(route('dashboard'));
        }
        $orderProduct = $this->order->getOrderProduct($order->code);
        return view('admin.orders.detail', [
            'web_title' => $title,
            'orderDetail' => $order,
            'orderListProduct' => $orderProduct
        ]);
    }

    public function cancelOrder(Request $request)
    {
        $id = $request->id;
        $order = $this->order->getDetailOrder($id);
        if (empty($order)) {
            return redirect(route('dashboard'));
        }
        $status = 0;

        $data = [
            $status,
            now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s')
        ];
        $isValue = $this->order->cancelOrder($data, $id);;
        if ($isValue) {
            return redirect('/admin/don-hang')->with('msg', 'Đã hủy đơn hàng');
        }
        return redirect('/admin/don-hang')->with('msg', 'Xảy ra lỗi, vui lòng thử lại sau');
    }

    public function updateStatus(Request $request)
    {
        $id = $request->id;
        $order = $this->order->getDetailOrder($id);
        if (empty($order)) {
            return redirect(route('dashboard'));
        }
        $status = $order[0]->status;
        if ($status == 1) {
            $status = 2;
        } else if ($status == 2) {
            $status = 3;
        } else {
            $status = 3;
        }

        $data = [
            $status,
            now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s')
        ];
        $isValue = $this->order->updateStatus($data, $id);;
        if ($isValue) {
            return redirect('/admin/don-hang')->with('msg', 'Đã cập nhật trạng thái đơn hàng');
        }
        return redirect('/admin/don-hang')->with('msg', 'Xảy ra lỗi, vui lòng thử lại sau');
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $order = $this->order->getDetailOrder($id);
        if (empty($order)) {
            return redirect(route('dashboard'));
        }

        $isValue = $this->order->deleteOrder($id);;
        if ($isValue) {
            return redirect('/admin/don-hang')->with('msg', 'Đã xóa đơn hàng');
        }
        return redirect('/admin/don-hang')->with('msg', 'Xảy ra lỗi, vui lòng thử lại sau');
    }
}
