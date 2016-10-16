<?php 
if ($user_type==1) 
{
  $data='admin';
  $result=$PostCon->c_user_list_admin($data);
} ?>
<div class="row">
  <div class="col-lg-12">
    <section class="panel">
      <header class="panel-heading">
        <div class="fa fa-user-plus"><a href="?page=iuadmin"> Create New</a></div>
      </header>
      <table class="table table-striped table-advance table-hover">
        <tbody>
          <tr>
            <th><i class="icon_profile"></i>Full Name</th>
            <th><i class="fa fa-user-md"></i>Username</th>
            <th><i class="icon_mail_alt"></i> Email</th>
            <th><i class="icon_calenda"></i> Created</th>
            <th><i class="fa fa-venus-mars"></i> Gender</th>
            <th><i class="icon_cogs"></i> Action</th>
          </tr>
          <?php foreach ($result as $key => $value) { ?>
          <tr>
            <td><?php echo $value['user_f_name']; ?></td>
            <td><?php echo $value['user_name']; ?></td>
            <td><?php echo $value['user_create']; ?></td>
            <td><?php echo $value['user_email']; ?></td>
            <td><?php echo $value['user_gender']; ?></td>
            <td>
              <div class="btn-group">
                <a class="btn btn-success" href="?page=iuadmin&id=<?php echo $value['user_id']; ?>"><i class="icon_pencil-edit_alt"></i></a>
                <a class="btn btn-danger" href="<?php echo 'delete.php?id='.$value['user_id'].'&t=user&p_id=user_id&ret=adminlist'; ?>"><i class="icon_close_alt2"></i></a>
              </div>
            </td>
          </tr>
          <?php } ?>           
        </tbody>
      </table>
    </section>
  </div>
</div>