<?php
require('AppModel.php');
class PostModel extends AppModel
{	
	 private $model;
	public function __construct()
	{
		$this->model=new Model;
	}
	public function m_svae_data($data, $table=NULL, $filds=NULL, $condition=NULL )
	{	
		if($data)
		{
			$filds = implode(",",array_keys($data));
			$data = implode(",", $data);		
			$result = $this->model->insert($table,$filds,$data);
			if($result)
				return $result;
		}
		else
			echo "failed to post";
		}
	public function m_svae_result_data($data)
	{
		$reg_num = $data['reg_number'];
		$published = $data['published_by'];
		$gpa = $data['gpa'];
		$remarks = $data['r_remarks'];
		$cdate="'".date('Y-m-d H:i:s')."'";
		for($i=0;$i<count($data['gpa']);$i++)
		{	$r_remarks="'".$remarks[$i]."'";
			$sql="INSERT INTO result (class_id,subject_id,reg_number,gpa,r_date,modify_date,published_by,r_remarks) VALUES ({$data['class_name']},{$data['subject_name']},{$reg_num[$i]},{$gpa[$i]},{$cdate},NULL,{$published[$i]},{$r_remarks})";
		    $result = mysql_query($sql);
		}
		if ($result)
			return "Succesfully Save Data";
		else
			return "Data Can't Save successfully";
	}
	public function m_svae_attendance_data($data)
	{
		$reg_num = $data['reg_number'];
		$published = $data['published_by'];
		$attendance=$data['attendance'];
		$remarks = $data['r_remarks'];
		$cdate="'".date('Y-m-d H:i:s')."'";
		for($i=0;$i<count($data['reg_number']);$i++)
		{	
			$r_remarks="'".$remarks[$i]."'";
			$sql="INSERT INTO attendance (std_id,sub_id,class_id,attendance,attendance_date,teacher_id,r_remarks) 
			VALUES ({$reg_num[$i]},{$data['subject_name']},{$data['class_name']},{$attendance[$i]},{$cdate},{$published[$i]},{$r_remarks})";

		   $result = mysql_query($sql);
		}
		if ($result)
			return "Succesfully Save Data";
		else
			return "Data Can't Save successfully";
	}
	public function m_attendance_data($std_id=NULL, $class_id=NULL,$subject_id=NULL, $days=NULL)
	{
		$condition="attendance=1";
		$days=90;
		if ($std_id!=NULL) 
		{
			$condition.=" AND std_id=$std_id ";
		}
		if ($class_id!=NULL) 
		{
			$condition.=" AND class_id=$class_id ";
		}
		if ($subject_id!=NULL) 
		{
			$condition.=" AND sub_id=$subject_id ";
		}
		if ($_SESSION['user_type']=='teacher')
		$sql="SELECT COUNT(std_id) as present, std_id,user.user_id, user_f_name from attendance INNER JOIN user ON s_reg_num=std_id where $condition AND attendance_date BETWEEN CURDATE() - INTERVAL $days DAY AND NOW() AND attendance.teacher_id=".$_SESSION['user_id']." GROUP BY std_id ORDER by std_id ASC ";
		else
		$sql="SELECT COUNT(std_id) as present, std_id,user.user_id, user_f_name from attendance INNER JOIN user ON s_reg_num=std_id where $condition AND attendance_date BETWEEN CURDATE() - INTERVAL $days DAY AND NOW() GROUP BY std_id ORDER by std_id ASC ";

		 return $result=$this->model->select(NULL,NULL,NULL,NULL,NULL,$sql);
	}
	public function m_svae_reg_update($data, $table=NULL, $filds=NULL, $con=NULL )
	{
		$condition=$filds.'='.$con;	
	$result = $this->model->update($table,$data,$condition);
	}
	public function m_log_in($data=NULL, $table)
	{
			$filds = '*';
			$condition= "((user_email ='".$data['user_input_login']."' OR user_name ='".$data['user_input_login']."') AND  user_password ='".$data['user_password']."' AND   user_password ='".$data['user_password']."' AND  user_active ='".$data['user_active']."')";
		   return $result=$this->model->select($filds,$table,$condition);
		if ($result)
			{
				return $result;
			}
		else
			echo 'login error';
	}
	public function m_teacher_data()
	{
		$table='user';
		$filds="user_id,user_f_name,t_subject,t_qualification,user_about, user_image";
		$condition="user_active ='1' AND  user_type ='teacher'AND user_varify='1'";
		return $result=$this->model->select($filds,$table,$condition);
		// echo "<pre>";
		// print_r($result);
		// echo "</pre>";
		// exit;
	}

