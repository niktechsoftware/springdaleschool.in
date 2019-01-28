<?php if($var->num_rows() > 0){
			  			$sr = 1;
			  			TeacherController::$sno = $sr;
			  			?>
			  				<br/><br/>
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
									<th>S.no.</th>
									<th>Student Id</th>
									<th>Student Name</th>
									<th>Present</th>
									<th>Absent</th>
									<th>Leave</th>
								
								</tr>
							</thead>
							<tbody>
								<?php $i=1;
								if($var->num_rows() >0){
			  			 foreach ($var->result() as $row){	
			  			 	
			  				?>  <?php if($i%2==0){$rowcss="danger";}else{$rowcss ="warning";}?><tr class="<?php echo $rowcss;?>">
			  		
			  					<td><?php echo TeacherController::$sno;?></td>
			  					<td><?php $stuID = $row->stu_id;  echo $stuID;?></td>
			  					<?php $stuname=$this->singleStudentModel->getStudentName($stuID)->row();?>
			  					<td><?php echo $stuname->first_name."-".$stuname->midd_name."-".$stuname->last_name;?></td>
			  					<td>
			  						<?php 
				  				
			  							$absent = $this->teacherModel->countAtt($edate,$sdate,$stuID);
			  							echo "Total Present =".$absent['p'];
			  							
			  						?> 
			  					</td>
			  					<td><?php 
			  					$resultA = $this->db->query("SELECT a_date FROM attendance WHERE attendance = 'A' AND stu_id='$stuID' AND a_date >= '$sdate' and a_date <='$edate'");
			  					echo "Total Absent =".$absent['a']."<br>";
			  					if($absent['a']>0){?><div class="alert alert-info"><?php foreach($resultA->result() as $row):
			  							echo "Date".date("d-m-Y",strtotime($row->a_date))."<br>";
			  							endforeach;?></div><?php }?></td>
				  				<td><?php 
				  				$resultL = $this->db->query("SELECT a_date FROM attendance WHERE attendance = 'L' AND stu_id='$stuID' AND a_date >= '$sdate' and a_date <='$edate'");
				  				echo "Total Leave =".$absent['l']."<br>";
				  				if($absent['l']>0){?><div class="alert alert-info"><?php foreach($resultL->result() as $row1):
			  							echo "Date".date("d-m-Y",strtotime($row1->a_date))."</button>";
			  							endforeach;?></div><?php }?></td>
				  			
				  			</tr>
				  			<?php 
			  			TeacherController::$sno++;	$i++;
			  			}}
			  			else{
			  				?><div class="alert alert-warning">NO RECORD FOUND</div>
			  		<?php }?>
							</tbody>
						</table>
						
						</div>
						
					
			  			<?php 
			  		}	
			  		?><script>
	TableExport.init();
</script><?php 		  		