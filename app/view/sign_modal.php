<form method="POST" action="header.php">
  <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header login_modal_header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h2 class="modal-title" id="myModalLabel">Sign to your Account</h2>
        </div>
        <div class="modal-body login-modal">
          <p>Please give your email address and password </p><br/>
          <div class="clearfix"></div>
          <form method="post" action="user_c/user_login">
            <div id='social-icons-conatainer'>
              <div class="form-group">
                <input type="email" id="email" name ="user_email" placeholder="Enter your email" value="" class="form-control login-field">
                <i class="fa fa-user login-field-icon"></i>
              </div>
              <div class="form-group">
                <input type="password" id="login-pass" name ="user_password"placeholder="Password" value="" class="form-control login-field">
                <i class="fa fa-lock login-field-icon"></i>
              </div>
              <a href=""><input type="submit" value="Signin" class="btn btn-success modal-login-btn btn-lg"/></a>
            </div>
          </form>
          <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
        <div class="modal-footer login_modal_footer"></div>
      </div>
    </div>
  </div>
</form>