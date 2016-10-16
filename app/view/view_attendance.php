<!DOCTYPE html>
<html lang="en">
  <?php include('header.php');
  if(isset($_GET) AND !empty($_GET) AND !empty($_GET['reg_number']))
  {
  	$result=$PostCon->c_user_attendence_profile($_GET['reg_number']);
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
          <th>Date</th>
          <th>Subject</th>
          <th>Attendence</th>
        </tr>
        <?php foreach ($result as $key => $value) { ?>
        <tr <?php if ($value['attendance']==0) echo "class='danger'"; else echo "class='success'"; ?> >
          <td><?php echo $value['attendance_date']; ?></td>
          <td><?php echo $value['s_name']; ?></td>
          <td><?php if ($value['attendance']==0) echo "Absent"; else echo 'Present';?></td>
        </tr>
        <?php } ?>
       </table>
     </div>
      </div>
    </section>
    <!--=========== END CONTACT SECTION ================-->
    <?php include('footer.php') ?>

  </body>
</html>