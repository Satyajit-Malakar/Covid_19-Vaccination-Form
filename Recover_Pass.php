<?php


require_once 'db_connect.php';     
if (isset($_SESSION["id"])) 
{

}
else
{
  echo '<script type="text/javascript">window.location.href="Welcome.php";</script>';
}
     
?>

<!DOCTYPE html>
<html>
<head>
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
          <form  method="post" onsubmit="return form_validation()"  action="Recovery_Pass_Update.php" enctype="multipart/form-data"> 
            
            
            <fieldset align="left" style="width: 850px;height: 250px;">
              
              <legend align="center" style="color: blue;"><b>Recover Password</b></legend>
               
             
              <div class="Padding5">
                <label class="label2">User_ID</label>
                :<input type="text" name="ID" id="ID"  value=""  size="50" style="width: 290px;"  placeholder="Example: P_100000" ><label class="error">*</label>
                <span id="ID_msg" class="error"></span>
              </div>
              <hr>

              <div class="Padding5">
                <label class="label2">User Name</label>
                :<input type="text" name="User_Name" id="User_Name" value="" size="50" style="width: 290px;"  placeholder="Example: Syed123" ><label class="error">*</label>
                <span id="User_Name_msg" class="error"></span>
              </div>
              <hr>

              <div class="Padding5">
                <label class="label2">New Password</label>
                :<input type="Password" name="pass" id="pass" value="" size="50" style="width: 290px;" placeholder="Example: Sayed@123"><label class="error">*</label>
                  <span id="pass_msg" class="error"></span>
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
        var ID=document.getElementById('ID');
        var User_Name=document.getElementById('User_Name');
        var pass=document.getElementById('pass');
        //---------------------------------------------------------
        function form_validation()
        {
            //-------------------------------------------User ID-----------------------
            
            if(ID.value=='' )
            {
              ID.style.borderColor="red";
              document.getElementById('ID_msg').innerHTML="User ID Can not be Empty";

              return false;
         
            } 

            else
            {
                ID.style.borderColor="green";
                document.getElementById('ID_msg').innerHTML=" ";
               
            }
             
            //-------------------------------------------User Name-----------------------
            if(User_Name.value=='')
            {
              User_Name.style.borderColor="red";
              document.getElementById('User_Name_msg').innerHTML="User Name Can not be Empty";

              return false;
           
            } 
            else
            {
              User_Name.style.borderColor="green";
              document.getElementById('User_Name_msg').innerHTML=" ";
            }
                 
            //-------------------------------------------Confirm Password-----------------------     
            if(pass.value=='')
            {
              pass.style.borderColor="red";
              document.getElementById('pass_msg').innerHTML="New Password Can not be Empty";

              return false;
            } 
            else
            {
              pass.style.borderColor="green";
              document.getElementById('pass_msg').innerHTML=" ";
            }



            return true;
     
        }

      </script>
</body>
</html>

