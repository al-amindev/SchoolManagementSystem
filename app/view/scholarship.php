<!DOCTYPE html>
<html lang="en">
<?php include('header.php') ?>
<body>
  <section id="scholarship_banner">
    <h2></h2>
  </section>
  <section id="courseArchive">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8">
          <div class="courseArchive_content">
            <div class="row">
              <div class="col-lg-12 col-12 col-sm-12">
                <div class="single_blog">
                  <div class="blogimg_container">
                    <a href="#" class="blog_img">
                      <img alt="img" src="asset/image/site/blog.jpg">
                    </a>
                  </div>
                  <h4 class="blog_title">List of the student who are achive scholarship (500TK per month)</h4>
                    <div class="blog_commentbox">
                      <table class="table">
                        <tr>
                          <th>Name</th>
                          <th>ID</th>
                          <th>Class </th>
                          <th>Prsent</th>
                          <th>Average Marks</th>
                          <th>Image</th>
                        </tr>
                        <?php 
                        $result=$PostCon->generate_scholarship();
                        foreach ($result as $key => $value)
                        {
                          if ($value['persenr_attend']>95 AND $value['average_mark']>80) { ?>
                          <tr>
                            <td> <?php echo $value['user_f_name'] ; ?></td>
                            <td> <?php echo $value['reg_number'] ; ?></td>
                            <td> <?php echo $value['c_name'] ; ?></td>
                            <td> <?php  echo round($value['persenr_attend']).'%' ?> </td>
                            <td> <?php echo $value['average_mark'] ; ?></td>
                            <td> <img src="<?php echo $value['user_image'] ; ?>" style="hight:70px; width:70px"></td>
                          </tr>
                          <?php } }?>
                        </table> 
                      </div>
                      <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                      <blockquote>
                        <span class="fa fa-quote-left"></span>
                        Duis erat purus, tincidunt vel ullamcorper ut, consequat tempus nibh. Proin condimentum risus ligula, dignissim mollis tortor hendrerit vel.
                      </blockquote>
                    </div>                 
                  </div>             
                </div>                     
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
              <div class="courseArchive_sidebar">
                <div class="single_sidebar">
                  <h2>Popular Events <span class="fa fa-angle-double-right"></span></h2>
                  <ul class="news_tab">
                    <li>
                      <div class="media">
                        <div class="media-left">
                          <a href="#" class="news_img">
                            <img alt="img" src="asset/image/news/news.jpg" class="media-object">
                          </a>
                        </div>
                        <div class="media-body">
                          <a href="#">Dummy text of the printing and typesetting industry</a>
                          <span class="feed_date">28.02.15</span>                
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="media">
                        <div class="media-left">
                          <a href="#" class="news_img">
                            <img alt="img" src="asset/image/news/news.jpg" class="media-object">
                          </a>
                        </div>
                        <div class="media-body">
                          <a href="#">Dummy text of the printing and typesetting industry</a>
                          <span class="feed_date">28.02.15</span>                
                        </div>
                      </div>
                    </li>                  
                  </ul>
                </div>
                <div class="single_sidebar">
                  <h2>Category <span class="fa fa-angle-double-right"></span></h2>
                  <ul>
                    <li><a href="#">Food</a></li>
                    <li><a href="#">Technology</a></li>
                    <li><a href="#">Fashion</a></li>
                    <li><a href="#">Business</a></li>
                    <li><a href="#">Games</a></li>
                  </ul>
                </div>
                <div class="single_sidebar">
                  <h2>Tags <span class="fa fa-angle-double-right"></span></h2>
                  <ul class="tags_nav">
                    <li><a href="#"><i class="fa fa-tags"></i>Creative</a></li>
                    <li><a href="#"><i class="fa fa-tags"></i>News</a></li>
                    <li><a href="#"><i class="fa fa-tags"></i>Technology</a></li>
                    <li><a href="#"><i class="fa fa-tags"></i>Art</a></li>
                    <li><a href="#"><i class="fa fa-tags"></i>Audio</a></li>
                    <li><a href="#"><i class="fa fa-tags"></i>video</a></li>
                  </ul>
                </div>
                <div class="single_sidebar">
                  <h2>Sponsor Add <span class="fa fa-angle-double-right"></span></h2>
                  <a class="side_add" href="#"><img src="asset/image/ads/side-add.jpg" alt="img"></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <?php include('footer.php') ?>
    </body>
    </html>