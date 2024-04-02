<main>
		<div class="top_banner">
			<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.3)">
				<div class="container">
					<div class="breadcrumbs">
						<ul>
							<!-- <li><a href="#">SẢN PHẨM</a></li> -->
							<!-- <li><a href="#">Ghế sofa</a></li> -->
						</ul>
					</div>
					<h1>SẢN PHẨM</h1>

			
				</div>
			</div>
			<img src="img/producs/bannerghesofa.jpg" class="img-fluid" alt="">
		</div>
		<!-- /top_banner -->
		
			<div id="stick_here"></div>		
			<div class="toolbox elemento_stick">
				<div class="container">
				<ul class="clearfix">
					<li>
						<div class="sort_select">
						</div>
					</li>
		
					<li>
						<a data-bs-toggle="collapse" href="#filters" role="button" aria-expanded="false" aria-controls="filters">
							<i class="ti-filter"></i><span>Bộ lọc</span>
						</a>
					</li>
				</ul>
				<div class="collapse" id="filters"><div class="row small-gutters filters_listing_1">
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="dropdown">
						<a href="#" data-bs-toggle="dropdown" class="drop">Danh mục</a>
						<div class="dropdown-menu">
							<div class="filter_type">
								<?php foreach($danhmuc as $dm){?>
									<ul>
										<li>
											<a href="index.php?act=listsp1&id=<?=$dm['id']?>"><?=$dm['name']?></a>
										</li>


									</ul>
									<?php }?>
									<a href="#0" class="apply_filter">Apply</a>
								
								</div>
						</div>
					</div>
					<!-- /dropdown -->
				</div>
				
					<!-- /dropdown -->
			
				</div></div></div>
				</div>
			</div>
			<!-- /toolbox -->

			<div class="container margin_30">
			<div class="row small-gutters">

			<?php foreach ($dssp as $sp) {?>
				<div class="col-6 col-md-4 col-xl-3">
					<div class="grid_item">
						<figure> 
							<span class="ribbon off">-30%</span>
							<a href="index.php?act=spct&id=<?= $sp['id']?>">
								<img class="img-fluid lazy" src="./upload/<?=$sp['img']?>" data-src="./upload/<?=$sp['img']?>" alt="">
							</a>
							<div data-countdown="2019/05/15" class="countdown"></div>
						</figure>
						<a href="index.php?act=spct&id=<?= $sp['id']?>">
							<h3><?=$sp['name']?></h3>
						</a>
						<div class="price_box">
							<span class="new_price"><?=$sp['price']?></span>
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
				<!-- /col -->
			<?php }?>
			</div>
			<!-- /row -->
				
			<div class="pagination__wrapper">
			<ul class="pagination toolbox-item">
                        <?php
                        $prev_page = $cr_page - 1;
                        $next_page = $cr_page + 1;
                        ?>
                        <li class="page-item <?php echo ($prev_page <= 0) ? 'disabled' : ''; ?>">
                            <a class="page-link page-link-btn" href="index.php?act=listsp1&id=<?php echo $iddm; ?>&page=<?php echo $prev_page; ?>"><i class="fas fa-chevron-left"></i></i></a>
                        </li>
                        <?php
                        for ($i = max(1, $cr_page - 2); $i <= min($cr_page + 2, $num_pages); $i++) {
                        ?>
                            <li class="page-item <?php echo ($i == $cr_page) ? 'active' : ''; ?>">
                                <a class="page-link" href="index.php?act=listsp1&id=<?php echo $iddm; ?>&page=<?php echo $i; ?>"><?php echo $i; ?><span class="sr-only">(current)</span></a>
                            </li>
                        <?php
                        }
                        ?>
                        <li class="page-item <?php echo ($next_page > $num_pages) ? 'disabled' : ''; ?>">
                            <a class="page-link page-link-btn" href="index.php?act=listsp1&id=<?php echo $iddm; ?>&page=<?php echo $next_page; ?>"><i class="fas fa-chevron-right"></i></i></a>
                        </li>
                    </ul>
			</div>
				
		</div>
		<!-- /container -->
	</main>
	<!-- /main -->
	