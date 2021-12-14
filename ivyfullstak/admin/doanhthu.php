<?php
include_once "header.php";
include_once "leftside.php";
include_once 'class/thongke_class.php';
$f = new ThongKe_Function();
$list = $f->ThongKeDoanhThu();
?>
<div class="admin-content-right">
    <div class="flex justify-between mgb20">
        <h1 style="color:#333">Thống kê doanh thu cửa hàng:</h1><br>
    </div>

    <div class="table-content">
        <table>
            <tr>
                <th>ID</th>
                <th>Tên Mục</th>
                <td>Đơn giá</td>
                <th>Đã bán</th>
                <td>Thu về</td>
            </tr>
            <?php
            if ($list != false) {
                $tong = 0;
                while ($list_r = mysqli_fetch_array($list)) {
                    $tong = $tong + $list_r['soluong']*$list_r['gia'];
            ?>
                    <tr>
                        <td><?php echo $list_r['id'] ?></td>
                        <td><?php echo $list_r['ten'] ?></td>
                        <td><?php echo $list_r['gia'] ?> VND</td>
                        <td><?php echo $list_r['soluong'] ?></td>
                        <td><span style="color:red"><?php echo $list_r['soluong']*$list_r['gia'] ?> VND</span></td>
                    </tr>
            <?php
                }
            }
            ?>
            <tr>
                <td colspan="4">Tổng doanh thu</td>
                <td><?php echo $tong?> VND</td>
            </tr>
        </table>
    </div>
</div>
</div>


</section>
<section>
</section>
<script src="js/script.js"></script>
<script>
    function select(object) {
        var value = object.value;
        if(value==0){
            window.location.href="sanphamtonkho.php?loc=no";
        }
        if(value==1){
            window.location.href="sanphamtonkho.php?loc=loai";
        }
        if(value==2){
            window.location.href="sanphamtonkho.php?loc=danhmuc";
        }
        
    }
</script>
</body>

</html>