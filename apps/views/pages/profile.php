<style type="text/css">
	.breadcrumbs{
		float: left;
		background: #FFFFFF;
		padding: 0;
	}
	.breadcrumbs li{
		float: left;
		background: #FFFFFF;
		padding: 10px 15px 10px 35px;
		position: relative;
		margin-right: 5px;
		text-align: right;
		cursor: pointer;
	}
	.breadcrumbs li:first-child{
		padding-left: 30px;
	}
	.breadcrumbs li a{
		color: #a7acb1;
	}
	.breadcrumbs li:hover{
		background: #cccccc;
	}
	.breadcrumbs li:hover a{
		color: #ffffff;
	}
	.breadcrumbs li:hover:after{
		border-left: 20px solid #cccccc;
	}
	.breadcrumbs li:first-child:before{
    	display: none;
	}
	.breadcrumbs li:after{
		content: " ";
		position: absolute;
		right: -20px;
		width: 0;
    	height: 0;
    	top: 0;
    	border-top: 17px solid transparent;
    	border-left: 20px solid #ffffff;
    	border-bottom: 17px solid transparent;
    	z-index: 1000;
	}
	.breadcrumbs li:before{
		content: " ";
		position: absolute;
		left: 0;
		width: 0;
    	height: 0;
    	top: 0;
    	border-top: 17px solid transparent;
    	border-left: 20px solid #F1F4F7;
    	border-bottom: 17px solid transparent;
    	z-index: 999;
	}
</style>
<div class="mainbox size-std column">
	<div class="full-length">
		<ul class="breadcrumbs full-length">
			<li><a href="">Home</a></li>
			<li><a href="">Member List</a></li>
			<li><a href="">Profile</a></li>
		</ul>
	</div>
	<div class="containt cols-3 left-detail">

		<!-- <div class="curent-image">
			<div id="image-preview">
				<label for="image-upload" id="image-label">Choose File</label>
				<input type="file" name="image" id="image-upload"/>
				<div id="img-load" align="center" style="width:20%; height:50px; margin:40% 0 0 40%;"></div>
			</div>
		</div> -->
		<div class="full-length column" class="spc-tb">
			<div class="valdetprd" style="display: none;"><?php echo $_GET['pid']; ?></div>
			<ul class="full-length menu left-detail-menu column" id="ajaxdt-type">
				<li class="full-length"><a href="#detail">Detail</a></li>
				<li class="full-length"><a href="#order">List Order</a></li>
				<li class="full-length"><a href="#invoice">Invoice</a></li>
			</ul>
		</div>
	</div>
	<div class="containt spccols-9" style="position: relative;">
		<div class="full-length pad-tb containt" style="border-bottom: 1px solid #f5f5f5;">
			<div class="headtitle trans">
				<p class="nopad size-head3" style="max-width: 80%">Nama Member</p><p class="size-std nopad">Little title</p>
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

			<div class="full-length">
				<div class="det-con full-length">
					<table class="full-length size-std det-tbl" cellpadding="8" cellspacing="8">
						<tr>
							<td>Username</td>
							<td>Rizkymalm</td>
						</tr>
						<tr>
							<td>Email</td>
							<td>rizkymalm@gmail.com</td>
						</tr>
						<tr>
							<td>Full Name</td>
							<td>Rizki Malem</td>
						</tr>
						<tr>
							<td>Gender</td>
							<td>L</td>
						</tr>
						<tr>
							<td>Activation</td>
							<td>Yes</td>
						</tr>
						<tr>
							<td>Register Date</td>
							<td>2 day ago</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>