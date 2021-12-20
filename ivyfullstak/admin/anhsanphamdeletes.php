<?php
include "header.php";
include "leftside.php";
// include "class/category_class.php";
// define('__ROOT__', dirname(dirname(__FILE__))); 
// require_once(__ROOT__.'../admin/class/category_class.php');
 ?>
<?php
$product = new product();
if (isset($_GET['sanpham_anh_id'])|| $_GET['sanpham_anh_id']!=NULL){
    $sanpham_anh_id = $_GET['sanpham_anh_id'];
    }
    $delete_anh_sanpham = $product -> delete_anh_sanpham($sanpham_anh_id);
    if($delete_anh_sanpham){
        echo '<script>alert("Thành công");window.location.href="anhsanphamlists.php"</script>';
    }
    else
        echo '<script>Alert("Lỗi")</script>';
?>
