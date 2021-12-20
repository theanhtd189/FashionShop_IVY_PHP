<?php
include "header.php";
include "leftside.php";
// include "class/category_class.php";
// define('__ROOT__', dirname(dirname(__FILE__))); 
// require_once(__ROOT__.'../admin/class/category_class.php');
 ?>
<?php
$product = new product();
if (isset($_GET['sanpham_size_id'])|| $_GET['sanpham_size_id']!=NULL){
    $sanpham_size_id = $_GET['sanpham_size_id'];
    }
    $delete_size_sanpham = $product -> delete_size_sanphams($sanpham_size_id);
    if($delete_anh_sanpham){
        echo '<script>alert("Thành công");window.location.href="sizesanphamlists.php"</script>';
    }
    else
        echo '<script>Alert("Lỗi")</script>';
?>
