<!DOCTYPE html>
<html lang="en">
  <?php include('header.php');
  if(isset($_GET) AND !empty($_GET) AND !empty($_GET['user_id']))
  {
  	$user_id=$_GET['user_id'];
  	$data=$PostCon->c_user_profile($user_id);
  }
  else
  {
  if (isset($_SESSION) AND isset($_SESSION['client_s_reg_num']))
   {
  	$data=$PostCon->c_user_profile($_SESSION['client_user_id']);
  	$result=$PostCon->c_user_result_profile($_SESSION['client_s_reg_num']);
  	$attend=$PostCon->c_user_attendence_profile($_SESSION['client_s_reg_num']);
   }
  }
 foreach ($data as $key => $value) { } 
   ?>
  <body>
  <pre>
  </pre>
    <!--=========== BEGIN CONTACT SECTION ================-->
    <section id="contact">
      <div class="container" style="padding-top: 120px">
       <div class="row">
       <div class="col-md-3">
       	<img style="width:200px; height:220px; padding:5px" src="<?php echo $value['user_image']; ?>" width="180">
       </div>
       <div style="margin-left: -81px;" class="col-md-5">
       	<p><strong>Full Name: </strong><?php echo $value['user_f_name']; ?></p>
       	<p><strong>User Name: </strong><?php echo $value['user_name']; ?></p>
       	<p><strong>Email: </strong><?php echo $value['user_email']; ?></p>
       	<p><strong>Gender: </strong><?php echo $value['user_gender']; ?></p>
       <?php  if (isset($_SESSION) AND isset($_SESSION['client_s_reg_num']) AND !isset($_GET['user_id'])){ ?> 
        <p><strong>Student of Class: </strong><?php echo $_SESSION['client_s_class']; ?></p><?php } ?>
       	<p><strong>Date Of Birth: </strong><?php echo $value['user_birthday']; ?></p>
       </div>
       <div class="col-md-4">
       <?php  if (isset($_SESSION) AND isset($_SESSION['client_s_reg_num']) AND !isset($_GET['user_id'])){ ?> 
       	<p><strong>Join with Us: </strong><?php echo $value['user_create']; ?></p>
       	<p><strong>Last Modify: </strong><?php echo $value['user_modify']; ?></p>
        <?php } ?>
       </div>
       </div>
       <?php if (isset($_SESSION) AND isset($_SESSION['client_s_reg_num']) AND !isset($_GET['user_id']) ){ ?>
       <p><a class="btn btn-default btn-lg pull-right" href="edit_user.php?id=<?php echo $_SESSION['client_user_id'] ?>" >Edit</a></p>
       <hr>
       
       <div class="row">
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
      </div>
    </section>
    <!--=========== END CONTACT SECTION ================-->
    <?php include('footer.php') ?>

  </body>
</html>