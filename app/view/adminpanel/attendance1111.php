<?php 
require_once("../../Config.php");
require_once (SITE_PATH."/controller/PostController.php");
$PostCon=new PostController;
$user_type=$PostCon->user_type();

if ($user_type==1) 
{
  if (isset($_GET) AND isset($_GET['sort_class']))
  {
    if (isset($_GET['sort_subject']))
    {
     $subject_id=$_GET['sort_subject'];
     $class_id=$_GET['sort_class'];
     $result=$PostCon->c_attendance_data(NULL,$class_id, $subject_id);
    }
    else
    {
    $class_id=$_GET['sort_class'];
    $result=$PostCon->c_attendance_data(NULL,$class_id);
    }
  }
  else if (isset($_GET) AND isset($_GET['sort_subject']))
  {
    if (isset($_GET['sort_class']))
    {
     $subject_id=$_GET['sort_subject'];
     $class_id=$_GET['sort_class'];
     $result=$PostCon->c_attendance_data(NULL,$class_id, $subject_id);
    }
    else
    {
     $subject_id=$_GET['sort_subject'];
    $result=$PostCon->c_attendance_data(NULL,NULL, $subject_id);
    }
  }

  else
  {
    $result=$PostCon->c_attendance_data();
  }
}
?>
<div class="row">
  <div class="col-lg-12">
    <section id="view_data"  class="panel">
      <header class="panel-heading">
        <div class="fa fa-user-plus"><a href="?page=addattendance">Create New</a></div>
      </header>
      <h3>Sorting</h3>
      <div class="btn-group">
        <a class="btn btn-primary option_select" href="" title="Select Your Class">Class</a>
        <select  onchange="sort_by_class(this.value)" class="btn btn-primary dropdown-toggle option_select" data-toggle="dropdown" title="Select Your Class">
          <option >Select</option>
            <?php  
            if (isset($_GET) AND isset($_GET['sort_subject']))
              { $class=$PostCon->c_class_view($_GET['sort_subject']);}
          else
            { $class=$PostCon->c_class_view(); }
            foreach ($class as $value) { ?>
          <option value="<?php echo $value['class_id'] ?>" <?php if ( isset($_GET) AND isset($_GET['sort_class']) AND $_GET['sort_class']==$value['class_id']) { echo "SELECTED"; }  ?> > <?php echo $value['c_name']; ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="btn-group">
            <a class="btn btn-primary option_select" href="" title="Select Your Class">Subject</a>
            <select onchange="sort_by_subject(this.value)" class="btn btn-primary dropdown-toggle option_select" data-toggle="dropdown" title="Select Your Class">
            <option id="selct_id">Select</option>
            <?php  
            if (isset($_GET) AND isset($_GET['sort_class']))
              {  $subject=$PostCon->c_subject_view($_GET['sort_class']);}
            else
              { $subject=$PostCon->c_subject_view();}
            
            foreach ($subject as $value) { ?>
              <option value="<?php echo $value['subject_id'] ?>" <?php if ( isset($_GET) AND isset($_GET['sort_subject']) AND $_GET['sort_subject']==$value['subject_id']) { echo "SELECTED"; }  ?> > <?php echo $value['s_name']; ?></option>
              <?php } ?>
            </select>
      </div>
      <div class="btn-group">
            <a class="btn btn-primary option_select" href="" title="Select Your Class">Date</a>
            <select  class="btn btn-primary dropdown-toggle option_select" data-toggle="dropdown" title="Select Your Class">
            <option>Select</option>
            <?php  $class=$PostCon->c_class_view();
            foreach ($class as $value) { ?>

              <option value="<?php $value['class_id'] ?>  "> <?php echo $value['class_id']; ?></option>
              <?php } ?>
            </select>
      </div>

      <table  class="table table-striped table-advance table-hover">
        <tbody>
          <tr>
          <th><i class="icon_profile"></i>Student Name</th>
            <th><i class="fa fa-user-md"></i>ID Number</th>
            <th><i class="fa fa-user-md"></i>Present</th>
          </tr>
          <?php foreach ($result as $value) { ?>
          <tr>
            <td><?php echo $value['user_f_name']; ?></td>
            <td><?php echo $value['std_id']; ?></td>
            <td><?php echo $value['present']; ?></td>
          </tr>
          <?php } ?>             
        </tbody>
      </table>
      <div style="text-align:center">
          <ul class="pagination pagination-lg">
              <li><a href="#">«</a></li>
              <li><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
              <li><a href="#">»</a></li>
          </ul>
      </div>
    </section>
  </div>
</div>
<script>
function sort_by_class(str) {
  var xhttp; 
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("view_data").innerHTML = xhttp.responseText;
    }
  }
  xhttp.open("GET", "attendance.php?sort_class="+str, true);
  xhttp.send();
}

function sort_by_subject(str) {
  var xhttp; 
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("view_data").innerHTML = xhttp.responseText;
    }
  }
  xhttp.open("GET", "attendance.php?sort_subject="+str, true);
  xhttp.send();
}


</script>
