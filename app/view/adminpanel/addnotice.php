<?php 
require_once("../../Config.php");
require_once (SITE_PATH."/controller/PostController.php");
$PostCon=new PostController;
$user_type=$PostCon->user_type();
if (isset($_POST) AND isset($_POST['notice_title']))
{
  $results=$PostCon->c_notice_post($_POST);
  if ($results)
    echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
}
?>
<section id="view_data" class="panel">
  <header class="panel-heading">
    New Totice Published
  </header>
  <div class="panel-body">
    <form method="POST" class="form-horizontal" role="form">
      <div class="form-group">
        <label class="control-label col-lg-2" for="inputSuccess">Notice Title</label>
        <div class="col-sm-8">
          <input class="form-control input-lg m-bot15" type="text"  name="notice_title" placeholder="Title of the notice">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2">Describe Of the Notice</label>
        <div class="col-sm-8">
          <textarea class="form-control ckeditor" name="notice_description" rows="6"></textarea>
        </div>
      </div>
      <div class="col-lg-offset-2 col-lg-5">
        <button type="submit" class="btn btn-success" value="submit_result">Submit</button>
      </div>
    </form>
  </div>
</section>
