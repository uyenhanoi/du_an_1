<?php
    // Kiểm tra xem biểu mẫu đã được gửi đi chưa
    if(isset($_POST['dangnhap'])){
        // Kiểm tra xem người dùng đã nhập tên đăng nhập và mật khẩu chưa
        if(empty($_POST['user']) || empty($_POST['pass'])){
            // Nếu không, hiển thị thông báo đỏ
            echo '<div class="alert alert-danger" role="alert">Vui lòng nhập tên đăng nhập và mật khẩu!</div>';
        } else {
            // Nếu đã nhập đủ thông tin, thực hiện xử lý đăng nhập
        }
    }
?>



<main class="bg_gray">
		
	<div class="container margin_30">
		<div class="page_header">
			<div class="breadcrumbs">
				<ul>
					<li><a href="#">Trang chủ</a></li>
					<li><a href="#">Tài khoản</a></li>
			
				</ul>
		</div>

	</div>
	<!-- /page_header -->
	
			<div class="row justify-content-center">
			<?php
                if(isset($_SESSION['user'])){
                  extract($_SESSION['user']);
                
                ?>

								<div class="">Xin chào <br>
                <?=$user?>
                </div>
								<div class="">
                  <li>
                    <a href="index.php?act=quenmk">Quên mật khẩu</a> <br>
                  </li> 
                 <li>
                  <a href="index.php?act=edit_taikhoan">Cập nhật tài khoản</a> <br>
                </li>
                <?php 
                if($role==1){

               ?>
                 <li>
                  <a href="admin/index.php">Đăng nhập admin</a>
                </li>
                <?php
                  }
                ?>
                 <li>
                  <a href="index.php?act=thoat">Thoát</a>
                </li>

                 </div>
                <?php
                }else{

                
                ?>  
			<!-- <div class="col-xl-6 col-lg-6 col-md-8"> -->
			
			<form action="index.php?act=dangnhap" method="post">

				<div class="box_account">
					<h3 class="client">Đăng nhập</h3>
					<div class="form_container">
					
					<div class="form-group">
							<input type="text" class="form-control" placeholder="Tên đăng nhập*" name="user">
						</div>
						<div class="form-group">
							<input type="password" class="form-control" name="pass" id="password_in" value="" placeholder="Mật khẩu*">
						</div>
					
						<div class="text-center"><input type="submit" value="Đăng nhập" class="btn_1 full-width" name="dangnhap"></div>
                 <li class="float-end"><a href="index.php?act=dangky">Đăng kí thành viên</a></li>
								 <?php
                }
                    ?>
					</div>
					<!-- /form_container -->
				</div>			

			</div>





		