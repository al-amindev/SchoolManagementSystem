<?php
require("../Config.php");
require (SITE_PATH."/controller/PostController.php");
$PostCon=new PostController;
$result=$PostCon->logout_session_client();
	header('Location: index.php');

?>