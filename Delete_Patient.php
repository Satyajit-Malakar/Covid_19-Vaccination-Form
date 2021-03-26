<?php
//----------------------Delete----------------------------------
$id=$_SESSION["id"];
require_once 'db_connect.php';
$sql = "SELECT * FROM User WHERE U_ID='".$id."'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) 
  {
    $row = $result->fetch_assoc();
  } 
//Error
$U_id_Error=$User_name_Error=$Pass_Error=$Confirm_Pass_Error= "";
$U_id=$User_name = $Pass =$Confirm_Pass = $ConfirmDelete = "";
$U_id1 = $User_name1 = "";
//-------------Name
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  //------------User Id
  $U_id1 = $_POST["uid"];
  if (empty($_POST["uid"])) 
  {
    $U_id_Error = "User ID is required";
  } 
  else if (strcmp($U_id1, $id) != 0) 
  {
    $U_id_Error="Please enter a valid ID";
  }

  else
  {
    $U_id = $_POST["uid"];
  }
  //------------User Name
  $User_name1 = $_POST["u_nam"];
  if (empty($_POST["u_nam"])) 
  {
    $User_name_Error = "User name is required";
  }

  elseif (strcmp($User_name1, $row['User_Name']) != 0) 
  {
     $User_name_Error = "Please enter a valid User Name";
  }
  else
  {
    $User_name = $_POST["u_nam"];
  } 

  //--------------Password-------------
  $Pass1 = $_POST["pass"];
  if (empty($_POST["pass"])) 
  {
    $Pass_Error = "Password is required";
  }

  elseif (strcmp($Pass1, $row['Password']) != 0) 
  {
     $Pass_Error = "Please enter a valid Password";
  }
  else
  {
    $Pass = $_POST["pass"];
  } 

//-----------Checkbox----------------
  if (!isset($_POST['checkbox1'])) 
  {
    $ConfirmDelete = "Please agree to delete your account!!!!";
  }        
}

?>

<?php
if (isset($_SESSION["id"])) 
{
  require_once 'db_connect.php';
  
    if(isset(($_POST['Delete'])))
    {
      // sql to delete a record
      if(($U_id != "")and($U_id_Error == "")and($User_name_Error == "")and($Pass_Error == "")and($ConfirmDelete == ""))
      {
        $sql = "DELETE FROM User WHERE U_ID='$U_id' and User_Name='$User_name' and Password='$Pass'" ;

        if ($conn->query($sql) === TRUE) 
        {
          //echo "Record deleted successfully";
          header("Location: DeleteMessage.php");
          $conn->close();
        } 
        else 
        {
          echo "Error deleting record: " . $conn->error;
        }
      }
    }
}
else
{
  echo '<script type="text/javascript">window.location.href="Welcome.php";</script>';
} 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Delete Account</title>
   <style>
    .label
    {
      width: 130px;
      display: inline-block;
      /*This Allows to align the label*/
    }
    .error 
    {
      color: #FF0000;
    }

   </style>
</head>
<body>

  <div align="center">
    <div align="center" style="padding:10px;width:850px">
        <div  style="padding:50px 300px 50px 110px;">
          <!--padding: top right bottom left -->

          <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"> 
            
            
            <fieldset align="left" style="width:650px;height: 300px;">
              
              <legend align="center" style="color: blue;"><b>Delete Account</b></legend>
               
              <div style="padding:5px;">
                <label class="label">ID</label>
                :<input type="text" name="uid" value="<?php echo $U_id1; ?>" size="50" style="width: 290px;" placeholder="Example: P_100000"><label class="error">*</label>
                <span class="error"><?php echo $U_id_Error;?></span>
              </div>
              <hr>
              <div style="padding:5px;">
                <label class="label">User Name</label>
                :<input type="text" name="u_nam" value="<?php echo $User_name1; ?>" size="50" style="width: 290px;" placeholder="Example:  Sayed123"><label class="error">*</label>
                <span class="error"><?php echo $User_name_Error;?></span>
              </div>
              <hr>

              <div style="padding:5px;">
                <label class="label">Password</label>
                :<input type="Password" name="pass" value="" size="50" style="width: 290px;"  placeholder="Example:  01@123Sayed"><label class="error">*</label>
                <span class="error"><?php echo $Pass_Error;?></span>
              </div>
              <hr>

              <div style="padding:5px;">
                <input type="checkbox" name="checkbox1"  value="" size="10" style="width: 10px;">
                I agree to delete my account
              </div>
              
              <div style="padding-top: 20px">
                <input type="submit" name = "Delete" value="Delete">
                <input type="reset" value="Reset">
                <span class="error"><?php echo $ConfirmDelete;?></span>
              </div>
                
              </div>
            </fieldset>
          </form>
        </div>  
    </div>
  </div>


</body>
</html>
