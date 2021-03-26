<?php session_start();?>
<?php
require_once 'db_connect.php';
$id=$_SESSION["id"];
if (isset($_SESSION["id"])) 
{
	$sql = "SELECT Name FROM User WHERE U_ID='".$id."'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) 
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

<!DOCTYPE html>
<html>
<head>
	<title>Receptionist Page</title>
   <link rel="stylesheet" href="css/sm.css">
   <style>
   	.x
	{
		/*border-right:  1px solid green;*/
	    padding-left: 10px;
	    padding-right: 20px;
	    padding-bottom: 200px;
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
				<?php include 'Receptionist_Reference.php' ?>
			</div>
			<!-- -------------------------------------------------------->
			<div class="y" style="padding-left: 60px;height: 200px;padding-bottom: 100px;">
				<p  style="padding-top: 100px;margin-left: 750px;margin-bottom: 0px;margin-top: 0px;font-size: 50px;font-family: Freestyle Script;">Welcome </p><br>
				<p class="margin_top_0px" style="margin-left: 700px;font-size: 30px;color: blue;"><?php echo $row["Name"]; ?> </p>
			</div>
	
		</div>
	</div>	
		
		<!-------------------------------------------------------------------------------------------------->
		<!-- Footer-->
	<div style="width:100%;margin-top: 80px;" >
		<div style="background-color: #4CAF50">
			<?php include 'Footer.php' ?>	
		</div>
	</div>
</body>
</html>

