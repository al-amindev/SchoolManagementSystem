<?php
require_once("../../Config.php");
require_once (SITE_PATH."/controller/PostController.php");
$PostCon=new PostController;
$user_type=$PostCon->user_type();
$data='student';
 if ($user_type==1)
  {
 if (isset($_GET) AND isset($_GET['sort_class']))
  {
    $result=$PostCon->c_user_list_admin($data, NULL,NULL,$_GET['sort_class']);
  }
  else
    $result=$PostCon->c_user_list_admin($data);
  }
  if ($user_type==2)
  {
    $con='subject.t_assign ='.$_SESSION["user_id"];
    if (isset($_GET) AND isset($_GET['sort_class']))
    {
      $result=$PostCon->c_user_list_admin($data,$con,$_SESSION['user_id'],$_GET['sort_class']);
    }
    else
      $result=$PostCon->c_user_list_admin($data,$con,$_SESSION['user_id']);
  }
?>
<div class="row">
    <div class="col-lg-12">
        <section id="view_data" class="panel">
            <header class="panel-heading">
                <div class="fa fa-user-plus"><a href="?page=iustudent">Create New</a></div>
            </header>
            <h3>Sorting</h3>
            <div class="btn-group">
              <a class="btn btn-primary option_select" href="" title="Select Your Class">Class</a>
              <select  onchange="sort_by_class(this.value)" class="btn btn-primary dropdown-toggle option_select" data-toggle="dropdown" title="Select Your Class">
                <option >Select</option>
                  <?php  
                  { $class=$PostCon->c_class_view(); }
                  foreach ($class as $value) { ?>
                <option value="<?php echo $value['class_id'] ?>" <?php if ( isset($_GET) AND isset($_GET['sort_class']) AND $_GET['sort_class']==$value['class_id']) { echo "SELECTED"; }  ?> > <?php echo $value['c_name']; ?></option>
                <?php } ?>
              </select>
            </div>
            
            <table class="table table-striped table-advance table-hover">
             <tbody>
                <tr>
                   <th><i class="icon_profile"></i>Full Name</th>
                   <th><i class="fa fa-user-md"></i>Username</th>
                   <th><i class="icon_mail_alt"></i> Email</th>
                   <th><i class="icon_calenda"></i> Created</th>
                   <th><i class="fa fa-venus-mars"></i> Gender</th>
                   <th><i class="fa fa-file-text-o"></i>ID Numbe</th>
                   <th><i class="fa fa-clone"></i> Class</th>
                   <?php if ($user_type==1) {?>
                   <th><i class="fa fa-clone"></i> Email Varify</th>
                   <?php } ?>
                   <th><i class="fa fa-clone"></i> Activation</th>
                    <?php if ($user_type==1) {?>
                   <th><i class="icon_cogs"></i> Action</th>
                   <?php } ?>
                </tr>
                <?php foreach ($result as $value) { ?>
                <tr>
                   <td><a href="?page=profile&user_id=<?php echo $value['user_id'] ?>&reg=<?php echo $value['s_reg_num'] ?>"> <?php echo $value['user_f_name']; ?></a></td>
                   <td><?php echo $value['user_name']; ?></td>
                   <td><?php echo $value['user_email']; ?></td>
                   <td><?php echo $value['user_create']; ?></td>
                   <td><?php echo $value['user_gender']; ?></td>
                   <td><?php echo $value['s_reg_num']; ?></td>
                   <td><?php echo $value['s_class']; ?></td>
                   <?php if ($user_type==1) {?>
                   <td><?php if ($value['user_varify']==1) { ?> <a class="btn btn-success" href="<?php echo 'change_state.php?id='.$value['user_id'].'&fild=user_varify&t=user&value=0&p_id=user_id&ret=studentlist'; ?>" ><i class="icon_check_alt2"></i></a> <?php  } else { ?> <a class="btn btn-danger" href="<?php echo 'change_state.php?id='.$value['user_id'].'&fild=user_varify&t=user&value=1&p_id=user_id&ret=studentlist'; ?> " ><i class="icon_close_alt2"></i></a> <?php } ?></td>
                   <?php } ?>
                   <td><?php if ($value['user_active']==1) { ?> <a class="btn btn-success" href="<?php echo 'change_state.php?id='.$value['user_id'].'&fild=user_active&t=user&value=0&p_id=user_id&ret=studentlist'; ?>" ><i class="icon_check_alt2"></i> </a> <?php  } else { ?> <a class="btn btn-danger" href="<?php echo 'change_state.php?id='.$value['user_id'].'&fild=user_active&t=user&value=1&p_id=user_id&ret=studentlist'; ?>" ><i class="icon_close_alt2"></i></a> <?php } ?></td>
                   <?php if ($user_type==1) {?>
                   <td>
                    <div class="btn-group">
                        <a class="btn btn-success" href="?page=iustudent&id=<?php echo $value['user_id']  ?>" ><i class="icon_pencil-edit_alt"></i></a>
                        <a class="btn btn-danger" href="<?php echo 'delete.php?id='.$value['user_id'].'&t=user&p_id=user_id&ret=studentlist'; ?>"><i class="icon_close_alt2"></i></a>
                    </div>
                    </td>
                    <?php } ?>
                </tr>
                  <?php } ?>              
             </tbody>
          </table>
        </section>
    </div>
</div>
<script type="text/javascript">
  function sort_by_class(str) {
    var xhttp; 
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (xhttp.readyState == 4 && xhttp.status == 200) {
        document.getElementById("view_data").innerHTML = xhttp.responseText;
      }
    }
    xhttp.open("GET", "studentlist.php?sort_class="+str, true);
    xhttp.send();
  }
</script>