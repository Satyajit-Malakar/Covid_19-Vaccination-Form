<?php session_start();?>
<?php
	$Login_Error = " ";
  $U_id=$User_name = $Pass = "";

	if (isset($_POST['login'])) 
	{
      require_once 'db_connect.php';


      //============================================================================================================

      //--------------------Data Insert Into Variable------------------------
      if ($_SERVER["REQUEST_METHOD"] == "POST") 
      {
        //------------User Id
        $U_id = $_POST["uid"];
        
        //------------User Name
        $User_name = $_POST["u_nam"];
       
        //--------------Password-------------
        $Pass = $_POST["pass"];
           
      }

    //-------------------Database------------------------------------------------------------------
    
		$sql = "SELECT * FROM User WHERE U_ID='".$U_id."' AND Password='".$Pass."' AND User_Name='".$User_name."' ";

		$result = $conn->query($sql);

		if ($result->num_rows > 0) 
		{
		  $row = $result->fetch_assoc();
          if($U_id[0]=='P')
          {
            //==================================Set Cookies=========================================================
  			    if (isset($_POST['checkbox1'])) 
  				  {
    					//setcookie("ID[$U_id]", $U_id, time()+(86400 * 30));
    					setcookie('ID', $U_id, time()+(86400 * 30));
    					setcookie('Pass', $Pass, time()+(86400 * 30));
    					setcookie('U_Name', $User_name, time()+(86400 * 30));
  				  }
  			    //======================================================================================================
		      
         
            //========================================================================================================

          	$_SESSION["id"] = $U_id;	
          	//header("Location: Patient_Page.php");
        		echo '<script type="text/javascript">window.location.href="Patient_Page.php";</script>';
          }

          if($U_id[0]=='A' AND $U_id[1]=='_')
          {
            //==================================Set Cookies=========================================================
          if (isset($_POST['checkbox1'])) 
          {
            //setcookie("ID[$U_id]", $U_id, time()+(86400 * 30));
            setcookie('ID', $U_id, time()+(86400 * 30));
            setcookie('Pass', $Pass, time()+(86400 * 30));
            setcookie('U_Name', $User_name, time()+(86400 * 30));
          }
      //======================================================================================================
            $_SESSION["id"] = $U_id;
            $_SESSION["Doctor"] = true;
            $_SESSION["Receptionist"] = true;
            $_SESSION["Patient"] = true;
            //header("Location: Admin_Page.php");
            echo '<script type="text/javascript">window.location.href="Admin_Page.php";</script>';
          }
          if($U_id[0]=='R')
          {
            //==================================Set Cookies=========================================================
          if (isset($_POST['checkbox1'])) 
          {
            //setcookie("ID[$U_id]", $U_id, time()+(86400 * 30));
            setcookie('ID', $U_id, time()+(86400 * 30));
            setcookie('Pass', $Pass, time()+(86400 * 30));
            setcookie('U_Name', $User_name, time()+(86400 * 30));
          }
          //======================================================================================================
            $_SESSION["id"] = $U_id;
            $_SESSION["Doctor"] = true;
            $_SESSION["Admin"] = true;
            $_SESSION["Patient"] = true;
            //header("Location: Receptionist_Page.php");
            echo '<script type="text/javascript">window.location.href="Receptionist_Page.php";</script>';
          }



		exit();
		} 

		else 
		{
      $Login_Error = "Invalid Criteria"; 
		}
		$conn->close();	
	}


	 //================================Cookie Is set or Not================================================== 
		if (isset($_COOKIE['ID']) AND isset($_COOKIE['Pass']) AND isset($_COOKIE['U_Name']) ) 
        {
        	if (empty($_POST["uid"])) 
        	{
	        	$U_id=$_COOKIE['ID'];
	        	$Pass=$_COOKIE['Pass'];
	        	$User_name=$_COOKIE['U_Name'];

	        	//echo $U_id;
        	}
        	// else
        	// {
        	// 	$U_id="";
	        // 	$Pass="";
	        // 	$User_name="";
        	// }
        	
        } 
        //=====================================================================================================
   ?>


<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" href="css/common.css">
  <script>
  function validateForm() 
  {
    var ID = document.forms["myForm"]["uid"].value;
    if (ID == "") 
    {
      alert("ID must be filled out");
      return false;
    }

    var U_Name = document.forms["myForm"]["u_nam"].value;
    if (U_Name == "") 
    {
      alert("User Name must be filled out");
      return false;
    }

    var pass = document.forms["myForm"]["pass"].value;
    if (pass == "") 
    {
      alert("Password must be filled out");
      return false;
    }
  }
  </script> 
</head>
<body>


<!-- Login.php -->
  <div align="center">
    <div align="center" class="max_size1">

        <div  class="div1">
          <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" name="myForm"  onsubmit="return validateForm()"> 
            
            
            <fieldset align="left" style="width:750px;height: 260px;">
              
              <legend align="center" style="color: blue;"><b>LOGIN</b></legend>
               
              <div class="Padding5">
                <label class="label" >ID</label>
                :<input type="text" name="uid" value="<?php echo $U_id;?>"  size="50" style="width: 290px;"><label class="error">*</label>
                
              </div>
              <hr>
              <div class="Padding5">
                <label class="label">User Name</label>
                :<input type="text" name="u_nam" value="<?php echo $User_name?>"  size="50" style="width: 290px;"><label class="error">*</label>
               
              </div>
              <hr>

              <div class="Padding5">
                <label class="label">Password</label>
                :<input type="Password" name="pass" value="<?php echo $Pass; ?>" size="50" style="width: 290px;"><label class="error">*</label>
                
              </div>
              <hr>

              <div style="padding-top:5px;">
                <input type="checkbox" name="checkbox1"  value="" size="10" style="width: 20px;">
                Remember Me
              </div>

              <div style="padding-top: 20px">
                <input type="submit" name = "login" value="Login">
                <input type="reset" value="Reset">
              </div>

              <div class="Padding5 error" >
                  <?php echo $Login_Error; ?>
              </div>  

              </div>
            </fieldset>
          </form>
        </div>  
      
    </div>
  </div>
</body>
</html>

