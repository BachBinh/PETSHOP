<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Repositories\IAdminRepository;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    private $AdminRepository;

    public function __construct(IAdminRepository $AdminRepository) {
        $this->AdminRepository = $AdminRepository;
    }

    // GET /api/admin/dashboard
    public function dashboard(Request $request) {
        $getOrderView = $this->AdminRepository->getOrderView();
        $totalsCustomer = $this->AdminRepository->totalsCustomer();
        $totalsOrders = $this->AdminRepository->totalsOrders();
        $totalsMoney = $this->AdminRepository->totalsMoney();
        $totalsSaleProducts = $this->AdminRepository->totalsSaleProducts();
        
        // Trả về dữ liệu dưới dạng JSON
        return response()->json([
            'getOrderView' => $getOrderView,
            'totalsCustomer' => $totalsCustomer,
            'totalsOrders' =>  $totalsOrders, 
            'totalsMoney' => $totalsMoney, 
            'totalsSaleProducts' => $totalsSaleProducts
        ]);
    }
}



