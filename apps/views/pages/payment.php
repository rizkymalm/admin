		<div class="mainbox size-std column">
			
			<div class="containt cols-12">
				<div class="headtitle trans" style="margin-bottom: 0;">
					<p class="size-head4 nopad">Payment</p>
				</div>
				<div class="list-control">					
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
								<th style="text-align: left; padding: 10px; width: 150px;">Invoice ID</th>
								<th style="text-align: left;">Account Name</th>
								<th>Bank Name</th>
								<th>Total</th>
								<th>Payment Date</th>
								<th style="width: 100px;">Action</th>
							</tr>
							<?php 
							foreach (showpayment() as $read) { 
								$read = paymentId($read['kdcheckout']);
								$datepay = new DateTime($read['date_payment']);
							?>

							<tr>
								<td>
									<div class="checkboxtype1">
									 <input type="checkbox" id="radio0<?php echo $read['kdpayment']; ?>" name="radio" class="select cnt-chk"/>
									 <label for="radio0<?php echo $read['kdpayment']; ?>" id="chartd"><span></span></label>
									</div>
								</td>
								<td><?php echo $read['kdcheckout']; ?></td>
								<td><?php echo $read['atas_nama']." - ". $read['no_rek'] ?></td>
								<td style="text-align: center;"><?php echo $read['bank_payment']; ?></td>
								<td style="text-align: center;">$.<?php echo $read['total_payment']; ?></td>
								<td style="text-align: center;"><?php echo $datepay->format('d M Y'); ?></td>
								<td style="text-align: center;" class="linkmore"><a href="<?php echo $base_url; ?>?page=payment&inv=<?php echo $read['kdcheckout'] ?>">View</a></td>
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