<?php
include('header.php');
if(isset($_POST) and !empty($_POST))
{
  if( $_FILES['user_image']['name'] !=NULL AND isset($_FILES['user_image']['name'])  )
  {
    $filename = $_FILES['user_image']['tmp_name'];
    $directory='asset/image/user/';
    $destination = $directory.basename($_FILES['user_image']['name']);
    move_uploaded_file($filename, $destination);
    $photoname=$_FILES['user_image']['name'];
    $imagepath='asset/image/user/'.$photoname;
    $result=$PostCon->c_svae_reg_update($_POST,$imagepath);
    if ($result) {
      echo "success data submit";
    }
    if (!empty($_GET)) 
    {
      $id=$_GET['id'];
    }
    else 
      $id=$_SESSION['user_id'];
    $editvalue=$PostCon->c_svae_reg_update($_POST,$id,$imagepath);
  }
  else
  { 
    if (!empty($_GET)) 
    {
      $id=$_GET['id'];
    }
    else 
      $id=$_SESSION['user_id'];
    $result=$PostCon->c_svae_reg_update($_POST,$id);
  }
  if ($result) {
    echo "success data submit";
  }
// header('Location:viewall.php');
}
if (!empty($_GET)) 
{
  $id=$_GET['id'];
}
else
  $id=$_SESSION['user_id'];
$editvalue=$PostCon->c_profile_view($id);
?>
<!DOCTYPE html>
<html lang="en">
<body>
  <section id="imgBanner">
    <h2>Create Your Account Free</h2>
  </section>
  <section id="registration">
    <div class="container">
      <div class="row">
        <div class="registration_form wow fadeInLeft">
          <form class="submitphoto_form" action="" enctype="multipart/form-data" method="POST">
            <div class="col-lg-8 col-md-8 col-sm-8">
              <p>User Type</p>
              <select class="wp-form-control wpcf7-text" name="user_type" id="mySelect" onchange="myFunction()">
                <?php foreach ($editvalue as $view) {
                }
                if ($view['user_type']=='admin'){?>
                <?php if ($user_type==1) { ?>
                <option value="admin" selected>Admin</option>
                <?php } ?>
                <option value="student" >Student</option>
                <option value="teacher" >Teacher</option>
                <?php }
                elseif ($view['user_type']=='teacher') {?>
                <option value="student" >Student</option>
                <?php if ($user_type==1) { ?>
                <option value="admin">Admin</option>
                <?php } ?>
                <option value="teacher" selected>Teacher</option>
                <?php } else {?>
                <option value="student" selected>Student</option>
                <?php if ($user_type==1) { ?>
                <option value="admin">Admin</option>
                <?php } ?>
                <option value="teacher" >Teacher</option>
                <?php } ?>
              </select>
              <div id="student_form" style="display:none";>
                <p> Student Insformation:</p>
                <input type="text" class="wp-form-control " placeholder="Type your registration number" name="s_reg_num" value="<?php echo $view['s_reg_num']; ?>">
                <input type="text" class="wp-form-control " placeholder="Type your roll number" name="s_roll_num" value="<?php echo $view['s_roll_num']; ?>">
                <select class="wp-form-control wpcf7-text" name="s_class">
                  <option value="">--Your class ?--</option>
                  <?php  $class=$PostCon->c_class_view();
                  foreach ($class as $value) {?>
                  <option value="<?php echo $value['class_id']; ?>" <?php if ($value['class_id']==$view['s_class']){ echo 'selected';} ?>><?php echo $value['c_name'];?></option>
                  <?php } ?>
                </select>
              </div>
              <div id="teacher_form" style="display:none";>
                <p>Teacher Information:</p>
                <input type="text" class="wp-form-control wpcf7-text" placeholder="Type your subject" name="t_subject" value="<?php echo $view['t_subject']; ?>">
                <input type="text" class="wp-form-control wpcf7-text" placeholder="Your Qualification" name="t_qualification" value="<?php echo $view['t_qualification']; ?>">
              </div>
              <p>User Name:</p>
              <input type="text" class="wp-form-control wpcf7-text" placeholder="Your frist unique user name" name="user_name" value="<?php echo $view['user_name']; ?>">
              <input type="text" class="wp-form-control wpcf7-text" placeholder="Your frist name" name="user_f_name" value="<?php echo $view['user_f_name']; ?>">
              <p>Gender:</p>
              <select class="wp-form-control wpcf7-text" name="user_gender">
                <?php if ($view['user_gender']=='Male') { ?> 
                <option value="Male" selected>Male</option>
                <option value="Female">Female</option>
                <?php  } else { ?>
                <option value="Male" >Male</option>
                <option value="Female" selected>Female</option>
                <?php } ?>
              </select>
              <p>Email:</p>
              <input type="email" class="wp-form-control wpcf7-email" name="user_email" placeholder="Email address" value="<?php echo $view['user_email']; ?>">
              <p>Date of Birth(YYYY-MM-DD):</p>
              <input type="date" class="wp-form-control wpcf7-text" name="user_birthday" placeholder=" Year-Month-Day" value="<?php echo $view['user_birthday']; ?>">
              <p>Password:</p>
              <input type="password" class="wp-form-control wpcf7-password" name="user_password" placeholder="Your password">
              <input type="password" class="wp-form-control wpcf7-password" placeholder="Retype password">
              <p>About You:</p>   
              <textarea class="wp-form-control wpcf7-textarea" name="user_about" cols="30" rows="10" placeholder="What would you like to tell us" ><?php echo $view['user_about']; ?></textarea>         
            </div>
            <div class="fadeInRight col-lg-4 col-md-4 col-sm-4" >
              <h3>You Profile Photo</h3>
              <input type='file' class="wp-form-control" id="imgInp" name="user_image"/>
              <img id="blah" src="#" alt="Image" style="width: 270px; height: 256px;"/>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8">
              <input type="submit" value="Submit" class="wpcf7-submit" >
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <?php include('footer.php') ?>

</body>
</html>
<script >
  function readURL(input) {

    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $('#blah').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
  $("#imgInp").change(function(){
    readURL(this);
  });
  function myFunction() {
    $("#mySelect").change(function() { 
      if ( $(this).val() == "student")
      { 
        $("#teacher_form").hide();
        $("#student_form").show();
      }
      else
        {   $("#student_form").hide();
      $("#teacher_form").show();
    }
  });
  }
</script>