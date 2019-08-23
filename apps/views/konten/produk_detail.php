<?php 
foreach (glob('../../config/*.php') as $config) {
	include $config;
}
include'../../models/m_products.php';
$pid = $_GET['pid'];
$readprd = showbyid($pid);
$readbrand = brandbyid($readprd['kdbrand']);
$finalprice = $readprd['productprice'] * $readprd['discount']/100;
$num_format = strlen(substr(strrchr($finalprice, "."), 2));
if ($num_format == " ") {	
	$showfinalprice = $finalprice.".00";
}else{	
	$showfinalprice = $finalprice;
}
switch ($readprd['status']) {
	case 'rs':
		$status = "Ready Stock";
		break;
	
	case 'po':
		$status = "Pre Order";
		break;

	case 'pl':
		$status = "Pre-Loved";
		break;	
}
switch ($readprd['gender_product']) {
	case 'm':
		$gender = "Men";
		break;

	case 'w':
		$gender = "Women";
		break;

	case 'ag':
		$gender = "Unisex";
		break;	
}
?>
<div class="det-con full-length">
	<div class="cover-frm-edit"></div>
	<table class="full-length size-std det-tbl" cellpadding="8" cellspacing="8">
		<tr>
			<td>Product ID</td>
			<td>
				<?php echo $readprd['kdproduct'] ?>
			</td>
		</tr>
		<tr>
			<td>Product Name</td>
			<td>
				<?php echo $readprd['productname'] ?>
			</td>
		</tr>
		<tr>
			<td>Brand</td>
			<td>
				<?php echo $readbrand['brand']; ?>
			</td>
		</tr>
		<tr>
			<td>Gender Product</td>
			<td>
				<?php echo $gender; ?>
			</td>
		</tr>
		<tr>
			<td>Status</td>
			<td>
				<?php echo $status; ?>
			</td>
		</tr>
		<tr>
			<td><?php echo $readprd['additional_product'] ?></td>
					<td>
						<?php 
							foreach (showaddinfo($pid) as $addinfo) {
							echo $addinfo."&nbsp;"; 
						} ?>
					</td>
		</tr>
		<tr>
			<td>Description</td>
			<td>
				<div class="desc-prd-wrapper">					
					<?php echo showdesc($pid); ?>
				</div>
			</td>
		</tr>
		<tr>
			<td>Normal Price</td>
			<td>
				$ <?php echo $readprd['productprice']; ?>
			</td>
		</tr>
		<tr>
			<td>Discount</td>
			<td>
				<?php echo $readprd['discount']; ?>%
			</td>
		</tr>
		<!-- Normal price dihitung langsung dari discount -->
		<tr>
			<td>Final Price</td>
			<td>
				$ <?php echo $finalprice; ?>
			</td>
		</tr>
		<!--  -->
	</table>
</div>
