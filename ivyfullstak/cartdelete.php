<?php
include "header.php";

?>
<?php

if (isset($_GET['id'])|| $_GET['id']!=NULL){
    $id = $_GET['id'];
    }
    $delete_cart = $index -> delete_cart($id);
    header('Location:cart.php?');
?>
