<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	<title>Fee Invoice</title>

	<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>assets/css/invoice_css/style.css' />
	<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>assets/css/invoice_css/print.css' media="print" />
	<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/invoice_js/jquery-1.3.2.min.js'></script>
	<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/invoice_js/example.js'></script>
	
	<style type="text/css">

	@media print
	{
			body * { visibility: hidden; }
			#printcontent * { visibility: visible; }
			#printcontent { position: absolute; top: 40px; left: 30px; }
	    }
	</style>

</head>
<body>
<div id="printcontent">
	<div id="page-wrap" style="border:1px solid #333;">
<div class="row">
 
	<div class="col-sm-12">
	
		<?php 
			if(isset($studentProfile)):
				$personalInfo = $studentProfile->row();
				$gurdianInfo = $gurdianDetail->row();
		?>
		
		
		<div id="page-wrap">
		
			<table style="width: 100%">
			<tr >
				
						
				<td colspan="3" align="center">
					<h1 align="center" style="text-transform:uppercase;"><?php echo "SPRING DALE SCHOOL"; ?></h1>
			      
			        <h3 align="center" style="font-variant:small-caps;">
						<?php echo "Phone : +91-9450938643 , 05462-246777 "; ?>
			            
			        </h3>
			         <h3 align="center" style="font-variant:small-caps;">
						<?php echo "REG.OFFICE : Oppo.side.Shibli Inter College Pandey Bazar Azamgarh "; ?>
			           <h2 align="center" style="font-variant:small-caps;">Student ID Card (2017-18)</h2>
<h3 align="center" style="font-variant:small-caps;"></h3>			        
</h3>
			        
				</td>
			</tr>
		
						<tr>
						   <td  rowspan="8" >
							  	<div class="left">
									<h3><?php echo $personalInfo->first_name." ".$personalInfo->midd_name." ".$personalInfo->last_name; ?></h3>
									<div class="fileupload fileupload-new" data-provides="fileupload">
										<div style="width: 140px; height: 150px; border: 1px solid #ccc;">
											<?php if(strlen($personalInfo->photo > 0)):?>
												<img alt="<?php echo $personalInfo->first_name;?>" height="148" width="138" src="<?php echo base_url()?>assets/images/stuImage/<?php echo $personalInfo->photo;?>" />
											<?php else:?>
												<?php if($personalInfo->gender == 'Male'):?>
													<img alt="<?php echo $personalInfo->first_name;?>" height="148" width="138" src="<?php echo base_url()?>assets/images/stuImage/stuMale.png" />	
												<?php endif;?>
												<?php if($personalInfo->gender == 'Female'):?>
													<img alt="<?php echo $personalInfo->first_name;?>" height="148" width="138" src="<?php echo base_url()?>assets/images/stuImage/stuFemale.png" />	
												<?php endif;?>
											<?php endif;?>
										</div>
									</div>
								</div>
							<div align="right"><h4 style="margin-top: 10px">PRINCIPAL SIGN</h4></div>
							  
						   </td>
						
											<td>Scholer No.</td>
											<td>
												<?php if(strlen($personalInfo->scholer_no) > 1) {echo $personalInfo->scholer_no; }else echo "N/A"; ?>
											</td>
										</tr>
										
										<tr>	
											
											<td>Class</td>
											<td>
												<?php echo $personalInfo->class_id." - ".$personalInfo->section; ?>
											</td>
										</tr>	
										<tr>
											<td>Student ID</td>
											<td>
												<?php echo $personalInfo->student_id; ?>
											</td>
										</tr>
										<tr>	
											<td>Full Name</td>
											<td>
												<?php echo $personalInfo->first_name." ".$personalInfo->midd_name." ".$personalInfo->last_name; ?>
											</td>
									</tr>		
									<tr>		
											<td>Address</td>
											<td>
												<?php echo $personalInfo->address1." ".$personalInfo->address2; ?>
											</td>
								</tr>			
									<tr>		
											<td>Cell-Number</td>
											<td>
												<?php echo $personalInfo->mobile; ?>
											</td>
									</tr>		
									<tr>		
											<td>Father Name</td>
											<td>
												<?php echo $gurdianInfo->father_full_name; ?>
											</td>
									</tr>
										
									
								</table>
								
								</div>
						</div>
					</div>
				
				

			
				
					
						
		<?php 
			endif;
		?>
	
	



		
    	</div>
    	
    	</div>
    	<div class="invoice-buttons">
	    	<button class="btn btn-default margin-right" type="button" onclick="window.print();" >
	        	<i class="fa fa-print padding-right-sm"></i> Print Reciept
	        </button>
    	</div>
</div>
    </div>
   </div> 
</body>
</html>
