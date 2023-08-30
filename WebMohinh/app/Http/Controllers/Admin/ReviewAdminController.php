<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Models\Admin\Review;

class ReviewAdminController extends AdminController
{
    private $review;
    public function __construct()
    {
        $this->review = new Review();
    }

    public function index(Request $request)
    {
        $title = 'Tất cả đánh giá';
        $filter = [];
        if (!empty($request->status)){
            $status = $request->status;
            $status = $status == 'active' ? 1 : 0;
            $filter[] = ['tbl_reviews.status', '=', $status];
        }
        $reviews = $this->review->getAllReviews($filter);
        return view('admin.reviews.index', [
            'web_title' => $title,
            'reviewList' => $reviews
        ]);
    }

    public function detail(Request $request)
    {
        $title = 'Chi tiết đánh giá';
        $id = $request->id;
        $review = $this->review->getDetailReview($id);
        if (empty($review)) {
            return redirect(route('dashboard'));
        }
        return view('admin.reviews.detail', [
            'web_title' => $title,
            'reviewDetail' => $review
        ]);
    }

    public function updateStatus(Request $request)
    {
        $id = $request->id;
        $review = $this->review->getDetailReview($id);
        if (empty($review)) {
            return redirect(route('dashboard'));
        }
        $currentStatus = $review[0]->status;
        if ($currentStatus == 0) {
            $currentStatus = 1;
        } else {
            $currentStatus = 0;
        }

        $data = [
            $currentStatus,
            now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s')
        ];
        $isValue = $this->review->updateReview($data, $id);;
        if ($isValue) {
            return redirect('/admin/danh-gia')->with('msg', 'Đã duyệt đánh giá');
        }
        return redirect('/admin/danh-gia')->with('msg', 'Xảy ra lỗi, vui lòng thử lại sau');
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $review = $this->review->getDetailReview($id);
        if (empty($review)) {
            return redirect(route('dashboard'));
        }

        $isValue = $this->review->deleteReview($id);;
        if ($isValue) {
            return redirect('/admin/danh-gia')->with('msg', 'Đã xóa đánh giá');
        }
        return redirect('/admin/danh-gia')->with('msg', 'Xảy ra lỗi, vui lòng thử lại sau');
    }
}
