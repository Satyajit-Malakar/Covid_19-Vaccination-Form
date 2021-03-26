<?php session_start();?>
<?php
require_once 'db_connect.php';
$id=$_SESSION["id"];
if (isset($_SESSION["id"])) 
{
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
    <title>User Information</title>
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


<!-- HTML -->
  <div align="center">
    <div align="center" class="ex1">
      
          <div  class="pad_All">
          <!--padding: top right bottom left -->
          <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"> 
            
            
            <fieldset align="left" class="width750_height550">
              
              <legend align="center" class="color_blue"><b>USER INFORMATION</b></legend>
                <fieldset>
                  <legend>Personal Information</legend>
                <div class="float_left"> 
                  <!-- Name -->
                  <div class="pad5px">
                    <label class="label">Name</label>
                    :<label >
                      <?php 
                        echo $row["Name"];
                      ?>
                    </label>
                  </div>

                  <hr>

                  <!--Date of Birth-->
                  <div class="pad5px"> 
                      <label class="label">Date of Birth</label> 
                      :<label>
                        <?php 
                          echo $row["DOB"];
                        ?>
                      </label>
                      <label>(dd/mm/yyyy)</label>
                  </div>
        
                   <hr>
                  <!--Gender-->
                  <div class="pad5px">

                      <label class="label">Gender</label>
                      :<label >
                      <?php 
                        echo $row["Gender"];
                      ?>
                      </label>
                  </div> 
                  
                  <hr>  

                  <div class="pad5px">  
                      <label class="label">Blood Group</label>
                      :<label >
                        <?php 
                          echo $row["B_G"];
                        ?>
                      </label>
                  </div> 
                </div>

                <div class="float_right_width200">
                  <img src="<?php echo $row["Photo"]; ?>" style="height: 190px;">
                </div>

                
                </fieldset>
                <!-- ---------------------------------------------- -->
                <fieldset>
    
                    <legend>Contact Information</legend>
                    
                    <div class="pad5px">
                      <label class="label">Present Address</label>
                      :<label>
                        <?php 
                          echo $row["Pre_Add"];
                        ?>
                      </label>
                    </div>
                    <hr>

                    <div class="pad5px">
                      <label class="label">Permanent Address</label>
                      :<label>
                        <?php 
                          echo $row["Per_Add"];
                        ?>
                      </label>
                    </div>
                    <hr>

                    <div class="pad5px">
                      <label class="label">Email</label>
                      :<label>
                        <?php 
                          echo $row["Email"];
                        ?>
                      </label>
                    </div>
                    <hr>

                    <div class="pad5px">
                      <label class="label">Mobile No</label>
                      :<label>
                        <?php 
                          echo $row["Mobile"];
                        ?>
                      </label>
                    </div>
                    <hr>

                    <div class="pad5px">
                      <label class="label">NID No</label>
                      :<label>
                        <?php 
                          echo $row["NID"];
                        ?>
                      </label>
                    </div>
                </fieldset>
            </fieldset>
          </form>
        </div>  
        
    </div>
  </div>
</body>
</html>

