<?php
require('AppController.php');
require("/../model/PostModel.php");
class PostController extends AppController
{ 	//create for a object and call the fuction by the object 
	private $PostModel;
//auto call
	public function __construct()
	{
		$this->PostModel=new PostModel;
	}
	public function c_svae_reg_data($data,$imgepath=NULL)
	{
		if (!empty($data['user_type']=='student'))
		{
			$data['s_reg_num']=date('Y').$data['s_class'].$data['s_reg_num'];
		}
//$pdata['user_id']="'".$_SESSION['id']."'";
		$pdata['user_type']="'".$data['user_type']."'";
		$pdata['s_reg_num']="'".$data['s_reg_num']."'";
		$pdata['s_roll_num']="'".NULL."'";
		$pdata['s_class']="'".$data['s_class']."'";
		$pdata['s_group']="'".NULL."'";
		$pdata['t_subject']="'".$data['t_subject']."'";
		$pdata['t_qualification']="'".$data['t_qualification']."'";
		$pdata['user_gender']="'".$data['user_gender']."'";
		$pdata['user_name']="'".$data['user_name']."'";
		$pdata['user_f_name']="'".$data['user_f_name']."'";
		$pdata['user_email']="'".$data['user_email']."'";
		$pdata['user_birthday']="'".NULL."'";
		$pdata['user_password']  ="'".$data['user_password']."'";
		$pdata['user_image']="'".$data['user_image']."'";
		$pdata['user_create']= "'".date('Y-m-d h:i:s')."'";
		if (isset($data['user_varify']))
			$pdata['user_varify']= "'".$data['user_varify']."'";
		else
			$pdata['user_varify']= "'".NULL."'";
		if (isset($data['user_active']))
			$pdata['user_active']= "'".$data['user_active']."'";
		else
			$pdata['user_active']= "'".NULL."'";
		$pdata['user_modify']= "'".NULL."'";
		$pdata['user_about'] ="'".NULL."'";
		$table= 'user';
		if (!empty($data['user_type']) AND !empty($data['user_name']))
			return $this->PostModel->m_svae_data($pdata,$table);
		else
			echo "your field is empty";
	}
	public function c_svae_reg_update($data,$id,$imgepath=NULL)
	{
		foreach ($data as $key => $value) 
		{
			if ($value!='') 
			{
				$pdata[$key] = "'".$value."'";
			}
		}
		$table= 'user';
		$fild='user_id';
		return $this->PostModel->m_svae_reg_update($pdata,$table,$fild,$id);
	}
	public function c_attendance_reports($data)
	{
		return $this->PostModel->m_svae_attendance_data($data);
	}
	public function c_attendance_data($std_id=NULL, $class_id=NULL,$subject_id=NULL, $days=NULL)
	{
		return $this->PostModel->m_attendance_data($std_id, $class_id,$subject_id, $days);
	}
	public function c_sign_in_client($data)
	{
		$sdata=array();
		$sdata['user_input_login'] = $data['user_input_login'];
		$sdata['user_password'] = $data['user_password'];
		$sdata['user_varify'] = '1';
		$sdata['user_active'] = '1';
		$table='user';
		$result= $this->PostModel->m_log_in($sdata,$table);
		if($result)
		{
			foreach ($result as $value)
			{
				$_SESSION['client_user_id']=$value['user_id'];
				$_SESSION['client_user_name']=$value['user_name'];
				$_SESSION['client_user_type']=$value['user_type'];
				$_SESSION['client_user_email']=$value['user_email'];
				$_SESSION['client_s_reg_num']=$value['s_reg_num'];
				$_SESSION['client_s_class']=$value['s_class'];
				$_SESSION['client_user_image']=$value['user_image'];
			}
			return $result;
		}
		else
			return false;
	}
	public function c_sign_in($data)
	{
		$sdata=array();
		$sdata['user_input_login'] = $data['user_input_login'];
		$sdata['user_password'] = $data['user_password'];
		$sdata['user_varify'] = '1';
		$sdata['user_active'] = '1';
		$table='user';
		$result= $this->PostModel->m_log_in($sdata,$table);
		if($result)
		{
			foreach ($result as $value)
			{
				$_SESSION['user_id']=$value['user_id'];
				$_SESSION['user_name']=$value['user_name'];
				$_SESSION['user_type']=$value['user_type'];
				$_SESSION['user_email']=$value['user_email'];
				$_SESSION['user_image']=$value['user_image'];
			}
			return $result;
		}
		else
			return false;
	}
	public function c_teacher_info()
	{
		return $result=$this->PostModel->m_teacher_data();
	}

