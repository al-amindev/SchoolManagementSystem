<?php include('header.php');
$result=$PostCon->c_gallery_photo_view();
?>
<!DOCTYPE html>
<html lang="en">
<body>

    <!--=========== BEGIN COURSE BANNER SECTION ================-->
    <section id="gallery_banner">
      <h2></h2>
    </section>
    <!--=========== END COURSE BANNER SECTION ================-->
    
    <!--=========== BEGIN GALLERY SECTION ================-->
    <section id="gallery">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div id="gallerySLide" class="gallery_area">
            <?php foreach ($result as $value)
            { ?>
                <a href="<?php echo $value['g_image_path']?>" title="<?php echo $value['img_title']?>">
                  <img class="gallery_img" src="<?php echo $value['g_image_path']?>" alt="img" />
                <span class="view_btn">View</span>
                </a>
                <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--=========== END GALLERY SECTION ================-->
    
<?php include('footer.php') ?>

  </body>
</html>