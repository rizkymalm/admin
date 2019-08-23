<?php session_start(); 
	// all files in config
	foreach (glob('apps/config/*.php') as $config) {
		include $config;

	}
	include'apps/views/tampilan/top.php';
	?>
<script type="text/javascript" src="<?php echo $base_url ?>assets/js/jquery.min.js"></script>
<script type="text/javascript">

	setTimeout(function(){$('.notif').fadeOut();}, 3000);

</script>
	<?php
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	$query=$mysqli->query("SELECT * FROM administrator WHERE email_admin='$email' AND pass_admin='$pass'");
	$count=mysqli_num_rows($query);

	if ($count==0) {
		?>
			<div class="center fix notif" style="height:10%; top:2%; bottom: auto; width:500px; background:transparent;">
				<div class="alert warning">your email and password is not found....</div>
			</div>
		<?php
	}else{
		$res=$query->fetch_assoc();		
		$_SESSION['kdadm']=$res['kdadmin'];
		// $_SESSION['kat']=$res['kat_admin'];
		// $mysqli->query("UPDATE admin SET online='on' WHERE kdadmin='$res[kdadmin]'");
		?>
			<div class="center fix notif" style="height:10%; top:2%; bottom: auto; width:500px; background:transparent;">
				<div class="alert info">Success...</div>
			</div>
			<script type="text/javascript">
				setTimeout(function(){
					window.location='index.php'
				}, 3000);
			</script>
		<?php
	}

	?>



<!-- 	<div class="center fix">
		<div class="alert info">bla bla bla...</div>
	</div> -->

	<?php
	include'apps/views/tampilan/bottom.php';
	?>