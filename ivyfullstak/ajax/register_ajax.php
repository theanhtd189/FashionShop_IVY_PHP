<?php
include "../class/index_class.php";
Session::init();
?>
<?php
$index = new index;
$user_name = $_GET['user_name'];
$check_register = $index -> check_register($user_name);
if($check_register) {echo $check_register ;}
?>

