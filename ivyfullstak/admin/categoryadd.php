<?php
include "header.php";
include "leftside.php";
//include "class/category_class.php";
// define('__ROOT__', dirname(dirname(__FILE__))); 
// require_once(__ROOT__.'../admin/class/category_class.php');
?>
<?php
$category= new category;
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $danhmuc_ten = $_POST['danhmuc_ten'];
	$insert_category = $category ->insert_category($danhmuc_ten);
    header('Location:categorylist.php');
}
?>
<div class="admin-content-right">
            <div class="category-add-content-right-category_add">
                <form action="" method="POST" enctype="multipart/form-data">
                    <label for="">Vùi lòng danh mục<span style="color: red;">*</span></label> <br>
                    <input type="text" name="danhmuc_ten">
                    <button class="admin-btn" type="submit">Thêm</button>             
                </form>
            </div>           
        </div>
    </section>
    <section>
    </section>
    <script src="js/script.js"></script>
</body>
</html>  