<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\IDanhmucRepository;

class DanhmucController extends Controller
{
    private $DanhmucRepository;

    public function __construct(IDanhmucRepository $DanhmucRepository) {
        $this->DanhmucRepository = $DanhmucRepository;
    }

    // GET /api/danhmucs
    public function index() {
        $danhmucs = $this->DanhmucRepository->allDanhmuc();
        return view('admin.danhmucs.index', ['danhmucs' => $danhmucs]);
    }

    // POST /api/danhmucs
    public function store(Request $request) {
        $validatedData = $request->validate([
            'ten_danhmuc' => 'required',
        ]);

        $danhmuc = $this->DanhmucRepository->storeDanhmuc($validatedData);

        return response()->json(['message' => 'Danh mục được tạo thành công', 'danhmuc' => $danhmuc], 201);
    }

    // GET /api/danhmucs/{id}
    public function show($id) {
        $danhmuc = $this->DanhmucRepository->findDanhmuc($id);

        if (!$danhmuc) {
            return response()->json(['message' => 'Danh mục không tồn tại'], 404);
        }

        return response()->json(['danhmuc' => $danhmuc]);
    }

    // PUT /api/danhmucs/{id}
    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'ten_danhmuc' => 'required',
        ]);

        $danhmuc = $this->DanhmucRepository->updateDanhmuc($validatedData, $id);

        if (!$danhmuc) {
            return response()->json(['message' => 'Cập nhập danh mục thất bại'], 404);
        }

        return response()->json(['message' => 'Cập nhập danh mục thành công', 'danhmuc' => $danhmuc]);
    }

    // DELETE /api/danhmucs/{id}
    public function destroy($id) {
        $deleted = $this->DanhmucRepository->deleteDanhmuc($id);

        if (!$deleted) {
            return response()->json(['message' => 'Xóa danh mục thất bại'], 404);
        }

        return response()->json(['message' => 'Xóa danh mục thành công']);
    }
}


