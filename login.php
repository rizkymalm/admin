<?php session_start(); 
	// all files in config
	foreach (glob('apps/config/*.php') as $config) {
		include $config;

	}
	include'apps/views/tampilan/top.php'; 
	?>

	<style type="text/css">
		@font-face{
			font-family: "Geosans Light";
			src: url('assets/font/GeosansLight.ttf');
		}
		body{background: #68BAF9; font-family: "Helvetica Neue",Roboto,Arial,"Droid Sans",sans-serif}
		.box{
			width:25%; height: 60%; max-height: 75%;
		}
		h1{
		    -webkit-margin-before:0;
		    -webkit-margin-after: 0;
		    -webkit-margin-start: 0px;
		    -webkit-margin-end: 0px;
		    text-align: center;
		}
		.headlogin{width: 100%; height: 15%; color: #FFF; font-size: 40px; font-family: "Geosans Light"}
		.bottomlogin{width: 100%; height: 15%; color: #FFF; font-size: 12px; margin-top: 10%;}
		.loginbox{
			width:100%; height: 70%; background:#FFF;
			box-shadow:0px 40px 20px -40px rgb(133, 133, 133);
			-webkit-box-shadow:0px 40px 20px -40px rgb(133, 133, 133);
			-moz-box-shadow:0px 40px 20px -40px rgb(133, 133, 133);
			-o-box-shadow:0px 40px 20px -40px rgb(133, 133, 133);
		}
		.loginbox table img{
			width: 50%
		}
		.notify{font-size: 14px;}
		@media screen and (max-width: 1600px){
			.headlogin{font-size: 30px;}
		}
		@media screen and (max-width: 1000px){
			.box{width: 65%; height: 60%; max-height: 90%;}
			.headlogin{font-size: 50px;}
			.bottomlogin{font-size: 24px;}
			.notify{font-size: 24px;}
		}
	</style>
<script type="text/javascript" src="<?php echo $base_url ?>assets/js/jquery.js"></script>
<script type="text/javascript">
// $(document).ready(function(){
// 	alert('asds')
// })
	$(document).ready(function(){
		$('#formlogin').submit(function(){
			var email = $('#lemail').val();
			var pass = $('#pass').val();
			datalogin = "email="+email+"&pass="+pass;
			if (email=="") {
				$('.notify').show();
				$('.alert.warning').show();
				$('.alert.warning').text("please fill your email ...");
				setTimeout(function(){$('.notify').fadeOut();}, 3000);
				$('#lemail').focus()
				return false;
			}else if (pass=="") {
				$('.notify').show();
				$('.alert.warning').show();
				$('.alert.warning').text("please fill your password ...");
				setTimeout(function(){$('.notify').fadeOut();}, 3000);
				$('#pass').focus()
				return false;
			}else if (email!="" && pass!="") {
				$.ajax({
					type : "POST",
					url : "afterlogin.php",
					data : datalogin,
					cache : false,
					beforeSend:function(login){
						$('.notify').show();
						$('.alert.welcome').show();
						$('.alert.welcome').text("Authenticating ...");
					},success:function(login){
						$('#formlogin').after(login);
						$('.alert.welcome').hide();
						$('.notify').hide();					
					}
				})
				return false;
			}
		})
	})
</script>

	<div class="center fix notify" style="top: 2%; bottom:auto; width: 500px; height:15%; display:none;">
		<div class="alert welcome" style="display:none;"></div>
		<div class="alert warning" style="display:none;"></div>
		<div class="alert info" style="display:none;"></div>
	</div>
	<div class="center fix box">
		<div class="headlogin">
			<h1>Administrator</h1>
		</div>
		<form id="formlogin" method="POST">
		<div class="loginbox">
			<table class="full-length" style="height:100%;">
				<tr>
					<th class="nopad"><img src="assets/images/logo-ourboutique-blue.png"></th>
				</tr>
				<tr>
					<th class="size-std">
						<p><input type="email" id="lemail" name="email" style="border-radius:0; width:80%;" placeholder="Your Email ...."></p>
						<!-- <br> -->
						<p><input type="password" id="pass" name="pass" style="border-radius:0; width:80%;" placeholder="Password ...."></p>
					</th>
				</tr>
				<tr>
					<th class="size-std"><input type="submit" name="login" value="Login" class="myButton-flat-orange" style="width:50%"></th>
				</tr>
			</table>
		</div>
		</form>
		<div class="bottomlogin">
			<p>Copyright &copy; 2016 Powered By CentrinOnline</p>
		</div>
	</div>

	<?php
	include'apps/views/tampilan/bottom.php'; 
	?>
