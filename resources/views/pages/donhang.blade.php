@extends('layout')
@section('content')

<div class="body">
    <h1 class="h3 mb-3"><strong>List Order</strong></h1>

<div class="">
  @if(session()->has('success'))
      <div class="alert alert-success mb-3">
          {{session('success')}}
      </div>
  @endif
</div>

<div class="card flex-fill">

  <table class="table table-hover my-0">
    <thead>
      <tr>
        <th>ID</th>
        <th>Payment Method</th>
        <th>Order Date</th>
        <th>Estimated delivery date</th>
        <th>Status</th>
        <th>Delivery Address</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($orders as $order)
      <tr>
        <td>{{$order->id_dathang}}</td>

        @if ($order->phuongthucthanhtoan == "COD")
          <td class="d-none d-xl-table-cell"><div class="badge bg-secondary text-white">{{$order->phuongthucthanhtoan}}</div></td>
        @elseif ($order->phuongthucthanhtoan == "VNPAY")
          <td class="d-none d-xl-table-cell"><div class="badge bg-primary text-white">{{$order->phuongthucthanhtoan}}</div></td>
        @else
        <td class="d-none d-xl-table-cell">{{$order->phuongthucthanhtoan}}</td>
        @endif

        <td class="d-none d-xl-table-cell">{{$order->ngaydathang}}</td>
          @if ($order->ngaygiaohang)
            <td class="d-none d-xl-table-cell">{{ date('d/m/Y', strtotime($order->ngaygiaohang)) }}</td>
          @else
            <td></td>
          @endif
        <td>
          @if($order->trangthai == 'processing')
            <span class="badge bg-primary text-white">{{$order->trangthai}}</span>
          @elseif ($order->trangthai == 'wating for delivery')
            <span class="badge bg-warning text-white">{{$order->trangthai}}</span>
          @elseif ($order->trangthai == 'delivering')
            <span class="badge bg-success text-white">{{$order->trangthai}}</span>
          @elseif ($order->trangthai == 'delivered successfully')
            <span class="badge bg-success text-white">{{$order->trangthai}}</span>
          @else
            <span class="badge bg-danger text-white">{{$order->trangthai}}</span>
          @endif
        </td>
        <td class="d-none d-md-table-cell">{{$order->diachigiaohang}}</td>
        <td class="d-none d-md-table-cell"><a href="{{ route('donhang.edit', ['id' => $order->id_dathang]) }}" class="btn btn-primary">View orders</a></td>
      </tr>
      <tr>
      @endforeach
    </tbody>
  </table>

</div>
</div>

@endsection
