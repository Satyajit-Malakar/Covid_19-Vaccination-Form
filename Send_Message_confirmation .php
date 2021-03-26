<?php session_start();?>
<?php

    $P_ID=$_SESSION["P_ID"];
    $Name = $_SESSION["Name"];
    $Number=$_SESSION["Number"];

?>

<!DOCTYPE html>
<html>
<head>
    <title>Message Confirmation</title>
    <style type="">
    .label
    {
      width: 200px;
      display: inline-block;
      /*This Allows to align the label*/
    }
    </style>
</head>
<body>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
  <div align="center" style="margin-top: 200px;">
    <fieldset style="width: 40%;height: 220px">
      <div style="color: red;"><h2>Are you sure that the message is send?</h2></div>
      
        <div align="left" style="padding-top: 10px;"><span class="label">Patient ID</span><label>:<?php echo $P_ID; ?></label></div>
        <hr>
    
        <div align="left"><span class="label">Patient Name</span><label>:<?php echo $Name; ?></label></div>
        <hr>
    
        <div align="left"><span class="label">Patient Phone Number</span><label style="color: red;">:<?php echo $Number; ?></label></div>
        <hr>

      <div style="padding: 15px;">
        <input type="submit" name = "Yes" value="Yes">
        <input type="submit" name = "No" value="No">
      </div>
    </fieldset>
  </div>
  </form>
</body>
</html>
<?php
  if (isset($_POST['Yes'])) 
  { 
    $A=1;
    require_once 'db_connect.php';
    //===============================Update Patient============================================

    $sql22 = "UPDATE patient SET Message='".$A."' WHERE P_ID='".$P_ID."'";

    if ($conn->query($sql22) === TRUE) 
    {
      
    } 
    else 
    {
      $Up_Error = "Error updating record: " . $conn->error;
    }

    $conn->close();

    //======================================================================================================

    echo '<script type="text/javascript">window.location.href="Send_Message_To_Patient_final.php";</script>';
  }

  if (isset($_POST['No'])) 
  {
    echo '<script type="text/javascript">window.location.href="Send_Message_To_Patient_final.php";</script>';
  }
?>
