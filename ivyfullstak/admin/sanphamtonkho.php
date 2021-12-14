<?php
include_once "header.php";
include_once "leftside.php";
include_once 'class/thongke_class.php';
$f = new ThongKe_Function();
?>
<div class="admin-content-right">
    <?php
    if (isset($_GET['loai'])) {
        if ($_GET['loai'] == "con") {
            $list = $f->ThongKeTonKho();
            if (isset($_GET['loc'])) {
                if ($_GET['loc'] == "loai") {
                    $list = $f->ThongKeTonKho("loai");
                } else
    if ($_GET['loc'] == "danhmuc") {
                    $list = $f->ThongKeTonKho("danhmuc");
                }
            } else {
                $list = $f->ThongKeTonKho();
            }
    ?>
            <div class="flex justify-between mgb20">
                <h1 style="color:#333">Thống kê sản phẩm tồn kho:</h1><br>
                <div class="flex justify-end">
                    <select name="" id="" onchange="select(this)">
                        <option value="0" <?php echo isset($_GET['loc']) ? ($_GET['loc'] == "no" ? "selected" : "") : ""; ?>>Lọc</option>
                        <option value="1" <?php echo isset($_GET['loc']) ? ($_GET['loc'] == "loai" ? "selected" : "") : ""; ?>>Thống kê theo loại sản phẩm</option>
                        <option value="2" <?php echo isset($_GET['loc']) ? ($_GET['loc'] == "danhmuc" ? "selected" : "") : ""; ?>>Thống kê theo danh mục sản phẩm</option>
                    </select>
                </div>
            </div>

            <div class="table-content">
                <table>
                    <tr>
                        <th>STT</th>
                        <th>Tên Mục</th>
                        <th>Số lượng còn lại</th>
                    </tr>
                    <?php
                    if ($list != false) {
                        $i = 0;
                        while ($list_r = mysqli_fetch_array($list)) {
                    ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $list_r['ten'] ?> <span style="color:blue">(ID: <?php echo $list_r['id'] ?>)</span></td>
                                <td><span style="color:red"><?php echo $list_r['soluong'] ?></span></td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </table>
            </div>
        <?php
        } else
    if ($_GET['loai'] == "het") {
            $list = $f->ThongKeSanPhamBanHet();
        ?>
            <div class="flex justify-between mgb20">
                <h1 style="color:#333">Thống kê sản phẩm đã bán hết:</h1><br>
            </div>

            <div class="table-content">
                <table>
                    <tr>
                        <th>STT</th>
                        <th>Tên Mục</th>
                        <th>Số lượng trong kho</th>
                    </tr>
                    <?php
                    if ($list != false) {
                        $i = 0;
                        while ($list_r = mysqli_fetch_array($list)) {
                    ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $list_r['ten'] ?> <span style="color:blue">(ID: <?php echo $list_r['id'] ?>)</span></td>
                                <td><span style="color:red"><?php echo $list_r['soluong'] ?></span></td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </table>
            </div>
    <?php
        }
    }
    ?>
</div>
</div>


</section>
<section>
</section>
<script src="js/script.js"></script>
<script>
    function select(object) {
        var value = object.value;
        if (value == 0) {
            window.location.href = "sanphamtonkho.php?<?php echo isset($_GET['loai']) ? 'loai=' . $_GET['loai'] . '&' : '' ?>loc=no";
        }
        if (value == 1) {
            window.location.href = "sanphamtonkho.php?<?php echo isset($_GET['loai']) ? 'loai=' . $_GET['loai'] . '&' : '' ?>loc=loai";
        }
        if (value == 2) {
            window.location.href = "sanphamtonkho.php?<?php echo isset($_GET['loai']) ? 'loai=' . $_GET['loai'] . '&' : '' ?>loc=danhmuc";
        }

    }
</script>
</body>

</html>