<?php session_start();?>
<?php
  $id=$_SESSION["ID1"];
  $User=$_SESSION["User"];
  $Database=$_SESSION["DataBase"];
?>

<!DOCTYPE html>
<html>
<head>
  <title>Account Info.</title>
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
  <div align="center" style="margin-left: 200px">
    <div align="center" style="padding:10px;width:850px">
      
          <div  style="padding:50px 300px 50px 110px;">
          <!--padding: top right bottom left -->
          <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"> 
            
            
            <fieldset align="left" style="width:360px;height: 220px;">
              
              <legend align="center" style="color: blue;"><b>USER Information</legend>
                
                <div style="float: left;"> 
                  <div style="padding:5px;">
                    <label style="text-align: center;color: red;margin-left: 60px;">
                      <?php 
                        echo $Database;
                      ?>
                    </label>
                  </div>

                  <!-- Name -->
                  <div style="padding:5px;">
                    <label class="label">ID</label>
                    :<label >
                      <?php 
                        echo $id;
                      ?>
                    </label>
                  </div>

                  <hr>

                  <!--User Name-->
                  <div style="padding:5px;"> 
                      <label class="label">User Name</label> 
                      :<label>
                        <?php 
                          echo $User;
                        ?>
                      </label>
                      
                  </div>

                   <hr>

                 
                  <div style="padding:5px;"> 
                      <label style="color: red;">
                        <?php 
                          echo "Please remember the User Name, ID & Password";
                        ?>
                      </label>
                      
                  </div>
        
                    <div style="padding:20px;text-align: center;"> 
                      
                       <input type="submit" name="Submit" value="Ok">
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
<?php
  if (isset($_POST['Submit'])) 
  { 
    echo '<script type="text/javascript">window.location.href="Login_final.php";</script>';
  }
?>
