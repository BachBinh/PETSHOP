@extends('layout')
@section('content')
<div class="body">
    <h1 class="h3 mb-3 bg-light p-3"><strong>Order placed</strong></h1>

    <div class="err">
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
    </div>

    @foreach ($showusers as $showuser)
        <div class="mb-3 bg-light p-3 my-3">
            <h4>Customer information</h4>
            <div class="d-flex">
                <div class="mr-4">
                    <div style="font-size: 18px;"><strong>Customer:</strong> {{$showuser->hoten}}</div>
                    <div style="font-size: 18px;"><strong>Email:</strong> {{$showuser->email}}</div>
                </div>
                <div class="">
                    <div style="font-size: 18px;"><strong>Phone:</strong> {{$showuser->sdt}}</div>
                    <div style="font-size: 18px;"><strong>Address:</strong> {{$showuser->diachi}}</div>
                </div>
            </div>
        </div>
    @endforeach

    <div class="mb-3">
        <table class="table table-hover my-0">
            <tbody>
                <tr>
                    <th>ID Order</th>
                    <td>{{$order->id_dathang}}</td>
                </tr>
                <tr>
                    <th>Order Date</th>
                    <td>{{$order->ngaydathang}}</td>
                </tr>
                <tr>
                    <th>Delivery Order</th>
                    <td>
                        @if($order->ngaygiaohang)
                            {{ date('Y-m-d', strtotime($order->ngaygiaohang)) }}
                        @else
                            {{ date('Y-m-d') }}
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Payment methods</th>
                    @if ($order->phuongthucthanhtoan == "COD")
                        <td class="d-none d-xl-table-cell"><div class="badge bg-secondary text-white">{{$order->phuongthucthanhtoan}}</div></td>
                    @elseif ($order->phuongthucthanhtoan == "VNPAY")
                        <td class="d-none d-xl-table-cell"><div class="badge bg-primary text-white">{{$order->phuongthucthanhtoan}}</div></td>
                    @else
                    <td class="d-none d-xl-table-cell">{{$order->phuongthucthanhtoan}}</td>
                    @endif
                </tr>
                <tr>
                    <th>Delivery address</th>
                    <td>{{$order->diachigiaohang}}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>
                        @if($order->trangthai == 'Processing')
                        <span class="badge bg-primary text-white">{{$order->trangthai}}</span>
                      @elseif ($order->trangthai == 'waiting for delivery')
                        <span class="badge bg-warning text-white">{{$order->trangthai}}</span>
                      @elseif ($order->trangthai == 'delivering')
                        <span class="badge bg-success text-white">{{$order->trangthai}}</span>
                      @elseif ($order->trangthai == 'delivered successfully')
                        <span class="badge bg-success text-white">{{$order->trangthai}}</span>
                      @else
                        <span class="badge bg-danger text-white">{{$order->trangthai}}</span>
                      @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </div>


    <div class="mb-3">
        <table class="table table-hover my-0">
            <thead>
                <th>Product's name</th>
                <th>Quantity</th>
                <th>Cost</th>
                <th>Discount</th>
                <th>Promotional price</th>
                <th>Total Price</th>
            </thead>
            <tbody>
                @php
                    $totalPrice = 0; // Khởi tạo biến tổng tiền
                @endphp
                @foreach ($orderdetails as $orderdetail)
                    <tr>
                        <td>{{$orderdetail->tensp}}</td>
                        <td>{{$orderdetail->soluong}}</td>
                        <td>{{$orderdetail->giatien}}</td>
                        <td>{{$orderdetail->giamgia}}%</td>
                        <td>{{$orderdetail->giakhuyenmai}}</td>
                        <td>{{$orderdetail->giakhuyenmai * $orderdetail->soluong}}</td>
                    </tr>

                    @php
                        $totalPrice += $orderdetail->giakhuyenmai * $orderdetail->soluong; // Cộng giá trị tổng tiền
                    @endphp

                @endforeach

            </tbody>
        </table>
    </div>

    <h3 class="d-flex justify-content-end align-items-center">
        Total payment &nbsp;<div class="text-danger" style="font-size: 40px;">{{ number_format($totalPrice, 0, ',', '.') }}đ</div>
    </h3>

    &nbsp;<a class="btn btn-secondary" href="{{URL::to('/donhang')}}">Return</a>
</div>
@endsection
