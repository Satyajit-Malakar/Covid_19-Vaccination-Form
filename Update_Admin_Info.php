<?php
require_once 'db_connect.php';
if (isset($_SESSION["id"])) 
{
  $id=$_SESSION["id"];
  $sql = "SELECT * FROM User WHERE U_ID='".$id."'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) 
  {
      $row = $result->fetch_assoc();
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
    <title>Update Admin</title>
   <link rel="stylesheet" href="css/All_registration.css">
</head>
<body>
<?php

$Up_Error="";

$DMY = $row["DOB"];
$arr11 = str_split($DMY);


$nameErr = $dayErr = $monthErr = $yearErr  = $genderErr = $B_GErr = "";

$name   = $row["Name"];
$day   = $arr11[0].$arr11[1]; 
$month   = $arr11[3].$arr11[4];
$year  = $arr11[6].$arr11[7].$arr11[8].$arr11[9];
$GENDER  = $row["Gender"];
$Blood_G  = $row["B_G"];



$Present_Add_Error=$Permanent_Add_Error=$Mail_Error=$Mobile_No_Error=$NID_No_Error ="";

$Present_Add  = $row["Pre_Add"];
$Permanent_Add= $row["Per_Add"];
$Mail = $row["Email"];
$Mobile_No  = $row["Mobile"];
$NID_No  = $row["NID"];



$data=" ";
$age="";
$Img_Err = " ";
//-----------------------------Image Upload-------------------------------
if (isset($_POST['Update'])) 
  {
    $permited  = array('jpg', 'jpeg', 'png');
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_temp = $_FILES['image']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
    $uploaded_image = "uploads/".$unique_image;

    if (empty($file_name)) 
    {
      $Img_Err = "Please Select an Image !";
    }
    elseif ($file_size >1048567) 
    {
      $Img_Err = "Image Size should be less then 1MB!";
    } 
    elseif (in_array($file_ext, $permited) === false) 
    {
      $Img_Err = "You can upload only:-".implode(', ', $permited) ;
    } 
    else
    {
      // move_uploaded_file($file_temp, $uploaded_image);
    }
  } 
//-----------------------------------------------------------------------

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  //echo $_POST["name1"];
}

if (isset($_POST['create'])) 
{
  if($_FILES['image']['tmp_name'] != "") 
  {
    $image=addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
  } 
}

//-------------Name
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  $flag_name =0;
  $name1 = test_input($_POST["name1"]);
  if (empty($_POST["name1"])) 
  {
    $nameErr = "Name is required";
    $flag_name = 1;
  } 

 else 
  {
    $arr1 = str_split($name1 );
    if($arr1[0] == '.' or $arr1[0] == '-')
    {
      $nameErr= "Must start with a letter";
      $flag_name = 1;
    }
    else
    {
      if(strlen($name1) >= 2)
      {
        if (!preg_match("/^[a-zA-Z .]*$/",$name1)) 
        {
          $nameErr = "Only Can contain a-z, A-Z, period only";
          $flag_name = 1;
        }
      }
      else
      {
        $nameErr= "You have to give atleast 2 characters"; 
        $flag_name = 1;
      }
    }
    if($flag_name != 1)
    {
      $name = test_input($_POST["name1"]);
      //echo $name;
    }
  }

  //------------------------DOB--------------
  $flag_DOB = 0;
  $day=test_input($_POST["Day_"]);
  if(empty($day))
  {
    $dayErr= "Day is empty. ";
    $flag_DOB = 1;
  } 
  else 
  {
    $int = (int)$day; 
    if(!($int >= 1 and $int <= 31))
    {
      $dayErr = " Day Out Of Bound. " ;
      $flag_DOB = 1;
    }
  } 
  $month=test_input($_POST['Month_']);    
  if (empty($month))
  {
    $monthErr= "Month is empty. ";
    $flag_DOB = 1;
  } 
  else 
  {
    $int2 = (int)$month; 
    if(!($int2 >= 1 and $int2 <= 12))
    {
      $monthErr = " Month Out Of Bound. ";
      $flag_DOB = 1;
    }
  }  
  $year=test_input($_POST['Year_']);    
  if (empty($year))
  {
    $yearErr = "Year is empty. ";
    $flag_DOB = 1;
  } 
  else 
  {
    $int3 = (int)$year; 
    $cy = date("Y");
    $Current_Year = (int)$cy;
    if(!($int3 >= 1900 and $int3 <= $Current_Year))
    {
      $yearErr = " Year Out of Bound. ";
      $flag_DOB = 1;
    }
  } 
  if($flag_DOB != 1)
  {
    $DOB = $day.'-'.$month.'-'.$year;
    $age =$Current_Year - $int3; 
    //echo $DOB;
  }
      //-----------Gender----------------
  if(empty($_POST["GENDER_"])) 
  {
    $genderErr = "Gender can not be Empty";
  }
  else
  {
    $GENDER = $_POST["GENDER_"];
    //echo $GENDER;
  }
    //-----------Blood Group--------------
  if(empty($_POST["B_G_"]))
  {
    $B_GErr= "Blood Group can not be empty. ";
  }
  else
  {
    $Blood_G = $_POST["B_G_"];
    //echo $Blood_G;
  }
//---------------------------contact---------------------------
  //------Present Address
  if (empty($_POST["pr_add"])) 
  {
    $Present_Add_Error = "Present Address is required";
  }
  else
  {
    $Present_Add = $_POST["pr_add"];
   // echo $Present_Add;
  }
  //------Permanent Address
  if (empty($_POST["pe_add"])) 
  {
    $Permanent_Add_Error = "Permanent Address is required";
  }
  else
  {
    $Permanent_Add = $_POST["pe_add"];
    //echo $Permanent_Add;
  }
  //------------Email
  if (empty($_POST["mail"])) 
  {
    $Mail_Error = "Mail is required";
  }
  else 
  {
    if (!filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) 
    {
      $Mail_Error = "Invalid email format";
    }
    else//output mail
    {
      $Mail = $_POST["mail"];
    }
  }

  //------------Mobile No.
  $Mobile_No1 = $_POST["m_no"];
  if (empty($_POST["m_no"])) 
  {
    $Mobile_No_Error = "Mobile number is required";
    $flag_mob = 1;
  }

  else
  {
    $mob = str_split($Mobile_No1 );
    if(strlen($Mobile_No1) != 11)
    {
      $Mobile_No_Error= "Mobile Number must contain 11 digits"; 
    }
    else if (!preg_match('/^[0-9]{11}+$/', $Mobile_No1)) 
    {  
      $Mobile_No_Error = "Invalid mobile number"; 
    }
    else
    {
      $Mobile_No = $_POST["m_no"];
      //echo $Mobile_No;
    }
  } 
  //---------------NID----------
  $NID_No = $_POST["t_no"];
  if(empty($_POST["t_no"])) 
  {
    $NID_No_Error = "Please Enter your NID Number.";
  }
  else
  {
    if(strlen($_POST["t_no"]) != 14)
    {
      $NID_No_Error = "Invalid NID Number";
    }
    else if (!preg_match('/^[0-9]{14}+$/', $NID_No)) 
    {  
      $NID_No_Error = "Invalid NID Number"; 
    }
    else
    {
      $NID_No1 = $_POST["t_no"];
    }
  }
    
}

