<?php
 require_once(__ROOT__.'/admin/lib/database.php');
 require_once(__ROOT__.'/admin/lib/session.php');
 require_once(__ROOT__.'/admin/helper/format.php');
//  include_once '../helper/format.php';
//  include_once '../lib/database.php';
?>

<?php
 class user
 {

    private $db;
    private $fm;

    public function __construct()
    {
        $this ->db = new Database();
    }
    public function DangNhap($email,$password){
        $query = "select * from tbl_thanhvien 
        where user_email='".mysqli_real_escape_string($this->db->ConnectResult(),$email)."' 
        and user_password='".md5(mysqli_real_escape_string($this->db->ConnectResult(),$password))."'";
        $result = $this->db->select($query);
        return $result;
    }
    public function GetUser($para,$type="id"){
        $q = "select * from tbl_thanhvien where user_id='".mysqli_real_escape_string($this->db->ConnectResult(),$para)."'";
        if($type!="id"){
            $q = "select * from tbl_thanhvien where user_email='".mysqli_real_escape_string($this->db->ConnectResult(),$para)."'";
        }
        return $this->db->select($q);
    }
    public function DangKy($username,$password,$email,$phone,$gender,$date,$add){
        $password = md5($password);
        $q = "INSERT 
        INTO `tbl_thanhvien`
            ( `user_name`, `user_date`, `user_password`, `user_phone`, `user_gender`, `user_email`,`user_address`, `user_level`, `user_img`) 
        VALUES ('".mysqli_real_escape_string($this->db->ConnectResult(),$username)."',
         '".mysqli_real_escape_string($this->db->ConnectResult(),$date)."' ,
         '".mysqli_real_escape_string($this->db->ConnectResult(),$password)."',
         '".mysqli_real_escape_string($this->db->ConnectResult(),$phone)."',
         '".mysqli_real_escape_string($this->db->ConnectResult(),$gender)."',
         '".mysqli_real_escape_string($this->db->ConnectResult(),$email)."',
         '".mysqli_real_escape_string($this->db->ConnectResult(),$add)."','1','')";
        return $this->db->insert($q);
    }
    /**
     * Check xem email đã có người khác đăng ký chưa
     * @return True nếu email đã tồn tại trong database
     * @return False nếu email không tồn tại trong database
     */
    public function CheckEmailTonTai($email){
        $q = "SELECT * FROM `tbl_thanhvien` WHERE user_email='".mysqli_real_escape_string($this->db->ConnectResult(),$email)."'";
        if($this->db->select($q) != null && $this->db->select($q)!= false){
            return true;
        }
        else
            return false;
    }

}
