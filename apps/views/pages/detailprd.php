		<?php 
			$pid = $_GET['pid'];
			$read = showbyid($pid);
		?>
		<div class="mainbox size-std column">
			<div class="containt spccols-3 left-detail">
				<!-- <div class="full-length left-detail-img">
					<img src="assets/images/product/prod-2.jpg">
				</div> -->
				
					<div class="curent-image">
						<img src="<?php echo $read['productimage']; ?>">
					</div>
				

				<div class="full-length column" class="spc-tb">
					<div class="valdetprd" style="display: none;"><?php echo $_GET['pid']; ?></div>
					<ul class="full-length menu left-detail-menu threecols" id="ajaxdt-type">
						<li class="cols"><a href="#detail">Detail</a></li>
						<li class="cols"><a href="#statistik">Statistik</a></li>
						<li class="cols"><a href="#galeri" class="clickgal">Galeri</a></li>						
					</ul>					
				</div>
			</div>
			<div class="containt spccols-9" style="position: relative;">
				<div class="blur posabs" style="display: none;">
					<img src="assets/images/ajax-loader2.gif" class="middlepos posabs" style="height: 50px;">
				</div>
				<div class="full-length pad-tb containt" style="border-bottom: 1px solid #f5f5f5;">
					<div class="headtitle trans">
						<p class="nopad size-head3" style="max-width: 80%"><?php echo $read['productname'] ?></p><p class="size-std nopad">Little title</p>
						<ul class="tab-image-setting nopad">
							<li class="option-click" href="#tab-setting-prod"><img src="assets/images/icon/option-strip.png"></li>
						</ul>
						<div class="option-menu option-box shadow half size-std" id="tab-setting-prod" style="right: 20px; top: 30px; display: none;">
							<ul class="nopad size-std">
								<li><a href="<?php echo $base_url; ?>?page=products&edit=<?php echo $_GET['pid']; ?>">Edit</a></li>
								<li><a href="<?php echo $base_url; ?>?page=action&delete=<?php echo $_GET['pid']; ?>">Delete</a></li>
								<li><a href="#">Refresh</a></li>
							</ul>
						</div>
					</div>
					<!-- detail produk here -->
					<div class="ajaxdt-prd" style="width: 100%;">
						
					</div>
					<!-- end detail produk -->
				</div>
			</div>
		</div>