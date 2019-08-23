		<div class="mainbox size-std column">
			<div class="top-info column">
				<div class="containt top-info-box shadow half delay" style="background: #68baf9;">
					<div class="size-std icon-info"><img src="assets/images/icon/user-white.png"></div>
					<div class="field-info">
						<p class="nopad size-head4"><b>Total Member</b></p>
						<p class="size-head1 nopad"><?php echo countt('wp_member','kdmember'); ?></p>
						<p class="size-std nopad">Persons</p>
					</div>
				</div>
				<div class="containt top-info-box shadow half delay" style="background: #ff6d74;">
					<div class="size-std icon-info"><img src="assets/images/icon/cart-white.png"></div>
					<div class="field-info">
						<p class="nopad size-head4"><b>Sold Today</b></p>
						<p class="size-head1 nopad"><?php echo soldtoday(); ?> </p>
						<p class="size-std nopad">&nbsp;pcs</p>
					</div>
				</div>
				<div class="containt top-info-box shadow half delay" style="background: #68baf9;">
					<div class="size-std icon-info"><img src="assets/images/icon/dollar-white.png"></div>
					<div class="field-info">
						<p class="nopad size-head4"><b>Today Revenue</b></p>
						<p class="size-head1 nopad">$.<?php echo todayrevenue(); ?></p>
						<p class="size-std nopad">.00</p>
					</div>
				</div>
				<div class="containt top-info-box shadow half delay" style="background: #68baf9;">
					<div class="size-std icon-info"><img src="assets/images/icon/visitors-white.png"></div>
					<div class="field-info">
						<p class="nopad size-head4"><b>Today Visitors</b></p>
						<p class="size-head1 nopad">100</p>
						<p class="size-std nopad">Persons</p>
					</div>
				</div>
			</div>

			<div class="top-info-toggle">
				<img src="<?php echo $base_url ?>assets/images/icon/arrow-down-grad.png" onClick="toggleTopInfo()" class="delay">
			</div>



			<div class="containt full-length column spc-tb">
				<div class="spccols-8 linechart-fusion">
					<div class="headtitle trans">
						<p class="nopad size-head4">Revenue Statistics</p><p class="size-std nopad">Little title</p>
					</div>
					<div id="chart-container">FusionCharts will render here</div>
					<div class="radiotype1">
					  <input type="radio" id="radio01" name="radio" />
					  <label for="radio01" id="chartline"><span></span>Line</label>
					</div>
					<div class="radiotype1">
					 <input type="radio" id="radio02" name="radio" />
					 <label for="radio02" id="chartd"><span></span>Column 2D</label>
					</div>
				</div>

				<div class="spccols-4 linechart-fusion">
					<div class="full-length pad-rl">
						<div class="headtitle trans">
							<p class="nopad size-head4">Current Revenue</p><p class="size-std nopad">Little title</p>
						</div>
						<div class="table-wrapper table-toggle prd-laris1">
							<table class="full-length size-std basic-tables">
								<?php 
									foreach (showpayment() as $show) {
								?>
									<tr>
										<td style="text-align: center;">
											<b class="size-head4">$.500</b>
										</td>
										<td>
											<b>Rizki Malem</b><br>
											a minutes ago
										</td>
										<td style="text-align: center;"></td>
									</tr>
								<?php }?>
							</table>
							<p class="spc-tb linkmore nopad"><a href="" class="size-cute">Lihat Semua</a></p>
						</div>
					</div>
				</div>
			</div>


			<div class="spccols-4 spc-tb" style="background-color: transparent;">

				<div class="full-length containt short-table">
					<div class="headtitle trans">
						<p class="nopad size-head4">Produk Terlaris</p>
						<ul class="tab-image-setting nopad">
							<li><img src="assets/images/icon/arrow-up.png" class="btn-tab-toggle delay" href="prd-laris1"></li>
							<li class="option-click" href="#prd-laris1"><img src="assets/images/icon/option-strip.png"></li>
						</ul>
						<div class="option-menu option-box shadow half size-std" id="prd-laris1" style="right: 20px; top: 30px; display: none;">
							<ul class="nopad size-std">
								<li>Edit</li>
								<li>Delete</li>
								<li>Refresh</li>
							</ul>
						</div>
					</div>				


					<div class="table-wrapper table-toggle prd-laris1">
						<table class="full-length size-std basic-tables">
							<tr>
								<th>No</th>
								<!-- <th style="text-align: left;">ID</th> -->
								<th style="text-align: left;">Produk</th>
								<th style="text-align: left;">Terjual</th>
							</tr>
							<?php 
								$no=0;
								foreach (showorderby('sold_product','3') as $show) {
									$productname = substr($show['productname'],0,15);
									$no++;
							?>
								<tr>
									<td style="text-align: center;"><?php echo $no; ?></td>
									<!-- <td><?php //echo $show['kdproduct']; ?></td> -->
									<td><?php echo $productname; ?></td>
									<td style="text-align: center;"><?php echo $show['sold_product']; ?></td>
								</tr>
							<?php } ?>							
						</table>
						<p class="spc-tb linkmore nopad"><a href="" class="size-cute">Lihat Semua</a></p>
					</div>
				</div>
				<div class="full-length spc-tb containt short-table">
					<div class="headtitle trans">
						<p class="nopad size-head4">Produk Terbaru</p>
						<ul class="tab-image-setting nopad">
							<li><img src="assets/images/icon/arrow-up.png" class="btn-tab-toggle delay" href="prd-laris2"></li>
							<li class="option-click" href="#prd-laris2"><img src="assets/images/icon/option-strip.png"></li>
						</ul>
						<div class="option-menu option-box shadow half size-std" id="prd-laris2" style="right: 20px; top: 30px; display: none;">
							<ul class="nopad size-std">
								<li>Edit</li>
								<li>Delete</li>
								<li>Refresh</li>
							</ul>
						</div>
					</div>
					<div class="table-wrapper table-toggle prd-laris2">
						<table class="full-length size-std basic-tables">
							<tr>
								<th>No</th>
								<!-- <th style="text-align: left;">ID</th> -->
								<th style="text-align: left;">Produk</th>
								<th style="text-align: left;">Terjual</th>
							</tr>
							<?php 
							foreach (showorderby('update_time','3') as $show) {
								$no++;
								$productname = substr($show['productname'],0,15);
							?>
							<tr>
								<td style="text-align: center;"><?php echo $no; ?></td>
								<!-- <td><?php //echo $show['kdproduct']; ?></td> -->
								<td><?php echo $productname; ?></td>
								<td style="text-align: center;"><?php echo $show['sold_product']; ?></td>
							</tr>
							<?php } ?>							
						</table>
						<p class="spc-tb linkmore nopad"><a href="" class="size-cute">Lihat Semua...</a></p>
					</div>
				</div>
			</div>
			<div class="spccols-8 spc-tb containt short-table">
				<div class="headtitle trans">
					<p class="nopad size-head4">Calendar Event</p>
						<ul class="tab-image-setting nopad">
						<li><img src="assets/images/icon/arrow-up.png" class="btn-tab-toggle delay" href="calendarTab"></li>
						<li class="option-click" href="#calendarTab"><img src="assets/images/icon/option-strip.png"></li>
					</ul>
					<div class="option-menu option-box shadow half size-std" id="calendarTab" style="right: 20px; top: 30px; display: none;">
						<ul class="nopad size-std">
							<li>Add Event</li>
							<li>Refresh</li>
						</ul>
					</div>
				</div>
				<div class="table-wrapper table-toggle calendarTab">
					<div id="calendar">
				</div>
			</div>
		</div>
<?php
$queryevent = $mysqli->query("SELECT * FROM wp_event");
?>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var currentdate = new Date();
    var yyyy = currentdate.getFullYear();
    var dd = currentdate.getDate();
    var mm = currentdate.getMonth();
    if (dd<10) {
    	dd = '0'+currentdate.getDate();
    }
    if (mm<10) {
    	mm = '0'+currentdate.getMonth();
    }
    currentdate = yyyy+'-'+mm+'-'+dd;
    var today = currentdate;
    var calendar = new FullCalendar.Calendar(calendarEl, {
      plugins: [ 'interaction', 'dayGrid' ],
      defaultDate: '<?php echo date('Y-m-d') ?>',
      editable: true,
      eventLimit: true, // allow "more" link when too many events
      events: [
      <?php 
      while ($resevent = $queryevent->fetch_assoc()) {
      ?>
		{
          title: '<?php echo $resevent['title_event'] ?>',
          start: '<?php echo $resevent['start_event'] ?>',
          end: '<?php echo $resevent['end_event'] ?>',
          <?php 
          if ($resevent['url_event'] != "") {
          	echo "url : '".$resevent['url_event']."'";
          } 
          ?>
        },
      <?php } ?>
      ]
    });

    calendar.render();
  });

</script>