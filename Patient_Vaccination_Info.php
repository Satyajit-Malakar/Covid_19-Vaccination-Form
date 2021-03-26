<?php
  $ID_Error = " ";
  $P_Name="";
  $U_id="";
  $D_name1 = $D_name2 = "";
  $D_nameErr1 = $D_nameErr2 = "";
  $dayErr1 = $monthErr1 = $yearErr1  ="";
  $dayErr2 = $monthErr2 = $yearErr2  ="";
  $day1=$month1=$year1="";
  $day2=$month2=$year2="";
  $H_NErr="";
  $H_N="";
  $Date1=$Date2="";
  $Up_Error="";
  $name1=$name2="";
  $Done="";
  $P_Age="";
  $D_H="";
  require_once 'db_connect.php';
  $id=$_SESSION["id"];
  if (isset($_SESSION["id"])) 
  {
    
  }
  else
  {
    echo '<script type="text/javascript">window.location.href="Welcome.php";</script>';
  }
               
//==========================ID Search======================
  if (isset($_POST['search'])) 
  {
    $U_id1 = $_POST["uid"];
    if(empty($U_id1))
    {
      $ID_Error= "ID is empty.";
    } 
    else
    {
      $U_id = $_POST["uid"];
      if($U_id[0]=='P')
      {
        $sql = "SELECT * FROM User WHERE U_ID='".$U_id."'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) 
        {
            $row = $result->fetch_assoc();
            $P_Name=$row["Name"];
            $P_Age=$row["Age"];
            
        } 
        else 
        {
          $ID_Error="ID is Not Found";
        }

      //========================Patient Search====================
      $sql2 = "SELECT * FROM patient WHERE P_ID='".$U_id."'";
      $result2 = $conn->query($sql2);
       if ($result2->num_rows > 0) 
        {
            $row2 = $result2->fetch_assoc();
            $D_H=$row2["Disease_History"];
            if ($row2["H_Name"]=="No Hospital is assigned. Please Wait for message") 
            {
              $H_N="";
            }
            else
            {
              $H_N=$row2["H_Name"];
            }
            //======================1st=======================================
            if($row2["First_Vaccine_Date"]=="No Date")
            {
              $Date1="";
            }
            else
            {
              $DMY = $row2["First_Vaccine_Date"];
              $arr11 = str_split($DMY);

              $day1   = $arr11[0].$arr11[1]; 
              $month1   = $arr11[3].$arr11[4];
              $year1  = $arr11[6].$arr11[7].$arr11[8].$arr11[9];
            }

            if ($row2["D_Name_1"]=="No Doctor name") 
            {
              $D_name1="";
            }
            else
            {
              $D_name1=$row2["D_Name_1"];
            }
            //=========================================2nd==========================
            if($row2["Second_Vaccine_Date"]=="No Date")
            {
              $Date2="";
            }
            else
            { 
              $DMY2 = $row2["Second_Vaccine_Date"];
              $arr12 = str_split($DMY2);

              $day2   = $arr12[0].$arr12[1]; 
              $month2   = $arr12[3].$arr12[4];
              $year2  = $arr12[6].$arr12[7].$arr12[8].$arr12[9];
            }

            if ($row2["D_Name_2"]=="No Doctor name") 
            {
              $D_name2="";
            }
            else
            {
              $D_name2=$row2["D_Name_2"];
            }
            if (!empty($H_N )and !empty($DMY) and !empty($D_name1) and !empty($DMY2) and !empty($D_name2)) 
            {
              $Done="Vaccination is Complete";
              //echo "HI";
            }
            else
            {
              $Done="";
            }
        } 
        else 
        {
        }
        //==================================================
        $conn->close();
      }
      else
      {
        $ID_Error="Invalid Patient ID";
      }
    }
  }
 // ==================Hospital Name=============
if (isset($_POST['save0'])) 
{
  
    $U_id1 = $_POST["uid"];
    if(empty($U_id1))
    {
      $ID_Error= "ID is empty.";
    } 
    else
    {
      $U_id = $_POST["uid"];
      if($U_id[0]=='P')
      {
        $sql = "SELECT * FROM User WHERE U_ID='".$U_id."'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) 
        {
            $row = $result->fetch_assoc();
            $P_Name=$row["Name"];
            $P_Age=$row["Age"];
        } 
        else 
        {
          $ID_Error="ID is Not Found";
        }

      $sql2 = "SELECT * FROM patient WHERE P_ID='".$U_id."'";
      $result2 = $conn->query($sql2);
      if ($result2->num_rows > 0) 
      {
        $row2 = $result2->fetch_assoc();
        $D_H=$row2["Disease_History"];
      }

        $conn->close();
      }
      else
      {
        $ID_Error="Invalid Patient ID";
      }
    }

  $H_N = $_POST["H_N"];
  if(empty($H_N))
  {
    $H_NErr="Hospital Name Can not be Empty";
  }
}


