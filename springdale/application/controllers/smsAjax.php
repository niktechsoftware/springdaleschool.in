<?php
class SmsAjax extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->is_login();
		}
		
		function is_login(){
			$is_login = $this->session->userdata('is_login');
			$is_lock = $this->session->userdata('is_lock');
			$logtype = $this->session->userdata('login_type');
			if($is_login != "admin"){
				//echo $is_login;
				redirect("index.php/homeController/index");
			}
			elseif(!$is_login){
				//echo $is_login;
				redirect("index.php/homeController/index");
			}
			elseif(!$is_lock){
				redirect("index.php/homeController/lockPage");
			}
		}
	
	function smsSetting(){
		$msg = $this->input->post("message");
		
		$val = $this->db->get("sms")->row();
		
		$val1 = $val->$msg;
		
		if($val1 == "yes"){
			$data = array(
				"$msg" => "no"
			);
			?>
				<script>
					$("#<?php echo $msg;?>").removeClass("btn btn-sm btn-light-green").addClass("btn btn-sm btn-light-red");
					$("#<?php echo $msg;?>").removeClass("fa fa-check").addClass("fa fa-times fa fa-white");
					$("#<?php echo $msg;?>").html(" NO");
				</script>
			<?php
		}else{
			$data = array(
				"$msg" => "yes"
			);
			?>
				<script>
					$("#<?php echo $msg;?>").removeClass("btn btn-sm btn-light-red").addClass("btn btn-sm btn-light-green");
					$("#<?php echo $msg;?>").removeClass("fa fa-times fa fa-white").addClass("fa fa-check");
					$("#<?php echo $msg;?>").html(" YES");
				</script>		
			<?php
		}
		$this->db->update("sms",$data);
	}
	
	function sendNotice(){
		$val=$this->db->get("sms_setting")->row();
		$msg =	$this->input->post("meg");
		$fmobile = $this->input->post("m_number");
		sms($fmobile,$msg);
	redirect("index.php/login/mobileNotice/Notice");
	}
	
	
	function sendallParent(){
		$smscount=0;
		$count=0;
		$val=$this->db->get("sms_setting")->row();
		$msg =$this->input->post("meg");
		$isSMS = $this->db->get("sms")->row()->parent_message;
		if($isSMS=="yes")
		{
		$this->db->where("status","Active");
		$std = $this->db->get("student_info");
		$i=0;
		$fmobile=$this->session->userdata("mobile_number");
		if($std->num_rows() > 0)
		{   
		if($fmobile){
		foreach($std->result() as $s):
		$this->db->where("student_id",$s->student_id);
		$parentmobile=$this->db->get("guardian_info")->row();
		if($parentmobile->f_mobile){
			
			if($smscount<90){
				$fmobile =$fmobile.",".$parentmobile->f_mobile;
				$count=$count+1;
				$smscount++;
			}else{
				sms($fmobile,$msg);
				$fmobile="8382829593";
				$smscount=0;
			}
			
			}
		endforeach;
			}
			sms($fmobile,$msg);
		
		}
		}
		redirect("index.php/login/mobileNotice/Parent%20Message/$count");
	}
	
	function sendAnnuncement(){
		$count=0;
		$val=$this->db->get("sms_setting")->row();
		$msg =$this->input->post("meg");
		$this->db->where("status","Active");
		$var=$this->db->get("employee_info");
		$isSMS = $this->db->get("sms")->row()->announcement;
		$fmobile=$this->session->userdata("mobile_number");
		if($isSMS=="yes")
		{
			if($fmobile){
			foreach($var->result() as $mobile):
			if($mobile->mobile){
			$fmobile =$fmobile.",".$mobile->mobile;
			$count=$count+1;
			}
			endforeach;
			}
			sms($fmobile,$msg);
			//echo $fmobile;
		}
		redirect("index.php/login/mobileNotice/Parent%20Message/$count");
	}
	
	function sendGreeting(){
		$count=0;
		$val=$this->db->get("sms_setting")->row();
		$msg =$this->input->post("meg");
		$var=$this->db->get("guardian_info");
		$this->db->where("status","Active");
		$var1=$this->db->get("employee_info");
		$isSMS = $this->db->get("sms")->row()->greeting;
		$fmobile=$this->session->userdata("mobile_number");
		if($isSMS=="yes")
		{
			foreach($var->result() as $mobile):
			if($mobile->f_mobile){
			$fmobile =$fmobile.",".$mobile->f_mobile;
			$count=$count+1;
			}
			endforeach;
			foreach($var1->result() as $mobile):
			if($mobile->mobile)
			{
			$fmobile =$fmobile.",".$mobile->mobile;
			$count=$count+1;
			}
			endforeach;
			sms($fmobile,$msg);
			//echo $fmobile;
		}
		redirect("index.php/login/mobileNotice/Parent%20Message/$count");
	}
	function classwise(){	
		$class_id = $this->input->post("class");
		$section = $this->input->post("section");
		
		$val=$this->db->get("sms_setting")->row();
		$msg =	$this->input->post("meg");
		$isSMS = $this->db->get("sms")->row()->parent_message;
		if($isSMS=="yes")
		{
			if($section=="all"){
				$this->db->where("class_id",$class_id);
				$this->db->where("status","Active");
				$std = $this->db->get("student_info");
			}else{
			$this->db->where("class_id",$class_id);
			$this->db->where("status","Active");
			$this->db->where("section",$section);
			$std = $this->db->get("student_info");
			}
			
			$fmobile=$this->session->userdata("mobile_number");
			$i=0;
			if($std->num_rows() > 0)
			{
					
				foreach($std->result() as $s):
				$this->db->where("student_id",$s->student_id);
				$m=$this->db->get("guardian_info")->row();
				if($m->f_mobile){
				$fmobile = $fmobile.",".$m->f_mobile;
				$i++;}
					endforeach;
					if($fmobile){
						sms($fmobile,$msg);
						echo $fmobile;
					}
		}
		redirect("index.php/login/mobileNotice/classwise/$i");
		}
	   
	}
	
	function smsPanel(){
		$data['cbs']=checkBalSms();
		$data['pageTitle'] = 'SMS Panel';
		$data['smallTitle'] = 'Mobile SMS';
		$data['mainPage'] = 'SMS Panel Area';
		$data['subPage'] = 'SMS Panel';
		$data['title'] = 'SMS Panel Area ';
		$data['headerCss'] = 'headerCss/noticeCss';
		$data['footerJs'] = 'footerJs/noticeJs';
		$data['mainContent'] = 'smsPanel';
		$this->load->view("includes/mainContent", $data);
	}	
}