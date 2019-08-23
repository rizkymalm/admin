<div class="dynamic column threecols">
	<div class="box-basic cols-12 spc-tb" style="background:#FFF;">
		<div style="border-bottom:2px solid #E6E9ED; margin:15px; width:calc(100% - 30px); padding: 10px 0; color:#73879C;">
			Cetak data
		</div>
		<form method="POST" action="<?php echo $base_url ?>pdf.php">
		<table class="full-length" style="height:40%; color:#73879C; font-size:12px;">
			<tr>
				<td style="text-align:right;">Tanggal Mulai</td>
				<td style="text-align:left;"><input type="text" id="datepickerfrom" name="from"></td>
			</tr>
			<tr>
				<td style="text-align:right;">Tanggal Sampai</td>
				<td style="text-align:left;"><input type="text" id="datepickerto" name="to"></td>
			</tr>
			<tr>
				<td style="text-align:right;">Pilih Social Media</td>
				<td style="text-align:left;">
					<select name="socmed">
						<option>-- Pilih Social Media --</option>
						<option value="facebook">Facebook</option>
						<option value="twitter">Twitter</option>
						<option value="">Facebook & Twitter</option>
					</select>
				</td>
			</tr>
			<tr>
				<td style="text-align:right;">Pilih Tampilan</td>
				<td style="text-align:left;">
					<input type="radio" name="show" value="semua">Semua data pengguna<br>
					<input type="radio" name="show" value="tanggal">Tampil berdasarkan tanggal<br>
					<input type="radio" name="show" value="user">Tampil berdasarkan user<br>
				</td>
			</tr>
			<tr>
				<td style="text-align:right"><input type="submit" name="" value="Batal" class="myButton-white"></td>
				<td><input type="submit" name="submit" value="Cetak" class="myButton-orange"></td>
			</tr>
		</table>
		</form>
	</div>
</div>