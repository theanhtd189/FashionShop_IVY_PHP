<?php
include "header.php";
include "leftside.php"
?>
<?php
$order = 0;$q="";
if (isset($_GET['loaisanpham_id'])) {
    $loaisanpham_id = $_GET['loaisanpham_id'];
} else {
    header("location: index.php");
}
if (isset($_GET['order'])) {
    if ($_GET['order'] == "asc") {
        $get_loaisanpham = $index->get_loaisanpham($loaisanpham_id, "asc");
        $order = 1;
    } else 
        if ($_GET['order'] == "desc") {
        $get_loaisanpham = $index->get_loaisanpham($loaisanpham_id, "desc");
        $order = 2;

    } else
    {
        $get_loaisanpham = $index->get_loaisanpham($loaisanpham_id, "no");

    }
        
} else
    $get_loaisanpham = $index->get_loaisanpham($loaisanpham_id,"no");

if ($get_loaisanpham == false)
    header("location: index.php");

?>

<div class="category-right">
    <div class="category-right-top row align-items-center">
        <div class="category-right-top-item ">
            <?php
            $get_loaisanphamA = $index->get_loaisanphamA($loaisanpham_id);
            if ($get_loaisanphamA) {
                $result = $get_loaisanphamA->fetch_assoc();
            }
            ?>
            <p><?php if (isset($result['loaisanpham_ten'])) {
                    echo $result['loaisanpham_ten'];
                } else {
                    echo "Hiện tại chưa có loại sản phẩm nào";
                } ?></p>
        </div>
        <div class="category-right-top-item">
            <button><span>Bộ lọc</span><i class="fas fa-sort-down"></i></button>
        </div>
        <div class="category-right-top-item">
            <select name="order" id="" onchange="getComboA(this)">
                <option value="no">Sắp xếp</option>
                <option value="asc" <?php if ($order == 1) {
                                        echo ("selected");
                                    } ?>>Giá thấp đến cao</option>
                <option value="desc" <?php if ($order == 2) {
                                            echo ("selected");
                                        } ?>>Giá cao đến thấp</option>
            </select>
        </div>
    </div>
    <div class="category-right-content row">
        <?php
        if ($get_loaisanpham) {
            while ($resultB = $get_loaisanpham->fetch_assoc()) {
        ?>
                <div class="category-right-content-item">
                    <a href="product.php?sanpham_id=<?php echo $resultB['sanpham_id'] ?>">
                    <img src="admin/uploads/<?php echo $resultB['sanpham_anh'] ?>" alt=""></a>
                    <a href="product.php?sanpham_id=<?php echo $resultB['sanpham_id'] ?>">
                        <h1><?php echo $resultB['sanpham_tieude'] ?></h1>
                    </a>
                    <p><?php $resultA = number_format($resultB['sanpham_gia']);
                        echo $resultA ?><sup>đ</sup></p>
                    <span>_new_</span>
                </div>
        <?php
            }
        }
        ?>
    </div>
    <div class="category-right-bottom row">
        <div class="category-right-bottom-items">
            <p>Hiện thị 2 <span>&#124;</span> 4 sản phẩm</p>
        </div>
        <div class="category-right-bottom-items">
            <p><span>&#171;</span> 1 2 3 4 5 <span>&#187;</span> Trang cuối</p>
        </div>
    </div>
</div>
</div>
</div>
</section>
<script>
    const link = 'category.php?loaisanpham_id=<?php echo $_GET['loaisanpham_id'] ?>';

    function getComboA(selectObject) {
        var value = selectObject.value;
        console.log(value)
        console.log(window.location.href)
        console.log(link + "&order=" + value)
        window.location.href = (link + "&order=" + value)
    }
</script>
<!-- -------------------------Footer -->
<?php
include "footer.php"
?>