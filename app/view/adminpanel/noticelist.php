<?php 
require_once("../../Config.php");
require_once (SITE_PATH."/controller/PostController.php");
$PostCon=new PostController;
$user_type=$PostCon->user_type();
if ($user_type==1 OR $user_type==2) 
 {
   $result=$PostCon->c_notice_list();
 }
?>
<div class="row">
  <div class="col-lg-12">
    <section id="view_data"  class="panel">
      <header class="panel-heading">
        <div class="fa fa-user-plus"><a href="?page=iunotice">Create New</a></div>
      </header>
      <h3>Sorting</h3>
      <div class="btn-group">
            <a class="btn btn-primary option_select" href="" title="Select Your Class">Subject</a>
            <select onchange="sort_by_subject(this.value)" class="btn btn-primary dropdown-toggle option_select" data-toggle="dropdown" title="Select Your Class">
            <option id="selct_id">Select</option>

            </select>
      </div>

      <table  class="table table-striped table-advance table-hover">
        <tbody>
          <tr>
          <th><i class="icon_profile"></i>Notice Title</th>
            <th><i class="fa fa-user-md"></i>Notice Describe</th>
            <th><i class="icon_calenda"></i>Published By</th>
            <th><i class="fa fa-user-md"></i>Publised Date</th>
            <th><i class="fa fa-user-md"></i>Update Time</th>
             <?php if ($user_type==1) {?>
            <th><i class="icon_cogs"></i> Action</th>
            <?php } ?>
          </tr>
   <?php foreach ($result as $key => $value) { ?>
          <tr>
            <td><?php echo $value['notice_title']; ?></td>
            <td><?php echo $value['notice_description']; ?></td>
            <td><?php echo $value['u_f_name']; ?></td>
            <td><?php echo $value['notice_date']; ?></td>
            <td><?php if($value['modify_date']=='0000-00-00 00:00:00') echo '-'; else echo $value['modify_date']; ?></td>
            <?php if ($user_type==1) {?>
            <td>
              <div class="btn-group">
                <a class="btn btn-success" href="?page=iunotice&id=<?php echo $value['notice_id'] ?>"><i class="icon_pencil-edit_alt"></i></a>
                <a class="btn btn-danger" href="<?php echo 'delete.php?id='.$value['notice_id'].'&t=notice&p_id=notice_id&ret=noticelist'; ?>"><i class="icon_close_alt2"></i></a>
              </div>
            </td>
            <?php } ?>
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

