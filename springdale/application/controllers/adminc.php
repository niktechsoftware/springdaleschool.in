<?php
class adminc extends CI_Controller{
	
	
	function admitCard(){
		$data['pageTitle'] = 'Admit Card';
			$data['smallTitle'] = 'Student Panel';
			$data['mainPage'] = 'Student Panel';
			$data['subPage'] = 'Student Panel';
			$data['title'] = 'Admit Card';
			$this->load->model("configureClassModel");
			$this->load->model("allFormModel");
			$data['request'] = $this->allFormModel->getClass()->result();
			$data['headerCss'] = 'headerCss/newAdmissionCss';
			$data['footerJs'] = 'footerJs/admitCardJs';
			$data['mainContent'] = 'admitCard';
			$this->load->view("includes/mainContent", $data);
		
	}
	
	
	function admitCardReport(){
		$data['pageTitle'] = 'Admit Card';
			$data['smallTitle'] = 'Student Panel';
			$data['mainPage'] = 'Student Panel';
			$data['subPage'] = 'Student Panel';
			$data['title'] = 'Admit Card';
			$data['headerCss'] = 'headerCss/newAdmissionCss';
			$data['footerJs'] = 'footerJs/admitCardJs';
			$data['mainContent'] = 'admitCardReport';
			$this->load->view("includes/mainContent", $data);
	}
	
	function AdmitCardDownload(){
		$id = $this->uri->segment(3);
		$data['id']=$id;
		$data['title']="Admit Card";
		$this->load->view("invoice/printAdmit",$data);
		
	}
}