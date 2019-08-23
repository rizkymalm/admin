<?php

$id = $_GET['inv'];
$read = invoicebyID($id);
switch ($read['status_payment']) {
	case 'y':
		$status = "checked";
		break;

	case 'n':
		$status = "";
		break;
	
}
$readpay = paymentId($read['kdcheckout']);
$datepay = new DateTime($readpay['date_payment']);
?>



<style type="text/css">
	.padding-tab tr td{
		padding: 10px;
	}
	.box-order{
		margin: 0;
		border: 1px solid #bcbcbc40;
		border-radius: 3px;
	}

	.onbox-text{
		position: relative;
		padding: 1px 10px;
		width: auto;
		border-radius: 3px;
	}
	.onbox-text.plain{
		border: 1px solid #999999;
		color: #999999;
	}
	.onbox-text.alert{
		border: 1px solid #cc1625;
		opacity: 0.6;
		color: #cc1625;
	}
	.onbox-text.plain:hover{
		background-color: #999999;
		opacity: 0.6;
		color: #ffffff;
	}
	.onbox-text.alert:hover{
		background-color: #cc1625;
		opacity: 0.6;
		color: #ffffff;
	}
	.price-det-payment{
		text-align: right; position: relative;
	}
	.price-wording{
		position: absolute; right: 20px;
	}
</style>
<div class="mainbox size-std column spc-tb">
	<div class="containt spccols-6 spc-tb">
	<form method="POST" action="http://localhost/project/ouradmin/?page=action">
		<table class="full-length padding-tab">
			<tr>
				<td>Payment Invoice</td>
				<td><?php echo $read['kdcheckout'] ?></td>
			</tr>
			<tr>
				<td>Checkout Date</td>
				<td><?php echo $read['checkoutdate'] ?></td>
			</tr>
			<tr>
				<td>Payment Status</td>
				<td>
					<input type="hidden" name="invid" value="<?php echo $read['kdcheckout'] ?>" readonly>
					<div class="checkboxtype1">
					  <input type="checkbox" id="radio01" name="status" <?php echo $status ?>/>
					  <label for="radio01" id="chartline"><span></span></label>
					</div>
				</td>
			</tr>
			<tr>
				<td>Image Payment</td>
				<td>
					<?php
					if ($readpay['img_payment'] == "") {
						echo "-";
					}else{
						echo '<a href="'.$readpay['img_payment'].'" target="_blank">Show</a></td>';
					}
					?>
			</tr>
			<tr>
				<td colspan="2" align="right"><input type="submit" name="updpayment" value="Save Changes" class="myButton-gradBlueGreen"></td>
			</tr>
		</table>
	</form>
	</div>
	
	<div class="containt spccols-6 spc-tb">
		<table class="full-length padding-tab">
			<tr>
				<td>Account Name</td>
				<td><?php echo $readpay['atas_nama']." - ".$readpay['no_rek'] ?></td>
			</tr>
			<tr>
				<td>Bank</td>
				<td><?php echo $readpay['bank_payment'] ?></td>
			</tr>
			<tr>
				<td>Payment Date</td>
				<td><?php echo $datepay->format('d F Y'); ?></td>
			</tr>
			<tr>
		</table>
	</div>

	<div class="containt spccols-12 spc-tb column">
		<?php 
		foreach (detailChekcout($id) as $readdet) { 
			$readprd = showbyid($readdet['kdproduct']);			
			if ($readprd['kdproduct'] != "") {
				$readbrand = brandbyid($readprd['kdproduct']);
		?>		
			<div class="size-std cols-12 box-order">
				<table border="0" class="full-length padding-tab">
					<tr>
						<td style="width: 15%">
							<p><b>Product</b></p>
							<img src="<?php echo $readprd['productimage'] ?>" style="width: 100px;">
						</td>
						<td class="column">
							<div class="cols-8">
								<?php echo $readprd['productname']; ?><br><br>
								<b class="size-cute"><?php echo $readbrand['brand']?></b><br>
								<span class="onbox-text plain size-cute delay" style="margin-top: 3px;"><?php echo $readprd['additional_product']." : ".$readdet['addinfo']; ?></span>
								<span class="onbox-text plain size-cute delay" style="margin-top: 3px;">QTY : <?php echo $readdet['qty_detail']; ?></span>								
							</div>
							<div class="cols-4 price-det-payment">
								<p class="price-wording">$.<b class="size-head4"><?php echo $readdet['subtotal']; ?></b>.00</p>
							</div>
						</td>
					</tr>
				</table>
			</div>
		<?php }else{?>
			<table class="full-length size-std">
				<tr>
					<td style="text-align: center;">Product Sudah Dihapus</td>
				</tr>
			</table>
		<?php }} ?>

		<p class="pad-tb" style="float: right; margin-right: 30px;">Total : $.<b class="size-head3"><?php echo $read['total_payment'] ?></b>.00</p>
	</div>	
</div>
