<?php
require("../Config.php");
require (SITE_PATH."/controller/PostController.php");
$PostCon=new PostController;
$user_type=$PostCon->user_type_client();
    if(isset($_POST) and !empty($_POST) AND isset($_POST['user_input_login']))
    {
      $result=$PostCon->c_sign_in_client($_POST);
     if ($result)
     {
      header("location:index");
     }
    }
?>
<head>
  <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MiarHat High School : Home</title>
  <!-- Mobile Specific Metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/icon" href="asset/image/icon/wpf-favicon.png"/>
  <!-- CSS
    ================================================== -->       
    <!-- Bootstrap css file-->
    <link href="asset/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font awesome css file-->
    <link href="asset/css/font-awesome.min.css" rel="stylesheet">
    <!-- Superslide css file-->
    <link rel="stylesheet" href="asset/css/superslides.css">
    <!-- Slick slider css file -->
    <link href="asset/css/slick.css" rel="stylesheet">  
    <!-- smooth animate css file -->
    <link rel="stylesheet" href="asset/css/animate.cs"> 
    <!-- preloader -->
    <link rel="stylesheet" href="asset/css/queryLoader.css" type="text/css" />
    <!-- gallery slider css -->
    <link type="text/css" media="all" rel="stylesheet" href="asset/css/jquery.tosrus.all.css" />    
    <!-- Default Theme css file -->
    <?php
    if (isset($_SESSION) AND !empty($_SESSION) AND isset($_SESSION['theme'])) 
      { ?>
        <link id="switcher" href="asset/css/themes/<?php echo $_SESSION['theme'].'-theme.css'; ?>" rel="stylesheet">
        <?php 
      } 
    else 
      { ?>
      <link id="switcher" href="asset/css/themes/default-theme.css" rel="stylesheet">
      <?php } ?>
  <!-- Google fonts -->
  <link href='http://fonts.googleapis.com/css?family=Merriweather' rel='stylesheet' type='text/css'>   
  <link href='http://fonts.googleapis.com/css?family=Varela' rel='stylesheet' type='text/css'>
    <!-- Main structure css file -->
  <link href="style.css" rel="stylesheet">
</head>
<!-- SCROLL TOP BUTTON -->
<a class="scrollToTop" href="#"></a>
<!-- END SCROLL TOP BUTTON -->
<body> 
  <!--=========== BEGIN HEADER SECTION ================-->
  <header id="header">
    <!-- BEGIN MENU -->

    <div class="menu_area"> 
      <nav class="navbar navbar-default navbar-fixed-top" role="navigation"> 
        <div class="container">
        <div id="gcs" style="margin-top:-12px">
          <div class="row col-lg-12 col-md-12">
             <?php  echo $PostCon->google_search(); ?>
            </div>
          </div>
          <div class="navbar-header">
            <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->  
            <a href="index"> <img src="asset/image/site/logo.png" style="float:left"></a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <!-- LOGO -->
            <!-- TEXT BASED LOGO -->
            <a class="navbar-brand" href="index"> Miarhat <span>High </span> School</a>              
            <!-- IMG BASED LOGO  -->
            <!-- <a class="navbar-brand" href="index"><img src="img/logo.png" alt="logo"></a>  -->                      
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
              <li class="active"><a href="index">Home</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">About<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">             
                  <li><a href="mission_vission">Mission & Vission</a></li>               
                  <li><a href="about_teacher">Teacher</a></li>
                  <li><a href="about_student">Students</a></li>
                  <li><a href="about_administrator">Administrator</a></li>                             
                </ul>
              </li>
              <?php if ($user_type==3)
              { ?>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">View<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
            <li>
              <li><a href="view_result.php?reg_number=<?php echo $_SESSION['client_s_reg_num']; ?>">Result</a></li>
              <li><a href="view_attendance?reg_number=<?php echo $_SESSION['client_s_reg_num']; ?>">Attendance</a></li>
            </li>
        </ul> 
      </li>
      <li class="dropdown">
        <a href="gallery" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Galery<span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
          <li> <a href="gallery_photo_upload">Upload Photo</a>  </li>
          <li> <a href="gallery">View Galary</a>  </li>
        </ul>
      </li>
      <?php 
    }  
    else 
      { ?>
    <li> <a href="gallery">Galary</a>  </li>
    <?php  
      } ?>
<li><a href="scholarship">Scholarship</a></li>        
<li class="dropdown">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">User<span class="caret"></span></a>
  <ul class="dropdown-menu" role="menu">
    <?php
//Modal Login call the controller function
    $login=$PostCon->login_session_client();
    if ($login==true)
    { 
      ?>
      <li><a href="user_profile"><?php echo $_SESSION['client_user_name'];?></a></li>
      <li><a href="signout">Sign out</a></li>
      <li><a href="user_fdback">Feedback</a></li>
      <?php 
    }
    else 
      { ?> 
        <li><a data-toggle="modal" data-target="#login-modal" class="topLinks">Sign In</a></li>
        <li><a href="signup">Sign Up</a></li> <?php 
      } 
  ?>  
</ul>
</li>            
<li><a href="contact">Contact</a></li>
</ul>           
</div><!--/.nav-collapse -->
</div>     
</nav>  
</div>
<!-- END MENU -->    
</header>
<!--=========== END HEADER SECTION ================--> 
</body>
<!--=========== Sign in modal form start ================--> 

  <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header login_modal_header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body login-modal">
          <p>Please give your username or email id and password </p><br/>
          <div class="clearfix"></div>
          <div id='social-icons-conatainer'>
            <form method="post">
              <p id="check_id"></p>
              <div class="form-group">
                <input type="text" id="text" name ="user_input_login" onchange="myFanction(this.value)" placeholder="Enter your email or username"  class="form-control login-field">
                <i class="fa fa-user login-field-icon"></i>
              </div>
              <div class="form-group">
                <input type="password" id="login-pass" name ="user_password"placeholder="Password" value="" class="form-control login-field">
                <i class="fa fa-lock login-field-icon"></i>
              </div>
              <a href=""><input type="submit" value="Signin" class="btn theme_color modal-login-btn btn-lg"></a><a href="signup" style="float:right">You haven't any account?</a>
            </form>
          </div>
          <div class="clearfix"></div>
          <!--=========== Sign in modal form END ================--> 
        </div>
      </div>
    </div>
  </div>
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