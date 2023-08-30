<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Cart as CartModel;
use App\Mail\SendEmail;

class CartController extends Controller
{
    private $cart;
    public function __construct()
    {
        $this->cart = new CartModel();
    }

    public function index()
    {
        $title = 'Giỏ hàng';
        $categories = $this->cart->categoryList();
        $productList = $this->cart->productList();
        $cart = Cart::content();
        $cartCount = Cart::count();
        $totalPrice = Cart::total();
        return view('carts.index', [
            'web_title' => $title,
            'categoryList' => $categories,
            'productList' => $productList,
            'cartList' => $cart,
            'cartCount' => $cartCount,
            'totalPrice' => $totalPrice
        ]);
    }

    public function addCart(Request $request)
    {
        $prd_id = $request->prd_id;
        $product = $this->cart->getDetailProduct($prd_id);
        $product = $product[0];
        if ($product == null) {
            return redirect(route('home'));
        }
        Cart::add($product->id, $product->name_prd, 1, $product->price, 1.1, [
            'image' => $product->image_prd
        ]);
        return redirect(route('cart.list'))->with('addCart', 'Đã thêm sản phẩm vào giỏ hàng');
    }

    public function deleteCart(Request $request)
    {
        $productId = $request->prd_id;
        foreach (Cart::content() as $item) {
            if ($item->id == $productId) {
                $rowId = $item->rowId;
            }
        };
        if (!$rowId) {
            return redirect(route('home'));
        }
        Cart::remove($rowId);
        return redirect(route('cart.list'))->with('deleteCart', 'Đã xóa sản phẩm');
    }

    public function checkout()
    {
        $title = 'Thanh toán';
        $categories = $this->cart->categoryList();
        $productList = $this->cart->productList();
        if (Cart::count() == 0) {
            return redirect(route('home'));
        }
        $cart = Cart::content();
        $totalPrice = Cart::total();
        $total = floatval(str_replace(',', '', $totalPrice)) + 40000;
        return view('carts.checkout', [
            'web_title' => $title,
            'categoryList' => $categories,
            'productList' => $productList,
            'cartList' => $cart,
            'totalPrice' => $totalPrice,
            'total' => $total
        ]);
    }

    public function postCheckout(Request $request)
    {
        if (Cart::count() == 0) {
            return redirect(route('home'));
        }
        $request->validate([
            'name_customer' => 'required',
            'tel' => 'required|numeric',
            'email' => 'required|email',
            'city' => 'required|integer',
            'district' => 'required|integer',
            'ward' => 'required|integer',
            'address' => 'required',
            'pack' => 'required',
            'pay' => 'required',
            'note' => 'required',
        ]);
        $today = now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
        $order_code = str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890') . date('YmdHis');
        $totalPrice = Cart::total();
        $total = floatval(str_replace(',', '', $totalPrice)) + 40000;
        $data = [
            $request->name_customer,
            $request->tel,
            $request->email,
            $request->city,
            $request->district,
            $request->ward,
            $request->address,
            $request->pack,
            $request->pay,
            $request->note,
            $total,
            1,
            $order_code,
            $today
        ];

        $isValue = $this->cart->addOrderInfo($data);
        if ($isValue) {
            $cart = Cart::content();
            foreach ($cart as $item) {
                $data = [
                    $item->name,
                    $item->options->get('image'),
                    $item->price,
                    $item->qty,
                    $order_code
                ];
                $isValue = $this->cart->addOrderProduct($data);
                if (!$isValue) {
                    return redirect(route('cart.list'))->with('stt-checkout', 'failed');;
                }
            }

            // send mail
            $email = $request->email;
            $name_customer = $request->name_customer;
            $address = $request->address;
            $products = Cart::content();
            $message = [
                'name_customer' => $name_customer,
                'order_code' => $order_code,
                'address' => $address,
                'products' => $products,
                'total' => $total
            ];
            SendEmail::dispatch($message, $email)->delay(now()->addMinute(1));

            Cart::destroy();
            return redirect(route('cart.list'))->with('stt-checkout', 'success');
        }
        return redirect(route('cart.list'))->with('stt-checkout', 'failed');
    }
}
