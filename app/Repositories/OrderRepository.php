<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\IOrderRepository;

class OrderController extends Controller
{
    private $OrderRepository;

    public function __construct(IOrderRepository $OrderRepository) {
        $this->OrderRepository = $OrderRepository;
    }

    // GET /api/orders
    public function index() {
        $orders = $this->OrderRepository->allOrder();
        return view('admin.orders.index', ['orders' => $orders]);
    }

    // GET /api/orders/{id}
    public function show($id) {
        $order = $this->OrderRepository->findOrder($id);
        $orderdetails = $this->OrderRepository->findDetailProduct($id);
        $showusers = $this->OrderRepository->findUser($id);

        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        return view('admin.orders.show', [
            'order' => $order,
            'orderdetails' => $orderdetails,
            'showusers' => $showusers,
        ]);
    }

    // PUT /api/orders/{id}
    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'ngaygiaohang' => 'required',
            'trangthai' => 'required',
        ]);

        $order = $this->OrderRepository->updateOrder($validatedData, $id);

        if (!$order) {
            return response()->json(['message' => 'Update failed, order not found'], 404);
        }

        return response()->json(['message' => 'Order updated successfully', 'order' => $order]);
    }
}

