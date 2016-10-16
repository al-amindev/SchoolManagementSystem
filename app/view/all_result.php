<!DOCTYPE html>
<html lang="en">
  <?php include('header.php');
 ?>
  <body>
  <pre>
  </pre>
    <!--=========== BEGIN CONTACT SECTION ================-->
    <section id="contact">
      <div class="container"style="padding-top: 120px">
       <div class="row">
       <hr>
       <ul style="list-style-type:square">
          <?php  $result=$PostCon->c_published_result(); foreach ($result as $value) { ?>
          <li style="padding:7px;"><a  href="class_result_publish_1.php?class_id= <?php echo $value['class_id'] ?>&class_name=<?php echo $value['c_name']; ?>" target="_blank" >The Result is published class <?php echo $value['c_name']; ?> </a></li>
          <?php } ?>
       </ul>
     </div>
      </div>
    </section>
    <!--=========== END CONTACT SECTION ================-->
    <?php include('footer.php') ?>

  </body>
</html>