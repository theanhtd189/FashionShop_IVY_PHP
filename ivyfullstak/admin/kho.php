<?php
include_once "header.php";
include "leftside.php";
// include "class/category_class.php";
// define('__ROOT__', dirname(dirname(__FILE__))); 
// require_once(__ROOT__.'../admin/class/category_class.php');
?>
<?php
$product = new product();
$brand = new brand;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id_sp'];
    $sl = $_POST['sl'];
    $up = $product->NhapKho($id,$sl);
    if ($up) {
        echo '<script>alert("Thành công");window.location.href="kho.php"</script>';
    } else
        echo '<script>Alert("Lỗi")</script>';
}
?>
<div class="admin-content-right">
    <h2>Nhập kho</h2>
    <div class="subcategory-add-content">
        <form action="" method="POST" enctype="multipart/form-data">            
            <label for="">Chọn sản phẩm<span style="color: red;">*</span></label> <br>
            <select required="required" name="id_sp" id="">
                <option value="">--Chọn--</option>
                <?php
                $show = $product->GetDanhSachSP();
                if ($show) {
                    while ($result = $show->fetch_assoc()) {
                ?>
                        <option value="<?php echo $result['id'] ?>"><?php echo $result['ten'] ?></option>
                <?php
                    }
                }
                ?>
            </select><br>
            <label for="">Chọn số lượng<span style="color: red;">*</span></label> <br>
            <input class="subcategory-input" type="text" name="sl">
            <button class="admin-btn" type="submit">Gửi</button>
        </form>
    </div>
</div>
</section>
<section>
</section>
<script src="js/script.js"></script>
</body>

</html>