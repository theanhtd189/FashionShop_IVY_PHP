<?php
include 'header.php';
include_once 'class/user_class.php';
$user = new user();
$msg="";

if(isset($_REQUEST['dangnhap'])){
    $u = isset($_POST['email'])?$_POST['email']:"default";
    $p = isset($_POST['password'])?$_POST['password']:"default";
    $stt = $user->DangNhap($u,$p);
    if($stt!=false){ 
        $i = mysqli_fetch_array($stt);
        Session::set('user_id',$i['user_id']);
        Session::set('user_login',true);
        header('Location: profile.php?user_id='.$i['user_id']."'");
    }
    else
    {
        header("Location: login.php?error=0");
    }
}
if(isset($_REQUEST['dangky'])){
    $u = $_POST['user_name'];
    $p = $_POST['pass1'];
    $date = date('Y-m-d', strtotime($_POST['date']));
    $add = $_POST['address'];
    $gen = $_POST['gender'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
        if($user->CheckEmailTonTai($email)){
            echo '<script>alert("Email này đã tồn tại, vui lòng chọn email khác")</script>';
        }
        else{
            $stt = $user->DangKy($u,$p,$email,$phone,$gen,$date,$add);
            if($stt){
                $i = mysqli_fetch_array($user->GetUser($email,"email"));
                Session::set('user_id',$i['user_id']);
                Session::set('user_login',true);
                $id = $i['user_id'];
                header("Location: profile.php?user_id=$id");
            } 
        }
    }
?>
<section class="category" style="padding: 70px 0 0;">
    <h1 class="flex r2 mg20" style="color: red;">
    <?php if(isset($_GET['error'])) 
    {
        $e = $_GET['error'];
        if($e==0)
            echo "Tài khoản hoặc mật khẩu không đúng"; 
    }
    
    ?></h1>
    <div class="container mgbt">
        <div id="login">
            <h3 class="heading-tab">Đăng nhập</h3>
            <div class="row nowrap">
                <div class="t1">
                    <form enctype="application/x-www-form-urlencoded" method="post" action="" autocomplete="off">
                        <h4>Đăng nhập bằng tài khoản thường:</h4>
                        <p>Nếu bạn đã có tài khoản, hãy đăng nhập để tích lũy điểm thành viên và nhận được những ưu đãi tốt hơn!</p>
                        <div class="row r1">
                            <div>Email của bạn:</div>
                            <div><input type="text" placeholder="Email của bạn..." name="email"></div>
                        </div>
                        <div class="row r1">
                            <div>Mật khẩu:</div>
                            <div><input type="password" placeholder="Mật khẩu của bạn..." name="password"></div>
                        </div>
                        <div class="row r2">
                            <div><input type="checkbox" value="1" name="customer_remember" style="width: 15px; height: 17px; vertical-align: sub"> Ghi nhớ đăng nhập?</div>
                        </div>
                        <div class="row r2">

                            <div><a href="#">Quên mật khẩu?</a></div>
                        </div>
                        <div class="row r2">
                            <div><button type="submit" id="but_login_email" name="dangnhap">Đăng nhập</button></div>
                        </div>
                    </form>
                </div>
                <div class="t2">
                    <h4>Khách hàng mới của IVY</h4>
                    <p>Nếu bạn chưa có tài khoản trên ivy, hãy sử dụng tùy chọn này để truy cập biểu mẫu đăng ký.</p>
                    <p>Bằng cách cung cấp cho IVY thông tin chi tiết của bạn, quá trình mua hàng trên ivy sẽ là một
                        trải nghiệm thú vị và nhanh chóng hơn!</p>
                    <br>
                    <a href="#" class="btn" id="btn-open-signup">Đăng ký</a>
                </div>
            </div>
        </div>
        <div id="signup">
        <h3 class="heading-tab">Đăng ký tài khoản mới</h3>
            <div class="row nowrap r2">
                <form enctype="application/x-www-form-urlencoded" method="post" action="" class="flex" onsubmit="return checkform()">
                    <div class="tab-info mgr50">
                        <h4>Thông tin khách hàng</h4>
                        <div class="row">
                            <div class="mgr50">
                                <p><b>Họ và tên:<span>*</span></b></p>
                                <input type="text" value="" name="user_name" placeholder="Họ tên" required="">
                            </div>
                            <div >
                                <p><b>Địa chỉ:<span>*</span></b></p>
                                <textarea name="address"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mgr50">
                                <p><b>Email:<span>*</span></b></p>
                                <input type="email" name="email" value="" placeholder="Email..." required="">
                            </div>
                            <div class="">
                                <p><b>Điện thoại:<span>*</span></b></p>
                                <input type="text" id="sdt" value="" name="phone" placeholder="Điện thoại..." required="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mgr50">
                                <p><b>Ngày sinh:<span>*</span></b></p>
                                <input type="date" class="datepicker hasDatepicker" name="date" value="" id="pdate" placeholder="Ngày sinh..." required="" id="dp1639135615402">
                            </div>
                            <div class="">
                                <p><b>Giới tính:<span>*</span></b></p>
                                <select name="gender">
                                    <option value="0">Nữ</option>
                                    <option value="1">Nam</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="tab-info">
                        <h4>Thông tin mật khẩu</h4>
                        <div class="row">
                            <div >
                                <p><b>Mật khẩu:<span>*</span></b></p>
                                <input type="password" value="" id="pass1" name="pass1" placeholder="Mật khẩu..." required="">
                            </div>
                        </div>
                        <div class="row">
                            <div >
                                <p><b>Nhập lại mật khẩu:<span>*</span></b></p>
                                <input type="password" value="" id="pass2" name="pass2" placeholder="Nhập lại mật khẩu..." required="">
                            </div>
                        </div>
                        <div class="row">
                            <div >
                                <button type="submit" class="btn" name="dangky" style="margin-top: 31px;">Đăng ký</button>
                            </div>                        
                        </div>
                        <div class="row flex-column">
                            <p>Hoặc bạn đã có tài khoản</p>
                            <button type="submit" class="btn" id="btn-open-login">Đăng nhập ngay</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</section>
<script>
    $(document).ready(function(){
        $('#btn-open-signup').click(function(){
            $('#login').hide(500);
            $('#signup').show(500);
        })
        
        $('#btn-open-login').click(function(){
            $('#login').show(500);
            $('#signup').hide(500);
        })

        
    })
    function checkform(){
            let p1 = document.querySelector('#pass1').value;
            let p2 = document.querySelector('#pass2').value;
            let sdt = document.querySelector('#sdt').value;
            let date = document.querySelector('#pdate').value;
            let _regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
            if(p1!=p2){
                alert ('Mật khẩu không khớp')
                return false;
            }
            else
            if(!_regex.test(sdt))
            {
                alert ('Số điện thoại không hợp lệ')
                return false;
            }
            
            return true;
        }
    
</script>
<?php
include "footer.php"
?>