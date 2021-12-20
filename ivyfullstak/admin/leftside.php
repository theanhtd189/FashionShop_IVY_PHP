<?php
if(isset($_GET['admin_id']))
    Session::destroyAdmin();
?>
<section class="admin-content row space-between">
        <div class="admin-content-left">
        <div class="header-top-left">
            <a href="index.php"><p> <span>Ju</span>lly</p></a>
        </div>
            <ul>
            <li><a  href="#"> <img style="width:20px" src="icon/hi.png" alt="">Chào:  <span style="color:blueviolet; font-size:22px">Admin</span><span style="color: red; font-size:20px">&#10084;</span></a>
            <li><a href="#"><img style="width:20px" src="icon/membership.png" alt="">Quản Lý Tài khoản</a>
                    <ul>
                        <li><a href="memberlist.php?type=user">Khách hàng</a></li>
                        <li><a href="memberlist.php?type=admin">Quản trị viên</a></li>
                    </ul>
                </li>
                <li><a href="#"><img style="width:30px" src="icon/note.svg" alt="">Thống kê</a>
                    <ul>
                        <li><a href="sanphamtonkho.php?loai=con">Sản phẩm tồn kho</a></li>
                        <li><a href="sanphamtonkho.php?loai=het">Sản phẩm đã bán hết</a></li>
                        <li><a href="doanhthu.php">Doanh thu</a></li>
                    </ul>
                </li>
                <li><a href="#"><img style="width:30px" src="icon/note.svg" alt="">Đơn hàng</a>
                    <ul>
                        <li><a href="orderlist.php">Chưa hoàn thành</a></li>
                        <li><a href="orderlistdone.php">Đã hoàn thành</a></li>
                        <li><a href="orderlistall.php">Tất cả Đơn hàng</a></li>
                    </ul>
                </li>
                <li><a href="#"><img style="width:20px" src="icon/options.png" alt="">Danh Mục</a>
                    <ul>
                        <li><a href="categorylist.php">Danh sách</a></li>
                        <li><a href="categoryadd.php">Thêm</a></li>
                    </ul>
                </li>
                <li><a href="#"><img style="width:20px" src="icon/menu.png" alt="">Loại Sản Phẩm</a>
                    <ul>
                        <li><a href="brandlist.php">Danh sách</a></li>
                        <li><a href="brandadd.php">Thêm</a></li>
                    </ul>
                </li>
                <li><a href="#"><img style="width:20px" src="icon/colour.png" alt="">Màu sắc</a>
                    <ul>
                        <li><a href="colorlist.php">Danh sách</a></li>
                        <li><a href="coloradd.php">Thêm</a></li>
                    </ul>
                </li>
                <li><a href="#"><img style="width:20px" src="icon/article.png" alt="">Sản phẩm</a>
                    <ul>
                        <li><a href="productlist.php">Danh sách</a></li>
                        <li><a href="productadd.php">Thêm</a></li>
                    </ul>
                </li>
                <li><a href="#"><img style="width:20px" src="icon/picture.png" alt="">Ảnh Sản phẩm</a>
                    <ul>
                        <li><a href="anhsanphamlists.php">Danh sách</a></li>
                        <li><a href="anhsanphamadds.php">Thêm</a></li>
                    </ul>
                </li>
                <li><a href="#"><img style="width:20px" src="icon/size.png" alt="">Size Sản phẩm</a>
                    <ul>
                        <li><a href="sizesanphamlists.php">Danh sách</a></li>
                        <li><a href="sizesanphamadds.php">Thêm</a></li>
                    </ul>
                </li>
                
                <li><a href="?admin_id=<?php echo Session::get('admin_id') ?>"> <img style="width:20px" src="icon/logout.png" alt="">Đăng Xuất</a>
                    
                </li>
            </ul>
        </div>