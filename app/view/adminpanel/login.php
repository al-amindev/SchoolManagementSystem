<?php 
require_once("../../Config.php");
require_once (SITE_PATH."/controller/PostController.php");
if(isset($_POST) and !empty($_POST) AND isset($_POST['user_input_login']))
    {
      $PostCon=new PostController;
      $result=$PostCon->c_sign_in($_POST);
     if ($result)
     {
        header("location:index.php");
     }
    }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">
    <title>Miarhat High School | Login </title>
    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
  <body class="login-img3-body">
    <div class="container">
    <h1 class="text-center text-warning">Miarhat High School</h1>
      <form class="login-form" method="POST">
        <div class="login-wrap">
            <p id="check_id"></p>
            <p class="login-img"><i class="fa fa-lock fa-2x"></i></p>
            <div class="input-group">
              <span class="input-group-addon"><i class="icon_profile"></i></span> 
              <input type="text" name="user_input_login" onchange="myFanction(this.value)"  class="form-control" placeholder="Username" autofocus>
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input type="password" name="user_password" class="form-control" placeholder="Password">
            </div>
            <label class="checkbox">
                <input type="checkbox" value="remember-me"> Remember me
                <span class="pull-right"> <a href="#"> Forgot Password?</a></span>
            </label>
            <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
            <button class="btn btn-info btn-lg btn-block" type="submit">Signup</button>
        </div>
      </form>
    </div>
  </body>
  </head>
  </html>

  <script>
function myFanction(str) {
  var xhttp;    
  if (str == "") {
    document.getElementById("check_id").innerHTML = "Type your user name";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("check_id").innerHTML = xhttp.responseText;
    }
  }
  xhttp.open("GET", "check_user_name.php?u="+str, true);
  xhttp.send();
}
</script>