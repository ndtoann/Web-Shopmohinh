<div>
    <h4>Khách hàng: {{ $data['name_customer'] }}</h4>
    <h4>Mã đơn hàng: {{ $data['order_code'] }}</h4>
    <h4>Địa chỉ nhận hàng: {{ $data['address'] }}</h4>
    <h4>Sản phẩm bao gồm: </h4>
    @foreach ($data['products'] as $item)
        <p> x{{ $item->qty }} {{ $item->name }} ({{ number_format($item->price) }}<sup>đ</sup>/1)</p>
    @endforeach
    <h4>Tổng tiền: <span style="color: red">{{ number_format($data['total']) }} <sup>đ</sup></span></h4>
    <p>Cảm ơn bạn đã đặt hàng, nếu có thắc mắc vui lòng liên hệ <span>0987654321</span> hoặc <span>0123456789</span></p>
</div>
