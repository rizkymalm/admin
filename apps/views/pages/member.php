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
			$order = "register_date";
			$ordername = "Register date";
			break;

		case 'gender':
			$order = "gender_member";
			$ordername = "Gender";
			break;

		case 'active':
			$order = "activation DESC";
			$ordername = "Active Member";
			break;

		
		default:
			$order = "register_date";
			$ordername = "Register Date";
			break;
	}

}else{
	$link = $getlink;
	$order = "register_date";
	$ordername = "Register Date";
}



$halaman = $limit;                    
$page = isset($_GET['pages'])? (int)$_GET["pages"]:1;
$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;

$countpages = pagemember($order,$limit);
?>
		<div class="mainbox size-std column">
			<div class="containt cols-12">
				<div class="headtitle trans" style="margin-bottom: 0;">
					<p class="size-head4 nopad">List Member</p>
				</div>
				<div class="list-control">					
					<div class="list-control-box">
						<button class="option-click btn-list-control" href="#list-control-show">
							Show :&nbsp; <?php echo $limit ?> 
							<img src="assets/images/icon/arrow-down.png" class="icon-list-control">
						</button>
						<div class="option-box option-menu shadow half box-list-control" id="list-control-show">
							<ul class="full-length nopad">
								<a href="<?php echo $base_url; ?>?page=member&show=20"><li class="pad-tb">20</li></a>
								<a href="<?php echo $base_url; ?>?page=member&show=50"><li class="pad-tb">50</li></a>
								<a href="<?php echo $base_url; ?>?page=member&show=100"><li class="pad-tb">100</li></a>
							</ul>
						</div>
					</div>	
					<div class="list-control-box">
						<button class="option-click btn-list-control" href="#list-control-sort">
							Sort By :&nbsp; <?php echo $ordername ?>
							<img src="assets/images/icon/arrow-down.png" class="icon-list-control">
						</button>
						<div class="option-box option-menu shadow half box-list-control" id="list-control-sort">
							<ul class="full-length nopad">
								<a href="<?php echo $link."&order=invoice" ?>"><li class="pad-tb">Register Date</li></a>
								<a href="<?php echo $link."&order=updated" ?>"><li class="pad-tb">Gender</li></a>
								<a href="<?php echo $link."&order=active" ?>"><li class="pad-tb">Active Member</li></a>
							</ul>
						</div>
					</div>
					<div class="float-onright" style="position: absolute; right: 20px; padding: 10px 0;">
						<a href="<?php echo $base_url ?>?page=member&act=addnew" class="myButton-gradBlueGreen">Create New</a>
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
								<th style="text-align: left;">Account Name</th>
								<th style="text-align: left;">Email Member</th>
								<th>Gender</th>
								<th>Register Date</th>
								<th>Activation</th>
								<th style="width: 100px;">Action</th>
							</tr>
							<?php 
								foreach (showmember($order,$limit,$mulai) as $read) { 
									if ($read['gender_member'] == "m") {
										$gender = "Male";
									}elseif ($read['gender_member'] == "f") {
										$gender = "Female";
									}
									if ($read['activation'] == "y") {
										$activation = "<img src='assets/images/icon/checklist.png' width='15'>";
									}else{
										$activation = "<img src='assets/images/icon/cross.png' width='15'>";
									}
							?>

							<tr>
								<td>
									<div class="checkboxtype1">
									 <input type="checkbox" id="radio0<?php echo $read['kdmember']; ?>" name="radio" class="select cnt-chk"/>
									 <label for="radio0<?php echo $read['kdmember']; ?>" id="chartd"><span></span></label>
									</div>
								</td>
								<td><?php echo $read['firstname']." ". $read['lastname'] ?></td>
								<td><?php echo $read['email_member']; ?></td>
								<td style="text-align: center;"><?php echo $gender ?></td>
								<td style="text-align: center;"><?php echo $read['register_date']; ?></td>
								<td style="text-align: center;">
									<?php echo $activation ?>
								</td>
								<td style="text-align: center;" class="linkmore"><a href="<?php echo $base_url; ?>?page=profile&id=<?php echo $read['kdmember'] ?>">View</a></td>
							</tr>
							<?php }?>
						</table>
					</form>
				</div>
				<div class="size-std numberofrows">
					<ul class="pagination">
	                <?php 
	                
	                if (isset($_GET['pages'])) {
		                $rem = explode('&', $getlink);
		                array_pop($rem);
		                $link = implode('&', $rem);
	                }else{
	                	$link = $getlink;
	                }
	                for ($i=1; $i<=$countpages ; $i++){
	                  if ($i == $page) {
	                    echo '<li class="active"><a href="'.$link.'&pages='.$i.'">'.$i.'</a></li>';
	                  }else{
	                    echo '<li><a href="'.$link.'&pages='.$i.'">'.$i.'</a></li>';
	                  }
	                } 
	                ?>
	              </ul>
				</div>				
			</div>
		</div>