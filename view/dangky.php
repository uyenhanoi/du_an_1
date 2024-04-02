<?php
    // Kiểm tra xem biểu mẫu đã được gửi đi chưa
    if(isset($_POST['dangky'])){
        // Kiểm tra xem người dùng đã nhập đủ thông tin bắt buộc chưa
        if(empty($_POST['user']) || empty($_POST['pass']) || empty($_POST['email']) || empty($_POST['address']) || empty($_POST['tel'])){
            // Nếu không, hiển thị thông báo đỏ
            echo '<div class="alert alert-danger" role="alert">Vui lòng nhập đủ thông tin bắt buộc!</div>';
        } else {
            // Nếu đã nhập đủ thông tin, thực hiện xử lý đăng ký
            // Viết mã xử lý đăng ký ở đây
						echo '<div class="alert alert-success" role="alert">Đăng ký thành công!</div>';
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
					<li> </li>
				</ul>
		</div>

<div class="row justify-content-center">
	


<div class="col-xl-6 col-lg-6 col-md-8">
				<div class="box_account">
					<h3 class="new_client">Đăng ký</h3> <small class="float-right pt-2">* Phần bắt buộc nhập</small>
					<div class="form_container">
					<form action="index.php?act=dangky" method="post">
					<div class="form-group">
							<input type="text" class="form-control" placeholder="Tên đăng nhập*" name="user">
						</div>

						<div class="form-group">
							<input type="password" class="form-control" name="pass" id="password_in_2" value="" placeholder="Mật khẩu*">
						</div>
						<hr>
					
						<div class="form-group">
							<input type="email" class="form-control" name="email" id="email_2" placeholder="Email*">
						</div>

						<div class="form-group">
										<input type="text" class="form-control" name="address" placeholder="Địa chỉ*">
									</div>

									<div class="form-group">
									<input type="text" class="form-control" name="tel" placeholder="Số điện thoại*">
								</div>
						<div class="private box">
						
							
								<div class="col-12">

								</div>
							</div>
							<!-- /row -->
							<div class="col-12">

							</div>
							
						</div>
					
							<!-- /row -->
							
						</div>
			
						<div class="form-group">

								<div class="text-center">
									<input type="submit" value="Đăng ký" class="btn_1 full-width" name="dangky">
							
						
						</div>
					
					</div>
					<!-- /form_container -->
				</div>
				<!-- /box_account -->
			</div>
		</div>
		<!-- /row -->
		</div>
		<!-- /container -->
								</div>
	</main>
	<!--/main-->






	

