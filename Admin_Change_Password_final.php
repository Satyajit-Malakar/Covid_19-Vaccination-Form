<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
   <link rel="stylesheet" href="css/sm.css">
   <link rel="stylesheet" href="css/common.css">
   <style type="text/css">
   	.clearfix 
   	{
	  overflow: auto;
	}

   </style>
</head>
<body>
	<div style="width:100%">
		<!-- Header-->
		<div>
			<?php include 'Header.php' ?>			
		</div>
		<!-- Header2 -->
		<div>
			<?php include 'Header2.php' ?>			
		</div>
	</div>
		<!-------------------------------------------------------------------------------------------------->
	<div style="width:100%;">
		<div>
			<div class="welcome1" style="float: left;height: 400px">
				<?php include 'Admin_Ref.php' ?>
			</div>
			<!-- -------------------------------------------------------->
			<div class="welcome2 " style="height:450px;padding-bottom: 0px">
				<?php include 'Change_Password.php' ?>
			</div>
			
	
		</div>
	</div>	
		
		<!-------------------------------------------------------------------------------------------------->
		<!-- Footer-->
	<div style="width:100%;">
		<div style="background-color: #4CAF50;">
			<?php include 'Footer.php' ?>	
		</div>
	</div>
</body>
</html>

