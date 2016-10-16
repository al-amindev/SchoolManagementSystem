<!DOCTYPE html>
<html lang="en">
  <?php include('header.php');
  if(isset($_GET) AND !empty($_GET) AND !empty($_GET['class_id']))
  {
    $result=$PostCon->c_user_list_admin('student',NULL,NULL, $_GET['class_id']);
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
          <th>Name of Student</th>
          <th>Registration Number</th>
          <th>Image</th>
        </tr>
        <?php foreach ($result as $key => $value) {  ?>
        <tr>
          <td><?php echo $value['user_f_name']; ?></td>
          <td><?php echo $value['s_reg_num']; ?></td>
          <td><a href="user_profile?user_id=<?php echo $value['user_id'] ?>" > <img style="width:80px; height:90px; " src=" <?php echo $value['user_image'] ?>"></a></td>
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