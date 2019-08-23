<style type="text/css">
	.main-overview{text-align: center; padding: 100px 0; border: 1px solid #E6E9ED; width: calc(50% - 2px); cursor: pointer;}
	.main-overview:hover{border: 1px solid #4d97d1}
	.main-overview:hover > img,
	.main-overview:hover > h1,
	.main-overview:hover > p{
		-webkit-transform: scale(0.95);
		-moz-transform: scale(0.95);
		-o-transform: scale(0.95);
		-ms-transform: scale(0.95);
		transform: scale(0.95);
		-webkit-transition: -webkit-transform .100s ease;
		-moz-transition: -moz-transform .100s ease;
		-o-transition: -o-transform .100s ease;
		-ms-transition: -ms-transform .100s ease;
		transition: transform .100s ease;
	}
	@media screen and (max-width: 1024px){
		.main-overview{width: calc(100% - 2px)}
	}
</style>

<div class="dynamic column threecols">


<?php if (isset($_GET['subpage'])) { //jika variable subpage exist ?>
	
	<?php if ($_GET['subpage']=="view") { //jika nilai dari variable subpage adalah view ?>
		<?php foreach (selectadv($_GET['id']) as $result) { $linkimg="http://hotspot.centrin.net.id/images/ads/"; //awal foreach  ?>

			<div class="box-basic spccols-3 spc-tb" style="background:#FFF;">
				<img src="<?php echo $linkimg.$result['img_adv'] ?>" style="width: 90%; margin: 20px 5% 0 5%">
				<span style="padding-left: 20px; width: auto;">
					<h1 style="color: #999999;"><?php echo $result['advertising'] ?></h1>			
				</span>
				<table class="full-length size-std smooth-font spc-tb" cellspacing="5" cellpadding="5">
					<tr>
						<td>Location</td>
						<td>: <?php echo locationname($result['kdlocation']) ?></td>
					</tr>
					<tr>
						<td>Phone</td>
						<td>: <?php echo $result['phone'] ?></td>
					</tr>
					<tr>
						<td>Email</td>
						<td>: <?php echo $result['email'] ?></td>
					</tr>
					<tr>
						<td>Expired</td>
						<td>: <?php echo $result['start']." - ".$result['finish']; ?></td>
					</tr>
					<tr>
						<td>Status</td>
						<td>: <?php echo $result['status'] ?></td>
					</tr>
					<tr>
						<td colspan="2" style="text-align: right;"><a href="" class="myButton-flat-orange">Edit</a></td>
					</tr>
				</table>
			</div>

			<div class="box-basic column spccols-9 spc-tb" style="background:#FFF;">

				<div style="border-bottom:2px solid #E6E9ED; margin:15px 15px 0 15px; width:calc(100% - 30px); padding: 10px 0; color:#73879C;">
					Overview
				</div>
				<div class="full-length advbox">
					<div class="main-overview delay">
						<img src="<?php echo $base_url ?>assets/images/icon/pdf-icon.png" style="width: 18%;">
						<p class="size-std" style="color: #4d97d1">Export to PDF</p>
					</div>
					<div class="main-overview delay">
						<h1 class="count jumbo" style="color: #F6724B"><?php echo countadv($result['kdadv']) ?></h1>
						<div class="size-std" style="color: #4d97d1; text-align: center; width: 100%">Statistik</div>
					</div>

					<div class="main-overview statadv" style="width: 100%; position: relative; border: none;">
						<div style="position: relative; left: 20px; width: 100%;">
								<div class="row" style="width: 100%">
									<div class="box-header">
										<h3 class="box-title"></h3>
									</div>
									<div class="box-body chart-responsive" style="width: 100%;">
										<div id="response"></div>
										<div class="chart" id="contoh-chart" style="width: 90%; margin: 0 5%;">
											
										</div>
									</div>
								</div>
						</div>
					</div>
				</div>
			</div>
		<?php } // tutup foreach ?>

	<?php }else if($_GET['subpage']=="form"){ //jika nilai dari variable subpage adalah Form ?>


		<div class="box-basic full-length spc-tb pad-tb" style="background:#FFF;">
			<form method="POST" action="<?php echo $base_url ?>index.php?page=action" enctype="multipart/form-data">
				<table style="position:relative; border:1px solid #73879C; width:96%; left:2%; right:2%; color:#73879C;" class="size-std"	cellspacing="8" cellpadding="8">
					<tr>
						<td style="width:30%;" class="right">Nama Partner</td>
						<td><input type="text" name="partner" class="size-std frm-std" style="border-radius:0;"></td>
					</tr>
					<tr>
						<td style="width:30%;" class="right">Email Partner</td>
						<td><input type="text" name="email" class="size-std frm-std" style="border-radius:0;"></td>
					</tr>
					<tr>
						<td style="width:30%;" class="right">No telp</td>
						<td><input type="text" name="telp" class="size-std frm-std" style="border-radius:0;"></td>
					</tr>
					<tr>
						<td class="right">Alamat</td>
						<td><textarea name="alamat" style="min-height:100px; max-height:100px; border-radius:0;"></textarea></td>
					</tr>
					<tr>
						<td class="right">Lokasi</td>
						<td>	
							<select name="lokasi" class="size-std frm-std" style="border-radius:0;padding:8px 10px;">
								<option value="0">-- Pilih Lokasi --</option>
							<?php foreach (selloc() as $result) {
								echo "<option value='".$result['kdlocation']."'>".$result['location']."</option>";
							} 
							?>							
							</select>
						</td>
					</tr>
					<tr>
						<td class="right">Tanggal Tayang</td>
						<td>
							<input type="text" id="datepickerfrom" name="start" class="size-std" style="border-radius:0;">
							s/d
							<input type="text" id="datepickerto" name="finish" class="size-std" style="border-radius:0;">
						</td>
					</tr>
					<tr>
						<td class="right">Website/Link Tujuan</td>
						<td><input type="text" name="link" class="frm-std size-std" style="border-radius: 0; color: blue;"></td>
					</tr>
					<tr>
						<td class="right">Gambar Iklan</td>
						<td>
							<div class="box">
								<input type="file" name="image" id="file-7" class="inputfile inputfile-6" style="position: absolute; z-index: -1;" data-multiple-caption="{count} files selected" multiple />
								<label for="file-7"><span></span> <strong><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> Choose a file&hellip;</strong></label>
							</div>
						</td>
					</tr>
					<tr>
						<td colspan="2" class="center">
							<input type="reset" value="Cancel" class="myButton-flat-orange size-std delay"> <input type="submit" value="Save" name="adv" class="myButton-flat-blue size-std delay">
						</td>
					</tr>
				</table>
			</form>
		</div>


	<?php } //tutup perumpamaan nilai variable subpage ?>

<?php }else if(!isset($_GET['subpage'])){ //jika variable subpage not exist ?>

	<div class="box-basic cols-12 spc-tb" style="background:#FFF;">
		<div style="border-bottom:2px solid #E6E9ED; margin:15px; width:calc(100% - 30px); padding: 10px 0; color:#73879C;">
			Cetak data
		</div>
		<table class="type1 size-std" style="margin: 20px 5%; width: 90%;">
			<tr>
				<th style="text-align: center; width: 60px;"><input type="checkbox" id="select_all" name=""></th>
				<th style="text-align: left;">Ads</th>
				<th style="text-align: left;">Location</th>
				<th>Link</th>
				<th>Action</th>
			</tr>
			<?php
			foreach (readadv() as $result) {
			?>
			<tr>				
				<td style="text-align: center;"><input type="checkbox" name="" class="checkbox" name="check[]"></td>
				<td><?php echo $result['advertising'] ?></td>
				<td><?php echo locationname($result['kdlocation']) ?></td>
				<td style="text-align: center;"><a href="<?php echo $result['link_adv'] ?>" target="_blank" title="Go to Link"><img src="<?php echo $base_url ?>assets/images/icon/gotolink.png" style="width: 30px;"></a></td>
				<td style="text-align: center;">
					<a href=""><img src="<?php echo $base_url ?>assets/images/icon/pencil-edit.png" style="width: 30px;"></a>
					&nbsp;&nbsp;
					<a href="<?php echo $base_url ?>index.php?page=adv&subpage=view&id=<?php echo $result['kdadv'] ?>"><img src="<?php echo $base_url ?>assets/images/icon/detail.png" style="width: 30px;"></a>
				</td>
			</tr>
			<?php }?>
		</table>
	</div>

<?php
}
?>































</div>