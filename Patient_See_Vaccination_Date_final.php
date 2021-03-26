<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Vaccination Information</title>
   <link rel="stylesheet" href="css/sm.css">
   <link rel="stylesheet" href="css/All_registration.css">
</head>
<body>
	<div >
		<!-- Header-->
		<div>
			<?php include 'Header.php' ?>			
		</div>
		<!-- Header2 -->
		<div>
			<?php include 'Header5.php' ?>			
		</div>
	</div>
		<!-------------------------------------------------------------------------------------------------->
	<div >
		<div>
			<div class="final_ref_update" style="height: 350px;padding-bottom: 150px;">
				<?php
					include 'Patient_Reference.php';
				?>
			</div>
			<!-- -------------------------------------------------------->
			<div  >
				<?php include 'Patient_See_Vaccination_Date.php' ?>
			</div>
	
		</div>
	</div>	
		<!-------------------------------------------------------------------------------------------------->
		<!-- Footer-->
	<div >
		<div class="final_footer" style="padding-top: 0px;">
			<?php include 'Footer.php' ?>	
		</div>
	</div>
</body>
</html>