<?php 
if ($user_type==1) 
{
  $result=$PostCon->c_subject_list_admin();
} 
?>
<div class="row">
  <div class="col-lg-12">
    <section class="panel">
      <header class="panel-heading">
        <div class="fa fa-user-plus"><a href="?page=iusubject">Create New</a></div>
      </header>

      <table class="table table-striped table-advance table-hover">
        <tbody>
          <tr>
          <th><i class="icon_profile"></i>Subject Name</th>
            <th><i class="fa fa-user-md"></i>Class</th>
            <th><i class="fa fa-user-md"></i>Created by</th>
            <th><i class="fa fa-user-md"></i>Assign Teacher</th>
            <th><i class="icon_calenda"></i> Created</th>
            <th><i class="icon_calenda"></i> Modify Date</th>
            <th><i class="fa fa-clone"></i> Activation</th>
            <th><i class="icon_cogs"></i> Action</th>
          </tr>
          <?php foreach ($result as $value) { ?>
          <tr>
            <td><?php echo $value['s_name']; ?></td>
            <td><?php echo $value['c_name']; ?></td>
            <td><?php echo $value['u_f_name']; ?></td>
            <td><?php if ($value['t_assign']==0 || $value['t_assign']='') { ?>
            <div id="teacher_assign">
              <select onchange='assign_teacher(this.value, "<?php echo $value['subject_id']; ?>")'>
              <option value="">Select One</option>
              <?php $teachers=$PostCon->c_teacher_info();
              foreach ($teachers as $teacher) { ?>
                  <option value=" <?php echo $teacher['user_id']; ?>" > <?php echo $teacher['user_f_name']; ?></option>
              <?php }?>
              </select>
              </div>
            <?php } else echo $value['us_f_name'];  ?></td>
            <td><?php echo $value['create_date']; ?></td>
            <td><?php if($value['modify_date']=='0000-00-00 00:00:00') echo '-'; else echo $value['modify_date']; ?></td>
            <td><?php if ($value['s_active']==1) { ?> <a class="btn btn-success" href="<?php echo 'change_state.php?id='.$value['subject_id'].'&fild=s_active&t=subject&value=0&p_id=subject_id&ret=subject'; ?>" ><i class="icon_check_alt2"></i> </a> <?php  } else { ?> <a class="btn btn-danger" href="<?php echo 'change_state.php?id='.$value['subject_id'].'&fild=s_active&t=subject&value=1&p_id=subject_id&ret=subject'; ?> " ><i class="icon_close_alt2"></i></a> <?php } ?></td>
            <td>
              <div class="btn-group">
                        <a class="btn btn-success" href="?page=iusubject&id=<?php echo $value['subject_id']; ?>"><i class="icon_pencil-edit_alt"></i></a>
                        <a class="btn btn-danger" href="<?php echo 'delete.php?id='.$value['subject_id'].'&t=subject&p_id=subject_id&ret=subject'; ?>"><i class="icon_close_alt2"></i></a>
              </div>
            </td>
          </tr>
          <?php } ?>             
        </tbody>
      </table>
    </section>
  </div>
</div>
<script type="text/javascript">
  function assign_teacher(user,sub)
  {
    var xhttp; 
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (xhttp.readyState == 4 && xhttp.status == 200) {
        document.getElementById("teacher_assign").innerHTML = xhttp.responseText;
      }
    }
    xhttp.open("GET", "teacher_assign.php?user_id="+user+"&subject_id="+sub, true);
    xhttp.send();
  }
</script>