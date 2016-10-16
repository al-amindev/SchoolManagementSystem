	<?php // SELECT c_name,s_name,reg_number from result r 
	// INNER JOIN subject s ON r.subject_id=s.subject_id 
	// INNER JOIN class c ON c.class_id = r.class_id 
	// ORDER BY c_name


	  include('header.php');

	    $result=$PostCon->c_result_list_admin();
	    ?>

	<!DOCTYPE html>
	<html lang="en">  
	<body>
	    <!--=========== BEGIN COURSE BANNER SECTION ================-->
	    <section id="result_list">
	      <h2> </h2>
	    </section>
	    <section id="listview">
	    <div class="col-xs-12 col-md-12 col-sm-12">
	    <div class="row">
	       <div class="col-lg-12 col-md-12"> 
	         <div class="title_area">
	           <h2 class="title_two"></h2>
	           <span></span> 
	           <button onclick="mytest()">Print this page</button>
	           <script>
	           function mytest() {
	               window.print();
	           }
	           </script>
	           <p>Toatal Result That are published</p>
	         </div>
	       </div>
	    </div>
	<!-- Stack the columns on mobile by making one full-width and the other half-width -->
	<div class="row" style=" border: 1px solid green; background-color:#6DADC4;  opacity: 0.7" >
	  <div class="col-xs-3 col-md-3 col-sm-3">Class name</div>
	  <div class="col-xs-3 col-md-3 col-sm-3">Subject Name</div>
	  <div class="col-xs-3 col-md-3 col-sm-3">Reg Number</div>
	  <div class="col-xs-3 col-md-3 col-sm-3">GPA or Marks</div>
	</div>
			<?php foreach ($result as $value) {
			 ?>

	<div class="row" class="background-color: green;color: white;">
	<div class="col-xs-3 col-md-3 col-sm-3"><?php echo $value['c_name']; ?></div>
	<div class="col-xs-3 col-md-3 col-sm-3"><?php echo $value['s_name']; ?></div>
	<div class="col-xs-3 col-md-3 col-sm-3"><?php echo $value['reg_number']; ?></div>
	<div class="col-xs-3 col-md-3 col-sm-3"><?php echo $value['gpa']; ?></div>
	</div>
	<?php }?>

	    	</div>
	    </section>
	    <?php include('footer.php'); ?>

	  </body>
	</html>

	?>