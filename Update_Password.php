<?php
    
    session_start();
    $id=$_SESSION["id"];
    require_once 'db_connect.php';  
    $Pass=$_POST["pass"];
   

    $sql = "UPDATE User SET Password='".$Pass."' WHERE U_ID='".$id."'";

    if ($conn->query($sql) === TRUE) 
     {
      //$Change_Error = "Password  updated successfully";
      echo '<script type="text/javascript">window.location.href="Password_Page.php";</script>';

    } 
     else 
    {
      //$Change_Error = "Error Changing Password: " . $conn->error;
     }

    $conn->close();

?>