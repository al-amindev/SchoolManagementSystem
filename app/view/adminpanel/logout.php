<?php 
require_once("../../Config.php");
require_once (SITE_PATH."/controller/PostController.php");
$PostCon=new PostController;
 $result=$PostCon->logout_session();
 header('Location:login.php');
    ?>