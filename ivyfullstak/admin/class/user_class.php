<?php
class User_Function
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
    }
    public function DanhSachNguoiDung()
    {
        $q = "SELECT * FROM `tbl_thanhvien` WHERE 1";
        return $this->db->select($q);
    }
    public function DanhSachAdmin()
    {
        $q = "SELECT * FROM `tbl_admin` WHERE 1";
        return $this->db->select($q);
    }
    public function XoaNguoiDung($_id)
    {
        $q = "DELETE FROM `tbl_thanhvien` WHERE `tbl_thanhvien`.`user_id` = $_id";
        return $this->db->delete($q);
    }
    public function XoaAdmin($_id)
    {
        $q = "DELETE FROM `tbl_admin` WHERE `tbl_admin`.`admin_id` = $_id";
        return $this->db->delete($q);
    }
    public function ThemNguoiDung($username,$password,$email,$date,$phone,$add,$img,$gender,$level){
        $password = md5($password);
        $q = "INSERT 
        INTO `tbl_thanhvien`
            ( `user_name`, `user_date`, `user_password`, `user_phone`, `user_gender`, `user_email`,`user_address`, `user_level`, `user_img`) 
        VALUES ('$username', '$date' ,'$password','$phone','$gender','$email','$add','$level','$img')";
        if($this->CheckEmailTonTai($email))
            return false;
        return $this->db->insert($q);
    }
    public function CheckEmailTonTai($email){
        $q = "SELECT * FROM `tbl_thanhvien` WHERE user_email='".mysqli_real_escape_string($this->db->ConnectResult(),$email)."'";
        if($this->db->select($q) != null && $this->db->select($q)!= false){
            return true;
        }
        else
            return false;
    }

    public function GetNguoiDung($id){
        $q = "SELECT * FROM `tbl_thanhvien` WHERE user_id='$id'";
        return $this->db->select($q);
    }
    public function CapNhatNguoiDung($name,$email,$phone){

    }
}
