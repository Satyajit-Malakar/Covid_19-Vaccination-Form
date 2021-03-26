<?php
require_once 'db_connect.php';     
if (isset($_SESSION["id"])) 
{
  $id=$_SESSION["id"];
  $sql = "SELECT * FROM patient WHERE P_ID ='".$id."'";
  $sql1 = "SELECT * FROM user WHERE U_ID ='".$id."'";
  $result = $conn->query($sql);
  $result1 = $conn->query($sql1);

  if ($result->num_rows > 0) 
  {
    $row = $result->fetch_assoc();
    $H_Name = $row['H_Name']; 
    $First_Vaccine_Date = $row['First_Vaccine_Date']; 
    $D_Name_1 = $row['D_Name_1'];  
    $Second_Vaccine_Date = $row['Second_Vaccine_Date'];  
    $D_Name_2 = $row['D_Name_2'];     
  } 
  else 
  {
      echo "0 results";
  }

  if ($result1->num_rows > 0) 
  {
    $row = $result1->fetch_assoc();
    $Name = $row['Name'];    
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
  <title>Vaccination Information</title>
  <link rel="stylesheet" href="css/common.css">
  <style >
    .label2
    {
      width: 190px;
      display: inline-block;
    }
  </style>
   
</head>
<body>


<!-- Login.php -->
  <div align="center">
    <div align="center" class="max_size1">

        <div  class="div1">
          <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"> 
            
            
            <fieldset align="left" style="width: 850px;height: 320px;">
              
              <legend align="center" style="color: blue;"><b>Vaccination Information</b></legend>
               
             
              <div class="Padding5">
                <label class="label2">Patient Name</label>
                :<input type="text" name="" id=""  value="<?php echo $Name; ?>"  size="50" style="width: 400px;" disabled>
              </div>
              <hr>
    
                <div class="Padding5">
                  <label class="label2">Hospital Name</label>
                  :<input type="text" name="" id="" value="<?php echo $H_Name; ?>" size="50" style="width: 400px;" disabled>
                </div>
                <hr>

                <div class="Padding5">
                  <label class="label2">First Vaccine Date</label>
                  :<input type="text" name="" id="" value="<?php echo $First_Vaccine_Date; ?>" size="50" style="width: 400px;" disabled>
                </div>
                <hr>

                <div class="Padding5">
                  <label class="label2">Doctor/Nurse Name</label>
                  :<input type="text" name="" id="" value="<?php echo $D_Name_1; ?>" size="50" style="width: 400px;" disabled>
                </div>
                <hr>

                <div class="Padding5">
                  <label class="label2">Second Vaccine Date</label>
                  :<input type="text" name="" id="" value="<?php echo $Second_Vaccine_Date; ?>" size="50" style="width: 400px;" disabled>
                </div>
                <hr>

                <div class="Padding5">
                  <label class="label2">Doctor/Nurse Name</label>
                  :<input type="text" name="" id="" value="<?php echo $D_Name_2; ?>" size="50" style="width: 400px;" disabled>
                </div>
     

              <hr>             
              </div>
            </fieldset>
          </form>
        </div>  
      
    </div>
  </div>
</body>
</html>

