<?php 
require_once("../../Config.php");
require_once (SITE_PATH."/controller/PostController.php");
$PostCon=new PostController;
$user_type=$PostCon->user_type();
?>
<!-- Update the Data-->
<!-- ///////////////////////////////////////////////////////////////// -->
<?php  if (isset($_GET) AND isset($_GET['id']))
{ if (isset($_POST) AND isset($_POST['s_name']))
  {
    $_POST['modify_date']=date('Y-m-d h:i:s');
      $_POST['subject_image']=$PostCon->upload_image($_FILES,'subject/');
     $results=$PostCon->update_data('subject',$_POST,$_GET['id']);
    if ($results)
    {
    echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
    }
  }

  $datas=$PostCon->select_one('subject','subject_id='.$_GET['id']);
  foreach ($datas as $data) {} ?>
  <section id="view_data" class="panel">
    <header class="panel-heading">
      Update Subject
    </header>
    <div class="panel-body">
      <form method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
        <div class="form-group">
        <label class="control-label col-lg-2" for="inputSuccess">Class Name</label>
          <div class="col-sm-5">
             <select class="form-control" name="class_id">
                <option  value="">Select class one</option> 
                  <?php  $class=$PostCon->c_class_view();
                  foreach ($class as $value) { ?>
                <option value="<?php echo $value['class_id'] ?>"  <?php if($value['class_id']==$data['class_id']) echo 'selected' ?> ><?php echo $value['c_name']; ?></option>
                 <?php } ?>
             </select>
          </div>
        </div>

        <div class="form-group">
        <label class="control-label col-lg-2" for="inputSuccess">Subject Name</label>
          <div class="col-sm-5">
             <input class="form-control input-md m-bot15" type="text"  name="s_name" placeholder="Subject Name" value="<?php echo $data['s_name'] ?>">
          </div>
        </div>

        <div class="form-group">
        <label class="control-label col-lg-2">Subject Cover Photo</label>
          <div class="col-sm-5">
             <input type="file"  name="image" placeholder="Subject Image">
          </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2">Details</label>
            <div class="col-sm-5">
                <textarea class="form-control" name="s_remarks" rows="4" ><?php echo $data['s_remarks'] ?></textarea>
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
  if(isset($_POST) AND !empty($_POST) AND isset($_POST['s_name']))
    {
      $_POST['subject_image']=$PostCon->upload_image($_FILES,'subject/');
      $results=$PostCon->c_addsubject($_POST);
      if ($results)
      {
      echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
      }
    }
 ?>
 <!-- /////////////////////////////////////////////////////////////////// -->
<section id="view_data" class="panel">
  <header class="panel-heading">
    New Subject
  </header>
  <div class="panel-body">
    <form method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
      <div class="form-group">
      <label class="control-label col-lg-2" for="inputSuccess">Class Name</label>
        <div class="col-sm-5">
           <select class="form-control" name="class_id">
              <option  value="">Select class one </option> 
                <?php  $class=$PostCon->c_class_view();
                foreach ($class as $value) { ?>
              <option value="<?php echo $value['class_id'];?>"><?php echo $value['c_name']; ?></option>
               <?php } ?>
           </select>
        </div>
      </div>

      <div class="form-group">
      <label class="control-label col-lg-2" for="inputSuccess">Subject Name</label>
        <div class="col-sm-5">
           <input class="form-control input-md m-bot15" type="text"  name="s_name" placeholder="Subject Name">
        </div>
      </div>

      <div class="form-group">
      <label class="control-label col-lg-2">Subject Cover Photo</label>
        <div class="col-sm-5">
           <input type="file"  name="image" placeholder="Subject Image">
        </div>
      </div>

      <div class="form-group">
          <label class="control-label col-sm-2">Details</label>
          <div class="col-sm-5">
              <textarea class="form-control" name="s_remarks" rows="4"></textarea>
          </div>
      </div>
      <div class="col-lg-offset-2 col-lg-5">
        <button type="submit" class="btn btn-success" value="submit_result">Submit</button>
      </div>
    </form>
  </div>
</section>
<?php } ?>