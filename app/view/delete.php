<?php
//delete any file or fild
require("../Config.php");
require (SITE_PATH."/controller/PostController.php");
$PostCon=new PostController;
$user_id=$_GET['id'];
$table=$_GET['t'];
$primary_fild=$_GET['p_id'];
$result=$PostCon->c_delete($user_id,$table,$primary_fild);
if ($result) {
	header('location:user_list_admin.php');
}

?>