	public function c_fdback($pdata)
	{
		$data=array();
		$data['fdback_title'] = "'".$pdata['fdback_title']."'";
		$data['fdback_details'] = "'".$pdata['fdback_details']."'";
		$data['user_id'] ="'".$_SESSION['client_user_id']."'";
		$data['fedb_date'] ="'".date('Y-m-d h:i:s')."'";
		$table='user_feedback_org';
		return $result= $this->PostModel->m_svae_data($data,$table);
	}
	public function c_notice_post($pdata)
	{
		$data=array();
		$data['user_id'] = "'".$_SESSION['user_id']."'";
		$data['notice_title'] = "'".$pdata['notice_title']."'";
		$data['notice_date']= "'".date('Y-m-d h:i:s')."'";
		$data['notice_description'] = "'".$pdata['notice_description']."'";
		$data['modify_date']= "'".NULL."'";
		$data['notice_file']= "'".$pdata['notice_file']."'";

		$table='notice';
		return $result= $this->PostModel->m_svae_data($data,$table);
	}
	public function c_notice_list($data=NULL)
	{
		$table='notice';
		$filds=', u.user_f_name u_f_name, u.user_type user_type ';
		$join=" INNER JOIN user u ON u.user_id=notice.user_id";
		if ($data!=NULL) {
			$con=" notice_id=".$data;
			return $result= $this->PostModel->m_list_admin($table,$con,$filds,$join);
		}
		else
			{ $join.=' ORDER BY notice_date DESC';
		return $result= $this->PostModel->m_list_admin($table,NULL,$filds,$join);
	}

}

public function c_fdback_view($admin=NULL)
{
	return $result=$this->PostModel->m_fdback_view($admin);
}
public function c_published_result()
{
	return $result=$this->PostModel->m_published_result();
}
public function c_addclass($pdata=NULL)
{
	$data=array();
	$data['user_id'] = "'".$_SESSION['user_id']."'";
	$data['c_name'] = "'".$pdata['c_name']."'";
	$data['c_active'] = "'".NULL."'";
	$data['c_remarks'] ="'".$pdata['c_remarks']."'";
	$data['create_date']= "'".date('Y-m-d h:i:s')."'";
	$data['modify_date']= "'".NULL."'";
	$data['class_image'] ="'".$pdata['class_image']."'";
	$table='class';
	return $result= $this->PostModel->m_svae_data($data,$table);
}
public function c_addsubject($pdata=NULL,$img=NULL)
{
	$data=array();
	$data['class_id'] = "'".$pdata['class_id']."'";
	$data['user_id'] = "'".$_SESSION['user_id']."'";
	$data['s_name'] = "'".$pdata['s_name']."'";
	$data['s_active'] = "'".NULL."'";
	$data['t_assign'] ="'".NULL."'";
	$data['subject_image'] ="'".$pdata['subject_image']."'";
	$data['create_date']= "'".date('Y-m-d h:i:s')."'";
	$data['modify_date']= "'".NULL."'";
	$data['s_remarks'] ="'".$pdata['s_remarks']."'";
	$table='subject';
	return $result= $this->PostModel->m_svae_data($data,$table);
}
public function c_assign_teacher_update($sub, $user)
{
	$data=array();
	$data['t_assign']=$user;
	return $result= $this->PostModel->m_assign_teacher_update($sub,$data);
}
public function c_class_view($sub=NULL)
{	
	return $result=$this->PostModel->m_class_view($sub);
}

public function c_subject_view($class=NULL)
{
	return $result=$this->PostModel->m_subject_view($class);
}

public function c_reg_view($class=NULL)
{
	return $result=$this->PostModel->m_reg_view($class);
}
public function c_result_post($data)
{

	return $result= $this->PostModel->m_svae_result_data($data);
}
public function c_user_list_admin($data=NULL,$condition=NULL,$teacher_id=NULL,$class_id=NULL)
{
	$table='user';
	if ($condition!=NULL) 
	{
		$join=" INNER JOIN class on class.class_id=user.s_class ";
	}
	$con=" user_type="."'".$data."'";
	if ($condition!=NULL) 
	{
		$con.=" AND $condition";	
	}
	if ($class_id!=NULL) 
	{
		$con.=" AND s_class=$class_id";
	}
	if ($teacher_id!=NULL AND $data=='student') 
	{
		$join.=" INNER JOIN subject ON subject.class_id=class.class_id ";
		$con.=" GROUP by subject.class_id,user.s_reg_num ORDER BY user.user_create DESC";
		return $result= $this->PostModel->m_list_admin($table,$con,NULL,$join,$class_id);
	}
	else
		$con.=" ORDER BY user.user_create DESC ";
	return $result= $this->PostModel->m_list_admin($table,$con);
}
public function c_gallery_photo($pdata,$image)
{
	$data=array();
	$data['user_id']  ="'".$_SESSION['client_user_id']."'";
	$data['img_title']  ="'".$pdata['image_title']."'";
	$data['g_image_path']="'".$image."'";
//$data['img_thumbnail']="'".$img."'";
	$table='galleryphoto';
	if (!empty($pdata['image_title']) AND !empty($image))
		$this->PostModel->m_svae_data($data,$table);
}
public function c_gallery_photo_view()
{
	return $result=$this->PostModel->m_gallery_photo_view();
}
public function c_chage_state($user_id,$fild,$table,$value,$primary_fild)
{
	$data = array();
	$data["$fild"]=$value;
	return $result=$this->PostModel->m_chage_state($user_id,$data,$table,$primary_fild);
}
public function c_delete($user_id,$table,$primary_fild)
{
	return $result=$this->PostModel->m_delete($user_id,$table,$primary_fild);
}

public function c_profile_view($id)
{
	return $result=$this->PostModel->m_edit_view($id);
}
public function c_class_list_admin()
{
	$table='class';
	$filds=", user.user_f_name u_f_name";
	$join=" INNER JOIN user ON user.user_id=class.user_id";
	return $result=$this->PostModel->m_list_admin($table,NULL,$filds,$join);

}
public function c_subject_list_admin()
{
	$table='subject s';
	$fild=', c.c_name c_name, u.user_f_name u_f_name,us.user_f_name us_f_name';
	$join= " INNER JOIN class c ON c.class_id=s.class_id INNER JOIN user u ON u.user_id=s.user_id LEFT JOIN user us ON us.user_id=s.t_assign ORDER BY c.class_id";
	return $result=$this->PostModel->m_list_admin($table,NULL,$fild,$join);
}

public function c_num_student_class()
{
	return $result=$this->PostModel->m_num_student_class();
}
public function c_all_unique_subject()
{
	return $result=$this->PostModel->m_all_unique_subject();
}	

public function c_result_by_class($class_id)
{
	return $result=$this->PostModel->m_result_by_class($class_id);
}

public function c_result_by_strudent($reg_id)
{
	return $result=$this->PostModel->m_result_by_strudent($reg_id);
}

public function c_result_list_admin($data=NULL)
{
	return $result=$this->PostModel->m_result_list_admin($data);
}
public function select_one($table,$id)
{
	return $result=$this->PostModel->select_one($table,$id);
}
public function update_data($table,$postdata,$pid)
{
	return $result=$this->PostModel->update_data($table,$postdata,$pid);
}
public function upload_image($data,$path)
{
	if( $data['image']['name'] !=NULL AND isset($data['image']['name'])  )
	{
		$filename = $data['image']['tmp_name'];
		$directory='../asset/image/'.$path;
		$destination = $directory.basename($data['image']['name']);
		move_uploaded_file($filename, $destination);
		$photoname=$data['image']['name'];
		return $imagepath='asset/image/'.$path.$photoname;
	}
}
public function generate_scholarship()
{
	$scholarship=array();
	$gpa=$this->PostModel->average_mark_all();

	$attendance=$this->PostModel->total_class_attendance();

	foreach ($gpa as $key => $value){
		$scholarship[] = array_merge((array)$attendance[$key], (array)$value);
	}
	return $scholarship;
}
public function c_user_profile($data=NULL, $user_type=NULL)
{

	return $profile=$this->PostModel->m_user_profile($data,$user_type);
}
public function c_user_result_profile($data=NULL)
{

	return $profile=$this->PostModel->m_user_result_profile($data);
}
public function c_user_attendence_profile($data=NULL)
{

	return $profile=$this->PostModel->m_user_attendence_profile($data);
}

public function c_check_user_before_login($data)
{
	return $profile=$this->PostModel->m_check_user_before_login($data);
}
public function count_all($data)
{
	return $this->PostModel->m_count_all($data);
}
}
?>