   <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends MY_Controller {

	
	
public function index(){
	$data['pagename'] = "Home";
	$data['title'] = "Spring Dale School";
	$data['body'] = "welcome_message";
	 
	$this->load->view("include/template",$data);
}

public function directorDesk(){
	$data['pagename'] = "Director Desk";
	$data['title'] = "Spring Dale School";
	$data['body'] = "directorDesk";
	$this->load->view("include/template",$data);
	}
	public function campus(){
	$data['pagename'] = "Director Desk";
	$data['title'] = "Spring Dale School";
	$data['body'] = "campus";
	$this->load->view("include/template",$data);
	}
	public function games(){
	$data['pagename'] = "Director Desk";
	$data['title'] = "Spring Dale School";
	$data['body'] = "games";
	$this->load->view("include/template",$data);
	}


public function chairmanDesk(){
	$data['pagename'] = "Chairman Desk";
	$data['title'] = "Spring Dale School";
	$data['body'] = "chairmanDesk";
	$this->load->view("include/template",$data);
	}

public function principalDesk(){
	$data['pagename'] = "Principal Desk";
	$data['title'] = "Spring Dale School";
	$data['body'] = "principalDesk";
	$this->load->view("include/template",$data);
}
public function mission(){
	$data['pagename'] = "Mission";
	$data['title'] = "Spring Dale School";
	$data['body'] = "mission";
	$this->load->view("include/template",$data);
}

public function facilities(){
	$data['pagename'] = "Facilities";
	$data['title'] = "Spring Dale School";
	$data['body'] = "facilities";
	$this->load->view("include/template",$data);
}

public function gallery(){
	$data['pagename'] = "Gallery";
	$data['title'] = "Spring Dale School";
	$data['body'] = "gallery";
	$this->load->view("include/template",$data);
}

public function contactus(){
	$data['pagename'] = "Contact US";
	$data['title'] = "Spring Dale School";
	$data['body'] = "contactus";
	$this->load->view("include/template",$data);
}

public function schoolStaff(){
	$data['pagename'] = "School Staff";
	$data['title'] = "Spring Dale School";
	$data['body'] = "schoolstaff";
	$this->load->view("include/template",$data);
}
function managerDesk(){
	$data['pagename'] = "Manager Desk";
	$data['title'] = "Spring Dale School";
	$data['body'] = "managerDesk";
	$this->load->view("include/template",$data);
}

function saveenquiry(){
	$name = $this->input->post("name");
	$email = $this->input->post("email");
	$contact = $this->input->post("contact");
	$comments = $this->input->post("comments");
	$msg = "hai ".$name." your enquiry has been submitted successfully we will Contact you soon. On your number ".$contact."Your question is = ".$comments;
	$email=$email.",sharadrai99@gmail.com,springdalejuniorhighschool2512@gmail.com";
		$data = array(
				'name'=>$name,
				'email'=>$email,
				'contact'=>$contact,
				'ques'=>$comments,
				'enquiry_date'=>date("Y-m-d"),
				'response'=>"NO"
		);
		$this->load->helper('sms');
		sms($contact,$comments);
		$this->db->insert("carrer",$data);

		/* if($this->db->insert("carrer",$data)){
		
			
			$ci = get_instance();
					$ci->load->library('email');
					$config['protocol'] = "smtp";
					$config['smtp_host'] = "mail.springdaleschool.in";
					$config['smtp_port'] = "587";
					$config['smtp_user'] = "info@springdaleschool.in"; 
					$config['smtp_pass'] = "kanpur12!@";
					$config['charset'] = "utf-8";
					$config['mailtype'] = "html";
					$config['newline'] = "\r\n";
					
					$ci->email->initialize($config);
					
					$ci->email->from('info@springdaleschool.in', 'Sharad singh');
					$list = array('sharadrai99@gmail.com,springdalejuniorhighschool2512@gmail.com,singhkullu12@gmail.com');
					$ci->email->to($email);
					$this->email->reply_to('sharadrai99@gmail.com', 'Website Contect');
					$ci->email->subject('website enquiry ');
					$ci->email->message($msg);
					$ci->email->send();
				echo "rahul";
			redirect(base_url()."index.php/welcome/contactus/success");
		}
		else{
			echo "something is wrong";
		}*/
		

			
		
	}
	function syllabus(){
		$data['pagename'] = "Download Syllabus";
		$data['title'] = "Spring Dale School";
		$data['body'] = "syllabus";
		$this->load->view("include/template",$data);
	}
	
	function summerhomework(){
		$data['pagename'] = "Download Holidays HomeWork";
		$data['title'] = "Spring Dale School";
		$data['body'] = "shomework";
		$this->load->view("include/template",$data);
	}
	
	function admissionPro(){
	$data['pagename'] = "Manager Desk";
	$data['title'] = "Spring Dale School";
	$data['body'] = "admissionPro";
	$this->load->view("include/template",$data);
}

	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */