<?php

namespace App\Repositories;

use App\Repositories\IDanhmucRepository;
use App\Models\Danhmuc;

class DanhmucRepository implements IDanhmucRepository{

    public function allDanhmuc(){
        return Danhmuc::all();
    }

    public function storeDanhmuc($data){
        return Danhmuc::create($data);
    }

    public function findDanhmuc($id){
        return Danhmuc::where('id_danhmuc', $id)->first();
    }

    public function updateDanhmuc($data, $id){
        $danhmuc = $this->findDanhmuc($id);
        if($danhmuc){
            $danhmuc->update($data);
            return $danhmuc;
        }
        return null; // hoặc bất kỳ giá trị nào phù hợp với ứng dụng của bạn khi không tìm thấy danh mục
    }

    public function deleteDanhmuc($id){
        $danhmuc = $this->findDanhmuc($id);
        if($danhmuc){
            $danhmuc->delete();
            return true; // hoặc bất kỳ giá trị nào phù hợp với ứng dụng của bạn khi xóa thành công
        }
        return false; // hoặc bất kỳ giá trị nào phù hợp với ứng dụng của bạn khi không tìm thấy danh mục
    }
}
