<?php
include('header.php');
?>
<!DOCTYPE html>
<html lang="en">  
<body>
  <section id="about_teacher">
    <h2></h2>
  </section>
  <br><br>
  <section>
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="ourTutors_content">
          <!-- Start Tutors nav -->
          <ul class="tutors_nav" style="padding: 20px 0px; border-top: 15px solid rgb(120, 173, 201);">
            <?php $value=$PostCon->c_teacher_info();
            foreach ($value as $result)
            {
              ?>
              <li>
                <div class="single_tutors">
                <a href="user_profile.php?user_id=<?php echo $result['user_id'] ?>">
                  <div class="tutors_thumb">
                    <img src="<?php echo $result['user_image']; ?>" />                      
                  </div>
                  </a>
                  <div class="singTutors_content">
                    <h3 class="tutors_name"><?php echo $result['user_f_name'] .'  ('.$result['t_qualification'].')'; ?></h3>
                    <span><?php echo $result['t_subject']; ?></span>
                    <p><?php echo $result['user_about']; ?></p>
                  </div>
                  <div class="singTutors_social">
                    <ul class="tutors_socnav">
                      <li><a class="fa fa-facebook" href="#"></a></li>
                      <li><a class="fa fa-twitter" href="#"></a></li>
                      <li><a class="fa fa-instagram" href="#"></a></li>
                      <li><a class="fa fa-google-plus" href="#"></a></li>
                    </ul>
                  </div>
                </div>
              </li>
              <?php } ?>                                            
            </ul>
          </div>
        </div>
      </div>
    </section>
    <section style="margin-top: 84px;  background-color: rgb(120, 173, 201); text-align: center;">
      <h2 ></h2>
    </section>
    <section id="listview">
      <div class="col-lg-6 col-md-6 col-sm-6">
        <h2>School Teacher</h2><br>
        <h4>There are a number of ways high school students can earn college credit while in high school. Some high school students enter their first year of college with enough credits to be college sophomores. Most of these programs are entirely free to the student.</h4>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6">
        <img src="asset/image/site/about_student.jpg" style="width: 517px; height: 331px;" class="img-responsive img-rounded">
      </div>
      <div style="margin-left: 89px;">
       <h2> Our Class Subject with Teacher Info  </h2>
        <table class="table table-striped">
          <tr>
            <th>Class</th>
            <th>Subject</th>
            <th>Subject Image</th>
            <th>Teacher</th>
            <th>Teacher Image</th>
          </tr>

             <?php 
             $value=$PostCon->c_all_unique_subject();
          foreach ($value as $result) 
            { ?>
          <tr>
          <td ><?php echo $result['c_name'];?></td>
          <td><?php echo $result['s_name']; ?></td>
          <td><img style="width:75px; height:80px;" src="<?php echo $result['subject_image']; ?>"></td>
          <td><?php echo $result['user_f_name']; ?></td>
          <td><img style="width:75px; height:80px;" src="<?php echo $result['user_image']; ?>"></td>
          </tr>
          <?php  } ?>
        </table>
      </div>
    </section>
    <?php include('footer.php'); ?>
  </body>
  </html>
