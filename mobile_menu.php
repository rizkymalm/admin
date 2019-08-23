	<div class="mob-head mob gradientr">
		<img src="assets/images/logo-ourboutique-blue.png" style="position: absolute;right: 2%; top: 0; bottom: 0; margin:auto;" class="logo">
		<div class="mob-opt-menu mob">
			<img src="assets/images/icon/option.png" onclick="mobmenu()" style="cursor: pointer;">
		</div>	
		<div class="mob-menu mob">
			<div>
				<table class="full-length">
					<tr>
						<td style="width: 40%;"><img src="assets/images/icon/profile.png" style="margin: 25%; width: 50%; border-radius: 50%; border: 2px solid #BBDEDE"></td>
						<td align="center"><b class="size-head4" style="color: #00aea4;">John Doe</b><br><i class="size-cute">System Administrator</i></td>
					</tr>
				</table>
			</div>

			<ul class="full-length size-std nopad">
				<li class="pad-tb"><a href="<?php echo $base_url; ?>"><img src="assets/images/icon/dashboard.png">Dashboard</a></li>
				<li><p class="accord nopad" href="#madvert"><img src="assets/images/icon/pdf-icon.png">Product</p>
					<ul class="submenu" id="madvert">
						<li><a class="size-std" href="product.php">View</a></li>
						<li><a class="size-std" href="addnewproduct.php">Add New</a></li>
					</ul>
				</li>
				<li><p class="accord nopad" href="#marticles"><img src="assets/images/icon/articles.png">Articles</p>
					<ul class="submenu" id="marticles">
						<li><a class="size-std" href="<?php echo $base_url; ?>?page=article&act=addnew">Add New</a></li>
						<li><a class="size-std" href="<?php echo $base_url; ?>?page=article">View</a></li>
					</ul>
				</li>
				<li><p class="accord nopad" href="#mtrans"><img src="assets/images/icon/transaction.png">Transaction</p>
					<ul class="submenu" id="mtrans">
						<li><a class="size-std" href="<?php echo $base_url; ?>?page=invoice">Invoices</a></li>
						<li><a class="size-std" href="<?php echo $base_url; ?>?page=payment">Payment</a></li>
					</ul>
				</li>
				<li class="accord pad-tb" href="#msettings"><img src="assets/images/icon/settings-2.png">Settings
					<ul class="submenu" id="msettings">
						<li></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>