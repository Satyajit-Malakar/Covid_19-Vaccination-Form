<?php
    
    require_once 'db_connect.php';  
    $Pass=$_POST["pass"];
    $id=$_POST["ID"];
    $U_Name=$_POST["User_Name"];

    $sql = "SELECT * FROM User WHERE U_ID='".$id."' AND User_Name= '".$U_Name."'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) 
    {
      $row = $result->fetch_assoc();
      $sql = "UPDATE User SET Password='".$Pass."' WHERE U_ID='".$id."' ";

      if ($conn->query($sql) === TRUE) 
      {
        echo '<script type="text/javascript">window.location.href="Recover_Pass_message.php";</script>';
      } 
    } 
   
    else 
    {
      $Error="";
      $Error="Invalid User Name or User ID";
    }

    $conn->close();
    if (isset($_POST['OK'])) 
    {
      echo '<script type="text/javascript">window.location.href="Recover_Pass_final.php";</script>';
    }

?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
    <fieldset  align="center" style="width:200px;height: 50px; margin-left: 600px;margin-top: 200px;">
      <div align="center">
        <?php echo $Error; ?> 
      </div>
      <div align="center" style="padding-top: 10px;">
       <input type="submit" name = "OK" value="Ok">
      </div>
    </fieldset>
  </form>
</body>
</html>