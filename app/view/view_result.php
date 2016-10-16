<!DOCTYPE html>
<html lang="en">
  <?php include('header.php');
  if(isset($_GET) AND !empty($_GET) AND !empty($_GET['reg_number']))
  {
  	$result=$PostCon->c_user_result_profile($_GET['reg_number']);
  }
   ?>
  <body>
  <pre>
  </pre>
    <!--=========== BEGIN CONTACT SECTION ================-->
    <section id="contact">
      <div class="container"style="padding-top: 120px">
       <div class="row">
       <hr>
       <table class="table table-responsive table-striped">
       	<tr>
       		<th>Subject</th>
       		<th>Mark</th>
       		<th>Teacher</th>
       	</tr>
       	<?php foreach ($result as $key => $value) {  $sum[]=$value['gpa']; ?>
       	<tr>
       		<td><?php echo $value['s_name']; ?></td>
       		<td><?php echo $value['gpa']; ?></td>
       		<td><?php echo $value['teacher'] ?></td>
       	</tr>
       	<?php } ?>
       </table>
       <hr style="border:2px solid #eee">
       <h4 style="margin-left:190px; padding:7px;"><?php echo 'Total Marks: '.array_sum($sum); ?> </h4>
       </div>
      </div>
    </section>
    <!--=========== END CONTACT SECTION ================-->
    <?php include('footer.php') ?>

  </body>
</html>