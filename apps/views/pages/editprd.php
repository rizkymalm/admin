		<!-- Content cut here -->
		<?php 
		if (isset($_GET['edit'])) {
			$pid=$_GET['edit'];
			$cek = $mysqli->query("SELECT * FROM wp_product WHERE kdproduct='$pid'");
			$find = mysqli_num_rows($cek);
			if ($find > 0) {
			$read = showbyid($pid);
			$readbrand = brandbyid($read['kdbrand']);

			// fungsi memanggil additional info
			$countrec = count(showaddinfo($pid)); //menghitung record additional info
			// memanggil value additional info
			if ($countrec > 0) {
				$valueinfo = "[";
				for ($i=0;$i < $countrec ;$i++) {
					$addinfo = showaddinfo($pid)[$i];
					if ($i == $countrec-1) {
						$valueinfo .= '"'.$addinfo.'"';
					}else{
						$valueinfo .= '"'.$addinfo.'",';
					}				
				}
				$valueinfo .= "]";
			}else{
				$valueinfo = "";
			}
			// jika value additional info [""](kosong) maka val valueinfo kosong jika tidak maka val valueinfo==valueinfo
			if ($valueinfo == '[""]') {
				$valvalueinfo = "";
			}else{
				$valvalueinfo = $valueinfo;
			}
		?>
		<div class="mainbox size-std column">
			<form id="validate-frm" class="form-addnew" method="POST" action="<?php echo $base_url; ?>?page=action" enctype="multipart/form-data">
			<div class="cols-12 containt column">
				<div class="cols-7">
					<div class="headtitle trans">
						<p class="size-head4 nopad">Product</p>
						<p class="size-cute nopad">Detail Product</p>
					</div>
					<table class="full-length size-std basic-tables unbordered" style="border-right:1px solid #dfe8f1" cellpadding="8" cellspacing="8">
						<tr>
							<td style="text-align: right; width: 30%;">*Prodct Name</td>
							<td>
								<input type="text" name="prname" class="frm-std size-std" style="border-radius: 0;" required="" value="<?php echo $read['productname'] ?>">
								<input type="hidden" name="prid" class="frm-std size-std" style="border-radius: 0;" required="" value="<?php echo $read['kdproduct'] ?>">
							</td>
						</tr>
						<tr>
							<td style="text-align: right;">
								*Brand
							</td>
							<td>
								<select name="brand" id="brand" class="size-std frm-std" style="border-radius: 0;">
									<option value="<?php echo $readbrand['kdbrand']; ?>"><?php echo $readbrand['brand']; ?></option>
									<?php 
									foreach (showbrand() as $resbrand) {
										if ($resbrand['kdbrand'] == $readbrand['kdbrand']) {
										}else{
											echo '<option value="'.$resbrand['kdbrand'].'">'.$resbrand['brand'].'</option>';
										}
									}
									?>
								</select>
							</td>
						</tr>
						<tr>
							<td style="text-align: right;">*Status</td>
							<td>							
								<div class="radiotype1 optionrow">
								  <input type="radio" id="radio01" name="status" value="rs" <?php echo checked("rs",$read['status']); ?>> <!-- contoh -->
								  <label for="radio01" id="chartline"><span></span>Ready Stock</label>
								</div>
								<div class="radiotype1 optionrow">
								  <input type="radio" id="radio02" name="status" value="po" <?php echo checked("po",$read['status']); ?>>
								  <label for="radio02" id="chartline"><span></span>Pre-order</label>
								</div>
								<div class="radiotype1 optionrow">
								  <input type="radio" id="radio03" name="status" value="pl" <?php echo checked("pl",$read['status']); ?>>
								  <label for="radio03" id="chartline"><span></span>Preloved</label>
								</div>
							</td>
						</tr>
						<tr>
							<td style="text-align: right;">*Gender</td>
							<td>
								<div class="radiotype1 optionrow">
								  <input type="radio" id="gendermen" name="gender" value="1" <?php echo checked("m",$read['gender_product']); ?>>
								  <label for="gendermen" id="chartline"><span></span>MEN</label>
								</div>
								<div class="radiotype1 optionrow">
								  <input type="radio" id="genderwomen" name="gender" value="2" <?php echo checked("w",$read['gender_product']); ?>>
								  <label for="genderwomen" id="chartline"><span></span>WOMEN</label>
								</div>								
							</td>
						</tr>
						<tr>
							<td style="text-align: right;">*Price</td>
							<td>$. <input type="text" name="price" class="frm-std size-std oneline" id="dengan-rupiah" style="border-radius: 0; width: 100px; text-align: right;" required="required" value="<?php echo $read['productprice'] ?>"></td>
						</tr>
						<tr>
							<td style="text-align: right;">Discount</td>
							<td><input type="text" name="discount" class="frm-std size-std oneline" style="border-radius: 0; width: 50px; text-align: right;" required="required" value="<?php echo $read['discount'] ?>">%</td>
						</tr>
						<tr>
							<td style="text-align: right;">*Ready Stock</td>
							<td><input type="text" name="stock" class="frm-std size-std" style="border-radius: 0; width: 100px;" required="required" value="<?php echo $read['stock_product'] ?>"></td>
						</tr>						
					</table>					
				</div>
				
				<div class="cols-5">
					<div class="headtitle trans">
						<p class="size-head4 nopad">Additional</p>
						<p class="size-cute nopad">Describe the product</p>
					</div>
					<table class="full-length basic-tables size-std unbordered" cellpadding="8" cellspacing="8">
						<tr>
							<td style="text-align: right;">Additional Type</td>
							<td>
								<div class="radiotype1 optionrow">
								  <input type="radio" id="addtypecolor" name="addtype" value="color" <?php echo checked("color",$read['additional_product']); ?>>
								  <label for="addtypecolor" id="chartline"><span></span>Color</label>
								</div>
								<div class="radiotype1 optionrow">
								  <input type="radio" id="addtypesize" name="addtype" value="size" <?php echo checked("size",$read['additional_product']); ?>>
								  <label for="addtypesize" id="chartline"><span></span>Size</label>
								</div>								
							</td>
						</tr>
						<tr>
							<td style="text-align: right;">
								Size/Color
							</td>
					        <td>
								<input type='text' id='example_emailSUI' name='example_emailSUI' class='form-control' value='<?php echo $valvalueinfo ?>'>
								<input type="hidden" name="addinfo" id="current_emailsSUI" value=''>
								<label style="display: block;" class="size-note note">
								 	Ex: XL-50cm/100gr/
								</label>
							</td>
						</tr>
						<tr>
							<td class="capt-form-topright"><p class="nopad">Description</p></td>
							<td>
								<textarea style="min-width: 80%; max-width: 80%; min-height: 150px; max-height: 150px; border-radius: 0;" placeholder="Describe your product..." class="frm-std" name="desc"><?php echo showdesc($pid); ?></textarea>
							</td>
						</tr>
					</table>
				</div>
				<div class="full-length btn-area">
					<input type="submit" name="editprd" value="Save" class="myButton-green">					
				</div>
			</div>
			</form>
		</div>

		<?php 
			}
		}
		?>