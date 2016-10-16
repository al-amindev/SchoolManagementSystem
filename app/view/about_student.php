<?php include('header.php'); ?>
<!DOCTYPE html>
<html lang="en">  
<body>
  <section style="margin-top: 84px;  background-color: rgb(120, 173, 201); text-align: center;">
    <h2>About Student</h2>
  </section>
  <section id="listview">
    <div class="col-lg-6 col-md-6 col-sm-6">
      <h2>School Facility</h2><br>
      <h4>There are a number of ways high school students can earn college credit while in high school. Some high school students enter their first year of college with enough credits to be college sophomores. Most of these programs are entirely free to the student.</h4>
      <h2 style="text-align:center; color:#78ADC9">Class and Number of Student </h2>
      <div class="col-md-2"></div>
      <div class="col-md-8">
      <table class="table table-responsive table-striped">
      <tr>
        <th>Class</th>
        <th>Number Of Student</th>
      </tr>
       <?php $result=$PostCon->c_num_student_class();
      foreach ($result as $value){ ?> 
      <tr>
        <td><?php echo $value['c_name'] ?></td>
        <td><a href="list_of_student_by_class?class_id=<?php echo $value['class_id'] ?>"> <?php echo $value['num_std'] ?></a></td>
      </tr>
        <?php } ?> 
      </table>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6">
      <img src="asset/image/site/about_student.jpg" style="width: 517px; height: 331px;" class="img-responsive img-rounded">
    </div>
  </section>
  <section id="listview">
    <div class="col-lg-12 col-md-12 col-sm-12">

    </div>
  </section>
  <?php include('footer.php'); ?>
</body>
</html>