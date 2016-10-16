<?php
  include('header.php');
   $class_id=$_GET['class_id'];
    $result=$PostCon->c_result_by_class($class_id);
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
           <p>Here you can View the result</p>
         </div>
       </div>
    </div>
<!-- Stack the columns on mobile by making one full-width and the other half-width -->
<div class="row" style=" border: 1px solid green; background-color:#6DADC4;  opacity: 0.7" >
  <div class="col-xs-4 col-md-4 col-sm-4">Name</div>
  <div class="col-xs-3 col-md-3 col-sm-3">Reg</div>
  <div class="col-xs-3 col-md-3 col-sm-3">Average Mark OR GPA</div>
</div>
	     	<?php foreach ($result as $value) { ?>

<div class="row" class="background-color: green;color: white;">
<div class="col-xs-4 col-md-4 col-sm-4"><?php echo $value['user_f_name']; ?></div>
<div class="col-xs-3 col-md-3 col-sm-3"><?php echo $value['reg_number']; ?></div>
<div class="col-xs-3 col-md-3 col-sm-3"><?php echo $value['AVERAGE_MARK']; ?></div>
</div>
<?php }?>

    	</div>
    </section>
    <?php include('footer.php'); ?>

  </body>
</html>