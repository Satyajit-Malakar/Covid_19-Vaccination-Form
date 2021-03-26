<?php
require_once 'db_connect.php';     
if (isset($_SESSION["id"])) 
{
  $id=$_SESSION["id"];
  $sql = "SELECT * FROM user WHERE U_ID ='".$id."'";
  $result = $conn->query($sql);


  if ($result->num_rows > 0) 
  {
    $row = $result->fetch_assoc();
    $Mobile = $row['Mobile']; 
      
  } 
  else 
  {
      echo "0 results";
  }

  $sql3 = "SELECT * FROM patient WHERE P_ID ='".$id."'";
  $result3 = $conn->query($sql3);


  if ($result3->num_rows > 0) 
  {
    $row2 = $result3->fetch_assoc();
    $PDate = $row2['PDate']; 
      
  } 
  else 
  {
      echo "0 results";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title></title> 
</head>
<body>

<style>
.dropbtn 
{
  background-color: #4CAF50;
  color: black;
  padding: 16px;
  font-size: 20px;
  border: none;
}

.dropdown 
{
  position: relative;
  display: inline-block;
}

.dropdown-content 
{
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  font-size: 20px;
}

.dropdown:hover .dropdown-content {display: block;}
.dropdown:hover .dropbtn {background-color: #3e8e41;}

</style>

<header style="background-color: #4CAF50">
<div class="dropdown" style="float: right;padding-right: 100px;">
  <button class="dropbtn">Contact Us</button>
  <div class="dropdown-content" >
   <p>Help Line:01601285765 </p>
 </div>
</div>
<div class="dropdown" style="float: right;">
  <button class="dropbtn" style="color: blue;">Help</button>
  <div class="dropdown-content" >
    <pre>Vaccination Time, Date 
& Hospital Name will be 
send in your phone 
Number: <?php echo $Mobile; ?> 
in 2-5 Days. Form 
Date: <?php echo $PDate; ?>.
For second Vaccination the 
Hospital will remain same
but for second date 
notification please wait for  
<b>Two</b> months.</pre>
  </div>
</div>
</header>
</body>
</html>