function test_input($fun) 
{
  $fun = trim($fun);
  $fun = stripslashes($fun);
  $fun = htmlspecialchars($fun);
  return $fun;
}
?>

<!-- Regisration.php -->
  <div align="center">
    <div align="center" class="ex1">

          <div  class="pad_All">
          <!--padding: top right bottom left -->
          <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"> 
            
            
            <fieldset align="left" class="width750_height780_Dvr_Rep">
              
              <legend align="center" class="color_blue"><b>UPDATE INFORMATION</b></legend>
                <fieldset>
                  <legend>Personal Information</legend>
                <div class="float_left"> 

                  <div class="pad5px">
                    <label class="label">Name</label>
                    :<input type="text" name="name1" value="<?php echo $name; ?>" size="50" class="width290">
                    <label class="error">*</label>
                  </div>
                  <div class="pad_left135">
                    <span class="error"><?php echo $nameErr;?></span>
                  </div>
                  <hr>

                  <!--Date of Birth-->
                  <div class="pad5px"> 
                      <label class="label">Date of Birth</label> 
                      :<input type="text" value="<?php echo $day; ?>" name="Day_" size="3"> / 
                      <input type="text"value="<?php echo $month; ?>" name="Month_" size="3"> /
                      <input type="text"value="<?php echo $year; ?>" name="Year_" size="5">
                      <label class="error">*</label>
                      <label>(dd/mm/yyyy)</label>
                  </div>
                  <div class="pad_left135">
                    <span class="error"><?php echo $dayErr;?></span>
                    <label class="error">  </label> <span class="error"><?php echo $monthErr;?></span>
                    <label class="error">  </label> <span class="error"><?php echo $yearErr;?></span>
                  </div>
                   <hr>
                  <!--Gender-->
                  <div class="pad5px">

                      <label class="label">Gender</label>

                      :<input type="radio" name="GENDER_" <?php if($row['Gender']=="Male") {echo "checked";}?> value="Male" ><label>Male </label>

                      <input type="radio" name="GENDER_" <?php if($row['Gender']=="Female") {echo "checked";}?> value="Female" ><label>Female </label>

                      <input type="radio" name="GENDER_" <?php if($row['Gender']=="Other") {echo "checked";}?> value="Other" ><label>Other </label>

                      <label class="error">*</label>

                  </div> 
                  <div class="pad_left135">
                    <span class="error"><?php echo $genderErr;?></span>
                  </div> 
                  <hr>  

                  <div class="pad5px">  
                      <label class="label">Blood Group</label>
                      <select  name="B_G_"  class = "width35per">
                      <option value="" ></option>
                      <option value="A+" <?php if ($row['B_G'] == 'A+') echo ' selected="selected"'; ?>>A+</option>
                      <option value="A-" <?php if ($row['B_G'] == 'A-') echo ' selected="selected"'; ?>>A-</option>
                      <option value="B+" <?php if ($row['B_G'] == 'B+') echo ' selected="selected"'; ?>>B+</option>
                      <option value="B-" <?php if ($row['B_G'] == 'B-') echo ' selected="selected"'; ?>>B-</option>
                      <option value="O+" <?php if ($row['B_G'] == 'O+') echo ' selected="selected"'; ?>>O+</option>
                      <option value="O-" <?php if ($row['B_G'] == 'O-') echo ' selected="selected"'; ?>>O-</option>
                      <option value="AB+" <?php if ($row['B_G'] == 'AB+') echo ' selected="selected"'; ?>>AB+</option>
                      <option value="AB-" <?php if ($row['B_G'] == 'AB-') echo ' selected="selected"'; ?>>AB-</option>
                      </select>
                      <label class="error">*</label>
                  </div>

                  <div class="pad_left135">
                    <span class="error"><?php echo $B_GErr;?></span>
                  </div> 
                </div>

                <div class="float_right_width200">
                  <div class="float_right_width200_height200">
                    <img src="<?php echo $row["Photo"]; ?>" style="height: 185px;">
                  </div>
                  <div class="pad5px">
                      <input type="file" name="image" > 
                  </div>
                </div>

                
                </fieldset>
                <!-- ---------------------------------------------- -->
                <fieldset>
    
                    <legend>Contact Information</legend>
                    
                    <div class="pad5px">
                      <label class="label">Present Address</label>
                      :<input type="text" name="pr_add" value="<?php echo $Present_Add; ?>" size="50" class="width290"><label class="error">*</label>
                      <span class="error"><?php echo $Present_Add_Error;?></span>
                    </div>
                    <hr>

                    <div class="pad5px">
                      <label class="label">Permanent Address</label>
                      :<input type="text" name="pe_add" value="<?php echo $Permanent_Add; ?>" size="50" class="width290"><label class="error">*</label>
                      <span class="error"><?php echo $Permanent_Add_Error;?></span>
                    </div>
                    <hr>

                    <div class="pad5px">
                      <label class="label">Email</label>
                      :<input type="text" name="mail" value="<?php echo $Mail; ?>" size="50" class="width290"><label class="error">*</label>
                      <span class="error"><?php echo $Mail_Error;?></span>
                    </div>
                    <hr>

                    <div class="pad5px">
                      <label class="label">Mobile No</label>
                      :<input type="text" name="m_no" value="<?php echo $Mobile_No; ?>" size="50" class="width290"><label class="error">*</label>
                      <span class="error"><?php echo $Mobile_No_Error;?></span>
                    </div>
                    <hr>

                    <div class="pad5px">
                      <label class="label">NID</label>
                      :<input type="text" name="t_no" value="<?php echo   $NID_No ; ?>" size="50" class="width290"><label class="error">*</label>
                      <span class="error"><?php echo $NID_No_Error;?></span>
                    </div>
            </fieldset>
          
            <div class="pad_top20">
              <input type="submit" name="Update" value="Update">
              <input type="reset" value="Reset">
            </div>

