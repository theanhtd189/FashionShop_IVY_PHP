<?php
include "header.php";
include "leftside.php";
// include "class/category_class.php";
// define('__ROOT__', dirname(dirname(__FILE__))); 
// require_once(__ROOT__.'../admin/class/category_class.php');
 ?>
<?php
$brand = new brand;
if (isset($_GET['loaisanpham_id'])|| $_GET['loaisanpham_id']!=NULL){
    $loaisanpham_id = $_GET['loaisanpham_id'];
    }
    $delete_brand = $brand -> delete_brand($loaisanpham_id);
    if($delete_brand){
        echo '<script>alert("Thành công");window.location.href="brandlist.php"</script>';
    }
    else
        echo '<script>Alert("Lỗi")</script>';
?>
