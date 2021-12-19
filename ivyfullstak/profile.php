<?php
include_once 'header.php';
include_once 'class/user_class.php';
$user = new user();
Session::checkSession();
$current_id = Session::get('user_id');
if($user->GetUser($current_id)==false)
    header("location: logout.php");
$current_user = mysqli_fetch_array($user->GetUser($current_id));
?>

<section class="category" style="padding: 70px 0 0;">
    <div class="container mgbt">
        <form class="profile_tab" method="post" action="" autocomplete="off">
            <h3 class="heading-tab">Thông tin tài khoản</h3>
            <div class="flex justify-center">
            <div class="tb_1">
                <div class="info flex-column justify-center align-items-center">
                    <div class="single_row flex justify-between">
                        <label for="">Họ tên</label>
                        <input type="text" value="<?php echo $current_user['user_name'];?>" name="user_name">
                    </div>
                    <div class="single_row flex justify-between">
                        <label for="">Email</label>
                        <input type="email" value="<?php echo $current_user['user_email'];?>" name="user_email">
                    </div>
                    <div class="single_row flex justify-between">
                        <label for="">Ngày sinh</label>
                        <input type="date" value="<?php echo $current_user['user_date'];?>" name="user_date">
                    </div>
                    <div class="single_row flex justify-between">
                        <label for="">Giới tính</label>
                        <select name="user_gender" id="gender">
                            <option value="0" <?php if($current_user['user_gender']==0) echo "selected";?>>Nữ</option>
                            <option value="1" <?php if($current_user['user_gender']==1) echo "selected";?>>Nam</option>
                        </select>
                    </div>
                    <div class="single_row flex justify-between">
                        <label for="">Địa chỉ</label>
                        <input type="text" value="<?php echo $current_user['user_address'];?>" name="user_address">
                    </div>
                </div>
            </div>
            <div class="tbL2">
                <div class="info flex-column justify-center align-items-center">
                        <div class="single_row flex justify-between">
                            <label for="">Mật khẩu</label>
                            <input type="password" value="" name="user_pass1">
                        </div>
                        <div class="single_row flex justify-between">
                            <label for="">Xác nhận mật khẩu</label>
                            <input type="password" value="" name="user_pass2">
                        </div>
                </div>
            </div>
            </div>
            <div class="flex justify-center mg20">
                    <button class="btn" type="submit">Cập nhật</button>
                    <a class="btn" id="btn-dang-xuat" href='logout.php' >Đăng xuất</a>
            </div>
        </form>
    </div>
<?php
include_once 'footer.php';
?>