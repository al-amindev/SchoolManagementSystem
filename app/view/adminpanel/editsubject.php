<?php 
require_once("../../Config.php");
require_once (SITE_PATH."/controller/PostController.php");
$PostCon=new PostController;
$user_type=$PostCon->user_type();
if(isset($_POST) AND !empty($_POST) AND isset($_POST['s_name']))
{
  if( $_FILES['subject_image']['name'] !=NULL AND isset($_FILES['subject_image']['name'])  )
  {
    $filename = $_FILES['subject_image']['tmp_name'];
    $directory='../asset/image/subject/';
    $destination = $directory.basename($_FILES['subject_image']['name']);
    move_uploaded_file($filename, $destination);
    $photoname=$_FILES['subject_image']['name'];
    $imagepath=$directory.$photoname;
    $results=$PostCon->c_addsubject($_POST,$imagepath);
    if ($results)
    {
      echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
    }
  }
}
?>
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
          <input type="file"  name="subject_image" placeholder="Subject Image">
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