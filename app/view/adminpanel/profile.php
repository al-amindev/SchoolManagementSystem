<?php
if(isset($_GET) AND !empty($_GET) AND !empty($_GET['user_id']))
{
  $user_id=$_GET['user_id'];
  if (isset($_GET) AND isset($_GET['reg']))
   {
      $data=$PostCon->c_user_profile($user_id);
      $result=$PostCon->c_user_result_profile($_GET['reg']);
      $attend=$PostCon->c_user_attendence_profile($_GET['reg']);
   }
   else
   {
    $data=$PostCon->c_user_profile($user_id);
  }
}
else
{
if (isset($_SESSION) AND isset($_SESSION['user_id']))
 {
    $data=$PostCon->c_user_profile($_SESSION['user_id']);
 }
}
 foreach ($data as $key => $value) { } 
?>
       <div class="row">
       <div class="col-md-3">
        <img style="width:200px; height:220px; padding:5px" src="<?php echo '../'.$value['user_image']; ?>" width="180">
       </div>
       <div style="margin-left: -81px;" class="col-md-5">
        <p><strong>Full Name: </strong><?php echo $value['user_f_name']; ?></p>
        <p><strong>User Name: </strong><?php echo $value['user_name']; ?></p>
        <p><strong>Email: </strong><?php echo $value['user_email']; ?></p>
        <p><strong>Gender: </strong><?php echo $value['user_gender']; ?></p>
        <p><strong>Date Of Birth: </strong><?php echo $value['user_birthday']; ?></p>
       </div>
       <div class="col-md-4">
        <p><strong>Join with Us: </strong><?php echo $value['user_create']; ?></p>
        <p><strong>Last Modify: </strong><?php echo $value['user_modify']; ?></p>
       </div>
       </div>
       <hr>
       <?php if (isset($_SESSION) AND isset($_SESSION['user_id']) AND !isset($_GET['user_id']) AND !isset($_GET['id']))  { ?>
       <a align="right" class="btn btn-md btn-default" href="?page=iuadmin&id=<?php echo $_SESSION['user_id'] ?>">Edit</a>
       <?php  } if (isset($_GET) AND isset($_GET['reg']))
   { ?>
       <div class="col-md-12">
       <h3 style="padding:10px">Result View All Subject</h3>
       <hr>
       <table class="table table-responsive table-striped">
        <tr>
          <th>Subject</th>
          <th>Mark</th>
          <th>Teacher</th>
        </tr>
        <?php foreach ($result as $key => $value) { ?>
        <tr>
          <td><?php echo $value['s_name']; ?></td>
          <td><?php echo $value['gpa']; ?></td>
          <td><?php echo $value['teacher'] ?></td>
        </tr>
        <?php } ?>
       </table>
       </div>
       <hr>
       <div class="row">
       <h3 style="padding:10px">Attendance </h3>
       <hr>
       <table class="table table-responsive table-striped">
        <tr>
          <th>Date</th>
          <th>Subject</th>
          <th>Attendence</th>
        </tr>
        <?php foreach ($attend as $key => $value) { ?>
        <tr <?php if ($value['attendance']==0) echo "class='danger'"; else echo "class='success'"; ?> >
          <td><?php echo $value['attendance_date']; ?></td>
          <td><?php echo $value['s_name']; ?></td>
          <td><?php if ($value['attendance']==0) echo "Absent"; else echo 'Present';?></td>
        </tr>
        <?php } ?>
       </table>
       </div>
<?php } ?>