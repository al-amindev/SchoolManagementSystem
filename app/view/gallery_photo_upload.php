<?php
 include('header.php') ;
  if(isset($_POST) and !empty($_POST))
  {
    if( $_FILES['gallery_photo_upload']['name'] !=NULL AND isset($_FILES['gallery_photo_upload']['name'])  )
    {
      $filename = $_FILES['gallery_photo_upload']['tmp_name'];
      $directory='asset/image/gallery/';
      $destination = $directory.basename($_FILES['gallery_photo_upload']['name']);
      move_uploaded_file($filename, $destination);
      $photoname=$_FILES['gallery_photo_upload']['name'];
      $imagepath='asset/image/gallery/'.$photoname;
      $result=$PostCon->c_gallery_photo($_POST,$imagepath);
      if ($result) 
      {
        echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
      }
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
  
<body>
    <section id="registration">
      <div class="container" style="padding-top: 120px">
       <div class="row">
       <div class="registration_form wow fadeInLeft">
         <form class="submitphoto_form" action="" enctype="multipart/form-data" method="POST">
           <div class="col-lg-8 col-md-8 col-sm-8">
           <h3>
             Gallery Image Title
           </h3>
           <input type="text" class="wp-form-control wpcf7-text" name="image_title" placeholder="Type your Gaallery Title">
             <h3>Photo</h3>
                <input type='file' class="wp-form-control" id="imgInp" name="gallery_photo_upload"/>
                <img id="blah" src="#" alt="Image" style="width: 270px; height: 256px;"/>
           </div>
           <br>
         <div class="col-lg-8 col-md-8 col-sm-8">
         <input type="submit" value="Submit" class="wpcf7-submit" >
         </div>
         </form>
         </div>
       </div>
      </div>
    </section>
    <?php include('footer.php') ?>
  </body>
</html>