//==========================First Dose=================

if (isset($_POST['save1'])) 
{
 
  $U_id1 = $_POST["uid"];
    if(empty($U_id1))
    {
      $ID_Error= "ID is empty.";
    } 
    else
    {
      $U_id = $_POST["uid"];
      if($U_id[0]=='P')
      {
        $sql = "SELECT * FROM User WHERE U_ID='".$U_id."'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) 
        {
            $row = $result->fetch_assoc();
            $P_Name=$row["Name"];
            $P_Age=$row["Age"];
            
        } 
        else 
        {
          $ID_Error="ID is Not Found";
        }

      $sql2 = "SELECT * FROM patient WHERE P_ID='".$U_id."'";
      $result2 = $conn->query($sql2);
      if ($result2->num_rows > 0) 
      {
        $row2 = $result2->fetch_assoc();
        $D_H=$row2["Disease_History"];
      }

        $conn->close();
      }
      else
      {
        $ID_Error="Invalid Patient ID";
      }
    }

  //==========================================================================
  $H_N = $_POST["H_N"];
  if(empty($H_N))
  {
    $H_NErr="Hospital Name Can not be Empty";
  }
  //==========================================================================

      //------------------------Date 1--------------
      $flag_DOB1 = 0;
      $day1=test_input($_POST["Day_1"]);
      if(empty($day1))
      {
        $dayErr1= "Day is empty. ";
        $flag_DOB1 = 1;
      } 
      else 
      {
        $int = (int)$day1; 
        if(!($int >= 1 and $int <= 31))
        {
          $dayErr1 = " Day Out Of Bound. " ;
          $flag_DOB1 = 1;
        }
      } 
      $month1=test_input($_POST['Month_1']);    
      if (empty($month1))
      {
        $monthErr1= "Month is empty. ";
        $flag_DOB1 = 1;
      } 
      else 
      {
        $int2 = (int)$month1; 
        if(!($int2 >= 1 and $int2 <= 12))
        {
          $monthErr1 = " Month Out Of Bound. ";
          $flag_DOB1 = 1;
        }
      }  
      $year1=test_input($_POST['Year_1']);    
      if (empty($year1))
      {
        $yearErr1 = "Year is empty. ";
        $flag_DOB1 = 1;
      } 
      else 
      {
        $int3 = (int)$year1; 
        $cy = date("Y");
        $Current_Year = (int)$cy;
        if(!($int3 >= 1900 and $int3 <= $Current_Year))
        {
          $yearErr1 = " Year Out of Bound. ";
          $flag_DOB1 = 1;
        }
      } 
      if($flag_DOB1 != 1)
      {
        $Date1 = $day1.'-'.$month1.'-'.$year1;
      }
//==================D1 name=====================================
  $flag_name =0;
  $name1 = test_input($_POST["D_name1"]);
  if (empty($_POST["D_name1"])) 
  {
    $D_nameErr1= "Doctor/Nurse Name Can not be Empty.";
    $flag_name = 1;
  } 

 else 
  {
    $arr1 = str_split($name1);
    if($arr1[0] == '.')
    {
      $D_nameErr1= "Must start with a letter";
      $flag_name = 1;
    }
    else
    {
      if(strlen($name1) >= 2)
      {
        if (!preg_match("/^[a-zA-Z . ]*$/",$name1)) 
        {
          $D_nameErr1 = "Name only Can contain a-z, A-Z";
          $flag_name = 1;
        }
      }
      else
      {
        $D_nameErr1= "You have to give atleast 2 characters"; 
        $flag_name = 1;
      }
    }
    if($flag_name != 1)
    {
      $D_name1 = test_input($_POST["D_name1"]);
    }
  }
}


//==========================Second Dose=================

