<?php
	$this->db->where("Transport_fee >","0.00");
	$val = $this->db->get("fee_shedule");
	if($val->num_rows()>0){
	

?>
<div class="container">
	<div class="row">
		<div class="col-md-13">
			<!-- start: EXPORT DATA TABLE PANEL  -->
			<div class="panel panel-white">
				<div class="panel-heading">
					<h4 class="panel-title">Export <span class="text-bold">Transport Data</span> Table</h4>
					<div class="panel-tools">
						<div class="dropdown">
							<a data-toggle="dropdown" class="btn btn-xs dropdown-toggle btn-transparent-grey">
								<i class="fa fa-cog"></i>
							</a>
							<ul class="dropdown-menu dropdown-light pull-right" role="menu">
								<li>
									<a class="panel-collapse collapses" href="#"><i class="fa fa-angle-up"></i> <span>Collapse</span> </a>
								</li>
								<li>
									<a class="panel-refresh" href="#">
										<i class="fa fa-refresh"></i> <span>Refresh</span>
									</a>
								</li>
								<li>
									<a class="panel-config" href="#panel-config" data-toggle="modal">
										<i class="fa fa-wrench"></i> <span>Configurations</span>
									</a>
								</li>
								<li>
									<a class="panel-expand" href="#">
										<i class="fa fa-expand"></i> <span>Fullscreen</span>
									</a>
								</li>
							</ul>
						</div>
						<a class="btn btn-xs btn-link panel-close" href="#">
							<i class="fa fa-times"></i>
						</a>
					</div>
				</div>
				<div class="panel-body">
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
		<div class="table-responsive">
			<table class="table table-striped table-hover" id="sample-table-2">
				<thead>
					<tr class ="success">
						<th>Sno</th>
						<th>Stud. Id</th>
						<th>Stud. Name</th>
						<th>Class & Sec</th>
						<th>Father Name</th>
						<th>Father Mobile</th>
						<th class="center">Address</th>
						<th>Vehicle</th>
						<th>Vehicle N0</th>
						<th>Distence</th>
						<th>Fee</th>
						<th>Edit</th>
					</tr>
				</thead>
				
				<tbody>
				<?php 
				$count=1;foreach($val->result() as $row):
				$this->db->where("student_id",$row->student_id);
				$studentd = $this->db->get("student_info")->row();
				$this->db->where("student_id",$row->student_id);
				$gd = $this->db->get("guardian_info")->row();
				$this->db->where("student_id",$row->student_id);
				$transport = $this->db->get("transport");
				
				  if($count%2==0){$rowcss="danger";}else{$rowcss ="warning";}?>
				  <tr class="<?php echo $rowcss;?>">
			  			<td><?php echo $count;?></td>
			  			<td><input type="hidden" id="studid<?php echo $count;?>" value="<?php echo $studentd->student_id;?>"><?php echo $studentd->student_id;?></td>
			  			<td><?php echo $studentd->first_name." ".$studentd->midd_name." ".$studentd->last_name;?></td>
			  			<td><?php echo $studentd->class_id."-".$studentd->section;?></td>
			  			<td><?php echo $gd->father_full_name;?></td>
			  		
			  			
			  			<td><?php echo $gd->f_mobile;?></td>
			  			
			  			<td>
							<?php echo $studentd->address1." ".$studentd->address2." ".$studentd->city.",".$studentd->state."-".$studentd->pin_code;?>
						</td>
			  			<td ><?php if($transport->num_rows()>0){$transport1=$transport->row(); if($transport1->vehicleType){echo $transport1->vehicleType;}}else{ ?><input type="text" style="width: 80px;" id="vt<?php echo $count;?>" name="vt<?php echo $count;?>"> <?php ;}?>
			  			</td>
			  			<td><?php if($transport->num_rows()>0){$transport1=$transport->row();if($transport1->vnumnber){echo $transport1->vnumnber;}}else{ ?><input type="text" id="vn<?php echo $count;?>" style="width: 60px;" name="vn<?php echo $count;?>"> <?php ;}?></td>
			  			<td><?php if($transport->num_rows()>0){$transport1=$transport->row();if($transport1->distance){echo $transport1->distance;}}else{ ?><input type="text" id="dt<?php echo $count;?>" style="width: 60px;" name="dt<?php echo $count;?>"> <?php ;}?></td>
			  			<td><?php echo $row->Transport_Fee;?></td>
							<td> <button id = "upinfo<?php echo $count;?>" class="btn btn-purple">
								Update
							</button>
			  			</td>
			  			<script>
			  		
			  			$("#upinfo<?php echo $count;?>").click(function(){
					var vt = $("#vt<?php echo $count;?>").val();
					var vn = $("#vn<?php echo $count;?>").val();
					var dt = $("#dt<?php echo $count;?>").val();
					var studid = $("#studid<?php echo $count;?>").val();
					
					alert(studid+vt+vn+dt);
					$.post("<?php echo site_url("index.php/studentController/updateTransport") ?>",{vt : vt,vn : vn,dt : dt,studid : studid}, function(data){
						$("#upinfo<?php echo $count;?>").html(data);
					});
				});
			  			</script>
			  		</tr>
			  		<?php $count++; ?>
			  		<?php endforeach;?>
			  		
				</tbody>
			</table>
		</div>
		
		<br/></div></div></div></div></div>
		<?php }else 
		{echo "NO Record Found";}?>

	
