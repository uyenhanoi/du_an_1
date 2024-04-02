<main class="bg_gray">
		
	<div class="container margin_30">
		<div class="page_header">
			<div class="breadcrumbs">
				<ul>
					<li><a href="#">Trang chủ</a></li>
					<li><a href="#">Tài khoản</a></li>
			
				</ul>
		</div>


<div class="row justify-content-center">
<div class="col-xl-6 col-lg-6 col-md-8">

<form action="index.php?act=quenmk" method="post">

<div class="box_account">
  <h3 class="client">Quên mật khẩu</h3>
  <div class="form_container">
  
  <div class="form-group">
      <input type="text" class="form-control" placeholder="Email*" name="email">
    </div>
    <div class="text-center"><input type="submit" value="Gửi" class="btn_1 full-width" name="guiemail"></div>
  </div>
    <h2 class="thongbao">

                 
                 <?php
                 if(isset($thongbao)&&($thongbao!="")){
                  echo "$thongbao";
                 }
                 ?>
                 </h2>
</div>
  </div>
  <!-- /form_container -->
</div>			

</div>
  </div>





