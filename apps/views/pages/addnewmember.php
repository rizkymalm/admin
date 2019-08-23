		<!-- Content cut here -->
		<div class="popup">
			<div class="close-onbox" onClick="closePopup()">
				<img src="<?php echo $base_url ?>assets/images/icon/cross-thick.png">
			</div>
			<table class="popupContent">
				<tr>
					<td><!-- Alert -->
						<p>
							<div class="fail-cross">
							  <div class="cross-icon">
							    <span class="icon-line line-tip"></span>
							    <span class="icon-line line-long"></span>
							    <div class="icon-circle"></div>
							    <div class="icon-fix"></div>
							  </div>
							</div>
						</p>
						<p class="size-head2 nopad" style="color: #fd5454">
							Oooppss sorry... </p>
						<p style="color: #fd5454">your email has been registered<br>Please user another email</p>
					</td>
				</tr>
			</table>
			<div class="popupBtn">
				<a href="" class="myButton-gradBlueGreen size-std"></a>
				<a href="" class="myButton-white size-std"></a>
			</div>
		</div>
		<div class="mainbox size-std column">
			<form id="validate-frm" class="form-addnew-member" method="POST" enctype="multipart/form-data">
			<div class="cols-12 containt column">
				<div class="cols-7">
					<div class="headtitle trans">
						<p class="size-head4 nopad">New Member</p>
						<p class="size-cute nopad">Manual Input</p>
					</div>
					<table class="full-length basic-tables size-std unbordered" cellpadding="8" cellspacing="8">
						<tr>
							<td>First Name</td>
							<td>Last Name</td>
						</tr>
						<tr>
							<td><input type="text" name="firstname" class="frm-std size-std full-length noradius"></td>
							<td><input type="text" name="lastname" class="frm-std size-std full-length noradius"></td>
						</tr>
						<tr>
							<td>*Username</td>
							<td>*Email</td>
						</tr>
						<tr>
							<td><input type="text" name="username" class="frm-std size-std full-length noradius"></td>
							<td><input type="text" name="email" class="frm-std size-std full-length noradius"></td>
						</tr>
						<tr>
							<td>Phone Number</td>
							<td>Gender</td>
						</tr>
						<tr>
							<td><input type="text" name="phone" class="frm-std size-std full-length noradius"></td>
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
					</table>
				</div>
				
				<div class="cols-5">
					<div class="headtitle trans">
						<p class="size-head4 nopad">Address</p>
						<p class="size-cute nopad">Manual Input Address</p>
					</div>
					<table class="full-length basic-tables size-std unbordered" cellpadding="8" cellspacing="8">
						<tr>
							<td style="text-align: right;">Province</td>
							<td>
								<select name="province" id="brand" class="size-std frm-std noradius" onChange="ajaxLocation(this)">
									<option value="">-- Select Province --</option>
									<?php 
										foreach (province() as $respr=>$res) {
											echo '<option value="'.$res['lokasi_propinsi'].'">'.$res['lokasi_nama'].'</option>';
										}
									?>
								</select>
							</td>
						</tr>
						<tr>
							<td style="text-align: right;">City</td>
							<td style="position: relative;">
								<div class="loadSelect loadCity">
									<img src="<?php echo $base_url ?>assets/images/ajax-loader3-resize.gif">
								</div>
								<select name="city" id="selCity" onChange="ajaxCity(this)" class="size-std frm-std noradius">
									
								</select>
							</td>
						</tr>
						<tr>
							<td style="text-align: right;">District</td>
							<td style="position: relative;">
								<div class="loadSelect loadDistrict">
									<img src="<?php echo $base_url ?>assets/images/ajax-loader3-resize.gif">
								</div>
								<select name="district" id="selDistrict" onChange="ajaxDistrict(this)" class="size-std frm-std noradius">
								</select>
							</td>
						</tr>
						<tr>
							<td style="text-align: right;">village</td>
							<td style="position: relative;">
								<div class="loadSelect loadVillage">
									<img src="<?php echo $base_url ?>assets/images/ajax-loader3-resize.gif">
								</div>
								<select name="village" id="selVillage" class="size-std frm-std noradius">
								</select>
							</td>
						</tr>
						<tr>
							<td style="text-align: right;">Post Code</td>
							<td><input type="text" name="postcode" class="frm-std size-std noradius"></td>
						</tr>
						<tr>
							<td class="capt-form-topright"><p class="nopad">Full Address</p></td>
							<td>
								<textarea style="min-width: 80%; max-width: 80%; min-height: 150px; max-height: 150px; border-radius: 0;" class="frm-std" name="fulladdress"></textarea>
							</td>
						</tr>
					</table>
				</div>
				<div class="full-length btn-area">
					<input type="submit" name="addnewmember" value="Save" class="myButton-green">
					<input type="reset" value="cancel" class="myButton-white">
				</div>
			</div>
			</form>
		</div>