	public function m_fdback_view($admin=NULL)
	{
		$table='user_feedback_org uf, user u';
		$filds="uf.*,u.user_f_name, u.user_image, user_type";
		$condition="u.user_id=uf.user_id ";
		if ($admin==NULL) 
		{
			$condition.=" AND uf.active=1";
		}
		return $result=$this->model->select($filds,$table,$condition);
	}
	public function m_published_result()
	{
		$table='class c,result r';
		$filds=" DISTINCT c_name,r.class_id";
		$condition="c.class_id=r.class_id ORDER BY r.r_date";
		return $result=$this->model->select($filds,$table,$condition);
	}
	public function m_class_view($subject=NULL)
	{
		$table='class';
		$filds="distinct c_name,class.class_id class_id";
		$condition="c_active=1";
		if ($subject!=null) {
			$join= " INNER JOIN subject ON subject.class_id=class.class_id";
			$condition = 'c_active=1 AND subject_id ='.$subject;
			return $result=$this->model->select($filds,$table,$condition,$join);
		}
		 if ($_SESSION['user_type']=='teacher')
			{
				$join= " INNER JOIN subject ON class.class_id=subject.class_id";
				$condition.=" AND subject.t_assign=".$_SESSION['user_id'];
				return $result=$this->model->select($filds,$table,$condition,$join);
			}
		else
 		return $result=$this->model->select($filds,$table,$condition);
	}	
	public function m_subject_view($class=NULL)
	{
		$table='subject s,class c';
		$filds='c_name,s_name,subject_id';
		$condition='s_active = 1 AND s.class_id = c.class_id';
		if ($class!=null) {
			$condition.= ' AND c.class_id ='.$class;
		}
		if ($_SESSION['user_type']=='teacher')
			{
				$condition.=" AND s.t_assign=".$_SESSION['user_id'];
			}
		 return $result=$this->model->select($filds,$table,$condition);
	}	

	public function m_assign_teacher_update($sub,$data)
	{
		$condition=' subject_id='.$sub;
		$table='subject';
		return $this->model->update($table,$data,$condition);
	}
	public function m_reg_view($class=null)
	{
		$table='user';
		$filds='distinct user.user_id, user_f_name,s_reg_num';
		$condition='user_active=1 AND s_reg_num!= 0';
		if ($class!=null) 
		{
			$condition.= ' AND s_class ='.$class;
		}
		if ($_SESSION['user_type']=='teacher')
		{
			$join= " INNER JOIN subject ON user.s_class=subject.class_id";
			$condition.=" AND subject.t_assign=".$_SESSION['user_id'];
			return $result=$this->model->select($filds,$table,$condition,$join);
		}
	 if ($_SESSION['user_type']=='teacher')
		{
			$join= " INNER JOIN subject ON user.s_class=subject.class_id";
			$condition.=" AND subject.t_assign=".$_SESSION['user_id'];
			return $result=$this->model->select($filds,$table,$condition,$join);
		}
		else
		 return $result=$this->model->select($filds,$table,$condition);
	}
	public function m_gallery_photo_view ()
	{
		$filds= '*';
		$table= 'galleryphoto';
		return $result=$this->model->select($filds,$table);
	}
	public function m_chage_state($user_id,$data,$table,$primary_fild)
	{
		$condition=$primary_fild.'='.$user_id;
		return $result=$this->model->update($table,$data,$condition);
	}
	public function m_delete($user_id,$table,$primary_fild)
	{
		return $result=$this->model->delete($table,$primary_fild,$user_id);
	}
	public function m_edit_view($id)
	{
		$fild='*';
		$table='user';
		$condition="user_id=".$id;
		return $result=$this->model->select($fild,$table,$condition);
	}
	public function m_list_admin($table,$con=NULL,$fild=NULL,$join=NULL,$class_id=NULL)
	{
		$filds='*'.$fild;
		$limit=100;
		return $result=$this->model->select($filds,$table,$con,$join,$limit);

	}
	public function m_num_student_class()
	{
		$filds='c.c_name,c.class_id,count(u.user_id) num_std';
		$table="class c ";
		 $join=" LEFT JOIN user u on c.class_id=u.s_class";
		 $con="c_active=1  GROUP BY c.c_name ORDER BY c.class_id";
		 return $result=$this->model->select($filds,$table,$con,$join);
	}
	public function m_all_unique_subject()
	{
		$filds='s_name,s_remarks,subject_image,user_image,user_f_name,user_type,class.c_name';
		$table="subject ";
		$join=' INNER JOIN user ON subject.t_assign=user.user_id INNER JOIN  class ON class.class_id=subject.class_id';
		$con="subject.t_assign=user.user_id AND s_active=1";
		 return $result=$this->model->select($filds,$table,$con,$join);
	}
	public function m_result_by_class($class_id)
	{
		$filds=' DISTINCT reg_number,user_f_name,CAST((SUM(gpa)/(SELECT count(DISTINCT subject_id))) 
		AS UNSIGNED) AS AVERAGE_MARK';
		$table=" result";
		$join=" INNER JOIN user ON reg_number=s_reg_num";
		$con=" class_id=".$class_id." GROUP BY reg_number";
		 return $result=$this->model->select($filds,$table,$con,$join);
	}
