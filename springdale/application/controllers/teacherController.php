<?php 
class TeacherController extends CI_Controller{
	public static $sno = 0;
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model("teacherModel");
	}
	function presentiH(){
		$sec = $this->input->post("section");
		$date1 = $this->input->post("date1");
		if(strlen($date1)==0){
			$date1=date("Y-m-d");
		}
		$cla = $this->input->post("classv");
		$check = $this->teacherModel->checkPresenti($sec,$cla,$date1);
		if($check->num_rows() > 0)
		{
		
		}else{
		if($sec)
		{?>
			<tr>
			<td>S.No.</td>
			<td>Student ID </td>
			<td> Scholer No</td>
			<td> Student Name</td>
			<td> Mobile</td>
			<td> Attendance<input type="hidden" value="300001" name="tID" /></td>
			</tr>
			<?php 
		}
		}
	}
	function presentiHa2(){
		$sec = $this->input->post("section");
		$date1 = $this->input->post("date1");
		if(strlen($date1)==0){
			$date1=date("Y-m-d");
		}
		$cla = $this->input->post("classv");
		$check = $this->teacherModel->checkPresenti($sec,$cla,$date1);
		if($check->num_rows() > 0)
		{
	
		}else{
			if($sec)
			{?>
				<tr>
				<td>S.No.</td>
				<td>Student ID </td>
				<td> Scholer No</td>
				<td> Student Name</td>
				<td> Mobile</td>
				<td> Attendance<input type="hidden" value="300001" name="tID" /></td>
				</tr>
				<?php 
			}
			}
		}
	
	
	
	function presenti(){
		$data['date1'] = $this->input->post("date1");
		$date1 = $this->input->post("date1");
		if(strlen($date1)==0){
			$date1=date("Y-m-d");
			$data['date1']=date("Y-m-d");
		}
		$data['sec'] = $this->input->post("section");
		$sec = $this->input->post("section");
		$data['cla']  = $this->input->post("classv");
		$cla = $this->input->post("classv");
		$data['tid'] = $this->input->post("teacherid");
		$tid= $this->input->post("teacherid");
		$data['check'] = $this->teacherModel->checkPresenti($sec,$cla,$date1);
		$data['var'] = $this->teacherModel->getPresenti($sec,$cla,$tid);
		$this->load->view("ajax/studenceAtten",$data);
	}
	
	
	function presentia2(){
		$data['date1'] = $this->input->post("date1");
		$date1 = $this->input->post("date1");
		if(strlen($date1)==0){
			$date1=date("Y-m-d");
			$data['date1']=date("Y-m-d");
		}
		$data['sec'] = $this->input->post("section");
		$sec = $this->input->post("section");
		$data['cla']  = $this->input->post("classv");
		$cla = $this->input->post("classv");
		$data['tid'] = $this->input->post("teacherid");
		$tid= $this->input->post("teacherid");
		$data['check'] = $this->teacherModel->checkPresentia2($sec,$cla,$date1);
		$data['var'] = $this->teacherModel->getPresentia2($sec,$cla,$tid);
		$this->load->view("ajax/studenceAtten2",$data);
	}
					
	    function getSection(){
		$tid = $this->input->post("classv");
		$this->load->model("teacherModel");
		$var = $this->teacherModel->getSection($tid);
			if($var->num_rows() > 0){
				echo '<option value="">-Select Section-</option>';
				foreach ($var->result() as $row){
					echo '<option value="'.$row->section.'">'.$row->section.'</option>';
				} 
				echo '<option value="all">All</option>';
			}
	    }
		function getSubject(){
		$this->db->where("class_id",$this->input->post("classv"));
		$this->db->where("section",$this->input->post("section"));
		$var = $this->db->get("subject");
			if($var->num_rows() > 0){
				echo '<option value="">-Select Subject-</option>';
				foreach ($var->result() as $row){
					echo '<option value="'.$row->subject.'">'.$row->subject.'</option>';
				} 
				echo '<option value="all">All</option>';
			}
		}
	
	function checkID(){
		$tid = $this->input->post("teacherid");
		$this->load->model("teacherModel");
		$var = $this->teacherModel->checkID($tid);
		if($var->num_rows() > 0){
			foreach ($var->result() as $row){
				?>
				<div class="alert alert-success">
					<button data-dismiss="alert" class="close">
						&times;
					</button>
					ID Found ! <strong><?php echo $row->first_name." ".$row->mid_name." ".$row->last_name; ?></strong>
				</div>
				<?php 
			}}
		else{
			?>
				<div class="alert alert-danger">
					<button data-dismiss="alert" class="close">
						&times;
					</button>
					Sorry :( <strong><?php echo "Teacher Not Found ! Wrong teacher Id"; ?></strong>
				</div>
			<?php
			
		}
	
}

			  function teacherAtten()
			  {
			  	
			  	$i = $this->input->post("rows");
			  	$date1 = $this->input->post("date1");
			  	$this->load->model("teacherModel");
			  	for($j=1; $j<$i; $j++){
			  		$data = array(
			  				"t_id" => $this->input->post("tID"),
			  				"emp_no" => $this->input->post("empID$j"),
			  				"attendance" => $this->input->post("gender$j"),
			  				"a_date" => $date1
			  		);
			  		$this->db->where("emp_no",$this->input->post("empID$j"));
			  		$this->db->where("a_date",$date1);
			  		$req = $this->db->get("teacher_attendance");
			  		if($req->num_rows() > 0){
			  			$this->db->where("a_date",$date1);
			  			$this->db->where("emp_no",$this->input->post("empID$j"));
			  			$this->db->update("teacher_attendance",$data);
			  		}else{
			  			$this->teacherModel->addEmpAttendance($data);
			  		}
			  		echo $j;
			  	}
			 redirect("index.php/login/teacherAttendance/Attendance Done");
			  }

			  function studentAtten()
			  {
			  	$school_info = mysql_query("select * from general_settings");
			  	$info = mysql_fetch_object($school_info);
			  	$this->load->helper("sms");
			  	$i = $this->input->post("rows");
			  	$this->load->model("teacherModel");
			  	for($j=1; $j<$i; $j++){
			  		$data = array(
			  				"section" => $this->input->post("section"),
			  				"class" => $this->input->post("classv"),
			  				"teacher_id" => $this->input->post("teacherid"),
			  				"scholer_number" => $this->input->post("schno$j"),
			  				"stu_id" => $this->input->post("stuID$j"),
			  				"attendance" => $this->input->post("gender$j"),
			  				"a_date" => $this->input->post("date1")
			  		);
			  		
			  		$val=$this->db->get("sms_setting")->row();
			  		$senderiD=$val->sender_id;
			  		$authkey=$val->auth_key;
			  		$isSMS = $this->db->get("sms")->row()->stu_attendance;
			  		$absent=$this->input->post("gender$j");
			  		$stu_id = $this->input->post("stuID$j");
			  		$this->db->where("student_id",$stu_id);
					$var=$this->db->get("guardian_info")->row();
					$fname=$var->father_full_name;
					$fmobile=$var->f_mobile;
					$this->db->where("status","Active");
					$this->db->where("student_id",$stu_id);
					$stu=$this->db->get("student_info")->row();
					$sname=$stu->first_name;
					
			  	if($isSMS=="yes")
			  		{	
			  			if($absent=='P')
			  			{
			  					
			  			
			  				//$msg="Dear parent your Child ".$sname." is Present today ".date("d-M-Y H:i:s").". Thanks ".$info->your_school_name;
			  				//sms($authkey, $msg,$senderiD,$fmobile);
			  			}
			  			if($absent=='L')
			  			{
			  					
			  			
			  				$msg="Dear parent your Child ".$sname." is on Leave today ".date("d-M-Y H:i:s")." with an application information.Please make sure. Thanks ".$info->your_school_name;
			  				sms($authkey, $msg,$senderiD,$fmobile);
			  			}
			  			if($absent=='A')
			  			{
			  
			  			
			  				$msg="Dear parent your Child ".$sname." is Absent today ".date("d-M-Y H:i:s")." without any information.Please make sure & let us know. Thanks ".$info->your_school_name;
			  				sms($authkey, $msg,$senderiD,$fmobile);
			  			}
			  		}
			  		$this->teacherModel->addstuAttendance($data);
			  	}
			  	redirect("index.php/login/studentAttendance1/Attendance Done");
			  }
			  
			  
			  function studentAtten2()
			  {
			  	$school_info = mysql_query("select * from general_settings");
			  	$info = mysql_fetch_object($school_info);
			  	$this->load->helper("sms");
			  	$i = $this->input->post("rows");
			  	$this->load->model("teacherModel");
			  	for($j=1; $j<$i; $j++){
			  		$data = array(
			  				"section" => $this->input->post("section"),
			  				"class" => $this->input->post("classv"),
			  				"teacher_id" => $this->input->post("teacherid"),
			  				"scholer_number" => $this->input->post("schno$j"),
			  				"stu_id" => $this->input->post("stuID$j"),
			  				"attendance" => $this->input->post("gender$j"),
			  				"a_date" => $this->input->post("date1")
			  		);
			  		 
			  		$val=$this->db->get("sms_setting")->row();
			  		$senderiD=$val->sender_id;
			  		$authkey=$val->auth_key;
			  		$isSMS = $this->db->get("sms")->row()->stu_attendance;
			  		$absent=$this->input->post("gender$j");
			  		$stu_id = $this->input->post("stuID$j");
			  		$this->db->where("student_id",$stu_id);
			  		$var=$this->db->get("guardian_info")->row();
			  		$fname=$var->father_full_name;
			  		$fmobile=$var->f_mobile;
			  		$this->db->where("status","Active");
			  		$this->db->where("student_id",$stu_id);
			  		$stu=$this->db->get("student_info")->row();
			  		$sname=$stu->first_name;
			  		if($isSMS=="yes")
			  		{	
			  			if($absent=='P')
			  			{
			  					
			  			
			  				//$msg="Dear parent your Child ".$sname." is Present today ".date("d-M-Y H:i:s").". Thanks ".$info->your_school_name;
			  				//sms($authkey, $msg,$senderiD,$fmobile);
			  			}
			  			if($absent=='L')
			  			{
			  					
			  			
			  				$msg="Dear parent your Child ".$sname." is on Leave today ".date("d-M-Y H:i:s")." with an application information.Please make sure. Thanks ".$info->your_school_name;
			  				sms($authkey, $msg,$senderiD,$fmobile);
			  			}
			  			if($absent=='A')
			  			{
			  
			  			
			  				$msg="Dear parent your Child ".$sname." is Absent today ".date("d-M-Y H:i:s")." without any information.Please make sure & let us know. Thanks".$info->your_school_name;
			  				sms($authkey, $msg,$senderiD,$fmobile);
			  			}
			  		}
			  		$this->teacherModel->addstuAttendancea2($data);
			  	}
			  	redirect("index.php/login/studentAttendance2/Attendance Done");
			  }
			  
			  function stuReport(){
			  		$edate = $this->input->post("edate");
			  		$sec = $this->input->post("section");
			  		$cla = $this->input->post("classv");
			  		$sdate = $this->input->post("sdate");
			  		$data['edate']=$edate;
			  		$data['sec']=$sec;
			  		$data['cla']=$cla;
			  		$data['sdate']=$sdate;
			  		$this->load->model("singleStudentModel");
			  		$this->load->model("teacherModel");
			  		$this->load->model("searchStudentModel");
			  		$var1 = $this->teacherModel->getStuReport($edate,$sec,$cla,$sdate);
			  		$data['var']=$var1;
			  		$this->load->view("ajax/attenStuReport",$data);
			  		
				}
				
				function teacherReport(){
					
					$edate = $this->input->post("edate");
					$sdate = $this->input->post("sdate");
					$this->load->model("singleStudentModel");
					$this->load->model("teacherModel");
					$this->load->model("searchStudentModel");
					 
					$var = $this->teacherModel->getteacherattenReport($edate,$sdate);
					if($var->num_rows() > 0){
						$sr = 1;
						TeacherController::$sno = $sr;
						?>
							<div class="row">
			<div class="col-md-12 space20">
				<div class="btn-group pull-right">
					<button data-toggle="dropdown" class="btn btn-green dropdown-toggle">
						Export <i class="fa fa-angle-down"></i>
					</button>
					<ul class="dropdown-menu dropdown-light pull-right">
						<li>
							<a href="#" class="export-excel" data-table="#sample-table-2" >
								Export to Excel
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
								  			<table class="table table-striped table-hover" id="sample-table-2">
												<thead>
													<tr class="success">
														<th>S.no.</th>
														<th>Employee Id</th>
														<th>Employee Name</th>
														<th>Present</th>
														<th>Absent</th>
														<th>Leave</th>
													
													</tr>
												</thead>
												<tbody>
													<?php $i=1;
								  			 foreach ($var->result() as $row){	
								  				?><?php if($i%2==0){$rowcss="danger";}else{$rowcss ="warning";}?><tr class="<?php echo $rowcss;?>">
			  		
								  					<td><?php echo TeacherController::$sno;?></td>
								  					<td><?php $stuID = $row->emp_no;  echo $stuID;?></td>
								  					<?php $empname=$this->singleStudentModel->getteacherName($stuID)->row();?>
								  					<td><?php echo $empname->first_name."-".$empname->mid_name."-".$empname->last_name;?></td>
								  					<td>
								  						<?php 
								  							$absent = $this->teacherModel->countAttTeacher($edate,$sdate,$stuID);
								  							echo $absent['p'];
								  						?> 
								  					</td>
									  				<td><?php $resultA = $this->db->query("SELECT a_date FROM teacher_attendance WHERE attendance = 'A' AND emp_no='$stuID' AND a_date >= '$sdate' and a_date <='$edate'");
			  					echo "Total Absent =".$absent['a']."<br>";
			  					if($absent['a']>0){?><div class="alert alert-info"><?php foreach($resultA->result() as $row):
			  							echo "Date".date("d-m-Y",strtotime($row->a_date))."<br>";
			  							endforeach;?></div><?php }?></td>
									  				<td><?php 
				  				$resultL = $this->db->query("SELECT a_date FROM teacher_attendance WHERE attendance = 'L' AND emp_no='$stuID' AND a_date >= '$sdate' and a_date <='$edate'");
				  				echo "Total Leave =".$absent['l']."<br>";
				  				if($absent['l']>0){?><div class="alert alert-info"><?php foreach($resultL->result() as $row1):
			  							echo "Date".date("d-m-Y",strtotime($row1->a_date))."</button>";
			  							endforeach;?></div><?php }?></td>
									  				<!-- <td>
									  					<button data-target=".bs-example-modal-basic1" data-toggle="modal" class="btn btn-blue">
															View Detail
														</button>
									  				</td>
									  				-->
									  			</tr>
									  			<?php 
								  			TeacherController::$sno++;	$i++;
								  			}?>
												</tbody>
											</table>
											<script>
	TableExport.init();
</script>
								  			<?php 
								  		}			  	
					
					
					
					
					
					
					
					
				}	
				function attenMsg(){
					$date1 = $this->input->post("radate");
					$this->db->where("a_date",$date1);
					$req = $this->db->get("teacher_attendance");
					if($req->num_rows() > 0)
					{
						?><div class="alert alert-danger">
							<?php echo "Teacher Attendance is Done for Date ".$date1;?></div><?php 
																
															}
				}			
}
?>