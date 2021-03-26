<?php
  if (isset($_POST['OK'])) 
    {
      echo '<script type="text/javascript">window.location.href="Admin_Page.php";</script>';

    } 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Password Recover Confirmation</title>
</head>
<body>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
    <fieldset  align="center" style="width:200px;height: 50px; margin-left: 600px;margin-top: 200px;font-size: 17px;color: red;">
      <div align="center">
        <?php echo "Password has been Updated"; ?> 
      </div>
      <div align="center" style="padding-top: 10px;">
       <input type="submit" style="color: blue;" name = "OK" value="Ok">
      </div>
    </fieldset>
  </form>
</body>
</html>