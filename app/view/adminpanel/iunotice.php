<?php 
require_once("../../Config.php");
require_once (SITE_PATH."/controller/PostController.php");
$PostCon=new PostController;
$user_type=$PostCon->user_type();
?>
<!-- Update the Data-->
<!-- ///////////////////////////////////////////////////////////////// -->
<?php  if (isset($_GET) AND isset($_GET['id']))
{ if (isset($_POST) AND isset($_POST['notice_title']))
  {
    $_POST['modify_date']=date('Y-m-d h:i:s');
      $_POST['notice_file']=$PostCon->upload_image($_FILES,'notice/');
     $results=$PostCon->update_data('notice',$_POST,$_GET['id']);
    if ($results)
    {
    echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
    }
  }

  $datas=$PostCon->select_one('notice','notice_id='.$_GET['id']);
  foreach ($datas as $data) {} ?>
<section id="view_data" class="panel">
  <header class="panel-heading">
    New Totice Published
  </header>
  <div class="panel-body">
    <form method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
      <div class="form-group">
      <label class="control-label col-lg-2" for="inputSuccess">Notice Title</label>
        <div class="col-sm-8">
           <input class="form-control input-lg m-bot15" type="text"  name="notice_title" value="<?php echo $data['notice_title'] ?>">
        </div>
      </div>
      <div class="form-group">
          <label class="control-label col-sm-2">Describe Of the Notice</label>
          <div class="col-sm-8">
              <textarea class="form-control" name="notice_description" rows="7"><?php echo $data['notice_description'] ?></textarea>
          </div>
      </div>
      <div class="form-group">
      <label class="control-label col-lg-2">notice Cover Photo</label>
        <div class="col-sm-5">
           <input type="file"  name="image" placeholder="notice Image">
        </div>
      </div>
      <div class="col-lg-offset-2 col-lg-5">
        <button type="submit" class="btn btn-success" value="submit_result">Submit</button>
      </div>
    </form>
  </div>
</section>

<?php 
} 
else 
//////////////////////////Inser New data ////////////////////////////////
{
  if(isset($_POST) AND !empty($_POST) AND isset($_POST['notice_title']))
    {
      $_POST['notice_file']=$PostCon->upload_image($_FILES,'notice/');
      $results=$PostCon->c_notice_post($_POST);
      if ($results)
      {
      echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
      }
    }
 ?>
 <!-- /////////////////////////////////////////////////////////////////// -->
<section id="view_data" class="panel">
  <header class="panel-heading">
    New Totice Published
  </header>
  <div class="panel-body">
    <form method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
      <div class="form-group">
      <label class="control-label col-lg-2" for="inputSuccess">Notice Title</label>
        <div class="col-sm-8">
           <input class="form-control input-lg m-bot15" type="text"  name="notice_title" placeholder="Title of the notice">
        </div>
      </div>
      <div class="form-group">
          <label class="control-label col-sm-2">Describe Of the Notice</label>
          <div class="col-sm-8">
              <textarea class="form-control" name="notice_description" rows="7"></textarea>
          </div>
      </div>
      <div class="form-group">
      <label class="control-label col-lg-2">notice Cover Photo</label>
        <div class="col-sm-5">
           <input type="file"  name="image" placeholder="notice Image">
        </div>
      </div>
      <div class="col-lg-offset-2 col-lg-5">
        <button type="submit" class="btn btn-success" value="submit_result">Submit</button>
      </div>
    </form>
  </div>
</section>
<?php } ?>