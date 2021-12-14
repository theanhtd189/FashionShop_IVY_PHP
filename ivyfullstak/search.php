<?php
include "header.php";
include "leftside.php"
?>
<?php
$order=0;
if (isset($_GET['q']) && trim($_GET['q']) != '') {
        $tensp = $_GET['q'];
} else {
    header('location: index.php');
}
if(isset($_GET['order']))
{
    if($_GET['order']=="asc")
    {
        $get_loaisanpham = $index->TimSanPham($tensp,"asc");
        $order=1;
    }
    else 
    if($_GET['order']=="desc")
    {
        $get_loaisanpham = $index->TimSanPham($tensp,"desc");
        $order=2;
    }
}
else
    $get_loaisanpham = $index->TimSanPham($tensp);
?>

<div class="category-right">
    <div class="category-right-top row align-items-center">
        <div class="category-right-top-item ">
            <?php
            $get_loaisanphamA = $index->get_loaisanphamA($tensp);
            if ($get_loaisanphamA) {
                $result = $get_loaisanphamA->fetch_assoc();
            }
            ?>
            <p>Kết quả tìm kiếm cho sản phẩm <strong class="query-result">'<?php echo $_GET['q']; ?>'</strong></p>
        </div>
        <div class="category-right-top-item">
            <button><span>Bộ lọc</span><i class="fas fa-sort-down"></i></button>
        </div>
        <div class="category-right-top-item">
            <select name="order" id="order_option" onchange="getComboA(this)">
                <option value="no">Sắp xếp</option>
                <option value="asc" <?php if($order == 1){echo("selected");}?>>Giá thấp đến cao</option>
                <option value="desc" <?php if($order == 2){echo("selected");}?>>Giá cao đến thấp</option>
            </select>
        </div>
    </div>

    <div class="category-right-content row">
        <?php
        if (isset($get_loaisanpham)) {
            if($get_loaisanpham!=false) {
            while ($resultB = $get_loaisanpham->fetch_assoc()) {
        ?>
                <div class="category-right-content-item">
                    <a href="product.php?sanpham_id=<?php echo $resultB['sanpham_id'] ?>"><img src="admin/uploads/<?php echo $resultB['sanpham_anh'] ?>" alt=""></a>
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
        else
        echo '<h3 style="font-family: sans-serif;"> ❌❌❌ Không tìm thấy sản phẩm nào</h3>';
        }
        ?>
    </div>
    <!-- <div class="category-right-bottom row">
        <div class="category-right-bottom-items">
            <p>Hiện thị 2 <span>&#124;</span> 4 sản phẩm</p>
        </div>
        <div class="category-right-bottom-items">
            <p><span>&#171;</span> 1 2 3 4 5 <span>&#187;</span> Trang cuối</p>
        </div>
    </div> -->
</div>
</div>
</div>
</section>
<script>
    const link = 'search.php?q=<?php echo $_GET['q']?>';
    function getComboA(selectObject) {
        var value = selectObject.value;
        //window.location.href = (link + "&order=" + value);
        console.log(value)
        console.log(window.location.href)
        console.log(document.currentScript)
        window.location.href = ((link + "&order=" + value))
    }
</script>
<!-- -------------------------Footer -->
<?php
include "footer.php"
?>