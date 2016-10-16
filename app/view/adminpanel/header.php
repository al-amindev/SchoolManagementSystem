<?php
require_once("../../Config.php");
require_once (SITE_PATH."/controller/PostController.php");
$controller=new Controller;
if ($controller->login_session()==true)
{
    $PostCon=new PostController;
    $user_type=$PostCon->user_type();
}
else
{
    header('location:login.php');
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

    <title>Miarhat High School</title>   
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />    
    <link href="css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/dataTables.bootstrap.css">
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
  </head>
  <body>
  <section id="container" class="">
      <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="fa fa-bars fa-lg"></i></div>
            </div>
            <a href="index.php" class="logo">miarhat <span class="lite">high school</span></a>
            <div class="top-nav notification-row">                
                <ul class="nav pull-right top-menu">
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="<?php echo '../'.$_SESSION['user_image'] ?>" style="hight:60px; width:60px;">
                            </span>
                            <span class="username"><?php echo $_SESSION['user_name'] ?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <i class="log-arrow-up"></i>
                            <li class="eborder-top">
                                <a href="?page=profile"><i class="fa fa-user fa-lg"></i> My Profile</a>
                            </li>
                            <li>
                                <a href="logout.php"><i class="fa fa-power-off fa-lg"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
      </header>      
      <?php if ($user_type==1) {?>
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <li class="active">
                      <a class="" href="index.php">
                          <i class="fa fa-tachometer"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
				  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="fa fa-user"></i>
                          <span>Users</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="?page=adminlist">Admin</a></li>
                          <li><a class="" href="?page=studentlist">Student</a></li>    
                          <li><a class="" href="?page=teacherlist">Teacher</a></li>
                      </ul>
                  </li>       
                  <li>                     
                      <a class="" href="?page=class">
                          <i class="fa fa-th-large"></i>
                          <span>Class</span>
                      </a>
                                         
                  </li>
                  <li>                     
                      <a class="" href="?page=subject">
                          <i class="fa fa-sitemap"></i>
                          <span>Subject</span>
                      </a>                 
                  </li>
                  <li>                     
                      <a class="" href="?page=attendance">
                          <i class="fa fa-sitemap"></i>
                          <span>Attendance</span>
                      </a>                 
                  </li>
                  <li>
                      <a class="" href="?page=result">
                          <i class="fa fa-archive"></i>
                          <span>Result</span>
                      </a>
                  </li>
                  <li>                     
                      <a class="" href="?page=noticelist">
                          <i class="fa fa-list-alt"></i>
                          <span>Notice</span>
                      </a>                 
                  </li>
                   <li>                     
                       <a class="" href="?page=feedback">
                           <i class="fa fa-frown-o"></i>
                           <span>Feedback</span>
                           
                       </a>                   
                   </li>          

                  <li class="sub-menu">
                      <a  class="">
                          <i class="icon_documents_alt"></i>
                          <span>Content</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub"> 
                          <li><a class="" href="?page=about_us">About Us</a></li>
                          <li><a class="" href="?page=about_org">About Organization</a></li>                       
                          <li><a class="" href="?page=mission_vission">About Mission Vission</a></li>
                          <li><a class="" href="?page=about_teacher">About Teacher</a></li>
                          <li><a class="" href="?page=about_student">About Student</a></li>
                          <li><a class="" href="?page=slider">Slide Image</a></li>
                          <li><a class="" href="?page=scholarship">Scholarship</a></li>
                          <li><a class="" href="?page=footer">Footer</a></li>
                          <li><a class="" href="?page=login"><span>Login Page</span></a></li>
                          <li><a class="" href='?page=content"'>Copntent</a></li>
                          <li><a class="" href="?page=404.html">404 Error</a></li>
                      </ul>
                  </li>
              </ul>
          </div>
      </aside>
      <?php } 
      if ($user_type==2) { ?>
           <aside>
               <div id="sidebar"  class="nav-collapse ">
                   <ul class="sidebar-menu">                
                       <li class="active">
                           <a class="" href="index.php">
                               <i class="fa fa-tachometer"></i>
                               <span>Dashboard</span>
                           </a>
                       </li>
              <li class="sub-menu">
                           <a href="javascript:;" class="">
                               <i class="fa fa-user"></i>
                               <span>Users</span>
                               <span class="menu-arrow arrow_carrot-right"></span>
                           </a>
                           <ul class="sub">
                               <li><a class="" href="?page=studentlist">Student</a></li>    
                           </ul>
                       </li>       
                       <li>                     
                           <a class="" href="?page=attendance">
                               <i class="fa fa-sitemap"></i>
                               <span>Attendance</span>
                           </a>                 
                       </li>
                       <li>
                           <a class="" href="?page=result">
                               <i class="fa fa-archive"></i>
                               <span>Result</span>
                           </a>
                       </li>
                       <li>                     
                           <a class="" href="?page=noticelist">
                               <i class="fa fa-list-alt"></i>
                               <span>Notice</span>
                           </a>                 
                       </li>        
                   </ul>
               </div>
           </aside>
      <?php } ?>