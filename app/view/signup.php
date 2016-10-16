<?php
include('header.php') ;
$user_f_name='';
$user_name='';
$user_email='';
$user_type='';
$user_gender='';
$user_password='';


$ename='';
$euser_name='';
$euser_email='';
$euser_type='';
$euser_gender='';
$euser_password='';
if(isset($_POST) and !empty($_POST) AND isset($_POST['user_name']))
  { 
  $user_f_name = strip_tags ($_POST['user_f_name']);
  $user_name = strip_tags ($_POST['user_name']);
  $user_email = strip_tags ($_POST['user_email']);
  $user_type = strip_tags ($_POST['user_type']);
  $user_gender = strip_tags ($_POST['user_gender']);
  $user_password = strip_tags ($_POST['user_password']);


      $er = 0;
      if($user_f_name == "")
      {
        $er++;
        $ename = "Required";
      }
      if($user_name == "")
      {
        $er++;
        $euser_name = "Required";
      }
      if($user_email == "")
      {
        $er++;
        $euser_email = "Required";
      }
      if($user_type =='')
      {
        $er++;
        $euser_type = "Select One";
      }
      if($user_gender == "")
      {
        $er++;
        $euser_gender = "Select One";
      }
        
      if($user_password == "")
      {
        $er++;
        $euser_password = "Required";
      }
         if($er == 0)
             {
             
    if ($_POST['captcha']==$_SESSION['captcha']) {
    if( $_FILES['user_image']['name'] !=NULL AND isset($_FILES['user_image']['name'])  )
    {
      $filename = $_FILES['user_image']['tmp_name'];
      $directory='asset/image/user/';
      $destination = $directory.basename($_FILES['user_image']['name']);
      move_uploaded_file($filename, $destination);
      $photoname=$_FILES['user_image']['name'];
      $_POST['user_image']='asset/image/user/'.$photoname;
      $result=$PostCon->c_svae_reg_data($_POST);
      if ($result) {
        echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
      }
    }
    else
      $result=$PostCon->c_svae_reg_data($_POST);
    if ($result) 
    {
      echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
    }
// header('Location:viewall.php');
# code...
  }
}
  else
    $captchaerrot="your captcha is not correct";
}
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
        <div class="registration_form ">
          <form class="form-horizontal" method="POST" enctype="multipart/form-data">
            <!-- From address and to address -->
            <div class="form-group">
              <label for="inputText" class="col-sm-2 control-label">Name</label>
              <div class="col-sm-4">
                <input type="text" name="user_f_name" class="form-control" placeholder="User Full Name" value="<?php echo $user_f_name ?>"><span class="error"><?php echo $ename; ?></span>
              </div>
              <label for="inputText" class="col-sm-2 control-label">User Name</label>
              <div class="col-sm-3">
                <input type="text" name="user_name" class="form-control" placeholder="User Name" value="<?php echo $user_name ?>"><span class="error"><?php echo $euser_name; ?></span>
              </div>
            </div>
            <!-- Type of flight class and view price-->
            <div class="form-group">
              <label for="inputPassword" class="col-sm-2 control-label">User Type</label>
              <div class="col-sm-4">
                <select class="form-control" name="user_type" id="select_form" onchange="myusertype(this.value)">
                  <option value="" selected>Select One</option>
                  <option value="student" <?php if($user_type=='student') echo 'selected'; ?> >Student</option>
                  <option value="teacher" <?php if($user_type=='teacher') echo 'selected'; ?>>Teacher</option>
                </select><span class="error"><?php echo $euser_type; ?></span>
              </div>
              <label for="input" class="col-sm-2 control-label">Gender </label>
              <div class="col-sm-3" >
                <select class="form-control" name="user_gender">
                  <option value="Male" <?php if($user_gender=='Male') echo 'selected'; ?> >Male</option>
                  <option value="Female" <?php if($user_gender=='Female') echo 'selected'; ?> >Female</option>
                </select><span class="error"><?php echo $euser_gender; ?></span>
              </div>
            </div>
            <div  style="display:none" id="student_f" class="form-group">
              <label class="col-sm-2 control-label">ID Number</label>
              <div class="col-sm-4">
                <input type="date" class="form-control" name="s_reg_num" placeholder="Your Subect">
              </div>
              <label class="col-sm-2 control-label"  >Class</label>
              <div class="col-sm-3">
                <select class="form-control" name="s_class">
                  <option value="">--Select Your class--</option> 
                  <?php  $class=$PostCon->c_class_view(); foreach ($class as $value) {?>
                  <option value="<?php echo $value['class_id'];?>"><?php echo $value['c_name'];?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div style="display:none" id="teacher_f" class="form-group">
              <label class="col-sm-2 control-label">Subject</label>
              <div class="col-sm-4">
                <input type="date" class="form-control" name="t_subject" placeholder="Your Subect">
              </div>
              <label class="col-sm-2 control-label"  >Qualification</label>
              <div class="col-sm-3">
                <input type="date" class="form-control" name="t_qualification" placeholder="Your Qualification">
              </div>
            </div>
            <div class="col-sm-12 ">
              <div class="col-sm-6 " style="float:left">
                <div class="form-group">
                  <label  class="col-sm-4 control-label">Email</label>
                  <div class="col-sm-8">
                    <input type="email" name="user_email" class="form-control" placeholder="user-email@domain.com" value="<?php echo $user_email; ?>"><span class="error"><?php echo $euser_email; ?></span>
                  </div><br><br><br>
                  <label class="col-sm-4 control-label">Password</label>
                  <div class="col-sm-4 form-group">
                    <input type="password" name="user_password" class="form-control" placeholder="Enter your password">
                  </div>
                  <div class="col-sm-4 form-group">
                    <input type="password" name="reuser_password" class="form-control" placeholder="Retype password"><br><span class="error"><?php echo $euser_password; ?></span>
                  </div> <br><br><br>
                  <label  class="col-sm-4 control-label">Captcha</label>
                  <div class="col-sm-4 form-group">
                    <input type="text" name="captcha" class="form-control" placeholder="enter the code"><br>
                   <p class="error"> <?php if (isset($_POST) AND isset($_POST['captcha'])) { echo $captchaerrot; }?> </p>
                    </div>
                    <div class="col-sm-3" id="captchaimage"> <img style="padding: 5px; width: 100px; border-radius: 8px;"  src="captcha.php" /></div>
                    <div class="col-sm-1"> <img id="cliakimage" src="asset/image/icon/captcharefresh.png"></div>
                  </div>
                </div>
                <div class="col-sm-6" style="float:right">
                  <div class="form-group">
                    <label for="inputFile" class="col-sm-4 control-label">Photo</label>
                    <div class="col-sm-8">
                      <input type="file" name="user_image" id="imgInp" title="Select one image">
                      <br><br>
                      <img id="blah" class="img-responsive" src="asset/image/user/default_profile.png" alt="Image" style="width: 198px; height: 181px; border:2px solid rgb(120, 173, 201)"/>
                    </div>
                  </div>  
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-5 control-label"></label>
                <div  class="col-sm-2 ">
                  <button type="submit" value="submit" class="btn wpcf7-submit btn-lg active" style="text-align:center">Submit</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <?php include('footer.php') ?>
  </body>
  </html>

  <script type="text/javascript">
    function myusertype() {
      $("#select_form").change(function() { 
        if ( $(this).val() == "student")
        { 
          $("#teacher_f").hide();
          $("#student_f").show();
        }
        else if($(this).val() == "teacher")
          {   $("#student_f").hide();
        $("#teacher_f").show();
      }
      else
      {
        $("#student_f").hide();
        $("#teacher_f").hide();
      }
    });
    }

    $(document).ready(function(){
      $("#captchabutton").click(function(){
        $("").load("http://localhost/schoolwebsite/app/view/captcha.php");
      });
    });

    $(document).ready(function(){
      $("#captchabutton").click(function(){
        $("#captchaimage").attr()({
          'src':'http://localhost/schoolwebsite/app/view/captcha.php'
        });
      });
    });

    function readURL(input) 
    {
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

    $(function(){
      $("#cliakimage").click(function(){
        callcaptcha();
      });
    });

    function callcaptcha()
    {
      var xhttp;    
      xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
          document.getElementById("captchaimage").innerHTML = xhttp.responseText;
        }
      }
      xhttp.open("GET", "captcha.php?recaptcha=1", true);
      xhttp.send();
    }
  </script>