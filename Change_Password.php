<?php
$Pass = "";
$Pass0= $Pass1=$Confirm_Pass="";

require_once 'db_connect.php';     
if (isset($_SESSION["id"])) 
{
  $id=$_SESSION["id"];
  $sql = "SELECT * FROM User WHERE U_ID='".$id."'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) 
  {
    $row = $result->fetch_assoc();
    $Sumit = $row['Password'];    
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
  <title>Change Password</title>
  <link rel="stylesheet" href="css/common.css">
  <style >
     .label2
    {
      width: 190px;
      display: inline-block;
      /*This Allows to align the label*/
    }
  </style>
   
</head>
<body>


<!-- Login.php -->
  <div align="center">
    <div align="center" class="max_size1">

        <div  class="div1">
          <form  method="post" onsubmit="return form_validation()"  action="Update_Password.php" > 
            
            
            <fieldset align="left" style="width: 850px;height: 250px;">
              
              <legend align="center" style="color: blue;"><b>Change Password</b></legend>
               
             
              <div class="Padding5">
                <label class="label2">Previous Password</label>
                :<input type="Password" name="PPass" id="PPass"  value=""  size="50" style="width: 290px;"><label class="error">*</label>
                <span id="PPass_msg" class="error"></span>
              </div>
              <hr>

              <div class="Padding5">
                <label class="label2">New Password</label>
                :<input type="Password" name="pass" id="pass" value="" size="50" style="width: 290px;"><label class="error">*</label>
                <span id="pass_msg" class="error"></span>
              </div>
              <hr>

              <div class="Padding5">
                <label class="label2">New Confirm Password</label>
                :<input type="Password" name="c_pass" id="c_pass" value="" size="50" style="width: 290px;"><label class="error">*</label>
                  <span id="c_pass_msg" class="error"></span>
                  <span id="cc_pass_msg" class="error"></span>
              </div>

              <hr>

              <div style="padding-top: 20px">
                <button type="submit"  name="Change" >Change</button>
                <input type="reset" value="Reset">
              </div>
             

              </div>
            </fieldset>
          </form>
        </div>  
      
    </div>
  </div>
  
      <script type="text/javascript">
        var PPass=document.getElementById('PPass');
        var pass=document.getElementById('pass');
        var c_pass=document.getElementById('c_pass');

        var data = <?php echo json_encode($Sumit); ?>; 

        //---------------------------------------------------------
        function form_validation()
        {
            //-------------------------------------------Previous Password-----------------------
            var pc=0;
            
            if(PPass.value=='' )
            {
              PPass.style.borderColor="red";
              document.getElementById('PPass_msg').innerHTML="Previous Password Can not be Empty";

              return false;
         
            } 

            else if (PPass.value != data) 
            {
              PPass.style.borderColor="red";
              document.getElementById('PPass_msg').innerHTML="Entered Wrong Password";

              return false;
          
            }

            else
            {
                PPass.style.borderColor="green";
                document.getElementById('PPass_msg').innerHTML=" ";
               
            }
             
            //-------------------------------------------New Password-----------------------
            if(pass.value=='')
            {
              pass.style.borderColor="red";
              document.getElementById('pass_msg').innerHTML="New Password Can not be Empty";
              pc=1;

              return false;
           
            } 
            else
            {
              pass.style.borderColor="green";
              document.getElementById('pass_msg').innerHTML=" ";
            }
                 
            //-------------------------------------------Confirm Password-----------------------     
            if(c_pass.value=='')
            {
              c_pass.style.borderColor="red";
              document.getElementById('c_pass_msg').innerHTML="New Confirm Password Can not be Empty";
              pc=1;

              return false;
            } 
            else
            {
              c_pass.style.borderColor="green";
              document.getElementById('c_pass_msg').innerHTML=" ";
            }

            if ((pass.value != c_pass.value)&&(pc!=1))
            {
              c_pass.style.borderColor="red";
              document.getElementById('c_pass_msg').innerHTML= "New Confirm Password does not match";

              return false;
            } 

            return true;
     
        }

      </script>
</body>
</html>