<!----------update------->
<?php
//require_once 'db_connect.php';


if(isset(($_POST['Update'])))
{
  if(($name != "")and ($nameErr == "") and($dayErr == "")and($monthErr == "")and($yearErr == "")and($genderErr == "")and($B_GErr == "")and($Present_Add_Error == "")and($Permanent_Add_Error == "")and($Mail_Error == "")and($NID_No_Error == ""))
  {
  

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "covid_19";


    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) 
    {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE User SET Name='".$name."',DOB='".$DOB."', Gender='".$GENDER."', B_G='".$Blood_G."', Age='".$age."', Pre_Add='".$Present_Add."', Per_Add='".$Permanent_Add."', Email='".$Mail."', Mobile='".$Mobile_No."', NID='".$NID_No1."', Photo='".$uploaded_image."'  WHERE U_ID='".$id."'";

    if ($conn->query($sql) === TRUE) 
    {
      move_uploaded_file($file_temp, $uploaded_image);
      $Up_Error = "Record updated successfully";
    } 
    else 
    {
      $Up_Error = "Error updating record: " . $conn->error;
    }

    $conn->close();


  }
  
}
?>

             <div style="padding-top: 20px">
              <?php echo $Up_Error; ?>
            </div>
            </fieldset>
          </form>
        </div>  
    </div>
  </div>
</body>
</html>

