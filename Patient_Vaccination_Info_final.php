<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title>Patient Vaccination Information</title>
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
			<?php include 'Header8.php' ?>			
		</div>
	</div>
		<!-------------------------------------------------------------------------------------------------->
	<div >
		<div>
			<div class="final_ref_update_recep" >
				<?php include 'Receptionist_Reference.php' ?>
			</div>
			<!-- -------------------------------------------------------->
			<div class="final_main_update" >
				<?php include 'Patient_Vaccination_Info.php' ?>
			</div>
	
		</div>
	</div>	
		<!-------------------------------------------------------------------------------------------------->
		<!-- Footer-->
	<div >
		<div class="final_footer">
			<?php include 'Footer.php' ?>	
		</div>
	</div>
</body>
</html>
