<?php 
	session_start();
	
?>
<?php
require_once 'db_connect.php';
if (isset($_SESSION["id"])) 
{
	$id=$_SESSION["id"];
	$App_ID="";
	$sql = "SELECT Name FROM User WHERE U_ID='".$id."'";
	$result = $conn->query($sql);

	
	if ($result->num_rows > 0 ) 
	{
	    $row = $result->fetch_assoc();
	} 
	else 
	{
	    echo "0 results";
	}

	$conn->close();
}
else
{
	echo '<script type="text/javascript">window.location.href="Welcome.php";</script>';
}
?>
<!-- ----------------------------------------------------HTML------------------------------------------------------ -->
<!DOCTYPE html>
<html>
<head>
	<title>Patient Page</title>
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
			<?php include 'Header2.php' ?>			
		</div>
	</div>
		<!-------------------------------------------------------------------------------------------------->
	<div >
		<div>
			<div class="Normal_welcome_ref">
				<?php 
					include 'Patient_Reference.php';
				?>
			</div>
			<!-- -------------------------------------------------------->
			<div class="Normal_welcome">
				<p class="margin_top_0px" style="padding-top: 100px;margin-left: 750px;margin-bottom: 0px;font-size: 50px;font-family: Freestyle Script;">Welcome </p><br>
				<p class="margin_top_0px" style="margin-left: 700px;font-size: 30px;color: blue;"><?php echo $row["Name"]; ?> </p>
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

