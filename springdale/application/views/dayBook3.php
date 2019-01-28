<div class="row">
	<div class="col-md-12">
		<!-- start: EXPORT DATA TABLE PANEL  -->
		<div class="panel panel-white">
			<div class="panel-heading">
				<h4 class="panel-title">Day <span class="text-bold">Book</span> Report</h4>
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
												<button class="btn btn-orange add-row">
													Add New <i class="fa fa-plus"></i>
												</button>
												<div class="btn-group pull-right">
													<button data-toggle="dropdown" class="btn btn-green dropdown-toggle">
														Export <i class="fa fa-angle-down"></i>
													</button>
													<ul class="dropdown-menu dropdown-light pull-right">
														
														
														<li>
															<a href="#" class="export-csv" data-table="#sample-table-2" >
																Save as CSV
															</a>
														</li>
														
														
														
													
														<li>
															<a href="#" class="export-excel" data-table="#sample-table-2" >
																Export to Excel
															</a>
														</li>
													
														
													</ul>
												</div>
											</div>
										</div>
										
				<?php $dt1=date("d-m-Y",strtotime($dt1));?>
				<?php $dt2=date("d-m-Y",strtotime($dt2));?>
				<div class = "center"><strong>
					<h2 style = 'color: green'> Record From Date <?php echo $dt1;?> to <?php echo $dt2;?></h2></strong>
				</div>
				<div class="table-responsive">
			
					<table class="table table-striped table-hover" id="sample-table-2">
						<thead>
		                	<tr>
		                	<th>#</th>
		                	<?php 
		                	$data=array();$this->db->distinct();
		                	$this->db->select('fee_head_name');
		                	$fee_head_name=$this->db->get("class_fees")->result();
		                	
		                    $i=1; 	foreach($fee_head_name as $f):?>
		                    	<th><?php $data[$i]= $f->fee_head_name;echo $f->fee_head_name;?></th>
		                    	<?php $i++ ; endforeach;?>
		                         <th>Transport</th>
		                    </tr>
		                </thead>
						<tbody>
		               <?php 
		              foreach($classList as $cl):?>
		               <tr><td><?php echo $cl->class_name;?></td>
		               <?php
		               $thj=1; foreach($fee_head_name as $f):
		                
		                $tot=0;
		                foreach($a->result() as $id):
		               $this->db->where("student_id",$id->student_id);
		               $this->db->where("class_id",$cl->class_name);
		               $gf = $this->db->get("student_info");
		               if($gf->num_rows()>0){
		               
		               	for($j=1;$j<$i;$j++){
		               	$dt1 = "fee_head_name".$j;
		               
		              if($id->$dt1==$data[$thj]){
		              	$sm1="fee_head_amount".$j;
		              	$tot =$tot+ $id->$sm1;
		             
		               	}
		               	}
		               
		               echo "<td>".$tot."</td>";
		               }
		               else{
		               	echo "<td>".$tot."</td>";
		               }
		               endforeach; ?>
		               
		             
		               <?php $thj++; endforeach; endforeach;?>
		                <td></td>
		                </tr>
		                </tbody>	
					</table>
				
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	TableExport.init();
</script>