<?php
include('header.php');
if(isset($_POST) and !empty($_POST))
{
  $result=$PostCon->c_sign_in_client($_POST);
  header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<body>
  <section id="imgBanner">
    <h2>Login please</h2>
  </section>
  <section id="registration">
    <div class="container">
      <div class="row">
        <div class="registration_form wow fadeInLeft ">
          <div class="col-lg-4 col-md-4 col-sm-4">
            <form class="submitphoto_form" action=""  method="POST">
              <input type="eamil" class="wp-form-control wpcf7-text" name="user_email" placeholder="Type your email">
              <input type="password" class="wp-form-control wpcf7-password" name="user_password" placeholder="Your password">     
              <input type="submit" value="Submit" class="wpcf7-submit" >
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php include('footer.php'); ?>
</body>
</html>