<?php
include "header.php";
include "leftside.php";
include "class/user_class.php";
?>
<?php
$f = new User_Function();
$type;
if (isset($_GET['type'])) {
    $type = $_GET['type'];
} else
    header("Location: memberadd.php?type=user");

if (isset($_REQUEST['user']) && $type="user") {
    $user_name = $_POST['user_name'];
    $user_password = $_POST['user_password'];
    $email = $_POST['user_email'];
    $phone = $_POST['user_phone'];
    $gender = $_POST['user_gender'];
    $user_level = $_POST['user_level'];
    $add = $_POST['user_add'];
    $date = date('Y-m-d', strtotime($_POST['user_date']));
    move_uploaded_file($_FILES['product_img']['tmp_name'], "uploads/user/" . $_FILES['product_img']['name']);
    $user_img =  $_FILES['product_img']['name'];
    if($f->CheckEmailTonTai($email)){
        echo '<script>alert("Email này đã tồn tại, vui lòng chọn email khác")</script>';
    }
    else{
        $stt = $f->ThemNguoiDung($user_name, $user_password,$email,$date,$phone,$add, $user_img,$gender,$user_level);
        if(!$stt){
            echo '<script>alert("Lỗi")</script>';
        }
        else
        {
            echo '<script>alert("Thành công");window.location.href="memberlist.php?type=user"</script>'; 
        }
    }    
}
elseif (isset($_REQUEST['admin']) && $type="admin") {
    include 'class/admin_class.php';
    $f = new admin();
    if($f->CheckUsernameAdmin($_POST['admin_name'])){
        echo '<script>alert("Username đã tồn tại, vui lòng chọn tên khác")</script>';
    }
    else
    {
        $stt = $f->ThemAdmin($_POST['admin_name'],$_POST['admin_pass']);
        if($stt!=false){
            echo '<script>alert("Thành công");window.location.href="memberlist.php?type=admin"</script>';           
        }
        else
        {
            echo '<script>alert("Lỗi")</script>';
        }
    }
}
?>
<div class="admin-content-right">
<?php
if($type=="user"){
    if(isset($_GET['id'])){
        if($f->GetNguoiDung($_GET['id'])!=false){
            $u = mysqli_fetch_array($f->GetNguoiDung($_GET['id']));
        }
        else
        header('location: memberlist.php');
    }
?>
    <div class="category-add-content">
        <form action="" method="POST" enctype="multipart/form-data" onsubmit="return checkform()" class="form_edit" autocomplete="off">
            <div class="avt_user">
                <img src="uploads/user/<?php echo isset($u)?(empty($u['user_img'])?"default.jpg":$u['user_img']):"default.jpg"; ?>" alt="">
                <label for="input-img" class="btn yl btn-select-avt">Chọn ảnh đại diện</label>
                <input type="file" name="product_img" id="input-img">
            </div>
            <label for="">Tên thành viên<span style="color: red;">*</span></label> <br>
            <input type="text" name="user_name" value="<?php echo isset($u)?$u['user_name']:""; ?>"> <br> 
            <label for="">Email<span style="color: red;">*</span></label> <br>
            <input type="email" name="user_email" required value="<?php echo isset($u)?$u['user_email']:""; ?>"> <br> 
            <label for="">Mật khẩu<span style="color: red;">*</span></label> <br>
            <input type="password" name="user_password" id="pass1" required>  <br> 
            <label for="">Xác nhận mật khẩu<span style="color: red;">*</span></label> <br>
            <input type="password" id="pass2" required>  <br> 
            <label for="">Ngày sinh<span style="color: red;">*</span></label> <br>
            <input type="date" name="user_date" required value="<?php echo isset($u)?$u['user_date']:""; ?>">  <br> 
            <label for="">Số điện thoại<span style="color: red;">*</span></label> <br>
            <input type="text" name="user_phone" id="sdt" required value="<?php echo isset($u)?$u['user_phone']:""; ?>">  <br> 
            <label for="">Giới tính<span style="color: red;">*</span></label> <br>
            <select name="user_gender" id="">
                <option value="0" <?php echo isset($u)?($u['user_gender']==0?"selected":""):""; ?>>Nữ</option>
                <option value="1" <?php echo isset($u)?($u['user_gender']==1?"selected":""):""; ?>>Nam</option>
            </select>  <br> 
            <label for="">Level<span style="color: red;">*</span></label> <br>
            <input type="text" value="1" name="user_level" required><br>
            <label for="">Địa chỉ<span style="color: red;">*</span></label> <br>
            <input type="text" name="user_add" value="<?php echo isset($u)?$u['user_address']:""; ?>"><br>
             <br>
            
            <button class="admin-btn btn" type="submit" name="user">Cập nhật</button>
        </form>
    </div>
<?php
    }
    elseif($type=="admin"){
?>
<div class="category-add-content flex justify-center mgt20">
        <form action="" method="POST" enctype="multipart/form-data" class="form_edit">
            <label for="">Tên đăng nhập<span style="color: red;">*</span></label> <br>
            <input type="text" name="admin_name" required>  <br> 
            <label for="">Mật khẩu<span style="color: red;">*</span></label> <br>
            <input type="password" name="admin_pass" id="pass1" required>  <br> 
            <button class="admin-btn" type="submit" name="admin">Thêm</button>
        </form>
    </div>
<?php
    }
?>



</div>
</section>
<section>
</section>
<script src="js/script.js"></script>
<script>
    function checkform(){
            let p1 = document.querySelector('#pass1').value;
            let p2 = document.querySelector('#pass2').value;
            if(p1!=p2){
                alert ('Mật khẩu không khớp')
                return false;
            }     
            return true;
        }
</script>
</body>

</html>