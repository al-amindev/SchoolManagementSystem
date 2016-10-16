<?php
include('header.php');
if (isset($_POST) ) 
{
  $result= $PostCon->c_attendance_reports($_POST);
}
?>
<!DOCTYPE html>
<html lang="en">  
<body>
  <!--=========== BEGIN COURSE BANNER SECTION ================-->
  <section id="user_list">
    <h2>User Attendance</h2>
  </section>
  <section id="listview">
    <div class="col-xs-12 col-md-12 col-sm-12">
      <div class="row">
        <div class="col-lg-12 col-md-12"> 
          <div class="title_area">
            <span></span>
          </div>
        </div>
      </div>
      <!-- Stack the columns on mobile by making one full-width and the other half-width -->
      <form method="POST" action="">
        <div>
          <h3>Class:
            <select name="class">
              <?php $result1=$PostCon->c_class_view();?>
              <?php foreach ($result1 as $value) { ?> 
              <option value="<?php $value['class_id']; ?>"><?php echo $value['c_name']; ?> </option> <?php } ?> 
            </select>
          </h3>
          <h3>Subject: 
            <select name="subject">
              <?php $result2=$PostCon->c_subject_view();?>
              <?php foreach ($result2 as $value) { ?> 
              <option value="<?php $value['subject_id']; ?>"><?php echo $value['s_name']; ?> </option> <?php } ?> 
            </select> 
          </h3>
            <h3>Teacher: </h3>
            <h3>Date: <?php echo date("Y-m-d H:i:s")?></h3> 
          </div>
          <h4>Attendance </h4> 
          <div class="row" style=" border: 1px solid green; background-color:#6DADC4;  opacity: 0.7" >
            <div class="col-xs-2 col-md-2 col-sm-2">Student ID</div>
            <div class="col-xs-1 col-md-1 col-sm-1">Name</div>
            <div class="col-xs-1 col-md-1 col-sm-1">Present/Absent</div>
          </div>
          <?php foreach ($results as $value) { ?>
          <div class="row" style="background-color: green; color: white;">
          <div class="col-xs-2 col-md-2 col-sm-2"> <?php echo $value['s_roll_num'] ?> <input type="hidden" name='roll_numb[]' value= "<?php echo $value['s_roll_num'] ?>" > </div>
          <div class="col-xs-2 col-md-2 col-sm-2"> <?php echo $value['user_f_name']?></div>
          <div class="col-xs-1 col-md-1 col-sm-1"> <input type="checkbox" value="<?php echo $value['s_roll_num'] ?>" name='attendance[]'></div>
        </div>
        <?php }?>
        <input type="submit" value="submit" />
      </form>
    </div>
  </section>
  <?php include('footer.php'); ?>
</body>
</html>