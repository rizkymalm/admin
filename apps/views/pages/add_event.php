<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
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
	<form id="validate-frm" class="form-addnew-event" method="POST" enctype="multipart/form-data">
		<div class="cols-12 containt column">
			<div class="headtitle trans">
				<p class="size-head4 nopad">Event</p>
				<p class="size-cute nopad">Add New Event</p>
			</div>
			<table class="full-length size-std basic-tables unbordered" style="border-right:1px solid #dfe8f1" cellpadding="8" cellspacing="8">
				<tr>
					<td>
						<p>New Event</p>
						<input type="text" name="title_event" class="frm-std size-std" style="border-radius: 0;" required="">
					</td>
					<td>
						<p>Start On</p>
						<input type="text" class="form-control frm-std size-std" id="startDate" name="startOn">
					</td>
				</tr>
				<tr>
					<td>
						<p>URL Event</p>
						<input type="text" name="url_event" class="frm-std size-std" style="border-radius: 0;" required="">
					</td>
					<td>
						<p>Ends On</p>
						<input type="text" class="form-control frm-std size-std" id="endDate" name="endOn">
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<div class="page-wrapper box-content">
				        	<textarea class='editor spc-tb' name='txtevent'></textarea>
				        </div>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="submit" name="event" value="POST" class="myButton-gradBlueGreen">
					</td>
				</tr>
			</table>
		</div>
	</form>
</div>

