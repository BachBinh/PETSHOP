<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sanpham;
use App\Repositories\ISanphamRepository;

class HomeController extends Controller
{
    private $sanphamRepository;

    public function __construct(ISanphamRepository $sanphamRepository) {
        $this->sanphamRepository = $sanphamRepository;
    }

    public function index()
    {
        $alls = $this->sanphamRepository->allProduct();
        $sanphams = $this->sanphamRepository->relatedProduct();
        $dogproducts = $this->sanphamRepository->dogProduct();
        $catproducts = $this->sanphamRepository->catProduct();
        $choGiongs = $this->sanphamRepository->choGiong();
        $meoGiongs = $this->sanphamRepository->meoGiong();
        
        return response()->json([
            'alls' => $alls,
            'sanphams' => $sanphams,
            'dogproducts' => $dogproducts,
            'catproducts' => $catproducts,
            'choGiongs' => $choGiongs,
            'meoGiongs' => $meoGiongs,
        ], 200);
    }

    public function congiong()
    {
        $choGiongs = $this->sanphamRepository->choGiong();
        $meoGiongs = $this->sanphamRepository->meoGiong();

        return response()->json([
            'choGiongs' => $choGiongs,
            'meoGiongs' => $meoGiongs,
        ], 200);
    }

    public function detail($id)
    {
        $sanpham = Sanpham::findOrFail($id);
        $randoms = $this->sanphamRepository->randomProduct()->take(5);
        
        return response()->json([
            'sanpham' => $sanpham,
            'randoms' => $randoms,
        ], 200);
    }

    public function search(Request $request)
    {
        $searchs = $this->sanphamRepository->searchProduct($request);
        
        return response()->json([
            'searchs' => $searchs,
            'tukhoa' => $request->input('tukhoa'),
        ], 200);
    }

    public function viewAll()
    {
        $viewAllPaginations = $this->sanphamRepository->viewAllWithPagi();
        
        return response()->json([
            'sanphams' => $viewAllPaginations,
        ], 200);
    }

    public function services()
    {
        return response()->json([
            'message' => 'Services information',
        ], 200);
    }
}
