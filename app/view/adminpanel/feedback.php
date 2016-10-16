<?php 
if ($user_type==1) 
 {
   $result=$PostCon->c_fdback_view('admin');
 }
?>
<div class="row">
  <div class="col-lg-12">
    <section id="view_data"  class="panel">
      <header class="panel-heading">
        <div class="fa fa-user-plus"><a href="?page=addnotice">Create New</a></div>
      </header>
        <script type="text/javascript">
            $(function () {
                $('#dateinput').datetimepicker();
            });
        </script>



      <table  class="table table-striped table-advance table-hover">
        <tbody>
          <tr>
          <th><i class="icon_profile"></i>Notice Title</th>
            <th><i class="fa fa-user-md"></i>Notice Describe</th>
            <th><i class="icon_calenda"></i>Published By</th>
            <th><i class="fa fa-user-md"></i>Date</th>
            <th><i class="icon_cogs"></i>Activated</th>
            <th><i class="icon_cogs"></i>Action</th>
          </tr>
   <?php foreach ($result as $key => $value) { ?>
          <tr>
            <td><?php echo $value['fdback_title']; ?></td>
            <td><?php echo $value['fdback_details']; ?></td>
            <td><?php echo $value['user_f_name']; ?></td>
            <td><?php echo $value['fedb_date']; ?></td>
            <td><?php if ($value['active']==1) { ?> <a class="btn btn-success" title="Click to Inactive" href="<?php echo 'change_state.php?id='.$value['fdback_id'].'&fild=active&t=user_feedback_org&value=0&p_id=fdback_id&ret=feedback'; ?>" ><i class="icon_check_alt2"></i> </a> <?php  } else { ?> <a class="btn btn-danger" title="Click to Active" href="<?php echo 'change_state.php?id='.$value['fdback_id'].'&fild=active&t=user_feedback_org&value=1&p_id=fdback_id&ret=feedback'; ?>" ><i class="icon_close_alt2"></i></a> <?php } ?></td>
            <td>
              <div class="btn-group">
                <a class="btn btn-success" href="#">Reply</i></a>
                <a class="btn btn-danger" href="<?php echo 'delete.php?id='.$value['fdback_id'].'&t=user_feedback_org&p_id=fdback_id&ret=feedback'; ?>" ><i class="icon_close_alt2"></i></a>
              </div>
            </td>
          </tr>
          <?php } ?>           
        </tbody>
      </table>
      <div style="text-align:center">
          <ul class="pagination pagination-lg">
              <li><a href="#">«</a></li>
              <li><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
              <li><a href="#">»</a></li>
          </ul>
      </div>
    </section>
  </div>
</div>

