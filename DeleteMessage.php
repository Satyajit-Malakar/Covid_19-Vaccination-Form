<?php
session_start();
	if (isset(($_POST['OK']))) 
	{
		header("Location: Welcome.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Delete Confirmation</title>
   <link rel="stylesheet" href="css/sm.css">
   <style>
   	.x
	{
		/*border-right:  1px solid green;*/
	    padding-left: 10px;
	    padding-right: 20px;
	    padding-bottom: 100px;
	    background-color: #4CAF50;
	}
	.y
	{
	   /* padding-top: 5px;
	    height: 19px;*/
	    padding-bottom: 280px;
	    /*padding-top: 10px;*/
	    padding-left: 10px;

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
			<div class="x" style="float: left;">
				<?php include 'Reference.php' ?>
			</div>
			<!-- -------------------------------------------------------->
			<div  style="padding-left: 60px;height: 24px;" align="center">
				<p style="margin-top: 0px;padding-top: 100px;font-size: 130%;color: red;">Record <b>Deleted</b> Successfully</p>
			</div>
			<div  style="padding-left: 60px;height: 50px;margin-top: 120px" align="center">
				<p style="margin-top: 0px;padding-top: 0px;font-size: 130%;">Thanks for Staying with Us</p>
			</div>

			<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
				<div align="center" style="padding-bottom: 30px">
					<input type="submit" name = "OK" style="font-size: 20px;color: blue;" value="Ok">
					<?php unset($_SESSION["id"]); ?>
				</div>
			</form>
	
		</div>
	</div>	
		
		<!-------------------------------------------------------------------------------------------------->
		<!-- Footer-->
	<div style="width:100%;">
		<div style="background-color: #4CAF50">
			<?php include 'Footer.php' ?>	
		</div>
	</div>
</body>
</html>

