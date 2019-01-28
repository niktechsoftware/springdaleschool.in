<div class="col-md-12">
											<div class="panel">
												<div class="panel-heading panel-blue border-light">
													<h4 class="panel-title">Expenditure Detail</h4>
												</div>
												<div class="panel-body panel-scroll height-450" >
												<table class="table table-bordered table-hover ">
												<thead>
												<tr>
												<th>S No.</th>
												<th>Expenditure Name</th>
												<th>Department </th>
												<th>paid</th>
												<th>Cash pay Date</th>
												<th>Paid Person</th>
												<th>reason</th>
												<th>Invoice No.</th>
												</tr>
											</thead>
											<tbody>
												
												<?php $v=1; foreach($request as $row):
												?><tr>
												<td><?php echo $v; ?> </td>
													<td><?php echo $row->expenditure_name;?></td>
													<td><?php echo $row->exp_depart;?></td>
													<td><?php echo $row->amount;?></td>
													<td><?php echo $row->date;?></td>
													<td><?php echo $row->name." ".$row->valid_id;?></td>
													<td><?php echo $row->reason;?></td>
													
													<td>
														<a href="<?php echo base_url()?>index.php/invoiceController/fee/<?php echo $row->receipt_no;?>/<?php if($v == 1){echo "true"; } ?>" class="btn btn-blue">
															Print Slip
														</a>
															<?php if($this->session->userdata('login_type') == 'admin'){ ?>
														<a href="<?php echo base_url()?>index.php/feeControllers/deleteFee/<?php echo $row->invoice_no;?>/<?php if($v == 1){echo "true"; } ?>" class="btn btn-warning">
															Delete Fee
														</a>
														<?php }?>
													</td>
												</tr>
												<?php endforeach;?>
													</tbody>
												</table>
												</div>
											</div>
										</div>
									