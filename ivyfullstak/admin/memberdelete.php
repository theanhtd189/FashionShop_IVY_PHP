<?php
include "header.php";
include "leftside.php";
include "class/user_class.php";
// define('__ROOT__', dirname(dirname(__FILE__))); 
// require_once(__ROOT__.'../admin/class/comment_class.php');
?>
<?php
$f_user = new User_Function();
if (isset($_GET['id']) && isset($_GET['type'])) {
    $id = $_GET['id'];
    $stt;
    if($_GET['type']=="admin")
    {
        $stt = $f_user->XoaAdmin($id);
        if(!$stt)
        header('Location:memberlist.php?type=admin&stt=Lỗi');
        else
            header('Location:memberlist.php?type=admin');
    }      
    else
    if($_GET['type']=="user"){
        $stt = $f_user->XoaNguoiDung($id);
        if(!$stt)
        header('Location:memberlist.php?type=user&stt=Lỗi');
        else
            header('Location:memberlist.php?type=user');
    }   
}

?>