<?php 
if ($user_type==1) 
{
  $result=$PostCon->c_class_list_admin();
} ?>
<div class="row">
  <div class="col-lg-12">
    <section class="panel">
      <header class="panel-heading">
        <div class="fa fa-user-plus"><a href="?page=iuclass">Create New</a></div>
      </header>
      <table class="table table-striped table-advance table-hover">
        <tbody>
          <tr>
            <th><i class="icon_profile"></i>Class Name</th>
            <th><i class="icon_calenda"></i> Created</th>
            <th><i class="icon_calenda"></i> Modify Date</th>
            <th><i class="fa fa-user-md"></i>Created by</th>
            <th><i class="fa fa-clone"></i> Activation</th>
            <th><i class="icon_cogs"></i> Action</th>
          </tr>
          <?php foreach ($result as $value) { ?>
          <tr>
            <td><?php echo $value['c_name']; ?></td>
            <td><?php echo $value['create_date']; ?></td>
            <td><?php if($value['modify_date']=='0000-00-00 00:00:00') echo '-'; else echo $value['modify_date']; ?></td>
            <td><?php echo $value['u_f_name']; ?></td>
            <td><?php if ($value['c_active']==1) { ?> <a class="btn btn-success" href="<?php echo 'change_state.php?id='.$value['class_id'].'&fild=c_active&t=class&value=0&p_id=class_id&ret=class'; ?>" ><i class="icon_check_alt2"></i> </a> <?php  } else { ?> <a class="btn btn-danger" href="<?php echo 'change_state.php?id='.$value['class_id'].'&fild=c_active&t=class&value=1&p_id=class_id&ret=class'; ?> " ><i class="icon_close_alt2"></i></a> <?php } ?></td>
            <td>
              <div class="btn-group">
                <a class="btn btn-success" href="?page=iuclass&id=<?php echo $value['class_id']; ?>"><i class="icon_pencil-edit_alt"></i></a>
                <a class="btn btn-danger" href="<?php echo 'delete.php?id='.$value['class_id'].'&t=class&p_id=class_id&ret=class'; ?>"><i class="icon_close_alt2"></i></a>
              </div>
            </td>
          </tr>
          <?php } ?>             
        </tbody>
      </table>
    </section>
  </div>
</div>