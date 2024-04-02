<?php if (isset($spct)) {
} ?>
<div class="container margin_30">
	<div class="countdown_inner"> <div data-countdown="2020/05/15" class="countdown"></div>
	</div>
	<div class="row">
		<div class="col-lg-6 magnific-gallery">
			<p>
				<a href="" title="Photo title" data-effect="mfp-zoom-in"><img src="upload/<?= $spct['img'] ?>" alt="" class="img-fluid"></a>
			</p>
		</div>
		<div class="col-lg-6" id="sidebar_fixed">

			<!-- /page_header -->
			<div class="prod_info">
				<h1><?= $spct['name'] ?></h1>
				<span class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i><em>4 reviews</em></span>
				<!-- <p><small>SKU: MTKRY-001</small><br>Sed ex labitur adolescens scriptorem. Te saepe verear tibique sed. Et wisi ridens vix, lorem iudico blandit mel cu. Ex vel sint zril oportere, amet wisi aperiri te cum.</p> -->
				<p><?= $spct['mota'] ?></p>
				<div class="prod_options">
				
					<div class="row mb-1">
						<label class="col-xl-5 col-lg-5  col-md-6 col-6"><strong>Số lượng</strong></label>
						<div class="col-xl-4 col-lg-5 col-md-6 col-6">
							<div class="form-group">
								<input style="border: solid 1px ; background-color:#f8f9fa" onchange="calculateTotal()" type="number" id="quantity" class="form-control" value="1" min="1">
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-5 col-lg-5  col-md-6 col-6"><strong>Giá:</strong></div>
					<div class="col-xl-4 col-lg-5 col-md-6 col-6">
						<div class="price_main"> 
							<input style="border: none ; background-color:#f8f9fa" disabled class="form-control" id="price" value="<?= $spct['price'] ?>"> 
						
						</div>
					</div>

				</div>
			</div>
			<!-- /prod_info -->
			<div class="row mt-4 product_actions">
				<div class="col-xl-5 col-lg-5  col-md-6 col-6">
					<h5>Tổng tiền :</h5>
				</div>
				<div class="col-xl-4 col-lg-5 col-md-6 col-6">
					<div class="price_main"> 
						<input style="border: none ; background-color:#f8f9fa" onchange="calculateTotal()" id="total" class="form-control" value="<?= number_format($spct['price'], 0, '.', ',') ?> " disabled>
					</div>
				</div>
				<div class="row mt-4">
					<div class="col-lg-6 col-md-6">

					</div>

					<div class="col-lg-6 col-md-6">
						<div class="btn_add_to_cart"><a href="#0" class="btn_1">Add to Cart</a></div>
					</div>
				</div>
			</div>


			<!-- /product_actions -->
		</div>
	</div>
	<!-- /row -->
</div>
<!-- /container -->

<div class="tabs_product">
	<div class="container">
		<ul class="nav nav-tabs" role="tablist">
			<li class="nav-item">
				<a id="tab-B" href="#pane-B" class="nav-link" data-bs-toggle="tab" role="tab">Bình Luận</a>
			</li>
		</ul>
	</div>
</div>
<!-- /tabs_product -->
<div class="tab_content_wrapper">
	<div class="container">
		<div class="tab-content" role="tablist">
			<div id="pane-B" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-B">
				<div class="card-header" role="tab" id="heading-B">
					<h5 class="mb-0">
						<a class="collapsed" data-bs-toggle="collapse" href="#collapse-B" aria-expanded="false" aria-controls="collapse-B">
							Bình Luận
						</a>
					</h5>
				</div>
				<div id="collapse-B" class="collapse" role="tabpanel" aria-labelledby="heading-B">
					<div class="card-body">
						<div class="row justify-content-between">
							<?php
							foreach ($dsbl as $bl) { ?>
								<div class="col-lg-6">
									<div class="review_content">
									<h4><?= $bl['user'] ?></h4>
									<p><?= $bl['noidung'] ?></p>
										<div class="clearfix add_bottom_10">
											<span class="rating"><em><?= $bl['danhgia'] ?>/5 sao</em></span><br>
											<em><?= $bl['ngaybinhluan'] ?></em>
										</div>
										
										

									</div>

								</div>
							<?php } ?>
						</div>
					</div>
					<!-- /card-body -->
				</div>
			</div>
		</div>
		<!-- /tab-content -->

	</div>
</div>


<?php if (isset($spct)) {
    // Gọi hàm để tải sản phẩm cùng loại
    $list_sp_cungloai = load_sanpham_cungloai($spct['id'], $spct['iddm']);
?>

<div class="container margin_60_35">
    <div class="main_title">
        <h2>Sản Phẩm Liên Quan</h2>
        <span>Sản Phẩm Liên Quan</span>
    </div>
    <div class="owl-carousel owl-theme products_carousel">
        <?php foreach ($list_sp_cungloai as $sp) { ?>
            <div class="item">
                <div class="grid_item">
                    <span class="ribbon new">New</span>
                    <figure>
							<span class="ribbon off">-30%</span>
                        <!-- <a href="product-detail-1.html"> -->
							<a href="index.php?act=spct&id=<?= $sp['id']?>">

                            <img class="owl-lazy" src="./upload/<?= $sp['img'] ?>" data-src="./upload/<?=$sp['img']?>" alt="">
                        </a>
                    </figure>
                    <div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
                    <a href="">
                        <h3><?= $sp['name'] ?></h3>
                    </a>
                    <div class="price_box">
                        <span class="new_price"><?= $sp['price'] ?></span>
							<span class="old_price">$60.00</span>

                    </div>
                    <ul>
                        <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                        <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
                        <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                    </ul>
                </div>
                <!-- /grid_item -->
            </div>
        <?php } ?>
    </div>
    <!-- /products_carousel -->
</div>
<!-- /container -->
<?php } ?>







