<?php 
require_once("../../Config.php");
require_once (SITE_PATH."/controller/PostController.php");
$PostCon=new PostController;
$user_type=$PostCon->user_type();
    if(isset($_POST) and !empty($_POST) AND isset($_POST['user_input_login']))
    {
      $result=$PostCon->c_sign_in($_POST);
     if ($result)
     {
    header("location:index");
     }
    }

if ($user_type==1 OR $user_type==2 ) 
{
  if (isset($_GET) AND isset($_GET['sort_class']))
  {
    if (isset($_GET['sort_subject']))
    {
     $data['subject_id']=$_GET['sort_subject'];
     $data['class_id']=$_GET['sort_class'];
     $result=$PostCon->c_result_list_admin($data);
    }
    else
    {
    $data['class_id']=$_GET['sort_class'];
    $result=$PostCon->c_result_list_admin($data);
    }
  }
  else if (isset($_GET) AND isset($_GET['sort_subject']))
  {
    if (isset($_GET['sort_class']))
    {
     $data['subject_id']=$_GET['sort_subject'];
     $data['class_id']=$_GET['sort_class'];
     $result=$PostCon->c_result_list_admin($data);
    }
    else
    {
    $data['subject_id']=$_GET['sort_subject'];
    $result=$PostCon->c_result_list_admin($data);
    }
  }

  else
  {
    $result=$PostCon->c_result_list_admin();
  }
}
?>
<div class="row">
  <div class="col-lg-12">
    <section id="view_data"  class="panel">
      <header class="panel-heading">
        <div class="fa fa-user-plus"><a href="?page=addresult">Create New</a></div>
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
      <table  class="table table-striped table-advance table-hover">
        <tbody>
          <tr>
          <th><i class="icon_profile"></i>Student Name</th>
            <th><i class="fa fa-user-md"></i>ID Number</th>
            <th><i class="fa fa-user-md"></i>GPA or Marks</th>
            <th><i class="fa fa-user-md"></i>Date</th>
            <th><i class="icon_calenda"></i>Published By</th>
            <th><i class="icon_calenda"></i>Modify Date</th>
            <th><i class="fa fa-clone"></i>Remarks</th>
            <?php if ($user_type==1) {?>
            <th><i class="icon_cogs"></i> Action</th>
            <?php } ?>
          </tr>
          <?php foreach ($result as $value) { ?>
          <tr>
            <td><a href="?page=profile&user_id=<?php echo $value['user_id'] ?>&reg=<?php echo $value['reg_number'] ?>"><?php echo $value['s_f_name']; ?></a></td>
            <td><?php echo $value['reg_number']; ?></td>
            <td><?php echo $value['gpa']; ?></td>
            <td><?php echo $value['r_date']; ?></td>
            <td><?php echo $value['p_f_name']; ?></td>
            <td><?php echo $value['modify_date']; ?></td>
            <td><?php echo $value['r_remarks']; ?></td>
            <?php if ($user_type==1) {?>
            <td>
              <div class="btn-group">
                <a class="btn btn-success" href="#"><i class="icon_pencil-edit_alt"></i></a>
                <a class="btn btn-danger" href="#"><i class="icon_close_alt2"></i></a>
              </div>
            </td>
            <?php } ?>
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
  xhttp.open("GET", "resultlist.php?sort_class="+str, true);
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
  xhttp.open("GET", "resultlist.php?sort_subject="+str, true);
  xhttp.send();
}

</script>
