<!DOCTYPE html>
<html>
<head>
<style>
	.collapsible 
	{
	  background-color: #4CAF50;
	  color: white;
	  cursor: pointer;
	  border: none;
	  text-align: left;
	  outline: none;
	  margin-top: 7px;
	  padding-bottom: 0px;
	  height: 1px;
	  padding-top: 0px;
	  padding-left: 0px;
	}

	.active, .collapsible:hover 
	{
	  background-color: #4CAF50;
	}

	.content 
	{
	  display: none;
	  overflow: hidden;
	  background-color: #4CAF50;
	}
</style>
</head>
<body>
<div class="Ref">
	<a style="text-decoration:none;color: black;" href="show_admin_info_final.php"><h2>User Information</h2></a>
</div>

<button type="button" class="collapsible"><h2 style="color: #000000;font-size: 23px;">Update Info.<h2></button>
<div class="content">
	<div>
		<h2><a style="text-decoration:none;color: #000000;" href="Update_Admin_Info_final.php">Update Information</a></h2>
	</div>

	<div>
		<h2><a style="text-decoration:none;color: #000000;" href="Admin_Change_Password_final.php">Change Password</a></h2>
	</div>
</div>

<div class="Ref">
	<h2><a style="text-decoration:none;color: black;" href="Recover_Pass_final.php">Recover Account Password</a></h2>
</div>

<div class="Ref">
	<h2><a style="text-decoration:none;color: black;" href="Send_Message_To_Patient_final.php">Inform Patient</a></h2>
</div>

<div class="Ref">
	<h2><a style="text-decoration:none;color: black;" href="Patient_Checked_final.php">Patient Checked</a></h2>
</div>

<div class="Ref">
	<h2><a style="text-decoration:none;color: black;" href="Welcome.php">Log Out</a></h2> 
</div>

<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) 
{
  coll[i].addEventListener("click", function() 
  {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") 
    {
      content.style.display = "none";
    } 
    else 
    {
      content.style.display = "block";
    }
  });
}
</script>

</body>
</html>
