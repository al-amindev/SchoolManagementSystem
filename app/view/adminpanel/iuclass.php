<?php 
require_once("../../Config.php");
require_once (SITE_PATH."/controller/PostController.php");
$PostCon=new PostController;
$user_type=$PostCon->user_type();
?>
<!-- Update the Data-->
<!-- ///////////////////////////////////////////////////////////////// -->
<?php  if (isset($_GET) AND isset($_GET['id']))
{ if (isset($_POST) AND isset($_POST['c_name']))
  {
    $_POST['modify_date']=date('Y-m-d h:i:s');
      $_POST['class_image']=$PostCon->upload_image($_FILES,'class/');
     $results=$PostCon->update_data('class',$_POST,$_GET['id']);
    if ($results)
    {
    echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
    }
  }
  $datas=$PostCon->select_one('class','class_id='.$_GET['id']);
  foreach ($datas as $data) {} ?>
  <section id="view_data" class="panel">
    <header class="panel-heading">
      Update Class
    </header>
    <div class="panel-body">
      <form method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
        <div class="form-group">
        <label class="control-label col-lg-2" for="inputSuccess">Class Name</label>
          <div class="col-sm-5">
             <input class="form-control input-md m-bot15" type="text"  name="c_name" placeholder="Class Name" value="<?php echo $data['c_name'] ?>">
          </div>
        </div>

        <div class="form-group">
        <label class="control-label col-lg-2">Class Cover Photo</label>
          <div class="col-sm-5">
             <input type="file"  name="image" placeholder="Class Image">
          </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2">Details</label>
            <div class="col-sm-5">
                <textarea class="form-control" name="c_remarks" rows="4" ><?php echo $data['c_remarks'] ?></textarea>
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
  if(isset($_POST) AND !empty($_POST) AND isset($_POST['c_name']))
    {
      $_POST['class_image']=$PostCon->upload_image($_FILES,'class/');
      $results=$PostCon->c_addclass($_POST);
      if ($results)
      {
      echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
      }
    }
 ?>
 <!-- /////////////////////////////////////////////////////////////////// -->
<section id="view_data" class="panel">
  <header class="panel-heading">
    New Class
  </header>
  <div class="panel-body">
    <form method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
      <div class="form-group">
      <label class="control-label col-lg-2" for="inputSuccess">Class Name</label>
        <div class="col-sm-5">
           <input class="form-control input-md m-bot15" type="text"  name="c_name" placeholder="Class Name">
        </div>
      </div>

      <div class="form-group">
      <label class="control-label col-lg-2">Class Cover Photo</label>
        <div class="col-sm-5">
           <input type="file"  name="image" placeholder="Class Image">
        </div>
      </div>

      <div class="form-group">
          <label class="control-label col-sm-2">Details</label>
          <div class="col-sm-5">
              <textarea class="form-control" name="c_remarks" rows="4"></textarea>
          </div>
      </div>
      <div class="col-lg-offset-2 col-lg-5">
        <button type="submit" class="btn btn-success" value="submit_result">Submit</button>
      </div>
    </form>
  </div>
</section>
<?php } ?>