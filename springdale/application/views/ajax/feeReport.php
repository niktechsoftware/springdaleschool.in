<?php
if($cla == "all" && $sec == "all"):


$this->db->where("status","Active");
	$student = $this->db->get("student_info");
elseif($cla != "all" && $sec == "all"):
$this->db->where("status","Active");

	$this->db->where("class_id",$cla);
	$student = $this->db->get("student_info");
else:
$this->db->where("status","Active");

	$this->db->where("class_id",$cla);
	$this->db->where("section",$sec);
	$student = $this->db->get("student_info");
endif;
?>
<?php if($student->num_rows() > 0): 
	$isData = $this->db->count_all("fee_deposit"); 
	if($isData > 0):
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
		
		<div>   <p class="alert alert-danger"> Available SMS Balance = <?php $cbs=checkBalSms();
		echo $cbs;?></p>
										 <p class="alert alert-info"> Note : This is the area you can send Fee reminder to send click send sms button . If you send SMS change to Success Message send Successfuly . <br>
										</div>
			<table class="table table-striped table-hover" id="sample-table-2">
				<thead>
					<tr class = "success">
						<th>#</th>
						<th>Stud. Id</th>
						<th>Stud. Name</th>
						<th>Father Mobile</th>
						
						<th>Father Name</th>
						
						<th>Fee line</th>
						<th>Total Paid</th>
						<th>Due</th>
						<th>Full Detail</th>
						  
					</tr>
				</thead>
				<?php 
				
				    $color = array(
					    "progress-bar-danger",
					    "progress-bar-success",
					    "progress-bar-warning",
					    "progress-partition-green",
					    "partition-azure",
					    "partition-blue",
					    "partition-orange",
					    "partition-purple",
					    "progress-bar-danger",
					    "progress-bar-success",
					    "progress-partition-green",
					    "partition-purple"
				    );
				    $count = 1;
				    $tot=0.00;?>
				<tbody>
				<?php 
				
				    $color = array(
					    "progress-bar-danger",
					    "progress-bar-success",
					    "progress-bar-warning",
					    "progress-partition-green",
					    "partition-azure",
					    "partition-blue",
					    "partition-orange",
					    "partition-purple",
					    "progress-bar-danger",
					    "progress-bar-success",
					    "progress-partition-green",
					    "partition-purple"
				    );
				    $rowcss = "danger";
				    $count = 1;
				    $tot=0.00;
				    foreach($student->result() as $stuDetail):
				    $stu_id = $stuDetail->student_id;
				    $this->db->where("student_id",$stu_id);
				    $rows = $this->db->get("guardian_info")->row();
				    $total = $this->db->query("SELECT SUM(diposit_month) as totalMonth, SUM(paid) as totalPaid from fee_deposit WHERE student_id = '$stu_id' AND finance_start_date='$fsd'")->row(); ?>
					<?php if($count%2==0){$rowcss="danger";}else{$rowcss ="warning";}?>
					<tr class="<?php echo $rowcss;?>">
			  			<td><?php echo $count;?></td>
			  				<td><strong><?php echo $stu_id;?></strong>
			  			<td><?php echo $stuDetail->first_name." ".$stuDetail->midd_name." ".$stuDetail->last_name;?>
			  			<input type = "hidden" id="sname<?php echo $count;?>" value="<?php echo $stuDetail->first_name." ".$stuDetail->midd_name." ".$stuDetail->last_name;?>"</td>
			  			<td><strong><?php echo $rows->f_mobile;?></strong><input type = "hidden" id="mnum<?php echo $count;?>" value="<?php echo $rows->f_mobile;?>"></td>
			  		
			  			
			  			<td><strong><?php echo $rows->father_full_name;
			  			
				        ?></strong><input type = "hidden" id="fname<?php echo $count;?>" value="<?php echo $rows->father_full_name;?>"</td></td>
			  			
			  			<td>
							<?php $month = $total->totalMonth;?>
							<?php if($month > 12){
							if($month > 23){
							$month = $month - 12;
							}
							$month = $month - 12;} ?>
			                <?php for($i = 0; $i<$month; $i++):?>
				               <span class="label label-success" style="line-height:20px;">
				               		<?php echo date("M-y",strtotime("$fsd + $i month"));?>
				               </span>
			                <?php endfor; ?>
						</td>
			  			<td><?php 
			  			$stamp1 = date("Y-m-d");
			  			$stamp=strtotime($stamp1);
			  			$dayc=date("d", $stamp);
			  			$day1=date("m", $stamp);
			  			
			  			
			  			if($day1<4){
			  				$day1=$day1+12;
			  			}
			  			
			  			
			  			$mth = $day1-3;
			  			if(($mth>12)||($fsd != "2018-04-01"))
			  			{$mth=12;
			  			}
			  			$fm = $mth-$month;
						$fc=0.00;
						$vsms=0;
						$pri=0.00;
			  			$fd = $this->db->query("SELECT * from fee_shedule  WHERE student_id = '$stu_id' AND finance_start_date='$fsd' limit 1 ")->row(); 
			  			if($fd)	{
			  			$fc = $fc + $fd->Tution_Fee;
			  				$fc = $fc + $fd->Exam_Fee;
			  				$fc = $fc + $fd->Computer_Fee;
			  				$fc = $fc + $fd->Transport_Fee;
			  		
			  			$cv =	$this->db->query("SELECT current_balance FROM fee_deposit WHERE student_id = '$stu_id' order by `id` desc limit 1")->row();
			  			$psv =	$this->db->query("SELECT previous_stock_balance FROM fee_deposit WHERE student_id = '$stu_id' order by `id` desc limit 1")->row();
			  			$pri = $pri + $cv->current_balance + $psv->previous_stock_balance; 
			  			}			
			  			echo $total->totalPaid;?></td>
			  			<td><?php if(($fm>0)&&($dayc<15)){
			  				$tot=$tot+$fc*$fm+$pri;
			  				$vsms = $fc*$fm+$pri;
			  				echo $fc*$fm+$pri;
			  			}else{
			  				if(($fm>0)&&($dayc>15)){
			  					$tot=$tot+$fc+$pri;
			  					$vsms=$fc*$fm+$pri;
			  					echo $fc*$fm+$pri;
			  				}
			  				else{
			  					if($pri>0){
			  						$tot=$tot+$pri;
			  						$vsms=$pri;
			  						echo $pri;
			  					}else{
			  					echo "NotDue";
			  					}
			  				}
			  			} ?>
			  			<input type = "hidden" id="rem<?php echo $count;?>" value="<?php echo $vsms;?>"
			  			</td>
			  			<td width = "25%">
							<a href="<?php echo base_url()?>index.php/feeControllers/fullDetail/<?php echo $stu_id;?>/<?php echo $fsd;?>" target="_blank" class="btn btn-blue">
								View Detail
							</a>
							<button class="btn btn-yellow" id ="smstodew<?php echo $count;?>" >
								Send SMS
							</button>
							
								<script>
			  		
			  			$("#smstodew<?php echo $count;?>").click(function(){
			  				var smstodue = $("#rem<?php echo $count;?>").val();
			  				var sname = $("#sname<?php echo $count;?>").val();
			  				var fname = $("#fname<?php echo $count;?>").val();
			  				var mnum = $("#mnum<?php echo $count;?>").val();
					<?php 
					
					?>
					$.post("<?php echo site_url("index.php/feeControllers/feeRemSms") ?>",{smstodue : smstodue,sname : sname,fname : fname,mnum : mnum}, function(data){
						$("#smstodew<?php echo $count;?>").html(data);
					});
				
				});
			  			</script>
			  			</td>
			  		</tr>
			  		<?php $count++; ?>
			  		<?php endforeach;?>
			  		
				</tbody>
			</table>
		</div>
		<?php else: ?>
		<br/><br/>
			<div class="alert alert-block alert-danger fade in">
				<button data-dismiss="alert" class="close" type="button">
					&times;
				</button>
				<h4 class="alert-heading"><i class="fa fa-times"></i> Error! <?php echo $student->num_rows();?></h4>
				<p>
					No record found from Fee database please submit fee first of this class &amp; section... 
				</p>
			</div>
		<?php endif; ?>
<?php else: // if student_info not return any value... ?>
	<br/><br/>
	<div class="alert alert-block alert-danger fade in">
		<button data-dismiss="alert" class="close" type="button">
			&times;
		</button>
		<h4 class="alert-heading"><i class="fa fa-times"></i> Error! <?php echo $student->num_rows();?></h4>
		<p>
			No record found from this class and section... 
		</p>
		<p>
			Make sure students are avaliable in this class section... :)
		</p>
	</div>
<?php endif; ?>


<script>
	TableExport.init();
</script>