// "SELECT DISTINCT reg_number,user_name,CAST((SUM(gpa)/(SELECT count(DISTINCT subject_id))) 
// 	AS UNSIGNED) AS AVERAGE_MARK FROM result INNER JOIN user ON reg_number=s_reg_num 
// WHERE class_id=1 GROUP BY reg_number"
	// SELECT c_name,s_name,reg_number,gpa from result r 
	// INNER JOIN subject s ON r.subject_id=s.subject_id 
	// INNER JOIN class c ON c.class_id = r.class_id 
	// ORDER BY c_name
	public function m_result_by_strudent($reg_id)
	{
		$filds="c_name,s_name,gpa,r_remarks";
		$table=" result r";
		$join=" INNER JOIN subject s ON r.subject_id=s.subject_id INNER JOIN class c ON c.class_id = r.class_id";
		$con=" reg_number=".$reg_id;
		return $result=$this->model->select($filds,$table,$con,$join);
	}
	public function m_result_list_admin($data=NULL)
	{
		$filds=" c_name, s_name,reg_number, u.user_f_name s_f_name, u.user_id, us.user_f_name p_f_name,  gpa, r_date,r.modify_date modify_date,r_remarks";
		$table=" result r";
		$join=" INNER JOIN SUBJECT s ON r.subject_id = s.subject_id INNER JOIN class c ON c.class_id = r.class_id INNER JOIN USER u ON u.s_reg_num = r.reg_number INNER JOIN USER us ON us.user_id = r.published_by";

		if ($data!=NULL)
		{
			$fild = implode(",",array_keys($data));
			$data = implode(",", $data);
			$con='r.'."$fild=$data";
		if ( isset($_SESSION) AND $_SESSION['user_type']=='teacher')
			{
				$con.= " AND s.t_assign=".$_SESSION['user_id'];
			}
			return $result=$this->model->select($filds,$table,$con,$join);
		}
		if ( isset($_SESSION) AND $_SESSION['user_type']=='teacher')
			{
				$con= " s.t_assign=".$_SESSION['user_id'];
				return $result=$this->model->select($filds,$table,$con,$join);
			}
		else
			return $result=$this->model->select($filds,$table,NULL,$join);
	}
	public function select_one($table,$id)
		{
			return $result=$this->model->select('*',$table,$id);
		}
	public function update_data($table,$postdata,$pid)
	{
		$query="SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'school_management' AND TABLE_NAME = '".$table."' AND COLUMN_KEY = 'PRI'";
		$pri=mysql_query($query);
		$primary_keys = mysql_fetch_assoc($pri);
		$primary_key=$primary_keys['COLUMN_NAME'];

		foreach ($postdata as $key => $value) 
		{
					if ($value!='') 
		{
			$filds[] = $key." = '".$value."'";
		}
			$sql = "update {$table} set ". implode(", ", $filds) ." where ".$primary_key." = ".mysql_real_escape_string($pid);
		}
		if(mysql_query($sql))
			return "Data Update Successfully";
		else
			return "Data Can't Update";
	}

	public function total_class_attendance()
	{
		$sql="SELECT u.s_reg_num reg_number, c.c_name, SUM(IF(a.attendance=1,1,0)) AS present, count(IF(a.attendance=1,1,0)) AS total_class, (((SUM(IF(a.attendance=1,1,0))) /(count(IF(a.attendance=1,1,0))))*100) persenr_attend from user u inner join class c ON c.class_id = u.s_class inner join attendance a ON a.std_id = u.s_reg_num where user_type = 'student' GROUP by a.class_id, u.s_reg_num ";
		return $result=$this->model->select(NULL,NULL,NULL,NULL,NULL,$sql);
	}
	// 	public function total_present()
	// {
	// 	$sql="SELECT COUNT(std_id) AS present,class_id class,std_id reg_number FROM attendance where attendance=1 GROUP BY class_id, std_id";
	// 		$result = mysql_query($sql);
	// 	$data = array();
	// 	while ($row = mysql_fetch_assoc($result))
	// 		array_push($data, $row);
	// 		return $data;
	// }		
	public function average_mark_all()
	{
		$sql="SELECT DISTINCT reg_number,user_f_name,user_image ,CAST((SUM(gpa)/(SELECT count(DISTINCT subject_id))) AS UNSIGNED) AS average_mark ,class_id class FROM result INNER JOIN user ON reg_number=s_reg_num GROUP BY class_id, reg_number";
       return $result=$this->model->select(NULL,NULL,NULL,NULL,NULL,$sql);
	}
	public function m_user_profile($data=NULL, $user_type=NULL)
	{
		$table='user';
		if ($user_type!=NULL) 
		{
			if ($user_type=='student') 
			{
				$sql="SELECT COUNT(attendance.sub_id) t_attendance, attendance.std_id,subject.s_name,user.*,u.user_f_name teacher_name,user.user_id teacher_id
				FROM attendance INNER JOIN subject ON attendance.sub_id=subject.subject_id INNER JOIN user ON attendance.std_id=user.s_reg_num INNER JOIN user u ON subject.t_assign=u.user_id
				WHERE attendance.std_id =".$data." AND attendance = 1 
				GROUP by sub_id";
				return $result=$this->model->select(NULL,NULL,NULL,NULL,NULL,$sql);
			}
		}
		else
		{
			$fild='* ';
			if ($data!=NULL) 
			{
				$con=' user_id= '.$data;
			}
			return $result=$this->model->select($fild,$table,$con);
		}
	}

	public function m_user_result_profile($data)
	{
		$table='result ';
		$fild=' gpa,s_name,user_f_name teacher ';
		$join =' INNER JOIN subject ON result.subject_id=subject.subject_id INNER JOIN user ON subject.t_assign=user.user_id ';
		$con=' reg_number= '.$data;
		return $result=$this->model->select($fild,$table,$con,$join);
	}
	public function m_user_attendence_profile($data=NULL)
	{
		$table=' attendance ';
		$fild=' attendance_date, attendance, s_name ';
		$join =' INNER JOIN subject ON attendance.sub_id=subject.subject_id ';
		$con=' std_id= '.$data.' ORDER BY attendance_date DESC';
		return $result=$this->model->select($fild,$table,$con,$join);
	}
	public function m_check_user_before_login($data)
	{
    $filds = '*';
    $table='user';
	$condition= "user_email ='".$data."' OR user_name ='".$data."'";
    return $result=$this->model->select($filds,$table,$condition);
		if ($result)
			{
				return true;
			}
		else
			return false;

	}
	public function m_count_all($data)
	{
		$user_type="user_type='".$data."'";
		return $this->model->select('COUNT(user_type) users','user',$user_type);
	}
}
?>