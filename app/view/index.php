<!DOCTYPE html>
<section>
  <?php require_once('header.php');
  if (isset($_GET) AND !empty($_GET) AND $_GET['theme']!=="")
  {
    $_SESSION['theme']=$_GET['theme']; ?>
    <script type="text/javascript">
      window.location.href = 'http://localhost/schoolwebsite/app/view/index.php';
    </script>
    <?php
  } ?>
  </section>
  <html lang="en">

  <body>
    <!--=========== BEGIN SLIDER SECTION ================-->
    <section >
    </section>
    <section id="slider">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="slider_area">
            <!-- Start super slider -->
            <div id="slides" >
              <ul class="slides-container">                          
                <li>
                  <div class="select_theme">
                    <a data-toggle="collapse" href="#theme_select_change_color"  aria-expanded="false" aria-controls="theme_select_change_color">
                      <i class="fa fa-cog fa-spin"></i>
                    </a>
                    <div class="collapse" id="theme_select_change_color">
                      <div class="well">
                        <table>
                          <tr>
                            <td><a href="index.php?theme=red"><li style="background-color:#EE4532"></li></a></td>
                            <td><a href="index.php?theme=green"><li style="background-color:#3FC35F"></li></a></td>
                            <td><a href="index.php?theme=yellow"><li style="background-color:#FFD133"></li></a></td>
                            <td><a href="index.php?theme=pink"><li style="background-color:#FF2851"></li></a></td>
                            <td><a href="index.php?theme=green-blue"><li style="background-color:#7046E7"></li></a></td>
                          </tr>
                          <tr>
                            <td><a href="index.php?theme=purple"><li style="background-color:#C762CB"></li></a></td>
                            <td><a href="index.php?theme=orange"><li style="background-color:#FF871C"></li></a></td>
                            <td><a href="index.php?theme=blue"><li style="background-color:#37C6F5"></li></a></td>
                            <td><a href="index.php?theme=dark-red"><li style="background-color:#970001"></li></a></td>
                            <td><a href="index.php?theme=bridge"><li style="background-color:#A5D549"></li></a></td>
                          </tr>
                        </table>
                      </div>
                    </div>
                  </div>
                  <img src="asset/image/slider/2.jpg" alt="img">
                  <div class="slider_caption">
                    <h2>an ideal school in Madaripur</h2>
                    <p style="text-align:justify">The auspicious of The Miar hat high school in the rural area of kalkini under Madaripur district ameliorate in every year of its results of JSC,SSC as well as contributed a huge to develop of the local area those are studying in renowned universities,medical & engineering universities in Bangladesh so that nation built strategies teaches in this renowned school.</p>
                    <a class="slider_btn" href="#">Know More</a>
                  </div>
                </li>
                <!-- Start single slider-->
                <li>
                  <img src="asset/image/slider/5.png" alt="img">
                </li>
                <!-- Start single slider-->
                <li>
                  <img src="asset/image/slider/3.jpg" alt="img">
                </li>
                <!-- Start single slider-->
                <li >
                  <img src="asset/image/slider/4.jpg" alt="img">
                </li>
              </ul>
              <nav class="slides-navigation">
                <a href="#" class="next"></a>
                <a href="#" class="prev"></a>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--=========== END SLIDER SECTION ================-->
    <!--=========== BEGIN ABOUT US SECTION ================-->
    <section id="aboutUs">
      <div class="container">
        <div class="row">
          <!-- Start about us area -->
          <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="aboutus_area wow fadeInLeft">
              <h2 class="titile">About Us</h2>
              <p style="text-align:justify">The auspicious of The Miar hat high school in the rural area of kalkini under Madaripur district ameliorate in every year of its results of JSC,SSC as well as contributed a huge to develop of the local area those are studying in renowned universities,medical & engineering universities in Bangladesh so that nation built strategies teaches in this renowned school.</p>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="newsfeed_area wow fadeInRight">
              <ul class="nav nav-tabs feed_tabs" id="myTab2">
                <li><a href="#notice" data-toggle="tab">Notice</a></li>
                <li class="active"><a href="#events" data-toggle="tab">Result</a></li>         
              </ul>
              <!-- Tab panes -->
              <div class="tab-content">
                <!-- Start notice tab content -->  
                <div class="tab-pane fade " id="notice">
                  <div class="single_notice_pane">
                    <ul class="news_tab">
                      <?php $noticeresult=$PostCon->c_notice_list();
                      foreach ($noticeresult as $key => $value) 
                      {
                        if (isset($value['notice_file']) AND $value['notice_file']!='') 
                          { ?>
                        <li>
                          <div class="media">
                            <div class="media-body">
                              <a href="<?php echo $value['notice_file'] ?>" target="_blank" ><?php echo $value['notice_title'].' (file)'; ?></a>
                              <span class="feed_date"><?php echo $value['notice_date']; ?></span>
                            </div>
                          </div>                   
                        </li> 
                        <?php } else {

                         ?>
                      <li>
                        <div class="media">
                          <div class="media-body">
                            <a href="notice_view.php?notice_id=<?php echo $value['notice_id'] ?>" target="_blank" ><?php echo $value['notice_title']; ?></a>
                            <span class="feed_date"><?php echo $value['notice_date']; ?></span>
                          </div>
                        </div>                   
                      </li> 
                      <?php 
                    } } ?>              
                  </ul>
                  <ul class="news_tab">
                  </ul>
                </div>               
              </div>
              <!-- Start events tab content -->
              <div class="tab-pane fade in active" id="events">
                <ul class="news_tab">
                  <?php $value=$PostCon->c_published_result();
                  $i=1;
                  foreach ($value as $result) {
                    if ($i<4) {
                    ?>
                    <li>
                      <div class="media">
                        <div class="media-left">
                        </div>
                        <div class="media-body">
                          <a  href="class_result_publish_1.php?class_id= <?php echo $result['class_id'] ?>&class_name=<?php echo $result['c_name']; ?>" target="_blank" >The Result is published class <?php echo $result['c_name']; ?> </a>
                          <span class="feed_date"></span>
                        </div>
                      </div>
                    </li>
                    <?php } 
                    $i++;
                    }?>         
                  </ul>
                  <a class="see_all" href="all_result.php">See All</a> 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--=========== END ABOUT US SECTION ================--> 
    <!--=========== BEGIN WHY US SECTION ================-->
    <section id="whyUs">
      <div class="row">        
        <div class="col-lg-12 col-sm-12">
          <div class="whyus_top">
            <div class="container">
              <div class="row">
                <div class="col-lg-12 col-md-12"> 
                  <div class="title_area">
                    <h2 class="title_two">Why Us</h2>
                    <span></span> 
                  </div>
                </div>
              </div>
              <!-- End Why us top titile -->
              <!-- Start Why us top content  -->
              <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3">
                  <div class="single_whyus_top wow fadeInUp">
                    <div class="whyus_icon">
                      <span class="fa fa-desktop"></span>
                    </div>
                    <h3>Technology</h3>
                    <p>when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
                  </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                  <div class="single_whyus_top wow fadeInUp">
                    <div class="whyus_icon">
                      <span class="fa fa-users"></span>
                    </div>
                    <h3>Best Tutor</h3>
                    <p>when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
                  </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                  <div class="single_whyus_top wow fadeInUp">
                    <div class="whyus_icon">
                      <span class="fa fa-flask"></span>
                    </div>
                    <h3>Practical Training</h3>
                    <p>when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
                  </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                  <div class="single_whyus_top wow fadeInUp">
                    <div class="whyus_icon">
                      <span class="fa fa-support"></span>
                    </div>
                    <h3>Support</h3>
                    <p>when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>        
      </div>
      <div class="row">        
        <div class="col-lg-12 col-sm-12">
          <div class="whyus_bottom">            
            <div class="slider_overlay">
              <div class="container" style="padding-top:70px;">               
                <div class="skills">                
                  <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="single_skill wow fadeInUp">
                      <?php $result=$PostCon->generate_scholarship();
                      $count=$sum=0;
                      $pass=$fail=0;
                      foreach ($result as $key => $value) {
                        $sum=$sum+$value['persenr_attend'];
                        $count++;
                        if ($value['average_mark']<33)
                          $fail++;
                        else
                          $pass++; }
                        $success=round($pass/($pass+$fail)*100);
                        $attend=round($sum/$count);
                        ?>
                        <div id="myStat" data-dimension="150" data-text="<?php echo $attend; ?>%" data-info="" data-width="10" data-fontsize="25" data-percent="<?php echo $attend; ?>" data-fgcolor="#999" data-bgcolor="#fff"  data-icon="fa-task"></div>
                        <h4>Attend Studnet</h4>                      
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3">
                      <div class="single_skill wow fadeInUp">
                        <div id="myStathalf2" data-dimension="150" data-text="<?php echo $success; ?>%" data-info="" data-width="10" data-fontsize="25" data-percent="<?php echo $success; ?>" data-fgcolor="#999" data-bgcolor="#fff"  data-icon="fa-task"></div>
                        <h4>Success Rate</h4>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3">                 
                      <div class="single_skill wow fadeInUp">
                        <div id="myStat2" data-dimension="150" data-text="100%" data-info="" data-width="10" data-fontsize="25" data-percent="100" data-fgcolor="#999" data-bgcolor="#fff"  data-icon="fa-task"></div>
                        <h4>Student Engagement</h4>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3">                 
                      <div class="single_skill wow fadeInUp">
                        <div id="myStat3" data-dimension="150" data-text="65%" data-info="" data-width="10" data-fontsize="25" data-percent="65" data-fgcolor="#999" data-bgcolor="#fff"  data-icon="fa-task"></div>
                        <h4>Certified Courses</h4>
                      </div>
                    </div>
                  </div>
                </div>            
              </div>
            </div>
          </div>        
        </div>
      </section>
      <section id="ourCourses">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 col-md-12"> 
              <div class="title_area">
                <h2 class="title_two">Our Subject</h2>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="ourCourse_content">
                <ul class="course_nav">
                  <?php $value=$PostCon->c_all_unique_subject();
                  foreach ($value as $result) { ?>
                  <li>
                    <div class="single_course">
                      <div class="singCourse_imgarea">
                        <img src="<?php echo str_replace('../', '',$result['subject_image']); ?>" style="height: 300px; width: 280px;" />
                        <div class="mask">                         
                          <a href="#" class="course_more">View Subject</a>
                        </div>
                      </div>
                      <div class="singCourse_content">
                        <h3 class="singCourse_title"><a href="#"><?php echo $result['s_name']; ?></a></h3>
                        <p><?php echo $result['s_remarks']; ?></p>
                      </div>
                      <div class="singCourse_author">
                        <img src="<?php echo $result['user_image']; ?>" alt="img">
                        <p><?php echo $result['user_f_name']; ?>, Teacher</p>
                      </div>
                    </div>
                  </li> 
                  <?php } ?>              
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section id="ourTutors">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 col-md-12"> 
              <div class="title_area">
                <h2 class="title_two">Our Teacher</h2>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="ourTutors_content">
                <ul class="tutors_nav">
                  <?php $value=$PostCon->c_teacher_info();
                  foreach ($value as $result) {
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
                    <?php 
                  } ?>                                            
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section id="studentsTestimonial">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 col-md-12"> 
              <div class="title_area">
                <h2 class="title_two">What our Student says</h2>
                <span></span> 
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="studentsTestimonial_content">              
                <div class="row">
                  <?php $value=$PostCon->c_fdback_view();
                  foreach ($value as $result) 
                  {
                    ?>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <div class="single_stsTestimonial wow fadeInUp">
                        <div class="stsTestimonial_msgbox">
                          <p><?php echo $result['fdback_details'];?></p>
                        </div>
                        <img class="stsTesti_img" src="<?php echo $result['user_image']; ?>" alt="img">
                        <div class="stsTestimonial_content">
                          <h3><?php echo $result['user_f_name']; ?></h3>                      
                          <span><?php echo $result['user_type']; ?></span>  
                        </div>
                      </div>
                    </div>
                    <?php 
                  } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section>
        <div class="counter">
          <?php $handle = fopen("counter.txt","r");
          if(!$handle)
            echo "could not open the file";
          else {
            $counter = (int ) fread($handle,20);
            fclose ($handle);
            $counter++;
            echo" <h3 class='glyphicon glyphicon-pushpin'>Total Visitor ". $counter . " </h3> " ;
            $handle = fopen("counter.txt", "w" );
            fwrite($handle,$counter) ;
            fclose ($handle) ;
          } ?>
        </div>
      </section>
      <?php include('footer.php') ?>
    </body>
    </html>
    ?>