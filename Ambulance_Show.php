<!DOCTYPE html>
<html>
   <head>
      <link rel="stylesheet" href="css/common.css">
   </head>
   <body>
   </body>
</html>
<?php  
   require_once 'db_connect.php';
   
   $mysqli = new mysqli('localhost', 'root', '', 'covid_19');
   $count=0;
   if($mysqli->connect_errno>0)
   {
     die("Connection to MySQL-server failed!"); 
   }
   
   $AD_IDArr = array();//to store results
   $Vehicle_RegArr = array();
   $NameArr = array();
   $PhotoArr = array();
   $NumberArr = array();
   //to execute query
   $executingFetchQuery = $mysqli->query("SELECT AD_ID, Vehicle_Reg FROM Ambulance_Driver");
   if($executingFetchQuery)
   {
      while($arr = $executingFetchQuery->fetch_assoc())
      {
         $AD_IDArr[] = $arr['AD_ID'];//storing values into an array
         $Vehicle_RegArr[] = $arr['Vehicle_Reg'];
         $count++;
      }
   }
   
   for ($i=0; $i < $count ; $i++) 
   { 
   	$ab=$AD_IDArr[$i];
   	$sql = "SELECT Name, Mobile, Photo FROM User WHERE U_ID='".$ab."'";
     	$result = $conn->query($sql);
   
     if ($result->num_rows > 0 ) 
     {
       $row = $result->fetch_assoc(); 
       $NameArr[] = $row['Name']; 
       $NumberArr[] = $row['Mobile'];
     } 
     else 
     {
         echo "0 results";
     }
   }
   print("<div align=center style=padding-top:50px;>");
   print("<fieldset style=width:700px;>");
   print(" <legend align=center style=color:blue;><b>Ambulance Driver Information</b></legend>");
   for ($i=0; $i < $count ; $i++) 
   { 
   	print(
			   	"<form >
			   	<fieldset>
    
                   <div align=left style=float:left;> 
                     <!-- Name -->
                     <div style=padding:5px;>
                       <label class=label>Name</label>
                       :<input style=border-top-width:0px;border-bottom-width:0px;border-right-width:0px;border-left-width:0px; type='text'  value='".$NameArr[$i]."'>  
                         
                       
                     </div>
   
                     <hr>
   
                     <!--Vehicle Number-->
                     <div style=padding:5px;> 
                         <label class=label>Vehicle Number</label> 
                         :<input style=border-top-width:0px;border-bottom-width:0px;border-right-width:0px;border-left-width:0px; type='text'  value='".$Vehicle_RegArr[$i]."'> 
                     </div>
   
                     <hr>
   
                       <!--Mobile-->
                       <div style=padding:5px;> 
                         <label class=label>Mobile</label> 
                         : <input style=border-top-width:0px;border-bottom-width:0px;border-right-width:0px;border-left-width:0px; type='text'  value='".$NumberArr[$i]."'> 
         			    </div>
   
                     </div>
   
                   
		       
		       </fieldset>                                
		       </form>");
   }
    print("</fieldset>");
    print("</div>")
   ?>