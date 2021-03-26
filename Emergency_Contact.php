<!DOCTYPE html>
<html>
<head>
	<title>Emergency Contact</title>
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
			<div class="welcome1" style="float: left;height:250px;">
				<?php include 'Reference.php' ?>
			</div>
			<!-- -------------------------------------------------------->
			<div class="welcome2 message" style="height:150px;color: black;">
				
				<div align="center" >
					<?php 

						require_once 'db_connect.php';

						$search="R_";
						
					    
					    $sql = "SELECT U_ID, Name, Email, Mobile FROM User where U_ID like '%{$search}%'";

						$result = mysqli_query($conn, $sql);
						$count =mysqli_num_rows($result);

						if($count > 0)
						{

							$data = "

					        <table border=1>
							 
							<tr>
							   <td colspan=12><center><b>Details of Helpline</b></center></td>
							 
							</tr>
							 
							<tr>
							    <td><b><center>ID</center></b></td>
								<td><center><b>Name</b></center></td>
								<td><center><b>Email</b></center></td>
								<td><center><b>Mobile</b></center></td>
								 
							</tr>";

							while($row = mysqli_fetch_assoc($result))
							{ 
								//--------.=------Is used For Concat Operation---------------------
								$data .= "<tr> 
							    <td>{$row['U_ID']}</td>
								<td>{$row['Name']}</td>
								<td>{$row['Email']}</td>
								<td>{$row['Mobile']}</td>
							 
							 </tr>";
							}

							$data .= "</table>";
							echo $data;

						}
					?>
				</div>
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


