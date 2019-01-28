<?php
class newAdmissionControllers extends CI_Controller{
	
	public function addinfo(){
		
		$id = $this->db->query("SELECT id From student_info order by id DESC Limit 1")->row()->id;
		$id = 10000 + $id;
		//$this->load->view("newAdmission");
		
		$this->form_validation->set_error_delimiters('<div class="col-sm-12"><label class="text-danger">', '</label></div>');
		$this->form_validation->set_rules('scholarNumber','Scholar Number', 'trim|required');
		$this->form_validation->set_rules('dateOfAdmission','Date Of Admission', 'trim|required');
		$this->form_validation->set_rules('firstName','First Name', 'trim|required');
		$this->form_validation->set_rules('middleName','Middle Name', 'trim');
		$this->form_validation->set_rules('lastName','Last Name', 'trim|required');
		$this->form_validation->set_rules('dob','Date of birth', 'trim|required');
		$this->form_validation->set_rules('classOfAdmission','Class of Admission', 'trim|required');
		$this->form_validation->set_rules('section','Section', 'trim|required');
		$this->form_validation->set_rules('gender','Gende', 'trim');
		$this->form_validation->set_rules('bloodGroup','', 'trim');
		$this->form_validation->set_rules('birthPlace','', 'trim');
		$this->form_validation->set_rules('nationality','', 'trim');
		$this->form_validation->set_rules('mothertongue','', 'trim');
		$this->form_validation->set_rules('category','', 'trim');
		$this->form_validation->set_rules('religion','', 'trim');
		$this->form_validation->set_rules('addLine1','Address', 'trim|required');
		$this->form_validation->set_rules('city','City', 'trim|required');
		$this->form_validation->set_rules('state','State', 'trim|required');
		$this->form_validation->set_rules('country','Country', 'trim|required');
		$this->form_validation->set_rules('phonenumbar','', 'trim');
		$this->form_validation->set_rules('mobileNumber','Mobile Number', 'trim|required');
		$this->form_validation->set_rules('emailAddress','', 'trim');
		$this->form_validation->set_rules('password','Password', 'trim|required');
		$this->form_validation->set_rules('password_again','Re-Password', 'trim|required|matches[password]');
		$this->form_validation->set_rules('fatherName','Father Name', 'trim|required');
		$this->form_validation->set_rules('motherName','Mother Name', 'trim|required');
		$this->form_validation->set_rules('guardianName','', 'trim');
		$this->form_validation->set_rules('guardianRelation','', 'trim');
		$this->form_validation->set_rules('motherEducation','', 'trim');
		$this->form_validation->set_rules('fatherEducation','', 'trim');
		$this->form_validation->set_rules('fatherOccupation','', 'trim');
		$this->form_validation->set_rules('motherOccupation','', 'trim');
		$this->form_validation->set_rules('familyAnnualIncome','', 'trim');
		$this->form_validation->set_rules('parentAddress','Address', 'trim|required');
		$this->form_validation->set_rules('parentCity','City', 'trim|required');
		$this->form_validation->set_rules('parentState','State', 'trim|required');
		$this->form_validation->set_rules('parentPin','Pin', 'trim|required');
		$this->form_validation->set_rules('parentCountry','Country', 'trim|required');
		$this->form_validation->set_rules('fatherMobileNumber','Mo', 'trim');
		$this->form_validation->set_rules('motherMobileNumber','', 'trim|required');
		$this->form_validation->set_rules('fatherEmailAddress','', 'trim');
		$this->form_validation->set_rules('motherEmailAddress','', 'trim');
		
		if($this->form_validation->run() == FALSE){
			$this->newAdmission();
		}
		
		$datastudent = array(
				"student_id" => $id,
				"scholer_no" => $this->input->post("scholarNumber"),
				"adm_date" => $this->input->post("dateOfAdmission"),
				"first_name" => $this->input->post("firstName"),
				"midd_name" => $this->input->post("middleName"),
				"last_name" => $this->input->post("lastName"),
				"date_ob" => $this->input->post("dob"),
				"class_id" => $this->input->post("classOfAdmission"),
				"section" => $this->input->post("section"),
				"gender" => $this->input->post("gender"),
				"bloodgp" => $this->input->post("bloodGroup"),
				"birth_place" => $this->input->post("birthPlace"),
				"nationality" => $this->input->post("nationality"),
				"mother_tongue" => $this->input->post("mothertongue"),
				"category" => $this->input->post("category"),
				"religion" => $this->input->post("religion"),
				"address1" => $this->input->post("addLine1"),
				"address2" => $this->input->post("addLine2"),
				"city" => $this->input->post("city"),
				"state" => $this->input->post("state"),
				"pin_code" => $this->input->post("pinCode"),
				"country" => $this->input->post("country"),
				"phone" => $this->input->post("phonenumbar"),
				"mobile" => $this->input->post("mobileNumber"),
				"email" => $this->input->post("emailAddress"),
				"username" => $id,
				"password" =>$this->input->post("password"),
				"status"=>"Active"
		);
		
		$dataparent = array(
				"student_id" =>  $id,
				"father_full_name" => $this->input->post("fatherName"),
				"mother_full_name" => $this->input->post("motherName"),
				"caretaker_name" => $this->input->post("guardianName"),
				"caretaker_relation" => $this->input->post("guardianRelation"),
				"father_education" => $this->input->post("fatherEducation"),
				"mother_education" => $this->input->post("motherEducation"),
				"father_occupation" => $this->input->post("fatherOccupation"),
				"mother_occupation" => $this->input->post("motherOccupation"),
				"family_annual_income" => $this->input->post("familyAnnualIncome"),
				"address" => $this->input->post("parentAddress"),
				"city" => $this->input->post("parentCity"),
				"state" => $this->input->post("parentState"),
				"pin" => $this->input->post("parentPin"),
				"country" => $this->input->post("parentCountry"),
				"phone" => $this->input->post("parentPhoneNumber"),
				"f_mobile" => $this->input->post("fatherMobileNumber"),
				"m_mobile" => $this->input->post("motherMobileNumber"),
				"f_email" => $this->input->post("fatherEmailAddress"),
				"m_email" => $this->input->post("motherEmailAddress"),
		);
		
		$subjectRows = $this->input->post("subVal");
		for($i = 1; $i<=$subjectRows; $i++){
			$subData = array(
					"student_id" => $id,
					"subject" => $this->input->post("subject$i")
			);
			$this->db->insert("students_subject",$subData);
		}
		
		$pClassData = array(
				"student_id" => $id,
				"pClass" => $this->input->post("pClass"),
				"pSchool" => $this->input->post("pSchool"),
				"pYear" => $this->input->post("pYear"),
				"pRoll" => $this->input->post("pRoll"),
				"pMarks" => $this->input->post("pMarks"),
				"pPercentage" => $this->input->post("pPercentage"),
				"pSubject" => $this->input->post("pSubject")
		);
		$tran = $this->input->post("ts");
		if($tran=="YES"){
			$datatransport = array(
					"student_id" => $id,
					"vehicleType" => $this->input->post("vt"),
					"vnumnber"=>$this->input->post("vnumnber"),
					"distance"=>$this->input->post("distance")
		
			);
			$this->db->insert("transport",$datatransport);
		}
		$this->db->insert("previusSchoolInfo",$pClassData);
		
		$this->load->model('newAdmissionModel');
		$addInfoConfirm = $this->newAdmissionModel->addInfo($datastudent);
		$addInfoConfirm1 = $this->newAdmissionModel->addInfo1($dataparent);
		if($addInfoConfirm && $addInfoConfirm1 ){
			//---------------------------------------------- CHECK SMS SETTINGS -----------------------------------------
				
			
			$isSMS = $this->db->get("sms")->row()->admission;
				if($isSMS=="yes")
				{
					$school = $this->session->userdata("your_school_name");
					$f_name=$this->input->post("fatherName");
					$username = $id;
					$password = $this->input->post("password");
					$f_mobile = $this->input->post("fatherMobileNumber");
					$msg="Dear ".$f_name." Admission is Success in ".$school.". Your Ward's Student ID= ".$username." and Password=".$password.". Thanks for Reliance.";
					sms($f_mobile,$msg);
					redirect(base_url()."index.php/studentController/admissionSuccess/$id");
				}
					
					
			//---------------------------------------------- END CHECK SMS SETTINGS -----------------------------------------
			
				
				
			
			
		}
	}
	
	function newAdmission(){
		$data['pageTitle'] = 'Student Section';
		$data['smallTitle'] = 'New Admission';
		$data['mainPage'] = 'Students';
		$data['subPage'] = 'New Admission';
	
		$this->load->model("allFormModel");
		$data['className'] = $this->allFormModel->getClass()->result();
	
		$data['title'] = 'New Admission';
		$data['headerCss'] = 'headerCss/newAdmissionCss';
		$data['footerJs'] = 'footerJs/newAdmission';
		$data['mainContent'] = 'newAdmission';
		$this->load->view("includes/mainContent", $data);
	}
}