if (isset($_POST['save2'])) 
{
  $U_id1 = $_POST["uid"];
    if(empty($U_id1))
    {
      $ID_Error= "ID is empty.";
    } 
    else
    {
      $U_id = $_POST["uid"];
      if($U_id[0]=='P')
      {
        $sql = "SELECT * FROM User WHERE U_ID='".$U_id."'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) 
        {
            $row = $result->fetch_assoc();
            $P_Name=$row["Name"];
            $P_Age=$row["Age"];
            
        } 
        else 
        {
          $ID_Error="ID is Not Found";
        }

        $sql2 = "SELECT * FROM patient WHERE P_ID='".$U_id."'";
        $result2 = $conn->query($sql2);
        if ($result2->num_rows > 0) 
        {
          $row2 = $result2->fetch_assoc();
          $D_H=$row2["Disease_History"];
        }

        $conn->close();
      }
      else
      {
        $ID_Error="Invalid Patient ID";
      }
    }

  //==========================================================================
  $H_N = $_POST["H_N"];
  if(empty($H_N))
  {
    $H_NErr="Hospital Name Can not be Empty";
  }
  //==========================================================================
  //------------------------Date 1--------------
      $flag_DOB1 = 0;
      $day1=test_input($_POST["Day_1"]);
      if(empty($day1))
      {
        $dayErr1= "Day is empty. ";
        $flag_DOB1 = 1;
      } 
      else 
      {
        $int = (int)$day1; 
        if(!($int >= 1 and $int <= 31))
        {
          $dayErr1 = " Day Out Of Bound. " ;
          $flag_DOB1 = 1;
        }
      } 
      $month1=test_input($_POST['Month_1']);    
      if (empty($month1))
      {
        $monthErr1= "Month is empty. ";
        $flag_DOB1 = 1;
      } 
      else 
      {
        $int2 = (int)$month1; 
        if(!($int2 >= 1 and $int2 <= 12))
        {
          $monthErr1 = " Month Out Of Bound. ";
          $flag_DOB1 = 1;
        }
      }  
      $year1=test_input($_POST['Year_1']);    
      if (empty($year1))
      {
        $yearErr1 = "Year is empty. ";
        $flag_DOB1 = 1;
      } 
      else 
      {
        $int3 = (int)$year1; 
        $cy = date("Y");
        $Current_Year = (int)$cy;
        if(!($int3 >= 1900 and $int3 <= $Current_Year))
        {
          $yearErr1 = " Year Out of Bound. ";
          $flag_DOB1 = 1;
        }
      } 
      if($flag_DOB1 != 1)
      {
        $Date1 = $day1.'-'.$month1.'-'.$year1;
      }
      //=========================D1===============================
   $flag_name =0;
  $name1 = test_input($_POST["D_name1"]);
  if (empty($_POST["D_name1"])) 
  {
    $D_nameErr1= "Doctor/Nurse Name Can not be Empty.";
    $flag_name = 1;
  } 

 else 
  {
    $arr1 = str_split($name1);
    if($arr1[0] == '.')
    {
      $D_nameErr1= "Must start with a letter";
      $flag_name = 1;
    }
    else
    {
      if(strlen($name1) >= 2)
      {
        if (!preg_match("/^[a-zA-Z . ]*$/",$name1)) 
        {
          $D_nameErr1 = "Name only Can contain a-z, A-Z";
          $flag_name = 1;
        }
      }
      else
      {
        $D_nameErr1= "You have to give atleast 2 characters"; 
        $flag_name = 1;
      }
    }
    if($flag_name != 1)
    {
      $D_name1 = test_input($_POST["D_name1"]);
    }
  }
  //============================================================================
      //------------------------Date 2--------------
      $flag_DOB2 = 0;
      $day2=test_input($_POST["Day_2"]);
      if(empty($day2))
      {
        $dayErr2= "Day is empty. ";
        $flag_DOB2 = 1;
      } 
      else 
      {
        $int = (int)$day2; 
        if(!($int >= 1 and $int <= 31))
        {
          $dayErr2 = " Day Out Of Bound. " ;
          $flag_DOB2 = 1;
        }
      } 
      $month2=test_input($_POST['Month_2']);    
      if (empty($month2))
      {
        $monthErr2= "Month is empty. ";
        $flag_DOB2 = 1;
      } 
      else 
      {
        $int2 = (int)$month2; 
        if(!($int2 >= 1 and $int2 <= 12))
        {
          $monthErr2 = " Month Out Of Bound. ";
          $flag_DOB2 = 1;
        }
      }  
      $year2=test_input($_POST['Year_2']);    
      if (empty($year2))
      {
        $yearErr2 = "Year is empty. ";
        $flag_DOB2 = 1;
      } 
      else 
      {
        $int3 = (int)$year2; 
        $cy = date("Y");
        $Current_Year = (int)$cy;
        if(!($int3 >= 1900 and $int3 <= $Current_Year))
        {
          $yearErr2 = " Year Out of Bound. ";
          $flag_DOB2 = 1;
        }
      } 
      if($flag_DOB2 != 1)
      {
        $Date2 = $day2.'-'.$month2.'-'.$year2;
      }
//=============================D2================================================
  $flag_name1 =0;
  $name2 = test_input($_POST["D_name2"]);
  if (empty($_POST["D_name2"])) 
  {
    $D_nameErr2= "Doctor/Nurse Name Can not be Empty.";
    $flag_name1 = 1;
  } 

 else 
  {
    $arr2 = str_split($name2);
    if($arr2[0] == '.' )
    {
      $D_nameErr2= "Must start with a letter";
      $flag_name1 = 1;
    }
    else
    {
      if(strlen($name2) >= 2)
      {
        if (!preg_match("/^[a-zA-Z . ]*$/",$name2)) 
        {
          $D_nameErr2 = "Name only Can contain a-z, A-Z";
          $flag_name1 = 1;
        }
      }
      else
      {
        $D_nameErr1= "You have to give atleast 2 characters"; 
        $flag_name1 = 1;
      }
    }
    if($flag_name1 != 1)
    {
      $D_name2 = test_input($_POST["D_name2"]);
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
<!DOCTYPE html>
<html>
<head>
  <style type="">
    .label2
    {
      width: 140px;
      display: inline-block;
    }
  </style>
  <link rel="stylesheet" href="css/common.css">
</head>
<body>


<!-- Login.php -->
  <div align="center">
    <div align="center" class="max_size1">

        <div  class="div1">
          <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" > 
          <fieldset align="left" style="width:750px;height: 800px;">  
            <legend align="center" style="color: blue;"><b>Vaccination Info.</b></legend>
            <fieldset align="left" style="width:750px;height: 200px;">
              
              <!-- Patient Name -->
              <legend style="color: blue;">Patient Info.</legend>
              <div class="Padding5">
                <label class="label2" >ID</label>
                :<input type="text" name="uid" value="<?php echo $U_id;?>"  size="50" style="width: 290px;"  placeholder="Example: P_100000"><label class="error">*</label>
                <input type="submit" name = "search" value="Search"><span class="error" style="margin-left: 5px;"><?php echo $ID_Error; ?></span>
                
              </div> 

              <hr>
                <div class="pad5px">
                    <label class="label2">Name</label>
                    :<label >
                      <?php 
                        echo $P_Name;
                      ?>
                    </label>
                    <label style="color: red;">
                      <?php 
                        if (!empty($Done)) 
                        {
                          echo "( ".$Done." )";
                        } 
                      ?>
                    </label>
                  </div>
              <hr>
              <div class="pad5px">
                    <label class="label2">Age</label>
                    :<label >
                      <?php 
                        echo $P_Age;
                      ?>
                    </label>
              </div>
              <hr>
              <div class="pad5px">
                    <label class="label2">Disease History</label>
                    :<label >
                      <?php 
                        echo $D_H;
                      ?>
                    </label>
              </div>
              <hr>
              </fieldset>

              <!-- Hospital Name -->
              <fieldset align="left" style="width:750px;height: 110px;">
              
              <legend  style="color: blue;">Hospital Name</legend>
               
               <div class="Padding5">
                <label class="label2" >Hospital Name</label>
                :<input type="text" name="H_N" value="<?php echo $H_N;?>"  size="50" style="width: 290px;"  placeholder="Example: Dhaka Medical Collage, Dhaka"><label class="error">*</label><span class="error" style="margin-left: 5px;"><?php  echo $H_NErr;?></span>
                
              </div> 
              <hr>
              <div class="Padding5">
                </label>
                <input type="submit" name = "save0" value="Save Info.">
              </div>
              <hr>

              </fieldset>

              <!-- First Vacc -->
              <fieldset align="left" style="width:750px;height: 190px;">
                <legend style="color: blue;">First Vaccination Info.</legend>
                <div class="Padding5">
                  <label class="label2">Doctor/Nurse Name:</label>
                  :<input type="text" name="D_name1" value="<?php echo $D_name1?>"  size="50" style="width: 290px;" placeholder="Example: Dr. Sayed Uddin"><label class="error">*</label>
                  <span class="error" style="margin-left: 5px;"><?php  echo $D_nameErr1;?></span>
                 
                </div>
                <hr>

                 <div class="pad5px"> 
                      <label class="label2">Date</label> 
                      :<input type="text" value="<?php echo $day1; ?>" name="Day_1" size="3"  placeholder="Ex: 01"> / 
                      <input type="text" value="<?php echo $month1; ?>" name="Month_1" size="3"  placeholder="Ex: 01"> /
                      <input type="text" value="<?php echo $year1; ?>" name="Year_1" size="5"  placeholder="Ex: 2021">
                      <label class="error">*</label>
                      <label>(dd/mm/yyyy)</label>
                  </div>
                  <div style="padding-left: 150px;">
                    <span class="error"><?php echo $dayErr1;?></span>
                    <label class="error">  </label> <span class="error"><?php echo $monthErr1;?></span>
                    <label class="error">  </label> <span class="error"><?php echo $yearErr1;?></span>
                  </div>
                <hr>
                <div style="padding-top: 20px">
                <input type="submit" name = "save1" value="Save Info.">
              </div>
              <hr>
               </fieldset>
              
              <!-- Second Vacc -->
              <fieldset align="left" style="width:750px;height: 200px;">
                <legend style="color: blue;">Second Vaccination Info.</legend>
                <div class="Padding5">
                  <label class="label2">Doctor/Nurse Name:</label>
                  :<input type="text" name="D_name2" value="<?php echo $D_name2?>"  size="50" style="width: 290px;" placeholder="Example: Dr. Sayed Uddin"><label class="error" placeholder="Example: Dr. Sayed Uddin">*</label>
                  <span class="error" style="margin-left: 5px;"><?php  echo $D_nameErr2;?></span>
                 
                </div>
                <hr>

                <div class="pad5px"> 
                      <label class="label2">Date</label> 
                      :<input type="text" value="<?php echo $day2; ?>" name="Day_2" size="3"  placeholder="Ex: 01"> / 
                      <input type="text" value="<?php echo $month2; ?>" name="Month_2" size="3"  placeholder="Ex: 01"> /
                      <input type="text" value="<?php echo $year2; ?>" name="Year_2" size="5"  placeholder="Ex: 2021">
                      <label class="error">*</label>
                      <label>(dd/mm/yyyy)</label>
                  </div>
                  <div style="padding-left: 150px;">
                    <span class="error"><?php echo $dayErr2;?></span>
                    <label class="error">  </label> <span class="error"><?php echo $monthErr2;?></span>
                    <label class="error">  </label> <span class="error"><?php echo $yearErr2;?></span>
                  </div>
                <hr>
                <div style="padding-top: 20px">
                <input type="submit" name = "save2" value="Save Info.">
              </div>
              <hr>
<?php
//===============================================================================================save0=============================
if(isset(($_POST['save0'])))
{
  if(($P_Name != "")and ($H_NErr == ""))
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

    $sql = "UPDATE patient SET H_Name='".$H_N."'  WHERE P_ID='".$U_id."'";

    if ($conn->query($sql) === TRUE) 
    {
      $Up_Error = "Record updated successfully";
    } 
    else 
    {
      $Up_Error = "Error updating record: " . $conn->error;
    }

    $conn->close();


  }
  
}
//====================================================Save1==============================================================
if(isset(($_POST['save1'])))
{
  if(($P_Name != "") and($dayErr1 == "")and($monthErr1 == "")and($yearErr1 == "")and($D_nameErr1 == "")and($H_NErr == ""))
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

    $sql = "UPDATE patient SET H_Name='".$H_N."',First_Vaccine_Date='".$Date1."', D_Name_1='".$D_name1."' WHERE P_ID='".$U_id."'";

    if ($conn->query($sql) === TRUE) 
    {
      $Up_Error = "Record updated successfully";
    } 
    else 
    {
      $Up_Error = "Error updating record: " . $conn->error;
    }

    $conn->close();


  }
  
}
//=======================================Save2==========================================================================
if(isset(($_POST['save2'])))
{
  if(($P_Name != "") and($dayErr1 == "")and($monthErr1 == "")and($yearErr1 == "")and($dayErr2 == "")and($monthErr2 == "")and($yearErr2 == "")and($D_nameErr1 == "")and($D_nameErr2 == "")and($H_NErr == ""))
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

    $sql = "UPDATE patient SET H_Name='".$H_N."',First_Vaccine_Date='".$Date1."', D_Name_1='".$D_name1."', Second_Vaccine_Date='".$Date2."', D_Name_2='".$D_name2."'  WHERE P_ID='".$U_id."'";

    if ($conn->query($sql) === TRUE) 
    {
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
              <div class="pad5px"><span><?php echo $Up_Error; ?></span></div>
               </fieldset>

              </div>
          </fieldset>
          </form>
        </div>  
      
    </div>
  </div>
</body>
</html>

