<?php
include "header.php";
include "leftside.php";
// include "class/category_class.php";
// define('__ROOT__', dirname(dirname(__FILE__))); 
// require_once(__ROOT__.'../admin/class/category_class.php');
 ?>
<?php
$category = new category;
if (isset($_GET['danhmuc_id'])|| $_GET['danhmuc_id']!=NULL){
    $danhmuc_id = $_GET['danhmuc_id'];
    }
    $delete_category = $category -> delete_category($danhmuc_id);
    header('Location:categorylist.php');
?>
