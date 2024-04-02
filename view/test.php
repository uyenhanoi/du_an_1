	<div class="container margin_30">
			<div class="row small-gutters">

			<?php foreach ($list_sp_dm as $sp) {?>
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
				<ul class="pagination">
					<li><a href="#0" class="prev" title="previous page">&#10094;</a></li>
					<li>
						<a href="#0" class="active">1</a>
					</li>
					<li>
						<a href="#0">2</a>
					</li>
					<li>
						<a href="#0">3</a>
					</li>
					<li>
						<a href="#0">4</a>
					</li>
					<li><a href="#0" class="next" title="next page">&#10095;</a></li>
				</ul>
			</div>
				
		</div>
		<!-- /container -->
	</main>
	<!-- /main -->
	









