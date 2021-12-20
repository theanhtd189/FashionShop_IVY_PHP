<?php
include "header.php";
include "leftside.php";
// include "class/category_class.php";
// define('__ROOT__', dirname(dirname(__FILE__))); 
// require_once(__ROOT__.'../admin/class/category_class.php');
?>
<?php
$category = new category();
if (isset($_GET['danhmuc_id'])|| $_GET['danhmuc_id']!=NULL){
    $danhmuc_id = $_GET['danhmuc_id'];
    }
    $get_category = $category -> get_category($danhmuc_id);
    if($get_category){$resul = $get_category ->fetch_assoc();}
?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $danhmuc_ten = $_POST['danhmuc_ten'];
	$update_category = $category->update_category($danhmuc_ten,$danhmuc_id);
    if($update_category){
        echo '<script>alert("Thành công");window.location.href="categorylist.php"</script>';
    }
    else
        echo '<script>Alert("Lỗi")</script>';
}
?>
        <div class="admin-content-right">
            <div class="category-add-content">
                <form action="" method="POST" enctype="multipart/form-data">
                    <label for="">Vùi lòng danh mục<span style="color: red;">*</span></label> <br>
                    <input type="text" name="danhmuc_ten" value="<?php echo $resul['danhmuc_ten'] ?>">
                    <button class="admin-btn" type="submit">Sửa</button>             
                </form>
            </div>           
        </div>
    </section>
    <section>
    </section>
    <script src="js/script.js"></script>
</body>
</html>  