<?php
class StudentController extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model("studentModel");
		$this->load->model("allFormModel");
		$this->load->model("subjectModel");
	}
	
	public function invoice(){
		$data['pageTitle'] = 'Student Section';
		$data['smallTitle'] = 'Student Profile';
		$data['mainPage'] = 'Student';
		$data['subPage'] = 'Profile';
	
	
		$data['title'] = 'Student Profile';
		$data['headerCss'] = 'headerCss/admissionSuccessCss';
		$data['footerJs'] = 'footerJs/noticeJs';
		$data['mainContent'] = 'admit';
		$this->load->view("includes/mainContent", $data);
	}
	 
	
	function studentPanel(){
		
		$data['pageTitle'] = 'Student Panel';
		$data['smallTitle'] = 'Student List';
		$data['mainPage'] = 'Student Panel Area';
		$data['subPage'] = 'Student Panel';
		$data['title'] = 'Student Panel Area ';
		$data['headerCss'] = 'headerCss/noticeCss';
		$data['footerJs'] = 'footerJs/noticeJs';
		$data['mainContent'] = 'studentPanel';
		$this->load->view("includes/mainContent", $data);
	}
	
	function homeWorkReport(){
		$data['pageTitle'] = 'Student Panel';
		$data['smallTitle'] = 'Student List';
		$data['mainPage'] = 'Class Wise Home Work';
		$data['subPage'] = 'Home Work Section';
		$data['title'] = 'Student Panel Area ';
		$this->load->model("configureClassModel");
		$data['request'] = $this->allFormModel->getClass()->result();
		$data['headerCss'] = 'headerCss/stpanelCss';
		$data['footerJs'] = 'footerJs/stpanelJs';
		$data['mainContent'] = 'classHomeWork';
		$this->load->view("includes/mainContent", $data);
	}
	function getHomeWorkList(){
		$data['fsd1']=$this->input->post("fsd1");
		$data['fsd2']=$this->input->post("fsd2");
		$data['classv']=$this->input->post("classv");
		$data['sec']=$this->input->post("section");
		$this->load->view("ajax/homeWorkList",$data);
		
	}
	function classWiseList(){
		$data['pageTitle'] = 'Student Panel';
		$data['smallTitle'] = 'Student List';
		$data['mainPage'] = 'Class Wise List Area';
		$data['subPage'] = 'Class Wise List';
		$data['title'] = 'Student Panel Area ';
		$this->load->model("configureClassModel");
		$data['request'] = $this->allFormModel->getClass()->result();
		
		$data['headerCss'] = 'headerCss/stpanelCss';
		$data['footerJs'] = 'footerJs/stpanelJs';
		$data['mainContent'] = 'classWiseList';
		$this->load->view("includes/mainContent", $data);
	}
	
	function getClassWiseList(){
		$data['fsd'] = $this->input->post("fsd");
		$data['cla'] = $this->input->post("classv");
		$data['sec'] = $this->input->post("section");
		$this->load->view("ajax/getClassWiseList",$data);
	}
	
	function transportList(){
		$data['pageTitle'] = 'Student Panel';
		$data['smallTitle'] = 'Student List';
		$data['mainPage'] = 'Transport List';
		$data['subPage'] = 'Transport List';
		$data['title'] = 'Student Panel Area ';
		$data['headerCss'] = 'headerCss/stpanelCss';
		$data['footerJs'] = 'footerJs/stpanelJs';
		$data['mainContent'] = 'transportList';
		$this->load->view("includes/mainContent", $data);
	}
	function admissionSuccess(){
		$data['pageTitle'] = 'Student Section';
		$data['smallTitle'] = 'Student Profile';
		$data['mainPage'] = 'Student';
		$data['subPage'] = 'Profile';
	
		$studentId = $this->uri->segment(3);
		
		
		$stDetail = $this->studentModel->getStudentDetail($studentId);
		$data['gurdianDetail'] = $this->studentModel->getGurdianDetail($studentId);
		$data['className'] = $this->allFormModel->getClass();
		$data['sectionName'] = $this->allFormModel->getSection();
		
		$personalInfo = $stDetail->row();
		
		$className = $personalInfo->class_id;
		$section = $personalInfo->section;
		
		$data['subjectList'] = $this->subjectModel->getSubjectByClassSection($className,$section);
		
		$data['studentsSubject'] = $this->subjectModel->isStudentSubject($studentId);
	
		$data['studentProfile'] = $stDetail;
		$data['title'] = 'Student Profile';
		$data['headerCss'] = 'headerCss/admissionSuccessCss';
		$data['footerJs'] = 'footerJs/admissionSuccessJs';
		$data['mainContent'] = 'admissionSuccess';
		$this->load->view("includes/mainContent", $data);
	}
	
	function updateTransport(){
		$student_id = $this->input->post("studid");
			$data = array(
				"student_id" => $this->input->post("studid"),
				"vehicleType" =>$this->input->post("vt"),
				"vnumnber" =>$this->input->post("vn"),
				"distance" => $this->input->post("dt")
		);
	
		$val = $this->db->insert("transport",$data);
		if($val)
		{
			echo "Updated";
		}
	}
	function updateStudentImage(){
		$id = $this->input->post('c_id');
		$photo_name = time().trim($_FILES['stuImage']['name']);
		$new_img = array(
				"photo"=> $photo_name
		);
		$old_img = $this->input->post("old_stuImg");
		@chmod("assets/images/stuImage/" . $old_img, 0777);
		@unlink("assets/images/stuImage/" . $old_img);
	
		if($query = $this->studentModel->updateStudentInfo($new_img,$id)){
			$this->load->library('upload');
			// Set configuration array for uploaded photo.
			$image_path = realpath(APPPATH . '../assets/images/stuImage');
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '1024';
			$config['file_name'] = $photo_name;
			// Upload first photo and create a thumbnail of it.
			if (!empty($_FILES['stuImage']['name'])) {
				$this->upload->initialize($config);
				if ($this->upload->do_upload('stuImage')) {
					// ---------------------------------- Redirect Success Page ----------------------
					$this->session->set_userdata("photo",$photo_name);
					redirect("index.php/studentController/admissionSuccess/$id/updateInfo");
				}
			}
		}
	}
	
	function updateFatherImage(){
		$id = $this->input->post('c_id');
	
		$photo_name = time().trim($_FILES['fatherImage']['name']);
		$new_img = array(
				"f_photo"=> $photo_name
		);
		$old_img = $this->input->post("old_f_image");
		@chmod("assets/images/stuImage/" . $old_img, 0777);
		@unlink("assets/images/stuImage/" . $old_img);
	
		if($query = $this->studentModel->updateGurdianInfo($new_img,$id)){
			$this->load->library('upload');
			// Set configuration array for uploaded photo.
			$image_path = realpath(APPPATH . '../assets/images/stuImage');
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '1024';
			$config['file_name'] = $photo_name;
			// Upload first photo and create a thumbnail of it.
			if (!empty($_FILES['fatherImage']['name'])) {
				$this->upload->initialize($config);
				if ($this->upload->do_upload('fatherImage')) {
					// ---------------------------------- Redirect Success Page ----------------------
					redirect("index.php/studentController/admissionSuccess/$id/updateInfo");
				}
			}
		}
	}
	
	function updateMotherImage(){
		$id = $this->input->post('c_id');
	
		$photo_name = time().trim($_FILES['motherImage']['name']);
		$new_img = array(
				"m_photo"=> $photo_name
		);
		$old_img = $this->input->post("old_m_image");
		@chmod("assets/images/stuImage/" . $old_img, 0777);
		@unlink("assets/images/stuImage/" . $old_img);
	
		if($query = $this->studentModel->updateGurdianInfo($new_img,$id)){
			$this->load->library('upload');
			// Set configuration array for uploaded photo.
			$image_path = realpath(APPPATH . '../assets/images/stuImage');
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '1024';
			$config['file_name'] = $photo_name;
			// Upload first photo and create a thumbnail of it.
			if (!empty($_FILES['motherImage']['name'])) {
				$this->upload->initialize($config);
				if ($this->upload->do_upload('motherImage')) {
					// ---------------------------------- Redirect Success Page ----------------------
					redirect("index.php/studentController/admissionSuccess/$id/updateInfo");
				}
			}
		}
	}
	
	
	
	function updateStuInfo(){
		$id = $this->input->post('c_id');
		$datastudent = array(
				"scholer_no" => $this->input->post("scholerNumber"),
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
				"status" => $this->input->post("status")
		);
		if($query = $this->studentModel->updateStudentInfo($datastudent,$id)){
			redirect(base_url()."index.php/studentController/admissionSuccess/$id/updateInfo");
		}
	}
	
	function updateParentInfo(){
		$id = $this->input->post('c_id');
		
		$dataparent = array(
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
		
		if($query = $this->studentModel->updateGurdianInfo($dataparent,$id)){
			redirect("index.php/studentController/admissionSuccess/$id/updateInfo");
		}
	}
	
	function uploadCc(){
		$id = $this->input->post('c_id');
	
		$photo_name = time().trim($_FILES['cc']['name']);
		$new_img = array(
				"cc"=> $photo_name
		);
		$old_img = $this->input->post("old_cc");
		@chmod("assets/images/stuImage/" . $old_img, 0777);
		@unlink("assets/images/stuImage/" . $old_img);
	
		if($query = $this->studentModel->updateStudentInfo($new_img,$id)){
			$this->load->library('upload');
			// Set configuration array for uploaded photo.
			$image_path = realpath(APPPATH . '../assets/images/stuImage');
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '1024';
			$config['file_name'] = $photo_name;
			// Upload first photo and create a thumbnail of it.
			if (!empty($_FILES['cc']['name'])) {
				$this->upload->initialize($config);
				if ($this->upload->do_upload('cc')) {
					// ---------------------------------- Redirect Success Page ----------------------
					redirect("index.php/studentController/admissionSuccess/$id/certificate");
				}
			}
		}
	}

	function uploadTc(){
		$id = $this->input->post('c_id');
	
		$photo_name = time().trim($_FILES['tc']['name']);
		$new_img = array(
				"tc"=> $photo_name
		);
		$old_img = $this->input->post("old_tc");
		@chmod("assets/images/stuImage/" . $old_img, 0777);
		@unlink("assets/images/stuImage/" . $old_img);
	
		if($query = $this->studentModel->updateStudentInfo($new_img,$id)){
			$this->load->library('upload');
			// Set configuration array for uploaded photo.
			$image_path = realpath(APPPATH . '../assets/images/stuImage');
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '1024';
			$config['file_name'] = $photo_name;
			// Upload first photo and create a thumbnail of it.
			if (!empty($_FILES['tc']['name'])) {
				$this->upload->initialize($config);
				if ($this->upload->do_upload('tc')) {
					// ---------------------------------- Redirect Success Page ----------------------
					redirect("index.php/studentController/admissionSuccess/$id/certificate");
				}
			}
		}
	}

	function uploadCastCertificate(){
		$id = $this->input->post('c_id');
	
		$photo_name = time().trim($_FILES['castCertificate']['name']);
		$new_img = array(
				"castCertificate"=> $photo_name
		);
		$old_img = $this->input->post("old_castCertificate");
		@chmod("assets/images/stuImage/" . $old_img, 0777);
		@unlink("assets/images/stuImage/" . $old_img);
	
		if($query = $this->studentModel->updateStudentInfo($new_img,$id)){
			$this->load->library('upload');
			// Set configuration array for uploaded photo.
			$image_path = realpath(APPPATH . '../assets/images/stuImage');
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '1024';
			$config['file_name'] = $photo_name;
			// Upload first photo and create a thumbnail of it.
			if (!empty($_FILES['castCertificate']['name'])) {
				$this->upload->initialize($config);
				if ($this->upload->do_upload('castCertificate')) {
					// ---------------------------------- Redirect Success Page ----------------------
					redirect("index.php/studentController/admissionSuccess/$id/certificate");
				}
			}
		}
	}

	function uploadDomicileCertificate(){
		$id = $this->input->post('c_id');
	
		$photo_name = time().trim($_FILES['domicileCertificate']['name']);
		$new_img = array(
				"domicileCertificate"=> $photo_name
		);
		$old_img = $this->input->post("old_domicileCertificate");
		@chmod("assets/images/stuImage/" . $old_img, 0777);
		@unlink("assets/images/stuImage/" . $old_img);
	
		if($query = $this->studentModel->updateStudentInfo($new_img,$id)){
			$this->load->library('upload');
			// Set configuration array for uploaded photo.
			$image_path = realpath(APPPATH . '../assets/images/stuImage');
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '1024';
			$config['file_name'] = $photo_name;
			// Upload first photo and create a thumbnail of it.
			if (!empty($_FILES['domicileCertificate']['name'])) {
				$this->upload->initialize($config);
				if ($this->upload->do_upload('domicileCertificate')) {
					// ---------------------------------- Redirect Success Page ----------------------
					redirect("index.php/studentController/admissionSuccess/$id/certificate");
				}
			}
		}
	}

	function uploadPreviousMarkSheet(){
		$id = $this->input->post('c_id');
	
		$photo_name = time().trim($_FILES['previousMarkSheet']['name']);
		$new_img = array(
				"previousMarkSheet"=> $photo_name
		);
		$old_img = $this->input->post("old_previousMarkSheet");
		@chmod("assets/images/stuImage/" . $old_img, 0777);
		@unlink("assets/images/stuImage/" . $old_img);
	
		if($query = $this->studentModel->updateStudentInfo($new_img,$id)){
			$this->load->library('upload');
			// Set configuration array for uploaded photo.
			$image_path = realpath(APPPATH . '../assets/images/stuImage');
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '1024';
			$config['file_name'] = $photo_name;
			// Upload first photo and create a thumbnail of it.
			if (!empty($_FILES['previousMarkSheet']['name'])) {
				$this->upload->initialize($config);
				if ($this->upload->do_upload('previousMarkSheet')) {
					// ---------------------------------- Redirect Success Page ----------------------
					redirect("index.php/studentController/admissionSuccess/$id/certificate");
				}
			}
		}
	}
	
	function studentList(){
		$data['result'] = $this->studentModel->studentList();
		$data['student_id'] = $this->input->post("student_id");
		$data['name'] = $this->input->post("name");
		$data['scholer_no'] = $this->input->post("scholer_no");
		$data['board_register_no'] = $this->input->post("board_register_no");
		$data['adm_date'] = $this->input->post("adm_date");
		$data['date_ob'] = $this->input->post("date_ob");
		$data['class_section'] = $this->input->post("class_section");
		$data['gender'] = $this->input->post("gender");
		$data['bloodgp'] = $this->input->post("bloodgp");
		$data['birth_place'] = $this->input->post("birth_place");
		$data['nationality'] = $this->input->post("nationality");
		$data['mother_tongue'] = $this->input->post("mother_tongue");
		$data['category'] = $this->input->post("category");
		$data['religion'] = $this->input->post("religion");
		$data['address1'] = $this->input->post("address1");
		$data['city'] = $this->input->post("city");
		$data['state'] = $this->input->post("state");
		$data['pin_code'] = $this->input->post("pin_code");
		$data['phone'] = $this->input->post("phone");
		$data['mobile'] = $this->input->post("mobile");
		$data['email'] = $this->input->post("email");
		$data['father_full_name'] = $this->input->post("father_full_name");
		$data['mother_full_name'] = $this->input->post("mother_full_name");
		$data['caretaker_name'] = $this->input->post("caretaker_name");
		$data['caretaker_relation'] = $this->input->post("caretaker_relation");
		$data['father_education'] = $this->input->post("father_education");
		$data['mother_education'] = $this->input->post("mother_education");
		$data['father_occupation'] = $this->input->post("father_occupation");
		$data['mother_occupation'] = $this->input->post("mother_occupation");
		$data['family_annual_income'] = $this->input->post("family_annual_income");
		$data['f_mobile'] = $this->input->post("f_mobile");
		$data['m_mobile'] = $this->input->post("m_mobile");
		$data['f_email'] = $this->input->post("f_email");
		$data['m_email'] = $this->input->post("m_email");
		
		$this->load->view("ajax/studentList",$data);
		}
		
		public function checkID(){
			$tid = $this->input->post("student_id");
			$this->load->model("teacherModel");
			$var = $this->teacherModel->checkStudID($tid);
			if($var->num_rows() > 0){
				foreach ($var->result() as $row){
					?>
							<div class="alert alert-success">
								<button data-dismiss="alert" class="close">
									&times;
								</button>
								ID Found ! <strong><?php echo $row->first_name." ".$row->midd_name." ".$row->last_name; ?></strong>
							</div>
							<script>

							$("#b1").show();
							</script>
							<?php 
						}}
					else{
						?>
							<div class="alert alert-danger">
						
								<button data-dismiss="alert" class="close">
									&times;
								</button>
								Sorry :( <strong><?php echo "Student ID Not Found ! Wrong Student Id"; ?></strong>
							</div>
							<script>
								$("#b1").hide();
								</script>
						<?php
						
					}
				
			}
			
			function deleteStudent(){
				$studentId = $this->uri->segment(3);
				$this->db->where('student_id', $studentId);
				$this->db->delete('student_info');
				$this->db->where('student_id', $studentId);
				$this->db->delete('guardian_info');
				$this->db->where('stu_id', $studentId);
				$this->db->delete('attendance');
				$this->db->where('stu_id', $studentId);
				$this->db->delete('attendance2');
				$this->db->where('stu_id', $studentId);
				$this->db->delete('exam_info');
				$this->db->where('student_id', $studentId);
				$this->db->delete('fee_deposit');
				$this->db->where('student_id', $studentId);
				$this->db->delete('fee_shedule');
				$this->db->where('student_id', $studentId);
				$this->db->delete('one_time_fee');
				$this->db->where('student_id', $studentId);
				$this->db->delete('pramoted');
				$this->db->where('student_id', $studentId);
				$this->db->delete('tc_certificate');
				$this->db->where('valid_id', $studentId);
				$this->db->delete('sale_info');
			if($op1 = $this->db->query("SELECT sum(amount) as v FROM day_book WHERE paid_to = '".$studentId."'")->row()){
			$op2 = $this->db->query("select closing_balance from opening_closing_balance where opening_date='".date('Y-m-d')."'")->row();
			$balance = $op2->closing_balance;
			$close1 = $balance - $op1->v;
			$data = array(
					'paid_to' => "student",
					'paid_by' => "admin",
					'reason' => " Wrong Student data",
					'dabit_cradit' => "Debit",
					'amount' => $op1->v,
					'closing_balance' => $close1,
					'pay_date' => date("Y-m-d"),
					'pay_mode' => "Software",
					'invoice_no' => "Delete Student"
		
			);
			$bal = array(
					"closing_balance" => $close1
			);
			$this->db->where("opening_date",date('Y-m-d'));
			$this->db->update("opening_closing_balance",$bal);
				
			$this->db->insert("day_book",$data);}
			redirect(base_url()."index.php/login/simpleSearchStudent");
			}
	
}