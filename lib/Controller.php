<?php
class Controller
{
  //$controller=new Controller 
  function logout_session()
  {
    unset($_SESSION['user_name'] );
    unset($_SESSION['user_id'] );
    unset($_SESSION['user_type'] );
    unset($_SESSION['user_email'] );
    unset($_SESSION['user_image'] );
  }

  function logout_session_client()
  {
    unset($_SESSION['client_user_name'] );
    unset($_SESSION['client_user_id'] );
    unset($_SESSION['client_user_type'] );
    unset($_SESSION['client_user_email'] );
    unset($_SESSION['client_user_image'] );
    unset($_SESSION['client_s_reg_num'] );
    unset($_SESSION['client_s_class'] );
  }
  function login_session()
  {
    if(isset($_SESSION['user_name']) AND !empty($_SESSION['user_name'])
      AND isset($_SESSION['user_id']) AND !empty($_SESSION['user_id'])
      AND isset($_SESSION['user_type']) AND !empty($_SESSION['user_type'])
      AND isset($_SESSION['user_email']) AND !empty($_SESSION['user_email'])
      )
      return true;
    else
      return false;
  }
  function user_type()
  {
    if ( $this->login_session()==true) 
    {
      if ($_SESSION['user_type']=='admin') 
      {
        return 1;
      }
      elseif ($_SESSION['user_type']=='teacher') 
      {
        return 2;
      }
    }
  }
  function login_session_client()
  {
    if(isset($_SESSION['client_user_name']) AND !empty($_SESSION['client_user_name'])
      AND isset($_SESSION['client_user_id']) AND !empty($_SESSION['client_user_id'])
      AND isset($_SESSION['client_user_type']) AND !empty($_SESSION['client_user_type'])
      AND isset($_SESSION['client_user_email']) AND !empty($_SESSION['client_user_email'])
      )
      return true;
    else
      return false;
  }
  function user_type_client()
  {
    if ( $this->login_session_client()==true) 
    {
      if ($_SESSION['client_user_type']=='student') 
      {
        return 3;
      }
    }
  }
}
  ?>
