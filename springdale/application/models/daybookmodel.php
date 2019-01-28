<?php
class daybookModel extends CI_Model{

	public function fromStock($stream){
		$query = $this->db->insert("day_book", $stream);
		return $query;
	}
	function cash_pay($stream){
		$query = $this->db->insert("cash_payment", $stream);
		return $query;
	}
	
	function fulldetail($expenditure_name,$date1,$date2){
		$a = $this->db->query("select * from cash_payment where expenditure_name = '$expenditure_name' AND date >= '$date1' AND date <= '$date2'");
		return $a;	
	}

}
