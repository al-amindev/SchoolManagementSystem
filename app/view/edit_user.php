<?php
 include('header.php');
 if(isset($_SESSION['client_user_id']))
 {
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
    $id=$_SESSION['client_user_id'];
  $editvalue=$PostCon->c_svae_reg_update($_POST,$id,$imagepath);
    }
    else
    { 
      if (!empty($_GET)) 
  {
    $id=$_GET['id'];
  }
  else 
    $id=$_SESSION['client_user_id'];
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
    $id=$_SESSION['client_user_id'];
  $editvalue=$PostCon->c_profile_view($id);

 foreach ($editvalue as $view):
  endforeach;
?>
    <!DOCTYPE html>
    <html lang="en">
    <body>
      <!--=========== BEGIN CONTACT SECTION ================-->
      <section id="registration" >
        <div class="container" style="padding-top: 120px">
          <div class="row">
            <div class="registration_form ">
              <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                <!-- From address and to address -->
                <div class="form-group">
                  <label for="inputText" class="col-sm-2 control-label">Name</label>
                  <div class="col-sm-4">
                    <input type="text" name="user_f_name" class="form-control" placeholder="User Full Name" value="<?php echo $view['user_f_name']; ?>" >
                  </div>
                  <label for="inputText" class="col-sm-2 control-label">User Name</label>
                  <div class="col-sm-3">
                    <input type="text" name="user_name" readonly="readonly" class="form-control" placeholder="To Address" value="<?php echo $view['user_name']; ?>" >
                  </div>
                </div>
                <!-- Type of flight class and view price-->
                <div class="form-group">
                  <label for="inputPassword" class="col-sm-2 control-label">User Type</label>
                  <div class="col-sm-4">
                    <select class="form-control" name="user_type" id="select_form" onchange="myusertype(this.value)">
                      <option value="student" >Student</option>
                    </select>
                  </div>
                  <label for="input" class="col-sm-2 control-label">Gender </label>
                  <div class="col-sm-3" >
                    <select class="form-control" name="user_gender">
                      <option value="Male" <?php if ($view['user_gender']=='Male')echo 'selected'; ?> >Male</option>
                      <option value="Female" <?php if ($view['user_gender']=='Female')echo 'selected'; ?>  >Female</option>
                    </select>
                  </div>
                </div>
                <div  id="student_f" class="form-group">
                  <label class="col-sm-2 control-label">ID Number</label>
                  <div class="col-sm-4">
                    <input type="date" class="form-control" readonly="readonly" name="s_reg_num" placeholder="Your Subect" value="<?php echo $view['s_reg_num']; ?>" >
                  </div>
                  <label class="col-sm-2 control-label"  >Class</label>
                  <div class="col-sm-3">
                    <select class="form-control" disabled="disabled" name="s_class">
                      <option value="">Your class</option> 
                      <?php  $class=$PostCon->c_class_view(); foreach ($class as $value) {?>
                      <option value="<?php echo $value['class_id']; ?>" <?php if ($value['class_id']==$view['s_class']){ echo 'selected';} ?>><?php echo $value['c_name']; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="col-sm-12 ">
                  <div class="col-sm-6 " style="float:left">
                      <div class="form-group">
                        <label  class="col-sm-4 control-label">Email</label>
                          <div class="col-sm-8">
                            <input type="email" name="user_email" class="form-control" placeholder="user-email@domain.com" value="<?php echo $view['user_email']; ?>" >
                            </div><hr>
                              <label for="input" class="col-sm-4 control-label">About You</label>
                              <div class="col-sm-8" >
                                <textarea class="form-control" name="user_about"><?php echo $view['user_about']; ?></textarea>
                              </div>
                        </div>
                    </div>
                    <div class="col-sm-6" style="float:right">
                      <div class="form-group">
                      <label class="col-sm-5 control-label">Date of Birth</label>
                      <div class="col-sm-5 form-group">
                        <input type="date" name="user_birthday" class="form-control" placeholder="Enter your date of birth" value="<?php echo $view['user_birthday']; ?>"  >
                      </div>

                        <label for="inputFile" class="col-sm-5 control-label">Photo</label>
                        <div class="col-sm-5">
                          <input type="file" name="user_image" id="imgInp" title="Select one image">
                          <br><br>
                          <img id="blah" class="img-responsive" src="<?php echo $view['user_image']; ?>" alt="Image" style="width: 198px; height: 181px; border:2px solid rgb(120, 173, 201)"/>
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
        <?php } include('footer.php') ?>
      </body>
      </html>

      <script type="text/javascript">
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