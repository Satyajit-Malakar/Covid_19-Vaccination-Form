<!DOCTYPE html>
<html>
   <head>
      <link rel="stylesheet" href="css/common.css">
      <link rel="stylesheet" href="css/sm.css">
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
 
    $Name = array();//to store results
    $NID = array();
    $Age = array();
    $Mobile = array();
    $P_ID = array();
    $Flag=0;


   $Message = array();
   //to execute query
   $executingFetchQuery = $mysqli->query("SELECT * FROM patient");
   if($executingFetchQuery)
   {
      while($arr = $executingFetchQuery->fetch_assoc())
      {
         $P_ID[] = $arr['P_ID'];//storing values into an array
         $Message[] = $arr['Message']; 
         $count++;
      }
   }

  for ($i=0; $i < $count ; $i++) 
  { 

    $ab=$P_ID[$i];
    $sql = "SELECT * FROM User WHERE U_ID='".$ab."'";
    $result = $conn->query($sql);
   
    if ($result->num_rows > 0 ) 
    {
      $row = $result->fetch_assoc(); 
      $Name[] = $row['Name'];//storing values into an array
      $NID[] = $row['NID'];
      $Age[] = $row['Age'];
      $Mobile[] = $row['Mobile'];
    } 
    else 
    {
      echo "0 results";
    }
  }
   print("<div align=center style=padding-top:50px;>");
   print("<fieldset style=width:700px;>");
   print(" <legend align=center style=color:blue;><b>PATIENT CHECKED</b></legend>");
   for ($i=1; $i < $count ; $i++) 
   { 
    $Error="";
    if ($Message[$i]==1) 
    {
    $Flag=1;
    print(
          "<form method=post >
          <fieldset>
                    
                   <div align=left style=float:left;>

                      <!-- ID -->
                      <div style=padding:5px;>
                        <label class=label>Patient ID</label>
                        :<input style=border-top-width:0px;border-bottom-width:0px;border-right-width:0px;border-left-width:0px; type='text' name=id value='".$P_ID[$i]."' >  
                      </div>
                      <hr>
                         

                     <!-- Name -->
                     <div style=padding:5px;>
                       <label class=label>Name</label>
                       :<input style=border-top-width:0px;border-bottom-width:0px;border-right-width:0px;border-left-width:0px; type='text' name=Name  value='".$Name[$i]."'>  
                         
                       
                     </div>
   
                     <hr>

                     <!-- Age -->
                     <div style=padding:5px;>
                       <label class=label>Age</label>
                       :<input style=border-top-width:0px;border-bottom-width:0px;border-right-width:0px;border-left-width:0px; type='text'  value='".$Age[$i]."'>  
                         
                       
                     </div>
   
                     <hr>

                     <!-- Mobile -->
                     <div style=padding:5px;>
                       <label class=label>Number</label>
                       :<input style=border-top-width:0px;border-bottom-width:0px;border-right-width:0px;border-left-width:0px; type='text' name=Number value='".$Mobile[$i]."'>  
                         
                       
                     </div>
   
                     <hr>
   
                       <!--NID-->
                       <div style=padding:5px;> 
                         <label class=label>NID</label> 
                         :<input style=border-top-width:0px;border-bottom-width:0px;border-right-width:0px;border-left-width:0px; type='text'  value='".$NID[$i]."'> 
                      </div>

                      <hr>
                     

                      <div>
                        <button type=submit class=button  name=Login >Re-send</button>
                      </div>
                   </div>
           <div>

           </fieldset>                                
           </form>");
        $Error="";
        }
    
    }
    if($Flag==0)
    {
      $Error="No Information is Available";
      print(
        "<form method=post >      
          <div>
            <div style=padding:30px;>
              <input style=border-top-width:0px;border-bottom-width:0px;border-right-width:0px;border-left-width:0px;width:350px;margin-left:30px;font-size:28px;  type='text'  value='".$Error."'> 
            </div> 
          </div>
        </form>");
        }
  
      print("</fieldset>");
    print("</div>");
 
   ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{ 
  if(isset(($_POST['Login'])))
  {
    $_SESSION["P_ID"] = $_POST['id'];
    $_SESSION["Name"] = $_POST['Name'];
    $_SESSION["Number"] = $_POST['Number'];
    //echo  $_POST['Number'];

    echo '<script type="text/javascript">window.location.href="Re_Send_Message.php";</script>';
  }
}
?>