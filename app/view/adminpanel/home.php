				<?php $student=$PostCon->count_all('student');
				 ?>
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
				<a href="?page=studentlist">
					<div class="info-box blue-bg">
						<i class="fa fa-cloud-download"></i>
						<div class="count"><?php echo $student[0]['users']; ?></div>
						<div class="title">Total Student</div>						
					</div><!--/.info-box-->
				</a>	
				</div><!--/.col-->
				<?php $teacher=$PostCon->count_all('teacher') ?>
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
				<a href="?page=teacherlist">
					<div class="info-box brown-bg">
						<i class="fa fa-shopping-cart"></i>
						<div class="count"><?php echo $teacher[0]['users']; ?></div>
						<div class="title">Teacher</div>						
					</div><!--/.info-box-->	
				</a>		
				</div><!--/.col-->	
				<?php $admin=$PostCon->count_all('admin') ?>
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
				<a href="?page=adminlist">
					<div class="info-box dark-bg">
						<i class="fa fa-thumbs-o-up"></i>
						<div class="count"><?php echo $admin[0]['users']; ?></div>
						<div class="title">Admin</div>						
					</div><!--/.info-box-->
				</a>	
				</div><!--/.col-->
				
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="info-box green-bg">
						<i class="fa fa-cubes"></i>
						<div class="count">72%</div>
						<div class="title">More count</div>						
					</div><!--/.info-box-->			
				</div><!--/.col-->