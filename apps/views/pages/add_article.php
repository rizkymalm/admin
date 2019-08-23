<div class="mainbox size-std column">
	<form id="validate-frm" class="form-addnew" method="POST" action="<?php echo $base_url; ?>?page=action" enctype="multipart/form-data">
		<div class="cols-12 containt column">
			<div class="headtitle trans">
				<p class="size-head4 nopad">Article</p>
				<p class="size-cute nopad">Add New Article</p>
			</div>
			<table class="full-length size-std basic-tables unbordered" style="border-right:1px solid #dfe8f1" cellpadding="8" cellspacing="8">
				<tr>
					<td style="text-align: right; width: 150px">New Title</td>
					<td><input type="text" name="title" class="frm-std size-std" style="border-radius: 0;" required=""></td>
				</tr>
				<tr>
					<td style="text-align: right; width: 150px">Image Thumbnail</td>
					<td>
						<input type="file" name="img_thumb" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" multiple style="display:none;" required="required" />
						<label for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> 
						<span style="margin-top:5px;">Choose a file&hellip;</span></label>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
				        <textarea class='tinymce spc-tb' name='txtarticle'></textarea>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="submit" name="article" value="POST" class="myButton-gradBlueGreen">
						<!-- <a href="" class="myButton-gradBlueGreen">POST</a> -->
					</td>
				</tr>
			</table>
		</div>
	</form>
</div>

