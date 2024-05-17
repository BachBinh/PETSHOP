<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\IProductRepository;

class ProductController extends Controller
{
    private $productRepository;

    public function __construct(IProductRepository $productRepository) {
        $this->productRepository = $productRepository;
    }

    // GET /api/products
    public function index() {
        $products = $this->productRepository->allProduct();
        return view('admin.products.index', ['products' => $products]);
    }

    // POST /api/products
    public function store(Request $request) {
        $validatedData = $request->validate([
            'tensp' => 'required',
            'anhsp' => 'required|image',
            'giasp' => 'required|numeric',
            'mota' => 'nullable',
            'giamgia' => 'nullable|numeric',
            'giakhuyenmai' => 'nullable|numeric',
            'soluong' => 'required|numeric',
            'id_danhmuc' => 'required|exists:danhmucs,id',
        ]);

        // Lưu hình ảnh vào thư mục frontend/uploads
        if ($request->hasFile('anhsp')) {
            $imagePath = $request->file('anhsp')->store('upload', 'public_frontend');
            $imageUrl = asset("storage/{$imagePath}");
            $validatedData['anhsp'] = $imageUrl;
        }

        // Tính giá khuyến mãi
        $giagoc = $validatedData['giasp'];
        $giamgia = $validatedData['giamgia'] ?? 0;
        $validatedData['giakhuyenmai'] = $giagoc - (($giagoc * $giamgia) / 100);

        $product = $this->productRepository->storeProduct($validatedData);
        return response()->json(['message' => 'Product created successfully', 'product' => $product], 201);
    }

    // GET /api/products/{id}
    public function show($id) {
        $product = $this->productRepository->findProduct($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        return view('admin.products.show', ['product' => $product]);
    }

    // PUT /api/products/{id}
    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'tensp' => 'required',
            'anhsp' => 'nullable|image',
            'giasp' => 'required|numeric',
            'mota' => 'nullable',
            'giamgia' => 'nullable|numeric',
            'giakhuyenmai' => 'nullable|numeric',
            'soluong' => 'required|numeric',
            'id_danhmuc' => 'required|exists:danhmucs,id',
        ]);

        if ($request->hasFile('anhsp')) {
            $imagePath = $request->file('anhsp')->store('upload', 'public_frontend');
            $imageUrl = asset("storage/{$imagePath}");
            $validatedData['anhsp'] = $imageUrl;
        } else {
            $validatedData['anhsp'] = $request->input('anhsp1');
        }

        // Tính giá khuyến mãi
        $giagoc = $validatedData['giasp'];
        $giamgia = $validatedData['giamgia'] ?? 0;
        $validatedData['giakhuyenmai'] = $giagoc - (($giagoc * $giamgia) / 100);

        $product = $this->productRepository->updateProduct($validatedData, $id);

        if (!$product) {
            return response()->json(['message' => 'Update failed, product not found'], 404);
        }

        return response()->json(['message' => 'Product updated successfully', 'product' => $product]);
    }

    // DELETE /api/products/{id}
    public function destroy($id) {
        $deleted = $this->productRepository->deleteProduct($id);

        if (!$deleted) {
            return response()->json(['message' => 'Delete failed, product not found'], 404);
        }

        return response()->json(['message' => 'Product deleted successfully']);
    }
}
