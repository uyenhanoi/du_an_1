<main class="bg_gray">
		
	<div class="container margin_30">
		<div class="page_header">
			<div class="breadcrumbs">
				<ul>
					<li><a href="#">Trang chủ</a></li>
					<li><a href="#">Tài khoản</a></li>
					<li>Cập nhật tài khoản </li>
				</ul>
		</div>

    <div class="row justify-content-center">
	


<div class="col-xl-6 col-lg-6 col-md-8">
				<div class="box_account">
					<h3 class="new_client">Cập nhật tài khoản</h3> 
					<div class="form_container">
          <?php
                if(isset($_SESSION['user'])&&(is_array($_SESSION['user']))){
                  extract($_SESSION['user']);
                }
                ?>
					<form action="index.php?act=edit_taikhoan" method="post">
					<div class="form-group">
							<input type="text" class="form-control" placeholder="Tên đăng nhập*" name="user" value="<?=$user?>">
						</div>

						<div class="form-group">
							<input type="password" class="form-control" name="pass" id="password_in_2" value="<?=$pass?>" placeholder="Mật khẩu*">
						</div>
						<hr>
					
						<div class="form-group">
							<input type="email" class="form-control" name="email" id="email_2" value="<?=$email?>" placeholder="Email*" >
						</div>

						<div class="form-group">
										<input type="text" class="form-control" name="address"  value="<?=$address?>" placeholder="Địa chỉ*">
									</div>

									<div class="form-group">
									<input type="text" class="form-control" name="tel" placeholder="Số điện thoại*" value="<?=$tel?>">
                  <input type="hidden" name="id" value="<?=$id?>">
                 
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
									
                  <input type="submit" value="Cập nhật" class="btn_1 full-width" name="capnhat">
                  <input type="reset" value="Nhập lại">
						
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






	

