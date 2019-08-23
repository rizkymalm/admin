<?php 
foreach (glob('../../config/*.php') as $config) {
	include $config;
}
include'../../models/m_products.php';
$pid = $_GET['pid'];
?>
<style type="text/css">
	.gal-wrap{
		position: relative;
		left: 0;
		right: 0;
		margin: auto;
		width: 100%;
	}
	.gal-wrap table tr td{
		background-color: transparent;
	}
	.gal-wrap table tr:hover{
		background-color: #D3DCE3;
	}
	.gal-wrap table tr td img{
		height: 60px;
	}
	.gal-act{
		position: absolute;
		right: 10px;
		top: 0;
		bottom: 0;
		height: 100%;
		width: 40%;
		line-height: 60px;
		text-align: right;
	}


	.fileupload-wrap{
		width: 100%;
	    max-width: 980px;
	    text-align: center;
	    margin: 0 auto;
	}
	.boxfileupload{
		font-size: 1.25rem;
	    background-color: #c8dadf;
	    position: relative;
	    padding: 70px 20px;
	}
	.box__dragndrop,
	.box__uploading,
	.box__success,
	.box__error {
	  display: none;
	}

	.boxfileupload.has-advanced-upload {
		outline: 4px dashed #92b0b3;
		outline-offset: -10px;
		-webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
		transition: outline-offset .15s ease-in-out, background-color .15s linear;
	}
	.boxfileupload.has-advanced-upload .box__dragndrop {
		display: inline;
		float: none;
	}
	.boxfileupload.is-dragover {
		background-color: grey;
	}
	.boxfileupload.has-advanced-upload .box__icon{
		width: 100%;
	    height: 60px;
	    fill: #92b0b3;
	    display: block;
	    margin-bottom: 20px;
	}
	svg:not(:root){
		overflow: hidden;
	}
	.box__input{float: none !important;}
	.box__file{
		width: 0.1px;
	    height: 0.1px;
	    opacity: 0;
	    overflow: hidden;
	    position: absolute;
	    z-index: -1;
	}
	.box__file + label:hover strong, .box__file:focus + label strong, .box__file.has-focus + label strong{
		    color: #39bfd3;
	}
	.box__button{
		font-weight: 700;
	    color: #e5edf1;
	    background-color: #39bfd3;
	    display: none;
	    padding: 8px 16px;
	    margin: 40px auto 0;
	}
	.box__progress{
		position: absolute;
		left: 0;
		right: 0;
		margin: auto;
		width: 40%;
		height: 10px;
		border: 1px solid #999999;
		border-radius: 10px;
	}
	.prgoress_bar{
		position: relative;
		height: 100%;
		width: 0%;
		background: blue;
		border-radius: 10px;
	}
	.alertbox{
		position: relative;
		width: 80%;
		left: 0;		
		margin: auto;		
	}

</style>
<div class="gal-wrap">

	<div class="fileupload-wrap" style="display: none;">
	<form method="post" action="" enctype="multipart/form-data" class="boxfileupload has-advanced-upload">
	  <div class="box__input">
	  	<svg class="box__icon" xmlns="http://www.w3.org/2000/svg" width="50" height="43" viewBox="0 0 50 43"><path d="M48.4 26.5c-.9 0-1.7.7-1.7 1.7v11.6h-43.3v-11.6c0-.9-.7-1.7-1.7-1.7s-1.7.7-1.7 1.7v13.2c0 .9.7 1.7 1.7 1.7h46.7c.9 0 1.7-.7 1.7-1.7v-13.2c0-1-.7-1.7-1.7-1.7zm-24.5 6.1c.3.3.8.5 1.2.5.4 0 .9-.2 1.2-.5l10-11.6c.7-.7.7-1.7 0-2.4s-1.7-.7-2.4 0l-7.1 8.3v-25.3c0-.9-.7-1.7-1.7-1.7s-1.7.7-1.7 1.7v25.3l-7.1-8.3c-.7-.7-1.7-.7-2.4 0s-.7 1.7 0 2.4l10 11.6z"></path></svg>
	   	<input type="file" name="files[]" id="file" class="box__file" data-multiple-caption="{count} files selected" multiple="">
	    <label for="file"><strong>Choose a file</strong><span class="box__dragndrop"> or drag it here</span>.</label>
	    <input class="box__button" type="submit" name="imageFile" value="Upload">
	    <input type="hidden" name="idPrd" value="<?php echo $pid; ?>">
	  </div>
	  <div class="box__uploading">Uploading&hellip;</div>
	  <div class="box__success">Done!</div>
	  <div class="box__error">Error! <span></span>.</div>
	</form>
	</div>

