<?php
include "header.php";
include "leftside.php";
// include "class/category_class.php";
// define('__ROOT__', dirname(dirname(__FILE__))); 
// require_once(__ROOT__.'../admin/class/category_class.php');
?>
<?php
$product = new product();
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $sanpham_id = $_POST['sanpham_id'];
    $sanpham_size = $_POST['sanpham_size'];
    $insert_sizesp =$product ->insert_sizesp($sanpham_id,$sanpham_size);
    if($insert_sizesp){
        echo '<script>alert("Thành công");window.location.href="sizesanphamlists.php"</script>';
    }
    else
        echo '<script>Alert("Lỗi")</script>';
}
?>
        <div class="admin-content-right">
            <div class="subcategory-add-content">
                <form action="" method="POST" enctype="multipart/form-data">
                    <label for="">Chọn mã sản phẩm<span style="color: red;">*</span></label> <br>
                    <select required="required" name="sanpham_id">
                        <option value="">--Chọn--</option>
                        <?php
                        $show_product = $product ->show_product();
                        if($show_product){while($result=$show_product->fetch_assoc()){
                        ?>
                        <option value="<?php echo $result['sanpham_id'] ?>"><?php echo $result['sanpham_id'] ?>-<?php echo $result['sanpham_ma'] ?></option>
                        <?php
                        }}
                        ?>
                    </select> <br>
                    <label for="">Chọn Size sản phẩm<span style="color: red;">*</span></label> <br>
                    <select name="sanpham_size" id="">
                        <option value="">--Chọn--</option>
                        <option value="S">Size S</option>
                        <option value="M">Size M</option>
                        <option value="L">Size L</option>
                        <option value="XL">Size XL</option>
                        <option value="XXL">Size XXL</option>
                    </select>
                   
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