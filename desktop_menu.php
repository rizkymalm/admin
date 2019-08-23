	<div class="lside desk">
		<div class="head gradientl">
			<img src="assets/images/logo-ourboutique-blue.png" class="logo">
		</div>
		<div class="sidebar">
			<ul class="menu size-std">
				<li><a href="<?php echo $base_url; ?>"><img src="assets/images/icon/dashboard.png">Dashboard</a></li>
				<li><p class="nopad accord" href="#prdmenu"><img src="assets/images/icon/pdf-icon.png">Product</p>
					<ul class="submenu size-cute" id="prdmenu">
						<li><a href="<?php echo $base_url; ?>?page=products&act=addnew">Add New</a></li>
						<li><a href="<?php echo $base_url; ?>?page=products">View</a></li>						
					</ul>
				</li>
				<li><p class="nopad accord" href="#articles"><img src="assets/images/icon/articles.png">Articles</p>
					<ul class="submenu" id="articles">
						<li><a href="<?php echo $base_url; ?>?page=article&act=addnew">Add New</a></li>
						<li><a href="<?php echo $base_url; ?>?page=article">View</a></li>
					</ul>
				</li>
				<li><p class="nopad accord" href="#transaction"><img src="assets/images/icon/transaction.png">Transaction</p>
					<ul class="submenu" id="transaction">
						<li><a href="<?php echo $base_url; ?>?page=invoice">Invoices</a></li>
						<li><a href="<?php echo $base_url; ?>?page=payment">Payment</a></li>
					</ul>
				</li>
				<li><a href="<?php echo $base_url; ?>?page=member"><img src="assets/images/icon/profile-blue.png">Member</a></li>
				<li><a href="index.php?page=export"><img src="assets/images/icon/pdf-icon.png">Export</a></li>
				<li><a href="logout.php"><img src="assets/images/icon/logout-blue.png">Logout</a></li>
			</ul>
		</div>
	</div>
 