<?php
  include('header.php');
  
  if(isset($_POST) and !empty($_POST))
    {
       $result=$PostCon->c_fdback($_POST);
       if ($result) 
       {
         echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
       }
    }
    ?>

<!DOCTYPE html>
<html lang="en">
  
<body>
    <!--=========== BEGIN COURSE BANNER SECTION ================-->
    <section id="imgFeedback">
    </section>
    <!--=========== END COURSE BANNER SECTION ================-->
    
    <!--=========== BEGIN CONTACT SECTION ================-->
    <section id="registration">
      <div class="container">
       <div class="row">
       <div class="registration_form wow fadeInLeft ">
       <div class="col-lg-8 col-md-8 col-sm-8">
         <form class="submitphoto_form" method="POST">
                <h5>Feedback title</h5>
                <input type="text" class="wp-form-control wpcf7-text" name="fdback_title" placeholder="Type your Feedback Title">
                <h5>Feedback Message</h5>
                 <textarea class="wp-form-control wpcf7-textarea" name="fdback_details" cols="30" rows="10" placeholder="Please Say about the organization"></textarea> 
                <input type="submit" value="Submit" class="wpcf7-submit" >
         </form>
         </div>
         </div>
       </div>
      </div>
    </section>
    <!--=========== END CONTACT SECTION ================--> 
    <?php include('footer.php'); ?>

  </body>
</html>