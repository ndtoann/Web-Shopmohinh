<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\BlogController;

use App\Http\Controllers\Admin\HomeAdminController;
use App\Http\Controllers\Admin\AccountAdminController;
use App\Http\Controllers\Admin\CategoryAdminController;
use App\Http\Controllers\Admin\ProductAdminController;
use App\Http\Controllers\Admin\ReviewAdminController;
use App\Http\Controllers\Admin\OrderAdminController;
use App\Http\Controllers\Admin\BlogAdminController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [
    HomeController::class,
    'index'
])->name('home');

Route::get('/tim-kiem', [
    HomeController::class,
    'search'
])->name('search');

Route::get('/san-pham/{category_id}', [
    ProductController::class,
    'index'
])->name('product');

Route::get('/chi-tiet-san-pham/{id}', [
    ProductController::class,
    'detail'
])->name('product.detail');

Route::post('/danh-gia/{prd_id}', [
    ProductController::class,
    'review'
])->name('product.review');

Route::name('cart.')->group(function () {
    Route::get('/gio-hang', [
        CartController::class,
        'index'
    ])->name('list');
    
    Route::get('/them-gio-hang/{prd_id}', [
        CartController::class,
        'addCart'
    ])->name('add');
    
    Route::get('/xoa-gio-hang/{prd_id}', [
        CartController::class,
        'deleteCart'
    ])->name('delete');
    
    Route::get('/thanh-toan', [
        CartController::class,
        'checkout'
    ])->name('checkout');
    
    Route::post('/thanh-toan', [
        CartController::class,
        'postCheckout'
    ])->name('postCheckout');
});

Route::get('/blogs', [
    BlogController::class,
    'index'
])->name('blog');

Route::get('/blogs/{id}', [
    BlogController::class,
    'detail'
])->name('blog-detail');

Route::prefix('admin')->group(function () {
    Route::get('/', [
        HomeAdminController::class,
        'index'
    ]);
    Route::post('/', [
        HomeAdminController::class,
        'login'
    ]);
    Route::get('/dang-xuat', [
        HomeAdminController::class,
        'logout'
    ]);
});

Route::middleware('auth.admin')->prefix('admin')->group(function () {
    Route::get('/dashboard', [
        HomeAdminController::class,
        'dashboard'
    ])->name('dashboard');

    Route::prefix('tai-khoan')->group(function () {
        Route::get('/', [
            AccountAdminController::class,
            'index'
        ]);
        Route::get('/them-tai-khoan', [
            AccountAdminController::class,
            'create'
        ]);
        Route::post('/them-tai-khoan', [
            AccountAdminController::class,
            'postCreate'
        ]);
        Route::get('/doi-mat-khau', [
            AccountAdminController::class,
            'changepass'
        ]);
        Route::post('/doi-mat-khau', [
            AccountAdminController::class,
            'postChangepass'
        ]);
        Route::get('/xoa-tai-khoan/{id}', [
            AccountAdminController::class,
            'delete'
        ]);
    });

    Route::prefix('danh-muc')->group(function () {
        Route::get('/', [
            CategoryAdminController::class,
            'index'
        ]);
        Route::get('/them-danh-muc', [
            CategoryAdminController::class,
            'create'
        ]);
        Route::post('/them-danh-muc', [
            CategoryAdminController::class,
            'postCreate'
        ]);
        Route::get('/cap-nhat-danh-muc/{id}', [
            CategoryAdminController::class,
            'edit'
        ]);
        Route::post('/cap-nhat-danh-muc/{id}', [
            CategoryAdminController::class,
            'postEdit'
        ]);
        Route::get('/xoa-danh-muc/{id}', [
            CategoryAdminController::class,
            'delete'
        ]);
    });

    Route::prefix('san-pham')->group(function () {
        Route::get('/', [
            ProductAdminController::class,
            'index'
        ]);
        Route::get('/chi-tiet-san-pham/{id}', [
            ProductAdminController::class,
            'detail'
        ]);
        Route::get('/them-san-pham', [
            ProductAdminController::class,
            'create'
        ]);
        Route::post('/them-san-pham', [
            ProductAdminController::class,
            'postCreate'
        ]);
        Route::get('/cap-nhat-san-pham/{id}', [
            ProductAdminController::class,
            'edit'
        ]);
        Route::post('/cap-nhat-san-pham/{id}', [
            ProductAdminController::class,
            'postEdit'
        ]);
        Route::get('/xoa-san-pham/{id}', [
            ProductAdminController::class,
            'delete'
        ]);
        Route::get('/xoa-anh-san-pham/{id_prd}-{id}', [
            ProductAdminController::class,
            'deleteImgProduct'
        ]);
    });

    Route::prefix('danh-gia')->group(function () {
        Route::get('/', [
            ReviewAdminController::class,
            'index'
        ]);
        Route::get('/cap-nhat-danh-gia/{id}', [
            ReviewAdminController::class,
            'updateStatus'
        ]);
        Route::get('/xoa-danh-gia/{id}', [
            ReviewAdminController::class,
            'delete'
        ]);
    });

    Route::prefix('don-hang')->group(function () {
        Route::get('/', [
            OrderAdminController::class,
            'index'
        ]);
        Route::get('/chi-tiet-don-hang/{id}', [
            OrderAdminController::class,
            'detail'
        ]);
        Route::get('/cap-nhat-tt-don-hang/{id}', [
            OrderAdminController::class,
            'updateStatus'
        ]);
        Route::get('/huy-don-hang/{id}', [
            OrderAdminController::class,
            'cancelOrder'
        ]);
        Route::get('/xoa-don-hang/{id}', [
            OrderAdminController::class,
            'delete'
        ]);
    });

    Route::prefix('blog')->group(function () {
        Route::get('/', [
            BLogAdminController::class,
            'index'
        ]);
        Route::get('/chi-tiet-blog/{id}', [
            BLogAdminController::class,
            'detail'
        ]);
        Route::get('/them-blog', [
            BLogAdminController::class,
            'create'
        ]);
        Route::post('/them-blog', [
            BLogAdminController::class,
            'postCreate'
        ]);
        Route::get('/cap-nhat-blog/{id}', [
            BLogAdminController::class,
            'edit'
        ]);
        Route::post('/cap-nhat-blog/{id}', [
            BLogAdminController::class,
            'postEdit'
        ]);
        Route::get('/xoa-blog/{id}', [
            BLogAdminController::class,
            'delete'
        ]);
    });
});
