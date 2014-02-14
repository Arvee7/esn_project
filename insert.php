<html>
<head>
	<link rel="stylesheet" type="text/css" href="mycss.css" />
</head>
<?php
    
	require_once('conection.php');
	if(isset($_REQUEST["submit"]))
	{
		$username = $_REQUEST['username'];	
		
				$sql = "insert into user_login(user_first_name,user_last_name,user_username,user_email_id,user_password) values('$_POST[firstname]','$_POST[lastname]','$_POST[username]','$_POST[emailid]','$_POST[pass]')";				
				
				$sql1 = mysql_query($sql);
				if($sql1)
				{
					session_start();
					
					$_SESSION['success'] = "true";
					$sql2 = "select * from user_login where user_username = '$username'";
					$query = mysql_query($sql2) or die('could not updated:'.mysql_error());
					if(mysql_num_rows($query) == 1)
					{
						
						$n_row = mysql_fetch_array($query);
						$_SESSION["user_LID"] = $n_row["user_login_id"];
						header("location:../esn_project/User_Home.php?id=".$_SESSION['user_LID']);
					}
				}	
				else
				{
					$_SESSION['success'] = 'false';
					echo "Registration unsuccessful";
					unset($_SESSION['success']);
				}
	}
?>
</html>
