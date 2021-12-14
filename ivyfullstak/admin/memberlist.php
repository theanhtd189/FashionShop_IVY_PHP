<?php
include "header.php";
include "leftside.php";
include "class/user_class.php";

$type;
if (isset($_GET['type'])) {
    $type = $_GET['type'];
    if ($type == "user") {
        $f_user = new User_Function();
        $ds_nguoidung = $f_user->DanhSachNguoiDung();
?>
        <div class="admin-content-right">
        <div class="flex justify-between mgt20">
        <h1 style="color:#333">Danh sách tài khoản khách hàng:</h1><br>
        </div>
            <div class="table-content">
                <table>
                    <tr>
                        <th>Stt</th>
                        <!-- <th>ID</th> -->
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Ngày sinh</th>
                        <th>Giới tính</th>
                        <th>Level</th>
                        <th>Tùy chỉnh</th>
                    </tr>
                    <?php
                    if ($ds_nguoidung) {
                        $i = 0;
                        while ($result = $ds_nguoidung->fetch_assoc()) {
                            $i++
                    ?>
                            <tr>
                                <td> <?php echo $i ?></td>
                                <!-- <td> <?php echo $result['user_id'] ?></td> -->
                                <td> <?php echo $result['user_name']  ?></td>
                                <td> <?php echo $result['user_email']  ?></td>
                                <td> <?php echo $result['user_phone']  ?></td>
                                <td> <?php echo $result['user_date']  ?></td>
                                <td> <?php if($result['user_gender']==0) echo "Nữ"; else echo "Nam";  ?></td>
                                <th> <?php echo $result['user_level'] ?></td>
                                <td>
                                    <a href="memberdelete.php?type=user&id=<?php echo $result['user_id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a> 
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>

                </table>
            </div>
            <div class="flex mgv20">
                <a href="memberadd.php?type=user" class="btn">Thêm người dùng</a>
            </div>
        </div>
    <?php
    } else
    if ($type == "admin") {
        $f_user = new User_Function();
        $ds_nguoidung = $f_user->DanhSachAdmin();
    ?>
        <div class="admin-content-right">
        <div class="flex justify-between mgt20">
        <h1 style="color:#333">Danh sách tài khoản admin:</h1><br>
        </div>
            <div class="table-content">
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Tùy chỉnh</th>
                    </tr>
                    <?php
                    if ($ds_nguoidung) {
                        while ($result = $ds_nguoidung->fetch_assoc()) {
                    ?>
                            <tr>
                                <td> <?php echo $result['admin_id'] ?></td>
                                <td> <?php echo $result['admin_name']  ?></td>
                                <td> <?php echo $result['admin_password']  ?></td>
                                <td>
                                    <a href="memberdelete.php?type=admin&id=<?php echo $result['admin_id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>

                </table>
            </div>
            <div class="flex mgv20">
                <a href="memberadd.php?type=admin" class="btn">Thêm tài khoản admin</a>
            </div>
        </div>
<?php
    } else
        header("location: memberlist.php?type=user");
} else
    header("location: memberlist.php?type=user");

?>


</section>
<section>
</section>
<script src="js/script.js"></script>
</body>

</html>