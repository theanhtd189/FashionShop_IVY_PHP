<?php
class ThongKe_Function
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
    }
    public function DSDonHangDaThanhToan(){

    }
    public function ThongKeTonKho($loc="no"){
        $q = "SELECT sanpham_id as 'id',sanpham_tieude as 'ten',sanpham_soluong as soluong 
        FROM `tbl_sanpham`
        where sanpham_soluong > 0";
        if($loc=="loai"){
            $q= "SELECT sum(sp.sanpham_soluong) as soluong, sp.loaisanpham_id as 'id', l.loaisanpham_ten as 'ten'
            FROM `tbl_sanpham` sp, tbl_loaisanpham l 
            WHERE sp.loaisanpham_id=l.loaisanpham_id and sp.sanpham_soluong > 0
            group by sp.loaisanpham_id";
        }
        elseif($loc=="danhmuc"){
            $q = "SELECT sum(sp.sanpham_soluong) as soluong, sp.danhmuc_id as 'id', dm.danhmuc_ten as 'ten'
            FROM `tbl_sanpham` sp, tbl_danhmuc dm
            WHERE sp.danhmuc_id=dm.danhmuc_id and sp.sanpham_soluong > 0
            group by sp.danhmuc_id";
        }
        return $this->db->select($q);
    }
    public function ThongKeSanPhamBanHet(){
        $q = "SELECT sanpham_id as 'id',sanpham_tieude as 'ten',sanpham_soluong as soluong FROM `tbl_sanpham`
         where sanpham_soluong = 0";
        return $this->db->select($q);
    }
    /**
     * Thống kê doanh thu theo các sản phẩm đã bán được trong các đơn hàng đã hoàn thành
     */
    public function ThongKeDoanhThu(){
        $q = "SELECT sanpham_id as id, sanpham_gia as gia, sanpham_tieude as ten, sum(quantitys) as soluong  
        FROM `tbl_carta` 
        WHERE session_idA in (SELECT session_idA FROM `tbl_payment` WHERE statusA=1)
        GROUP by sanpham_id, sanpham_gia, sanpham_tieude";
        return $this->db->select($q);
    }
}