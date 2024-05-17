<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\IOrderRepository;
use Illuminate\Support\Facades\Auth;

class OrderViewController extends Controller
{
    private $OrderRepository;

    public function __construct(IOrderRepository $OrderRepository) {
        $this->OrderRepository = $OrderRepository;
    }

    public function donhang()
    {
        $user = Auth::user();
        if($user){
            $orders = $this->OrderRepository->orderView($user->id_kh);
            return response()->json(['orders' => $orders], 200);
        } else {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
    }

    public function edit($id)
    {
        $order = $this->OrderRepository->findOrder($id);
        $orderdetails = $this->OrderRepository->findDetailProduct($id);
        $showusers = $this->OrderRepository->findUser($id);

        return response()->json([
            'order' => $order,
            'orderdetails' => $orderdetails,
            'showusers' => $showusers,
        ], 200);
    }
}
