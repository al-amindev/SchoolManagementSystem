<?php 
require_once("../../Config.php");
require_once (SITE_PATH."/controller/PostController.php");
if (isset($_GET) AND !empty($_GET) AND $_GET['u']!=="")
	{	$PostCon=new PostController;
		$result=$PostCon->c_check_user_before_login($_GET['u']);
		if ($result==TRUE) 
			echo "<b style='color:green'> Correct User name or email</b>";
		else
			echo "<b style='color:red'> Please type correct username or email</b>";
	}
	?>