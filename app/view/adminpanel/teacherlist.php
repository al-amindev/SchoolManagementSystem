<?php 
 if ($user_type==1) 
  {
    $data='teacher';
    $result=$PostCon->c_user_list_admin($data);
  } ?>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <div class="fa fa-user-plus"><a href="?page=iuteacher">Create New</a></div>
            </header>
            
            <table class="table table-striped table-advance table-hover">
             <tbody>
                <tr>
                   <th><i class="icon_profile"></i>Full Name</th>
                   <th><i class="fa fa-user-md"></i>Username</th>
                   <th><i class="icon_mail_alt"></i> Email</th>
                   <th><i class="icon_calenda"></i> Created</th>
                   <th><i class="fa fa-venus-mars"></i> Gender</th>
                   <th><i class="fa fa-file-text-o"></i>Subject</th>
                   <th><i class="fa fa-clone"></i> Qualification</th>
                   <th><i class="fa fa-clone"></i> Email Varify</th>
                   <th><i class="fa fa-clone"></i> Activation</th>
                   <th><i class="icon_cogs"></i> Action</th>
                </tr>
                <?php foreach ($result as $value) { ?>
                <tr>
                   <td><a href="?page=profile&user_id=<?php echo $value['user_id'] ?>"> <?php echo $value['user_f_name']; ?></a></td>
                   <td><?php echo $value['user_name']; ?></td>
                   <td><?php echo $value['user_email']; ?></td>
                   <td><?php echo $value['user_create']; ?></td>
                   <td><?php echo $value['user_gender']; ?></td>
                   <td><?php echo $value['t_subject']; ?></td>
                   <td><?php echo $value['t_qualification']; ?></td>
                   <td><?php if ($value['user_varify']==1) { ?> <a class="btn btn-success" href="<?php echo 'change_state.php?id='.$value['user_id'].'&fild=user_varify&t=user&value=0&p_id=user_id&ret=teacherlist'; ?>" ><i class="icon_check_alt2"></i> </a> <?php  } else { ?> <a class="btn btn-danger" href="<?php echo 'change_state.php?id='.$value['user_id'].'&fild=user_varify&t=user&value=1&p_id=user_id&ret=teacherlist'; ?> " ><i class="icon_close_alt2"></i></a> <?php } ?></td>
                   <td><?php if ($value['user_active']==1) { ?> <a class="btn btn-success" href="<?php echo 'change_state.php?id='.$value['user_id'].'&fild=user_active&t=user&value=0&p_id=user_id&ret=teacherlist'; ?>" ><i class="icon_check_alt2"></i></a> <?php  } else { ?> <a class="btn btn-danger" href="<?php echo 'change_state.php?id='.$value['user_id'].'&fild=user_active&t=user&value=1&p_id=user_id&ret=teacherlist'; ?>" ><i class="icon_close_alt2"></i></a> <?php } ?></td>
                   <td>
                    <div class="btn-group">
                        <a class="btn btn-success" href="?page=iuteacher&id=<?php echo $value['user_id'] ?>"><i class="icon_pencil-edit_alt"></i></a>
                        <a class="btn btn-danger" href="<?php echo 'delete.php?id='.$value['user_id'].'&t=user&p_id=user_id&ret=teacherlist'; ?>"><i class="icon_close_alt2"></i></a>
                    </div>
                    </td>
                </tr>
                   <?php } ?>             
             </tbody>
          </table>
        </section>
    </div>
</div>