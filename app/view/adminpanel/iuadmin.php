<?php 
require_once("../../Config.php");
require_once (SITE_PATH."/controller/PostController.php");
$PostCon=new PostController;
$user_type=$PostCon->user_type();
?>
<!-- Update the Data-->
<!-- ///////////////////////////////////////////////////////////////// -->
<?php  if (isset($_GET) AND isset($_GET['id']))
{ if (isset($_POST) AND isset($_POST['user_name']))
  {
    $_POST['user_modify']=date('Y-m-d h:i:s');
      $_POST['user_image']=$PostCon->upload_image($_FILES,'user/');
      $_POST['user_type']='admin';
     $results=$PostCon->update_data('user',$_POST,$_GET['id']);
    if ($results)
    {
    echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
    }
  }

  $datas=$PostCon->select_one('user','user_id='.$_GET['id']);
  foreach ($datas as $data) {} ?>
  <section id="view_data" class="panel">
    <header class="panel-heading">
      Update Admin
    </header>
    <div class="panel-body">
      <form method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
        <div class="form-group">
        <label class="control-label col-lg-2" for="inputSuccess">Admin Name</label>
        <div class="col-sm-5">
           <input class="form-control input-md m-bot15" type="text"  name="user_f_name" placeholder="Your Full Name" value="<?php echo $data['user_f_name'] ?>">
        </div>
        </div>

        <div class="form-group">
        <label class="control-label col-lg-2" for="inputSuccess">User Name</label>
          <div class="col-sm-5">
             <input class="form-control input-md m-bot15" type="text"  name="user_name" placeholder="user Name" value="<?php echo $data['user_name'] ?>">
          </div>
        </div>
        <input  type="hidden" name="user_type" value="admin">
        <div class="form-group">
        <label class="control-label col-lg-2" for="inputSuccess">Select Gender</label>
          <div class="col-sm-5">
             <select class="form-control" name="user_gender">
                <option value="Male" <?php if($data['user_gender']=='Male') echo 'selected' ?> >Male</option>
                <option value="Female" <?php if($data['user_gender']=='Female') echo 'selected' ?>  >Female</option>
             </select>
          </div>
        </div>

        <div class="form-group">
        <label class="control-label col-lg-2" for="inputSuccess">Email</label>
          <div class="col-sm-5">
             <input class="form-control input-md m-bot15" type="text"  name="user_email" placeholder="admin Name" value="<?php echo $data['user_email'] ?>">
          </div>
        </div>
        <div class="form-group">
        <label class="control-label col-lg-2" for="inputSuccess">Password</label>
          <div class="col-sm-5">
             <input class="form-control input-md m-bot15" type="text"  name="user_password" placeholder="admin Name" >
          </div>
        </div>
        <div class="form-group">
        <label class="control-label col-lg-2">admin Cover Photo</label>
          <div class="col-sm-5">
             <input type="file"  name="image" placeholder="admin Image">
          </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2">Aoubt Details</label>
            <div class="col-sm-5">
                <textarea class="form-control" name="user_about" rows="4" ><?php echo $data['user_about'] ?></textarea>
            </div>
        </div>
        <div class="col-lg-offset-2 col-lg-5">
          <button type="submit" class="btn btn-success" value="submit_result">Submit</button>
        </div>
      </form>
    </div>
  </section>

<?php 
} 
else 
//////////////////////////Inser New data ////////////////////////////////
{
  if(isset($_POST) AND !empty($_POST) AND isset($_POST['user_name']))
    {
      $_POST['s_reg_num']=NULL;
      $_POST['s_class']=NULL;
      $_POST['t_subject']=NULL;
      $_POST['t_qualification']=NULL;
      $_POST['user_varify']='1';
      $_POST['user_active']='1';
      $_POST['user_image']=$PostCon->upload_image($_FILES,'user/');
      $results=$PostCon->c_svae_reg_data($_POST);
      if ($results)
      {
      echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
      }
    }
 ?>
 <!-- /////////////////////////////////////////////////////////////////// -->
<section id="view_data" class="panel">
  <header class="panel-heading">
    New admin
  </header>
  <div class="panel-body">
          <form method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
        <div class="form-group">
        <label class="control-label col-lg-2" for="inputSuccess">Admin Name</label>
        <div class="col-sm-5">
           <input class="form-control input-md m-bot15" type="text"  name="user_f_name" placeholder="admin Name" >
        </div>
        </div>

        <div class="form-group">
        <label class="control-label col-lg-2" for="inputSuccess">User Name</label>
          <div class="col-sm-5">
             <input class="form-control input-md m-bot15" type="text"  name="user_name" placeholder="admin Name" >
          </div>
        </div>
        <input  type="hidden" name="user_type" value="admin">
        <div class="form-group">
        <label class="control-label col-lg-2" for="inputSuccess">Select Gender</label>
          <div class="col-sm-5">
             <select class="form-control" name="user_gender">
                <option value="Male" selected>Male</option>
                <option value="Female">Female</option>
             </select>
          </div>
        </div>
        <div class="form-group">
        <label class="control-label col-lg-2" for="inputSuccess">Email</label>
          <div class="col-sm-5">
             <input class="form-control input-md m-bot15" type="text"  name="user_email" placeholder="admin Email" >
          </div>
        </div>
        <div class="form-group">
        <label class="control-label col-lg-2" for="inputSuccess">Password</label>
          <div class="col-sm-5">
             <input class="form-control input-md m-bot15" type="password"  name="user_password" placeholder="Inter your Password" >
          </div>
        </div>
        <div class="form-group">
        <label class="control-label col-lg-2">admin Profile Photo</label>
          <div class="col-sm-5">
             <input type="file"  name="image" placeholder="admin Image">
          </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2">About Details</label>
            <div class="col-sm-5">
                <textarea class="form-control" name="user_about" rows="4" ></textarea>
            </div>
        </div>
        <div class="col-lg-offset-2 col-lg-5">
          <button type="submit" class="btn btn-success" value="submit_result">Submit</button>
        </div>
      </form>
  </div>
</section>
<?php } ?>