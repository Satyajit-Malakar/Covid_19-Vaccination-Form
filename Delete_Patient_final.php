<?php 
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
   <link rel="stylesheet" href="css/sm.css">
   <style>
    .x
  { 
    /*float:left;*/
    /*border-right:  1px solid #4CAF50;*/
      padding-left: 10px;
      padding-right: 20px;
      padding-bottom: 205px;
      background-color: #4CAF50;
  }
  .y
  {
     /* padding-top: 5px;
      height: 19px;*/
     /* float: right;*/
      padding-bottom: 280px;
      /*padding-top: 10px;*/
      padding-left: 10px;

  }
   </style>
</head>
<body>
  <div style="width:100%;clear: both;">
    <!-- Header-->
    <div>
      <?php include 'Header.php' ?>     
    </div>
    <!-- Header2 -->
    <div>
      <?php include 'Header2.php' ?>      
    </div>
  </div>
    <!-------------------------------------------------------------------------------------------------->
  <div style="width:100%;">
    <div>
      <div class="x" style="float: left;height: 230px;">
        <?php
          include 'Patient_Reference.php';
        ?>
      </div>
      <!-- -------------------------------------------------------->
      <div class="y" style="padding-left: 50px;height: 320px;padding-bottom: 100px;">
        <?php include 'Delete_Patient.php' ?>
      </div>
  
    </div>
  </div>  
    <!-------------------------------------------------------------------------------------------------->
    <!-- Footer-->
  <div style="width:100%">
    <div style="background-color: #4CAF50;clear: both;">
      <?php include 'Footer.php' ?> 
    </div>
  </div>
</body>
</html>