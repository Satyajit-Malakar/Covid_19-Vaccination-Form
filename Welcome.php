<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title>Hospital</title>
   <link rel="stylesheet" href="css/sm.css">
   <link rel="stylesheet" href="css/common.css">
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
			<div class="welcome1" style="float: left;height: 340px;">
				<?php include 'Reference.php' ?>
			</div>
			<!-- -------------------------------------------------------->
			<div class="welcome2 message">
				<p style="text-align: center;font-size: 25px;">Welcome</p>
				<?php 
					unset($_SESSION["id"]);
				?>
				<div align="center" >
					<form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"> 
			            <div>
			            	<button type="submit" class="button button1" style="border: 1px solid #4CAF50;" name="Login">Login</button>
			            </div>
			            <div style="padding-top: 10px;">
			            	<span style="color: red;">Don't Have an Account?</span>
			            </div>
			            <div style="padding-top: 5px;">
							<button type="submit" class="button button2" style="border: 1px solid  #2196F3;" name="Registration">Create Account</button>
						</div>
					</form>
				</div>
			</div>
			
	
		</div>
	</div>	
		
		<!-------------------------------------------------------------------------------------------------->
		<!-- Footer-->
	<div style="width:100%;">
		<div style="background-color: #4CAF50;margin-top: 200px;">
			<?php include 'Footer.php' ?>	
		</div>
	</div>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{ 
	if(isset(($_POST['Login'])))
	{
		echo '<script type="text/javascript">window.location.href="Login_Final.php";</script>';
	}
	else if(isset(($_POST['Registration'])))
	{
		echo '<script type="text/javascript">window.location.href="Registration_final.php";</script>';
	}
}
?>

