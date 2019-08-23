	
		<div class="mainbox size-std column">
			<div class="containt cols-12">
				<div class="headtitle trans" style="margin-bottom: 0;">
					<p class="size-head4 nopad">All Product</p>
				</div>
				<div class="list-control">
					<div class="list-control-box">
						<button class="option-click btn-list-control" href="#list-control-category">
							Category :&nbsp; All 
							<img src="assets/images/icon/arrow-down.png" class="icon-list-control">
						</button>
						<div class="option-box option-menu shadow half box-list-control" id="list-control-category">
							<ul class="full-length nopad">
								<li class="search-field">
									<input type="text" name="" class="size-std search-field-frm">
								</li>
								<li class="pad-tb"><input type="checkbox" name="category">&nbsp;Kids</li>
								<li class="pad-tb"><input type="checkbox" name="category">&nbsp;Electronic</li>
								<li class="pad-tb"><input type="checkbox" name="category">&nbsp;Kids</li>
							</ul>
						</div>
					</div>
					<div class="list-control-box">
						<button class="option-click btn-list-control" href="#list-control-show">
							Show :&nbsp; 20 
							<img src="assets/images/icon/arrow-down.png" class="icon-list-control">
						</button>
						<div class="option-box option-menu shadow half box-list-control" id="list-control-show">
							<ul class="full-length nopad">
								<a href=""><li class="pad-tb">50</li></a>
								<a href=""><li class="pad-tb">100</li></a>
								<a href=""><li class="pad-tb">200</li></a>
							</ul>
						</div>
					</div>	
					<div class="list-control-box">
						<button class="option-click btn-list-control" href="#list-control-sort">
							Sort By :&nbsp; ID 
							<img src="assets/images/icon/arrow-down.png" class="icon-list-control">
						</button>
						<div class="option-box option-menu shadow half box-list-control" id="list-control-sort">
							<ul class="full-length nopad">
								<a href=""><li class="pad-tb">ID</li></a>
								<a href=""><li class="pad-tb">Updated</li></a>
								<a href=""><li class="pad-tb">Popular</li></a>
								<a href=""><li class="pad-tb">Most View</li></a>
							</ul>
						</div>
					</div>				
					<div class="valchecked"></div>  
				</div>
				<div class="full-length" style="overflow-x: auto; padding-bottom: 40px;">
					<form id="count-checked">
						<table class="size-std full-tables">
							<tr>
								<th>
									<div class="checkboxtype1">
									 <input type="checkbox" id="selectall" name="radio" />
									 <label for="selectall" id="chartd"><span></span></label>
									</div>
								</th>
								<th style="text-align: left; padding: 10px; width: 100px;">Product ID</th>
								<th style="text-align: left;">Product</th>
								<th>Terjual</th>
								<th>Stok</th>
								<th>Update</th>
								<th style="width: 100px;">Action</th>
							</tr>
							<?php 
								foreach (showprd() as $resprd) {
							?>
							<tr>
								<td>
									<div class="checkboxtype1">
									 <input type="checkbox" id="radio0<?php echo $resprd['kdproduct']; ?>" name="radio" class="select cnt-chk"/>
									 <label for="radio0<?php echo $resprd['kdproduct']; ?>" id="chartd"><span></span></label>
									</div>
								</td>
								<td><?php echo $resprd['kdproduct']; ?></td>
								<td><?php echo $resprd['productname']; ?> </td>
								<td style="text-align: center;"><?php echo $resprd['sold_product']; ?></td>
								<td style="text-align: center;"><?php echo $resprd['stock_product']; ?></td>
								<td style="text-align: center;"><?php echo $resprd['update_time']; ?></td>
								<td style="text-align: center;" class="linkmore"><a href="<?php echo $base_url; ?>?page=products&pid=<?php echo $resprd['kdproduct'] ?>">View</a></td>
							</tr>
							<?php }?>
						</table>
					</form>
					<div class="size-std numberofrows">
						Show 20 of 150
					</div>
				</div>
			</div>
		</div>