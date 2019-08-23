		<!-- Content cut here -->
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
								<input type="text" name="prname" class="frm-std size-std" style="border-radius: 0;" required="">
							</td>
						</tr>
						<tr>
							<td style="text-align: right;">
								*Brand
							</td>
							<td>
								<select name="brand" id="brand" class="size-std frm-std" style="border-radius: 0;">
									<option value="">-- Select Brand --</option>
									<?php 
									foreach (showbrand() as $resbrand) {
										echo '<option value="'.$resbrand['kdbrand'].'">'.$resbrand['brand'].'</option>';
									}
									?>
								</select>
							</td>
						</tr>
						<tr>
							<td style="text-align: right;">*Status</td>
							<td>
								<div class="radiotype1 optionrow">
								  <input type="radio" id="radio01" name="status" value="rs">
								  <label for="radio01" id="chartline"><span></span>Ready Stock</label>
								</div>
								<div class="radiotype1 optionrow">
								  <input type="radio" id="radio02" name="status" value="po">
								  <label for="radio02" id="chartline"><span></span>Pre-order</label>
								</div>
								<div class="radiotype1 optionrow">
								  <input type="radio" id="radio03" name="status" value="pl">
								  <label for="radio03" id="chartline"><span></span>Preloved</label>
								</div>
							</td>
						</tr>
						<tr>
							<td style="text-align: right;">*Gender</td>
							<td>
								<div class="radiotype1 optionrow">
								  <input type="radio" id="gendermen" name="gender" value="1">
								  <label for="gendermen" id="chartline"><span></span>MEN</label>
								</div>
								<div class="radiotype1 optionrow">
								  <input type="radio" id="genderwomen" name="gender" value="2">
								  <label for="genderwomen" id="chartline"><span></span>WOMEN</label>
								</div>								
							</td>
						</tr>
						<tr>
							<td style="text-align: right;">*Price</td>
							<td>$. <input type="text" name="price" class="frm-std size-std oneline" id="rupiah" style="border-radius: 0; width: 100px; text-align: right;" required="required"></td>
						</tr>
						<tr>
							<td style="text-align: right;">Discount</td>
							<td><input type="text" name="discount" class="frm-std size-std oneline" style="border-radius: 0; width: 50px; text-align: right;" required="required">%</td>
						</tr>
						<tr>
							<td style="text-align: right;">*Ready Stock</td>
							<td><input type="text" name="stock" class="frm-std size-std" style="border-radius: 0; width: 100px;" required="required"></td>
						</tr>
						<tr>
							<td style="text-align: right;">
								*Image Product
							</td>
							<td>
								<input type="file" name="img_prd" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" multiple style="display:none;" required="required" />
								<label for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> 
								<span style="margin-top:5px;">Choose a file&hellip;</span></label>
							</td>
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
								  <input type="radio" id="addtypecolor" name="addtype" value="color">
								  <label for="addtypecolor" id="chartline"><span></span>Color</label>
								</div>
								<div class="radiotype1 optionrow">
								  <input type="radio" id="addtypesize" name="addtype" value="size">
								  <label for="addtypesize" id="chartline"><span></span>Size</label>
								</div>								
							</td>
						</tr>
						<tr>
							<td style="text-align: right;">
								Size/Color
							</td>
					        <td>
								<input type='text' id='example_emailSUI' name='example_emailSUI' class='form-control' value=''>
								<!-- <pre id='current_emailsSUI'></pre> -->
								<input type="hidden" name="addinfo" id="current_emailsSUI" value="">
								<label style="display: block;" class="size-note note">
								 	Ex: XL-50cm/100gr/
								</label>
							</td>
						</tr>
						<tr>
							<td class="capt-form-topright"><p class="nopad">Description</p></td>
							<td>
								<textarea style="min-width: 80%; max-width: 80%; min-height: 150px; max-height: 150px; border-radius: 0;" placeholder="Describe your product..." class="frm-std" name="desc"></textarea>
							</td>
						</tr>
					</table>
				</div>
				<div class="full-length btn-area">
					<input type="submit" name="addnewprd" value="Save" class="myButton-green">
					<input type="submit" name="" value="cancel" class="myButton-white">
				</div>
			</div>
			</form>
		</div>