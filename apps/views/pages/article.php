<?php 
if (isset($_GET['show'])) {
	$limit = $_GET['show'];	
}else{
	$limit = "20";	
}

$getlink = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

if (isset($_GET['order'])) {
	$rem = explode('&', $getlink);
	array_pop($rem);
	$link = implode('&', $rem);

	switch ($_GET['order']) {
		case 'update':
			$order = "kdcheckout";
			$ordername = "Invoice";
			break;

		case 'member':
			$order = "kdmember";
			$ordername = "Member";
			break;

		case 'update':
			$order = "checkoutdate";
			$ordername = "Update";
			break;
		
		default:
			$order = "checkoutdate";
			$ordername = "Updated";
			break;
	}

}else{
	$link = $getlink;
	$order = "date_article";
	$ordername = "Updated";
}



$halaman = $limit;                    
$page = isset($_GET['pages'])? (int)$_GET["pages"]:1;
$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;

$countpages = pageArticle($order,$limit);

?>

		<div class="mainbox size-std column">
			<div class="containt cols-12">
				<div class="headtitle trans" style="margin-bottom: 0;">
					<p class="size-head4 nopad">Payment</p>
				</div>
				<div class="list-control">					
					<div class="list-control-box">
						<button class="option-click btn-list-control" href="#list-control-show">
							Show :&nbsp; <?php //echo $limit ?> 
							<img src="assets/images/icon/arrow-down.png" class="icon-list-control">
						</button>
						<div class="option-box option-menu shadow half box-list-control" id="list-control-show">
							<ul class="full-length nopad">
								<a href="<?php echo $base_url; ?>?page=article&show=20"><li class="pad-tb">20</li></a>
								<a href="<?php echo $base_url; ?>?page=article&show=50"><li class="pad-tb">50</li></a>
								<a href="<?php echo $base_url; ?>?page=article&show=100"><li class="pad-tb">100</li></a>
							</ul>
						</div>
					</div>	
					<div class="list-control-box">
						<button class="option-click btn-list-control" href="#list-control-sort">
							Sort By :&nbsp; <?php //echo $ordername ?>
							<img src="assets/images/icon/arrow-down.png" class="icon-list-control">
						</button>
						<div class="option-box option-menu shadow half box-list-control" id="list-control-sort">
							<ul class="full-length nopad">
								<a href=""><li class="pad-tb">Update</li></a>
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
								<th style="text-align: left;">Title</th>
								<th>Views</th>
								<th>Update</th>
								<th style="width: 100px;">Action</th>
							</tr>
							<?php 
								foreach (showArticle($order,$mulai,$limit) as $read) { 									
							?>

							<tr>
								<td>
									<div class="checkboxtype1">
									 <input type="checkbox" id="radio0<?php echo $read['kdpayment']; ?>" name="radio" class="select cnt-chk"/>
									 <label for="radio0<?php echo $read['kdpayment']; ?>" id="chartd"><span></span></label>
									</div>
								</td>
								<td><?php echo $read['title_article']; ?></td>
								<td style="text-align: center;"><?php echo $read['viewers']; ?></td>
								<td style="text-align: center;"><?php echo $read['date_article']; ?></td>
								<td style="text-align: center;" class="linkmore"><a href="<?php echo $base_url; ?>?page=payment&inv=<?php echo $read['kdcheckout'] ?>">View</a></td>
							</tr>
							<?php }?>
						</table>
					</form>
				</div>
				<div class="size-std numberofrows">				
				</div>				
			</div>
		</div>