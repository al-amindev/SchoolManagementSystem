<?php 
require_once("../../Config.php");
require_once (SITE_PATH."/controller/PostController.php");
$PostCon=new PostController;
if (isset($_GET) AND isset($_GET['subject_id']) AND isset($_GET['user_id'])) 
{
  $subject_id=$_GET['subject_id'];
  $user_id=$_GET['user_id'];
  $resultss=$PostCon->c_assign_teacher_update($subject_id,$user_id);
  if ($resultss) {
    echo "Success";
  }
}
?>