<form id="count-checked" class="removeImg" method="POST" action="">
	<div class="list-control" id="ajaxdt-type" style="padding-left: 0;">
		<div class="alertbox size-std" style="display: none;"></div>
		<div class="valchecked"></div>
		<a class="myButton-white" style="float: right;" onClick="showbtnUploadfile()">Add New</a>
	</div>	
	<table class="size-std full-tables">
		<tr>
			<th></th>
			<th>Image</th>
			<th>Update</th>
			<th>Action</th>
		</tr>
		<?php
		if (is_array(galeryprd($pid))) {
			foreach (galeryprd($pid) as $read) {
		?>
			<tr style="text-align: center;" id="<?php echo $read['kdslide'] ?>">
				<td style="width: 50px">
					<div class="checkboxtype1">
						<input type="checkbox" id="radio0<?php echo $read['kdslide']; ?>" name="imgdel[]" class="select cnt-chk" value="<?php echo $read['kdslide']; ?>"/>
						<label for="radio0<?php echo $read['kdslide']; ?>" id="chartd"><span></span></label>
					</div>
				</td>
				<td>
					<img src="<?php echo $read['large_image'] ?>">
				</td>
				<td>
					<?php echo $read['update_image']; ?>
				</td>
				<td>
					<a href="">Delete</a>
				</td>
			</tr>
		<?php }} ?>
	</table>
</form>
</div>

<script type="text/javascript" src="http://localhost/project/ouradmin/assets/js/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){		
	$('#count-checked :checkbox').click(function(){
		var checkedbox = $("#count-checked .cnt-chk:checkbox:checked").length
		if (checkedbox == 0) {
		    $('.valchecked').html('');
		}else if(checkedbox > 0){
		    $('.valchecked').html(checkedbox+" Selected <button class='btn-list-control' type='submit' style='background-image:url(http://localhost/project/ouradmin/assets/images/icon/delete-thrash.png); background-position:center; background-size:25px 25px; background-repeat:no-repeat;'>&nbsp;</button>");
		}
    });

	let droparea = document.getElementById("file");	
	$('#file').change(function(e){
		e.preventDefault();		
		var countfile = file.length;
		var datafile = new FormData();
		var ins = document.getElementById('file').files.length;
        for (var x = 0; x < ins; x++) {
            datafile.append("files[]", document.getElementById('file').files[x]);
        }
        datafile.append("id", document.getElementsByName('idPrd')[0].value);
		$.ajax({
			type : 'POST',
			url : 'http://localhost/project/ouradmin/apps/controllers/uploadimage.php',
			data : datafile,
			contentType : false,
			processData:false,
			cache : true,			
			beforeSend : function(upload){
				$('.box__uploading').show(upload);
				// $('.prgoress_bar').width('0%');
			},
			// uploadProgress : function(event, position, total, percentComplete){
			// 	var percentVal = percentComplete + '%';
			// 	$('.prgoress_bar').width(percentVal);
			// 	$('.prgoress_percentage').html(percentVal+"%");
			// },
			success : function (upload){
				$('.box__uploading').hide(upload);
				$('.box__input').html(upload);
				$('a[href$="#galeri"]').click();
			}
		});
		return false;
	});


	$('.removeImg').submit(function(){
		var idslide = [];
		$(':checkbox:checked').each(function(i){
			idslide[i] = $(this).val();
		})
		$.ajax({
			url : "http://localhost/project/ouradmin/apps/controllers/uploadimage.php",
			type : "POST",
			data : {id:idslide},
			cache : false,
			success: function(remslide){
				for (var i = 0; i < idslide.length; i++) {
					$("tr#"+idslide[i]).fadeOut('slow');
				}
				$('.valchecked').html('');
				$('.alertbox').fadeIn('slow');
				$('.alertbox').html(remslide);
				$('.alertbox').fadeOut(5000);				
			}
		});
		return false;
	})


})

	function showbtnUploadfile(){
		if ($('.fileupload-wrap').is(':hidden')) {
			$('.fileupload-wrap').css("display" , "block");
		}else{
			$('.fileupload-wrap').css("display" , "none");
		}
	}
</script>