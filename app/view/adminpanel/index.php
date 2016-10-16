<?php require_once('header.php'); ?>
      <section id="main-content">
          <section class="wrapper">            
			  <div class="row">
				<div class="col-lg-12">
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
						<li><i class="fa fa-laptop"></i>Dashboard</li>						  	
					</ol>
				</div>
			</div>
            <?php 
            if (isset($_GET) AND isset($_GET['page']))
            {    
            switch ($_GET['page']) 
                {
                    case 'teacherlist':
                        require('teacherlist.php');
                        break;
                    case 'iuteacher':
                        require('iuteacher.php');
                        break;
                        case 'adminlist':
                            require('adminlist.php');
                            break;
                        case 'iuadmin':
                            require('iuadmin.php');
                            break;
                    case 'studentlist':
                        require('studentlist.php');
                        break;
                    case 'iustudent':
                        require('iustudent.php');
                        break;
                    case 'class':
                        require('class.php');
                        break;
                    case 'iuclass':
                        require('iuclass.php');
                        break;
                    case 'iusubject':
                        require('iusubject.php');
                        break;
                    case 'subject':
                        require('subject.php');
                        break;
                    case 'attendance':
                        require('attendance.php');
                         break;
                    case 'addattendance':
                        require('addattendance.php');
                         break;
                    case 'result':
                        require('resultlist.php');
                         break;
                    case 'addresult':
                        require('addresult.php');
                         break;
                    case 'editresult':
                        require('editresult.php');
                        break;
                    case 'noticelist':
                        require('noticelist.php');
                        break;
                    case 'iunotice':
                        require('iunotice.php');
                        break;                
                    case 'editnotice':
                        require('editnotice.php');
                        break;
                    case 'feedback':
                        require('feedback.php');
                        break;
                    case 'content':
                        require('content.php');
                        break;
                    case 'profile':
                        require('profile.php');
                        break;
                    default:
                        require('home.php');
                        break;
                }
            }
            else
             require('home.php'); ?>
            <div class="row">
			</div>
          </section>
      </section>
 <?php require('footer.php'); ?>