<?php
//Enable and disable option
require("../../Config.php");
require (SITE_PATH."/controller/PostController.php");
$PostCon=new PostController;
$user_id=$_GET['id'];
$fild=$_GET['fild'];
$table=$_GET['t'];
$value=$_GET['value'];
$primary_fild=$_GET['p_id'];
$ret=$_GET['ret'];
$result=$PostCon->c_chage_state($user_id,$fild,$table,$value,$primary_fild);
if ($result)
{
	header('location:'.'index.php?page='.$ret);
}
	?>