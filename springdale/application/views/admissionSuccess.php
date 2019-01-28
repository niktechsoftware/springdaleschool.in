<script>
    function autoResize(id){
        var newheight;
        var newwidth;

        if(document.getElementById){
            newheight=document.getElementById(id).contentWindow.document .body.scrollHeight;
            newwidth=document.getElementById(id).contentWindow.document .body.scrollWidth;
        }

        document.getElementById(id).height= (newheight) + "px";
        document.getElementById(id).width= (newwidth) + "px";
    }
</script>
<div class="row">
 
	<div class="col-sm-12">
	 <div class="padding-20 core-content">
         				<a href="<?php echo base_url(); ?>index.php/login/newAdmission">
                  <button class="btn btn-dark-purple">Take Another New Admission right now <i class="fa fa-arrow-circle-right"></i></button>
                    </a>
  </div>
		<?php 
			if(isset($studentProfile)):
				$personalInfo = $studentProfile->row();
				$gurdianInfo = $gurdianDetail->row();
		?>
		<div class="tabbable">
			<ul class="nav nav-tabs tab-padding tab-space-3 tab-blue" id="myTab4">
				<li<?php if(strlen($this->uri->segment(4)) <= 0){ echo ' class="active"';}?>>
					<a data-toggle="tab" href="#panel_overview">
						Profile
					</a>
				</li>
				<li<?php if($this->uri->segment(4) == 'updateInfo'){ echo ' class="active"';}?>>
					<a data-toggle="tab" href="#panel_edit_account">
						Edit Profile
					</a>
				</li>
				<li<?php if($this->uri->segment(4) == 'certificate'){ echo ' class="active"';}?>>
					<a data-toggle="tab" href="#certificates">
						Certificates
					</a>
				</li>
				<!--
				<li<?php if($this->uri->segment(4) == 'Subject'){ echo ' class="active"';}?>>
					<a data-toggle="tab" href="#subject_area">
						Subject
					</a>
				</li>
				-->
				<li<?php if($this->uri->segment(4) == 'Fee Report'){ echo ' class="active"';}?>>
					<a data-toggle="tab" href="#fee_report">
						Fee Report
					</a>
				</li>
				<li<?php if($this->uri->segment(4) == 'Attendance'){ echo ' class="active"';}?>>
					<a data-toggle="tab" href="#attendance_report">
						Attendance
					</a>
				</li>
				<li<?php if($this->uri->segment(4) == 'Print Profile'){ echo ' class="active"';}?>>
					<a data-toggle="tab" href="#print_report">
						print Profile
					</a>
				</li>
				<li<?php if($this->uri->segment(4) == 'Purchase Report'){ echo ' class="active"';}?>>
					<a data-toggle="tab" href="#Purchase_report">
						Purchase Report
					</a>
				</li>
			</ul>
			<div class="tab-content">
				<div id="panel_overview" class="tab-pane fade <?php if(strlen($this->uri->segment(4)) <= 0){ echo "in active";}?>">
					<div class="row">
						<div class="col-sm-5 col-md-4">
							<div class="user-left">
								<div class="center">
									<h4><?php echo $personalInfo->first_name." ".$personalInfo->midd_name." ".$personalInfo->last_name; ?></h4>
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
								<table class="table table-condensed table-hover">
									<thead>
										<tr>
											<th colspan="3">School information</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Scholer No.</td>
											<td>
												<?php if(strlen($personalInfo->scholer_no) > 1) {echo $personalInfo->scholer_no; }else echo "N/A"; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Admission Date</td>
											<td>
												<?php echo date("d-M-Y", strtotime($personalInfo->adm_date)); ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Class</td>
											<td>
												<?php echo $personalInfo->class_id." - ".$personalInfo->section; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Login ID</td>
											<td>
												<?php echo $personalInfo->student_id; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Password</td>
											<td>
												<?php echo $personalInfo->password; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div class="col-sm-6 col-md-8">
								<table class="table table-condensed table-hover">
									<thead>
										<tr>
											<th colspan="3">Personal Information</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Student ID</td>
											<td>
												<?php echo $personalInfo->student_id; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Full Name</td>
											<td>
												<?php echo $personalInfo->first_name." ".$personalInfo->midd_name." ".$personalInfo->last_name; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Date Of Birth</td>
											<td>
												<?php echo date("d-M-Y", strtotime($personalInfo->date_ob)); ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Gender</td>
											<td>
												<?php echo $personalInfo->gender; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Blood Group</td>
											<td>
												<?php if(strlen($personalInfo->bloodgp) > 1) {echo $personalInfo->bloodgp; }else echo "N/A"; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Birth Place</td>
											<td>
												<?php if(strlen($personalInfo->birth_place) > 1) {echo $personalInfo->birth_place; }else echo "N/A"; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Nationality</td>
											<td>
												<?php if(strlen($personalInfo->nationality) > 1) {echo $personalInfo->nationality; }else echo "N/A"; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Mother Tongue</td>
											<td>
												<?php if(strlen($personalInfo->mother_tongue) > 1) {echo $personalInfo->mother_tongue; }else echo "N/A"; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Category</td>
											<td>
												<?php if(strlen($personalInfo->category) > 1) {echo $personalInfo->category; }else echo "N/A"; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										
										<tr>
											<td>Religion</td>
											<td>
												<?php if(strlen($personalInfo->religion) > 1) {echo $personalInfo->religion; }else echo "N/A"; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Status</td>
											<td>
												<?php if(strlen($personalInfo->status) <= 0){ echo "N/A"; }else{ echo $personalInfo->status; } ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
									</tbody>
								</table>
								<table class="table table-condensed table-hover">
									<thead>
										<tr>
											<th colspan="3">Contact information</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Address</td>
											<td>
												<?php echo $personalInfo->address1." ".$personalInfo->address2; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>City / State / PIN</td>
											<td>
												<?php echo $personalInfo->city." / ".$personalInfo->state." / ".$personalInfo->pin_code; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Country</td>
											<td>
												<?php echo $personalInfo->country; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Land-line Number</td>
											<td>
												<?php if(strlen($personalInfo->phone) <= 0){ echo "N/A"; }else{ echo $personalInfo->phone; } ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Cell-Number</td>
											<td>
												<?php echo $personalInfo->mobile; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>E-Mail</td>
											<td>
												<?php if(strlen($personalInfo->email) <= 0){ echo "N/A"; }else{ echo $personalInfo->email; } ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
									</tbody>
								</table>
								<table class="table table-condensed table-hover">
									<thead>
										<tr>
											<th colspan="3">Guardian information</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Father Name</td>
											<td>
												<?php echo $gurdianInfo->father_full_name; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Mother Name</td>
											<td>
												<?php echo $gurdianInfo->mother_full_name; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Caretaker Name</td>
											<td>
												<?php echo $gurdianInfo->caretaker_name; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Caretaker Relation</td>
											<td>
												<?php if(strlen($gurdianInfo->caretaker_relation) <= 0){ echo "N/A"; }else{ echo $gurdianInfo->caretaker_relation; } ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Father Education</td>
											<td>
												<?php if(strlen($gurdianInfo->father_education) <= 0){ echo "N/A"; }else{ echo $gurdianInfo->father_education; } ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Mother Education</td>
											<td>
												<?php if(strlen($gurdianInfo->mother_education) <= 0){ echo "N/A"; }else{ echo $gurdianInfo->mother_education; } ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Father Occupation</td>
											<td>
												<?php if(strlen($gurdianInfo->father_occupation) <= 0){ echo "N/A"; }else{ echo $gurdianInfo->father_occupation; } ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Mother Occupation</td>
											<td>
												<?php if(strlen($gurdianInfo->mother_occupation) <= 0){ echo "N/A"; }else{ echo $gurdianInfo->mother_occupation; } ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Family Annual Income</td>
											<td>
												<?php if(strlen($gurdianInfo->family_annual_income) <= 0){ echo "N/A"; }else{ echo $gurdianInfo->family_annual_income; } ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Address</td>
											<td>
												<?php echo $gurdianInfo->address; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>City / State / PIN</td>
											<td>
												<?php echo $gurdianInfo->city." / ".$gurdianInfo->state." / ".$gurdianInfo->pin; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Country</td>
											<td>
												<?php echo $gurdianInfo->country; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Land-line Number</td>
											<td>
												<?php if(strlen($gurdianInfo->phone) <= 0){ echo "N/A"; }else{ echo $gurdianInfo->phone; } ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Father Cell-Number</td>
											<td>
												<?php echo $gurdianInfo->f_mobile; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Mother Cell-Number</td>
											<td>
												<?php if(strlen($gurdianInfo->m_mobile) <= 0){ echo "N/A"; }else{ echo $gurdianInfo->m_mobile; } ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Father E-Mail</td>
											<td>
												<?php if(strlen($gurdianInfo->f_email) <= 0){ echo "N/A"; }else{ echo $gurdianInfo->f_email; } ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Mother E-Mail</td>
											<td>
												<?php if(strlen($gurdianInfo->m_email) <= 0){ echo "N/A"; }else{ echo $gurdianInfo->m_email; } ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
									</tbody>
								</table>
						</div>
					</div>
				</div>
				<div id="panel_edit_account" class="tab-pane fade <?php if($this->uri->segment(4) == 'updateInfo'){ echo "in active";}?>">
						<div class="row">
							<div class="col-md-4">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
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
									<div class="col-md-12 space20">
										<div class="form-group">
											<form method="post" action="<?php echo base_url(); ?>index.php/studentController/updateStudentImage" enctype="multipart/form-data">
				                                <input type="hidden" name="c_id" value="<?php echo $personalInfo->student_id; ?>">
				                                <input type="hidden" name="old_stuImg" value="<?php echo $personalInfo->photo; ?>">
				                                <input type="file" name="stuImage" class="form-control input-sm" ><br/>
				                                <input id="submit" name="submit" type="submit" class="btn btn-red btn-sm pull-left" value="Upload Student Image">
				                            </form>
										</div>
									</div>
								</div>
							</div>
							
							<div class="col-md-4">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<div style="width: 140px; height: 150px; border: 1px solid #ccc;">
												<?php if(strlen($gurdianInfo->f_photo > 0)):?>
													<img alt="<?php echo $gurdianInfo->f_photo;?>" height="148" width="138" src="<?php echo base_url()?>assets/images/stuImage/<?php echo $gurdianInfo->f_photo;?>" />
												<?php else:?>
														<img alt="<?php echo $gurdianInfo->father_full_name;?>" height="148" width="138" src="<?php echo base_url()?>assets/images/empImage/empMale.png" />	
												<?php endif;?>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<form method="post" action="<?php echo base_url(); ?>index.php/studentController/updateFatherImage" enctype="multipart/form-data">
				                                <input type="hidden" name="c_id" value="<?php echo $gurdianInfo->student_id; ?>">
				                                <input type="hidden" name="old_f_image" value="<?php echo $gurdianInfo->f_photo; ?>">
				                                <input type="file" name="fatherImage" class="form-control input-sm" ><br/>
				                                <input id="submit" name="submit" type="submit" class="btn btn-green btn-sm pull-left" value="Upload Father Image">
				                            </form>
										</div>
									</div>
								</div>
							</div>
							
							<div class="col-md-4">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<div style="width: 140px; height: 150px; border: 1px solid #ccc;">
												<?php if(strlen($gurdianInfo->m_photo > 0)):?>
													<img alt="<?php echo $gurdianInfo->mother_full_name;?>" height="148" width="138" src="<?php echo base_url()?>assets/images/stuImage/<?php echo $gurdianInfo->m_photo;?>" />
												<?php else:?>
														<img alt="<?php echo $gurdianInfo->mother_full_name;?>" height="148" width="138" src="<?php echo base_url()?>assets/images/empImage/empFemale.png" />	
												<?php endif;?>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<form method="post" action="<?php echo base_url(); ?>index.php/studentController/updateMotherImage" enctype="multipart/form-data">
				                                <input type="hidden" name="c_id" value="<?php echo $personalInfo->student_id; ?>">
				                                <input type="hidden" name="old_m_photo" value="<?php echo $gurdianInfo->m_photo; ?>">
				                                <input type="file" name="motherImage" class="form-control input-sm" ><br/>
				                                <input id="submit" name="submit" type="submit" class="btn btn-blue btn-sm pull-left" value="Upload Mother Image">
				                            </form>
										</div>
									</div>
								</div>
							</div>
							
						</div>
						
<!-- ------------------------------ Student Profile -------------------------------------------- -->
<form action="<?php echo base_url(); ?>index.php/studentController/updateStuInfo" method="post" id="form">
<div class="row">
	<div class="col-sm-12">
		<!-- start: FORM WIZARD PANEL -->
		<div class="panel panel-white">
			<div class="panel-heading panel-yellow">
				<h4 class="panel-title">Student  <span class="text-bold">Information</span></h4>
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
				</div>
			</div> <!-- End Heading panel -->
			<div class="panel-body">
			<!-- --------------------------------------------Test Form Start ---------------------------------------- -->
				<div class="row">
					<div class="col-md-12">
						<div class="errorHandler alert alert-danger no-display">
							<i class="fa fa-times-sign"></i> You have some form errors. Please check below.
						</div>
						<div class="successHandler alert alert-success no-display">
							<i class="fa fa-ok"></i> Your form validation is successful!
						</div>
					</div>
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">
										Scholar Number <span class="symbol required"></span>
									</label>
									<input type="hidden" name="c_id" value="<?php echo $personalInfo->student_id; ?>">
									<input type="text" value="<?php echo $personalInfo->scholer_no; ?>" class="form-control" id="scholerNumber"  name="scholerNumber">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">
										First Name <span class="symbol required"></span>
									</label>
									<input type="text" value="<?php echo $personalInfo->first_name; ?>" class="form-control" id="firstName" name="firstName">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">
										Middle Name <span class="symbol"></span>
									</label>
									<input type="text" value="<?php echo $personalInfo->midd_name; ?>" class="form-control" id="middleName" name="middleName">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">
										Last Name <span class="symbol required"></span>
									</label>
									<input type="text" value="<?php echo $personalInfo->last_name; ?>" class="form-control" id="lastName" name="lastName">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">
										Date Of Birth <span class="symbol required"></span>
									</label>
									<input type="text" value="<?php echo $personalInfo->date_ob; ?>" data-date-format="yyyy-mm-dd" data-date-viewmode="years" name="dob" id="dob" class="form-control date-picker">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">
										Date Of Admission <span class="symbol required"></span>
									</label>
									<input type="text" value="<?php echo $personalInfo->adm_date; ?>" data-date-format="yyyy-mm-dd" data-date-viewmode="years" name="dateOfAdmission" id="doa" class="form-control date-picker">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">
										Class Of Admission <span class="symbol required"></span>
									</label>
									<select class="form-control" id="classOfAdmission" name="classOfAdmission">
										<option value=""></option>
										<?php if(isset($className)):?>
											<?php foreach ($className->result() as $row):?>
										<option value="<?php echo $row->class_name;?>" <?php if($row->class_name == $personalInfo->class_id): echo 'selected="selected"'; endif; ?> >
											<?php echo $row->class_name;?>
										</option>
											<?php endforeach;?>
										<?php endif;?>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">
										Section <span class="symbol required"></span>
									</label>
									<select class="form-control" id="section" name="section">
										<option value=""></option>
										<?php if(isset($sectionName)):?>
											<?php foreach ($sectionName->result() as $row):?>
										<option value="<?php echo $row->section;?>" <?php if($row->section == $personalInfo->section): echo 'selected="selected"'; endif; ?> >
											<?php echo $row->section;?>
										</option>
											<?php endforeach;?>
										<?php endif;?>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">
										Gender  <span class="symbol required"></span>
									</label>
									<div>
										<label class="radio-inline">
											<input type="radio" class="grey" value="Female" <?php if("Female" == $personalInfo->gender): echo 'checked="checked"'; endif; ?> name="gender" id="gender_female" >
											Female
										</label>
										<label class="radio-inline">
											<input type="radio" class="grey" value="Male" <?php if("Male" == $personalInfo->gender): echo 'checked="checked"'; endif; ?> name="gender"  id="gender_male">
											Male
										</label>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">
										Blood Group <span class="symbol"></span>
									</label>
									<select class="form-control" name="bloodgp" id="blood" >
	                                      <option value="N/A" <?php if("N/A" == $personalInfo->bloodgp): echo 'selected="selected"'; endif; ?>>N/A</option>
	                                      <option value="A+" <?php if("A+" == $personalInfo->bloodgp): echo 'selected="selected"'; endif; ?>>A+</option>
	                                      <option value="A-" <?php if("A-" == $personalInfo->bloodgp): echo 'selected="selected"'; endif; ?>>A-</option>
	                                      <option value="B+" <?php if("B+" == $personalInfo->bloodgp): echo 'selected="selected"'; endif; ?>>B+</option>
	                                      <option value="B-" <?php if("B-" == $personalInfo->bloodgp): echo 'selected="selected"'; endif; ?>>B-</option>
	                                      <option value="O+" <?php if("O+" == $personalInfo->bloodgp): echo 'selected="selected"'; endif; ?>>O+</option>
	                                      <option value="O-" <?php if("O-" == $personalInfo->bloodgp): echo 'selected="selected"'; endif; ?>>O-</option>
	                                      <option value="AB+" <?php if("AB+" == $personalInfo->bloodgp): echo 'selected="selected"'; endif; ?>>AB+</option>
	                                      <option value="AB-" <?php if("AB-" == $personalInfo->bloodgp): echo 'selected="selected"'; endif; ?>>AB-</option>
                                	</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">
										Birth Place <span class="symbol"></span>
									</label>
									<input type="text" value="<?php echo $personalInfo->birth_place; ?>" class="form-control" id="birthPlace" name="birthPlace">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">
										Mother Tongue <span class="symbol"></span>
									</label>
									<select class="form-control" id="mothertongue" name="mothertongue">
										<option value="N/A" <?php if("N/A" == $personalInfo->mother_tongue): echo 'selected="selected"'; endif; ?>>N/A</option>
										<option value="HINDI" <?php if("HINDI" == $personalInfo->mother_tongue): echo 'selected="selected"'; endif; ?>>HINDI</option>
										<option value="ENGLISH" <?php if("ENGLISH" == $personalInfo->mother_tongue): echo 'selected="selected"'; endif; ?>>ENGLISH</option>
									</select>
								</div>
							</div>
						</div>
					</div>
					
<!-- --------------------------------------------------------------------------------------------------------------------- -->
					
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">
										Category <span class="symbol"></span>
									</label>
									<select class="form-control" id="category" name="category" >
										<option value="N/A" <?php if("N/A" == $personalInfo->category): echo 'selected="selected"'; endif; ?>></option>
										<option value="GEN" <?php if("GEN" == $personalInfo->category): echo 'selected="selected"'; endif; ?>>GEN</option>
										<option value="OBC" <?php if("OBC" == $personalInfo->category): echo 'selected="selected"'; endif; ?>>OBC</option>
										<option value="SC" <?php if("SC" == $personalInfo->category): echo 'selected="selected"'; endif; ?>>SC</option>
										<option value="ST" <?php if("ST" == $personalInfo->category): echo 'selected="selected"'; endif; ?>>ST</option>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">
										Religion <span class="symbol"></span>
									</label>
									<input type="text" value="<?php echo $personalInfo->religion; ?>" class="form-control" id="religion" name="religion" />
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">
										Address Line 1 <span class="symbol required"></span>
									</label>
									<input type="text" value="<?php echo $personalInfo->address1; ?>" class="form-control" id="addLine1" name="addLine1" />
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">
										Address Line 2 <span class="symbol"></span>
									</label>
									<input type="text" value="<?php echo $personalInfo->address2; ?>" class="form-control" id="addLine2" name="addLine2" />
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">
										City <span class="symbol required"></span>
									</label>
									<input type="text" value="<?php echo $personalInfo->city; ?>" class="form-control" id="city" name="city" />
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">
										State <span class="symbol required"></span>
									</label>
									<input type="text" value="<?php echo $personalInfo->state; ?>" class="form-control" id="state" name="state">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">
										Pin Code <span class="symbol required"></span>
									</label>
									<input type="text" value="<?php echo $personalInfo->pin_code; ?>" class="form-control" id="pinCode" name="pinCode">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">
										Country <span class="symbol"></span>
									</label>
									<input type="text" value="<?php echo $personalInfo->country; ?>" value="India" class="form-control" id="country" name="country">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">
										Phone Number <span class="symbol"></span>
									</label>
									<input type="text" value="<?php echo $personalInfo->phone; ?>" class="form-control" id="phonenumbar" name="phonenumbar">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">
										Mobile Number <span class="symbol required"></span>
									</label>
									<input type="text" value="<?php echo $personalInfo->mobile; ?>" class="form-control" id="mobileNumber" name="mobileNumber">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">
										E-mail Address <span class="symbol"></span>
									</label>
									<input type="email" value="<?php echo $personalInfo->email; ?>" class="form-control" id="email" name="emailAddress">
								</div>
							</div>
							<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-12 text-bold">
												Status
											</label>
											<label class="radio-inline">
												<input type="radio" value="Active" name = "status" id="status" class="grey" <?php if ($personalInfo->status == "Active") { echo 'checked="checked"';	}?> >
												Active
											</label>
											<label class="radio-inline">
												<input type="radio" value="Inactive" name = "status" id="status1" class="grey" <?php if ($personalInfo->status == "Inactive") { echo 'checked="checked"';	}?> >
												Inactive
											</label>
										</div>
									</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-8">
							<p>
								click for UPDATE Profile.
							</p>
						</div>
						<div class="col-md-4">
							<button class="btn btn-yellow btn-block" id="editProfile">
								Update <i class="fa fa-arrow-circle-right"></i>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</form>
<!-- ------------------------------ Parent Profile -------------------------------------------- -->
<form action="<?php echo base_url(); ?>index.php/studentController/updateParentInfo" method="post" id="form">					
<div class="row">
	<div class="col-sm-12">
		<!-- start: FORM WIZARD PANEL -->
		<div class="panel panel-white">
			<div class="panel-heading panel-blue">
				<h4 class="panel-title">Parents  <span class="text-bold">Information</span></h4>
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
				</div>
			</div> <!-- End Heading panel -->
			<div class="panel-body">
			<!-- --------------------------------------------Test Form Start ---------------------------------------- -->
					<div class="row">
						<div class="col-md-12">
							<div class="errorHandler alert alert-danger no-display">
								<i class="fa fa-times-sign"></i> You have some form errors. Please check below.
							</div>
							<div class="successHandler alert alert-success no-display">
								<i class="fa fa-ok"></i> Your form validation is successful!
							</div>
						</div>
						<div class="col-md-6">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">
											Father Name <span class="symbol required"></span>
										</label>
										<input type="hidden" name="c_id" value="<?php echo $personalInfo->student_id; ?>">
										<input type="text" value="<?php echo $gurdianInfo->father_full_name; ?>" class="form-control" id="fatherName" name="fatherName" />
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">
											Mother Name <span class="symbol required"></span>
										</label>
										<input type="text" value="<?php echo $gurdianInfo->mother_full_name; ?>" class="form-control" id="motherName" name="motherName" />
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">
											Caretaker Name <span class="symbol"></span>
										</label>
										<input type="text" value="<?php echo $gurdianInfo->caretaker_name; ?>" class="form-control" id="guardianName" name="guardianName" />
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">
											Caretaker Relation <span class="symbol"></span>
										</label>
										<input type="text" value="<?php echo $gurdianInfo->caretaker_relation; ?>" class="form-control" id="guardianRelation" name="guardianRelation" />
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">
											Father's Education <span class="symbol"></span>
										</label>
										<input type="text" value="<?php echo $gurdianInfo->father_education; ?>" class="form-control" id="fatherEducation" name="fatherEducation" />
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">
											Mother's Education <span class="symbol"></span>
										</label>
										<input type="text" value="<?php echo $gurdianInfo->mother_education; ?>" class="form-control" id="motherEducation" name="motherEducation" />
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">
											Father's Occupation <span class="symbol"></span>
										</label>
										<input type="text" value="<?php echo $gurdianInfo->father_occupation; ?>" class="form-control" id="fatherOccupation" name="fatherOccupation" />
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">
											Mother's Occupation <span class="symbol"></span>
										</label>
										<input type="text" value="<?php echo $gurdianInfo->mother_occupation; ?>" class="form-control" id="motherOccupation" name="motherOccupation" />
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">
											Family Annual Income  <span class="symbol"></span>
										</label>
										<input type="text" value="<?php echo $gurdianInfo->family_annual_income; ?>" class="form-control" id="familyAnnualIncome" name="familyAnnualIncome" />
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">
											Address <span class="symbol required"></span>
										</label>
										<input type="text" value="<?php echo $gurdianInfo->address; ?>" class="form-control" id="parentAddress" name="parentAddress" />
									</div>
								</div>
							</div>
						</div>
						
<!-- --------------------------------------------------------------------------------------------------------------------- -->
						
						<div class="col-md-6">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">
											city  <span class="symbol required"></span>
										</label>
										<input type="text" value="<?php echo $gurdianInfo->city; ?>" class="form-control" id="parentCity" name="parentCity" />
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">
											State <span class="symbol required"></span>
										</label>
										<input type="text" value="<?php echo $gurdianInfo->state; ?>" class="form-control" id="parentState" name="parentState" />
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">
											Pin  <span class="symbol required"></span>
										</label>
										<input type="text" value="<?php echo $gurdianInfo->pin; ?>" class="form-control" id="parentPin" name="parentPin" />
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">
											Country  <span class="symbol required"></span>
										</label>
										<input type="text" value="<?php echo $gurdianInfo->country; ?>" class="form-control" id="parentCountry" name="parentCountry" />
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">
											Phone Number  <span class="symbol"></span>
										</label>
										<input type="text" value="<?php echo $gurdianInfo->phone; ?>" class="form-control" id="parentPhoneNumber" name="parentPhoneNumber" />
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">
											Father's Mobile Number <span class="symbol required"></span>
											<input type="checkbox" id="sameMobile" /> if same.
										</label>
										<input type="text" value="<?php echo $gurdianInfo->f_mobile; ?>" class="form-control" id="fatherMobileNumber" name="fatherMobileNumber" />
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">
											Mother's Mobile Number <span class="symbol"></span>
										</label>
										<input type="text" value="<?php echo $gurdianInfo->m_mobile; ?>" class="form-control" id="motherMobileNumber" name="motherMobileNumber" />
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">
											Father's Email Address  <span class="symbol"></span>
										</label>
										<input type="text" value="<?php echo $gurdianInfo->f_email; ?>" class="form-control" id="fatherEmailAddress" name="fatherEmailAddress" />
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-12">
							<div>
								<span class="symbol required"></span>Required Fields
								<hr>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-8">
							<p>
								By clicking REGISTER, you are agreeing to the Policy and Terms &amp; Conditions.
							</p>
						</div>
						<div class="col-md-4">
							<input type="submit" value="Update Gurdian Information" class="btn btn-blue btn-block"/>
						</div>
					</div>
			</div>
		</div>
	</div>
</div>
</form>
						
					</div>	
<!-- ---------------------------------------------------------------------------------------------------------------------- -->	
				<div id="certificates" class="tab-pane fade <?php if($this->uri->segment(4) == 'certificate'){ echo "in active";}?>">
					<div class="panel-body">
						<ul id="Grid" class="list-unstyled">
							<li class="col-md-3 col-sm-6 col-xs-12">
								<div class="portfolio-item">
									<?php if(strlen($personalInfo->cc > 0)):?>
										<a class="thumb-info" href="<?php echo base_url(); ?>assets/images/stuImage/<?php echo $personalInfo->cc;?>" data-lightbox="gallery" data-title="Website">
											<img src="<?php echo base_url(); ?>assets/images/stuImage/<?php echo $personalInfo->cc;?>" height="200" class="img-responsive" alt="">
											<span class="thumb-info-title"> Transfer Certificate </span>
										</a>
									<?php else:?>
										<a class="thumb-info" href="<?php echo base_url(); ?>assets/images/stuImage/cc.png" data-lightbox="gallery" data-title="Website">
											<img src="<?php echo base_url(); ?>assets/images/stuImage/cc.png" class="img-responsive" alt=" Character Certificates ">
											<span class="thumb-info-title"> Character Certificates </span>
										</a>
									<?php endif;?>
								</div>
								<div class="form-group">
									<form method="post" action="<?php echo base_url()?>index.php/studentController/uploadCc" enctype="multipart/form-data">
		                                <input type="hidden" name="c_id" value="<?php echo $personalInfo->student_id; ?>">
		                                <input type="hidden" name="old_cc" value="<?php echo $personalInfo->cc; ?>">
		                                Only png,jpg File lessthen 1 MB.
		                                <input type="file" name="cc" class="form-control input-sm" ><br/>
		                                <input id="submit" name="submit" type="submit" class="btn btn-dark-red btn-sm pull-left" value="Upload Character Certificates">
		                            </form>
								</div>
							</li>
							<li class="col-md-3 col-sm-6 col-xs-12">
								<div class="portfolio-item">
									<?php if(strlen($personalInfo->tc > 0)):?>
										<a class="thumb-info" href="<?php echo base_url(); ?>assets/images/stuImage/<?php echo $personalInfo->tc;?>" data-lightbox="gallery" data-title="Website">
											<img src="<?php echo base_url(); ?>assets/images/stuImage/<?php echo $personalInfo->tc;?>" height="200" class="img-responsive" alt="">
											<span class="thumb-info-title"> Transfer Certificate </span>
										</a>
									<?php else:?>
										<a class="thumb-info" href="<?php echo base_url(); ?>assets/images/stuImage/tc.png" data-lightbox="gallery" data-title="Website">
											<img src="<?php echo base_url(); ?>assets/images/stuImage/tc.png" class="img-responsive" alt="Transfer Certificate">
											<span class="thumb-info-title"> Transfer Certificate </span>
										</a>
									<?php endif;?>
								</div>
								<div class="form-group">
									<form method="post" action="<?php echo base_url()?>index.php/studentController/uploadTc" enctype="multipart/form-data">
		                                <input type="hidden" name="c_id" value="<?php echo $personalInfo->student_id; ?>">
		                                <input type="hidden" name="old_tc" value="<?php echo $personalInfo->tc; ?>">
		                                Only png,jpg File lessthen 1 MB.
		                                <input type="file" name="tc" class="form-control input-sm" ><br/>
		                                <input id="submit" name="submit" type="submit" class="btn btn-primary btn-sm pull-left" value="Upload Transfer Certificates">
		                            </form>
								</div>
							</li>
							<li class="col-md-3 col-sm-6 col-xs-12">
								<div class="portfolio-item">
									<?php if(strlen($personalInfo->castCertificate > 0)):?>
										<a class="thumb-info" href="<?php echo base_url(); ?>assets/images/stuImage/<?php echo $personalInfo->castCertificate;?>" data-lightbox="gallery" data-title="Website">
											<img src="<?php echo base_url(); ?>assets/images/stuImage/<?php echo $personalInfo->castCertificate;?>" height="200" class="img-responsive" alt="Cast Certificate">
											<span class="thumb-info-title"> Cast Certificate </span>
										</a>
									<?php else:?>
										<a class="thumb-info" href="<?php echo base_url(); ?>assets/images/stuImage/castCertificate.png" data-lightbox="gallery" data-title="Website">
											<img src="<?php echo base_url(); ?>assets/images/stuImage/castCertificate.png" class="img-responsive" alt="">
											<span class="thumb-info-title"> Cast Certificate </span>
										</a>
									<?php endif;?>
								</div>
								<div class="form-group">
									<form method="post" action="<?php echo base_url()?>index.php/studentController/uploadCastCertificate" enctype="multipart/form-data">
		                                <input type="hidden" name="c_id" value="<?php echo $personalInfo->student_id; ?>">
		                                <input type="hidden" name="old_castCertificate" value="<?php echo $personalInfo->castCertificate; ?>">
		                                Only png,jpg File lessthen 1 MB.
		                                <input type="file" name="castCertificate" class="form-control input-sm" ><br/>
		                                <input id="submit" name="submit" type="submit" class="btn btn-dark-orange btn-sm pull-left" value="Upload Cast Certificates">
		                            </form>
								</div>
							</li>
							<li class="col-md-3 col-sm-6 col-xs-12">
								<div class="portfolio-item">
									<?php if(strlen($personalInfo->domicileCertificate > 0)):?>
										<a class="thumb-info" href="<?php echo base_url(); ?>assets/images/stuImage/<?php echo $personalInfo->domicileCertificate;?>" data-lightbox="gallery" data-title="Website">
											<img src="<?php echo base_url(); ?>assets/images/stuImage/<?php echo $personalInfo->domicileCertificate;?>" height="200" class="img-responsive" alt="">
											<span class="thumb-info-title"> Domicile Certificate </span>
										</a>
									<?php else:?>
										<a class="thumb-info" href="<?php echo base_url(); ?>assets/images/stuImage/domicileCertificate.png" data-lightbox="gallery" data-title="Website">
											<img src="<?php echo base_url(); ?>assets/images/stuImage/domicileCertificate.png" class="img-responsive" alt="">
											<span class="thumb-info-title"> Domicile Certificate </span>
										</a>
									<?php endif;?>
								</div>
								<div class="form-group">
									<form method="post" action="<?php echo base_url()?>index.php/studentController/uploadDomicileCertificate" enctype="multipart/form-data">
		                                <input type="hidden" name="c_id" value="<?php echo $personalInfo->student_id; ?>">
		                                <input type="hidden" name="old_domicileCertificate" value="<?php echo $personalInfo->domicileCertificate; ?>">
		                                Only png,jpg File lessthen 1 MB.
		                                <input type="file" name="domicileCertificate" class="form-control input-sm" ><br/>
		                                <input id="submit" name="submit" type="submit" class="btn btn-success btn-sm pull-left" value="Upload Domicile Certificates">
		                            </form>
								</div>
							</li>
							<li class="col-md-3 col-sm-6 col-xs-12">
								<div class="portfolio-item">
									<?php if(strlen($personalInfo->previousMarkSheet > 0)):?>
										<a class="thumb-info" href="<?php echo base_url(); ?>assets/images/stuImage/<?php echo $personalInfo->previousMarkSheet;?>" data-lightbox="gallery" data-title="Website">
											<img src="<?php echo base_url(); ?>assets/images/stuImage/<?php echo $personalInfo->previousMarkSheet;?>" height="200" class="img-responsive" alt="">
											<span class="thumb-info-title"> Previous Marksheet </span>
										</a>
									<?php else:?>
										<a class="thumb-info" href="<?php echo base_url(); ?>assets/images/stuImage/previousMarkSheet.png" data-lightbox="gallery" data-title="Website">
											<img src="<?php echo base_url(); ?>assets/images/stuImage/previousMarkSheet.png" class="img-responsive" alt="">
											<span class="thumb-info-title"> Previous Marksheet </span>
										</a>
									<?php endif;?>
								</div>
								<div class="form-group">
									<form method="post" action="<?php echo base_url()?>index.php/studentController/uploadPreviousMarkSheet" enctype="multipart/form-data">
		                                <input type="hidden" name="c_id" value="<?php echo $personalInfo->student_id; ?>">
		                                <input type="hidden" name="old_previousMarkSheet" value="<?php echo $personalInfo->previousMarkSheet; ?>">
		                                Only png,jpg File lessthen 1 MB.
		                                <input type="file" name="previousMarkSheet" class="form-control input-sm" ><br/>
		                                <input id="submit" name="submit" type="submit" class="btn btn-dark-grey btn-sm pull-left" value="Upload Previous Certificates">
		                            </form>
								</div>
							</li>
							<li class="gap"></li>
							<!-- "gap" elements fill in the gaps in justified grid -->
						</ul>
					</div> <!-- End gallery div -->
				</div>
				<!--
				<div id="subject_area" class="tab-pane fade <?php if($this->uri->segment(4) == 'Subject'){ echo "in active";}?>">
					<div class="panel-body">
						<form action="<?php echo base_url(); ?>index.php/studentController/updateStuInfo" method="post" id="form">
						<div class="row">
							<div class="col-sm-12">
								<!-- start: FORM WIZARD PANEL
								<div class="panel panel-white">
									<div class="panel-heading panel-yellow">
										<h4 class="panel-title">Student  <span class="text-bold">Information</span></h4>
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
										</div>
									</div> <!-- End Heading panel 
									<div class="panel-body">
									<!-- --------------------------------------------Test Form Start ---------------------------------------- 
										<div class="row">
										<input type="hidden" name="c_id" value="<?php echo $personalInfo->student_id; ?>">
										<?php $subjectId = $subjectList->num_rows(); ?>
										<?php for($i = 1; $i<=$subjectId; $i++):?>
											<div class="col-md-3">
												<div class="form-group">
													<label class="control-label">
														Subject <?php echo $i; ?> <span class="symbol required"></span>
													</label>
													<select class="form-control" id="stuSubject<?php echo $i; ?>" name="stuSubject">
														<option value="">-Select Subject-</option>
														<?php $j=1; foreach($subjectList->result() as $subject): ?>
														<option value="<?php echo $subject->subject; ?>" id="subId<?php echo $i.$j; ?>">
															<?php echo $subject->subject; ?>
														</option>
														<?php $j++; endforeach;?>
													</select>
												</div>
											</div>
										<?php endfor; ?>	
											
											<div class="row">
												<div class="col-md-8">
													<p>
														click for UPDATE Profile.
													</p>
												</div>
												<div class="col-md-4">
													<button class="btn btn-yellow btn-block" id="editProfile">
														Update <i class="fa fa-arrow-circle-right"></i>
													</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						</form>
					</div>
				</div>
				-->
				<div id="salary_report" class="tab-pane fade <?php if($this->uri->segment(4) == 'Salary'){ echo "in active";}?>">
					<div class="panel-body">
						<h1>Salary Report</h1>
					</div>
				</div>
				
				
				<div id="attendance_report" class='tab-pane fade <?php if($this->uri->segment(4) == 'Attendance'){ echo "in active";}?>'>
					<div class="panel-body">
							<div class="col-sm-12">
									<div class="form-group col-sm-6">
										<label class="col-sm-5 control-label" for="form-field-20">
											Start Date (yyyy-mm-dd)<span class="symbol required"></span>
										</label>
										<div class="col-sm-7">
											<input type="date" data-date-format="yyyy-mm-dd" data-date-viewmode="years" id="sdate" name="startdate" class="form-control date-picker">
										</div>
									</div><?php $stu_id =$this->uri->segment(3);?>
									<input type = "hidden" value = "<?php echo $stu_id;?>" name = "stuid" id = "stuid"/>
									<div class="form-group col-sm-6">
										<label class="col-sm-5 control-label" for="form-field-20">
											End Date (yyyy-mm-dd)<span class="symbol required"></span>
										</label>
										<div class="col-sm-7">
											<input type="date" data-date-format="yyyy-mm-dd" data-date-viewmode="years" id="edate" name="enddate" class="form-control date-picker">
										</div>
									</div>
							</div>
							<div class="table-responsive" id="rahul">
							</div>
				</div>
			</div>
				<div id="fee_report" class="tab-pane fade <?php if($this->uri->segment(4) == 'Fee Report'){ echo "in active";}?>">
					<div class="panel-body">
						<div class="row">
								<div class="col-md-12">
						<!-- start: RESPONSIVE TABLE PANEL -->
						<div class="panel panel-white">
							
										<div class="panel-body">
											<div class="form-group">
												
											<div class="col-sm-12">				
												
										<br/><br/>
	<div class="table-responsive">
		<table class="table table-striped table-hover" id="sample-table-2">
			<thead>
				<tr>
					<th>S.no.</th>
					<th>Student Id</th>
					<th>Student Name</th>
					<th>Father Name</th>
					<th>Father Mobile</th>
					<td>Fee line</td>
					<th>Total Paid</th>
					<th>Total Due</th>
					<th>Full Detail</th>
				</tr>
			</thead>
			<tbody>
			<?php 
			$count = 1;
			$detail = $this->db->query("SELECT SUM(diposit_month) as month,finance_start_date FROM `fee_deposit` WHERE student_id='$stu_id' GROUP BY finance_start_date");
			 foreach($detail->result() as $row):?>
			<?php 
			$month = $row->month;
			$fsd = $row->finance_start_date;
			    $color = array(
				    "progress-bar-danger",
				    "progress-bar-success",
				    "progress-bar-warning",
				    "partition-green",
				    "partition-azure",
				    "partition-blue",
				    "partition-orange",
				    "partition-purple",
				    "progress-bar-danger",
				    "progress-bar-success",
				    "partition-green",
				    "partition-purple"
			    );
			    
			    $this->db->where("student_id",$stu_id);
			    $rows = $this->db->get("guardian_info")->row();
			    $this->db->where("student_id",$stu_id);
			    $this->db->where("status","Active");
			    $stuname=$this->db->get("student_info")->row();
			    $total = $this->db->query("SELECT SUM(diposit_month) as totalMonth, SUM(paid) as totalPaid from fee_deposit WHERE student_id = '$stu_id' AND finance_start_date='$fsd'")->row(); ?>
				<tr>
		  			<td><?php echo $count;?></td>
		  			<td><?php echo $stu_id;?>
		  			<td><?php echo $stuname->first_name.$stuname->midd_name.$stuname->last_name;?></td>
		  			<td><?php echo $rows->father_full_name;?></td>
		  			<td><?php echo $rows->f_mobile;?></td>
		  			<td>
		                <?php for($i = 0; $i < $month; $i++):?>
			               <span class="label <?php echo $color[$i];?>" style="line-height:20px;">
			               		<?php echo date("M-y",strtotime("$fsd + $i month"));?>
			               </span>
		                <?php endfor; ?>
					</td>
		  			<td><?php echo $total->totalPaid;?></td>
		  			<td><?php echo "abc";?></td>
		  			<td>
						<a href="<?php echo base_url()?>index.php/feeControllers/fullDetail/<?php echo $stu_id;?>/<?php echo $fsd;?>" target="_blank" class="btn btn-blue">
							View Detail
						</a>
		  			</td>
		  		</tr>
		  		
                <?php 
                $count++;
                endforeach;
		  		 ?>
		  		
			</tbody>
		</table>
	</div>
				</div>
			</div><!-- end: panel Body -->
		</div><!-- end: panel panel-white -->
		
	</div><!-- end: MAIN PANEL COL-SM-12 -->
</div><!-- end: PAGE ROW-->
					</div>
					</div>
				</div>
				<div id="print_report" class="tab-pane fade <?php if($this->uri->segment(4) == 'Print Profile'){ echo "in active";}?>">
					<div class="panel-body">
						<IFRAME SRC="<?php echo base_url(); ?>index.php/invoiceController/printProfile/<?php echo $stu_id; ?>" width="100%" height="200px" id="iframe1" style="border: 0px;" onLoad="autoResize('iframe1');"></iframe>
					</div>
				</div>
				<div id="Purchase_report" class="tab-pane fade <?php if($this->uri->segment(4) == 'Purchase Report'){ echo "in active";}?>">
					<div class="panel-body">
					<?php 	 $this->db->where("valid_id",$stu_id);
			   				 $row = $this->db->get("sale_info"); ?>
			    		<table class="table table-striped table-hover" id="sample-table-2"> 
			    				<thead><tr>
			    				<th>S.no</th>
			    				<th>Item No.</th>
			    				<th>Purchase Date</th>
			    				<th>Balance</th>
			    				<th>total Paid</th>
			    				<th>Bill No.</th>
			    				</tr>
			    			</thead>
			    			<tbody>	
			    		<?php		$i=1; 	
			    		foreach($row->result() as $rows):?>
			
			    				<tr>
			    				<td> <?php echo $i;?> </td>
			    				<td> <?php echo $rows->item_no;?> </td>
			    				<td> <?php echo $rows->date;?> </td>
			    				<td> <?php echo $rows->balance;?> </td>
			    				<td> <?php echo $rows->paid;?> </td>
			    				<td> <?php echo $rows->bill_no;?> </td>
			    				</tr>
			    				<?php $i++; 
			    				endforeach; ?>
			    			</tbody>	
			    		</table>
					</div>
				</div>
			</div>
		</div>
		<?php 
			endif;
		?>
	</div>
	</div>
	 <?php
	if($this->uri->segment(5) == "yes"){
		$val = $this->db->get("sms_setting")->row();
		if($val->count1 == "2"):
				$msg = "Hi ".$personalInfo->first_name.". Your admission is confirmed with us. Your login id : ".$personalInfo->student_id." and password : ".$personalInfo->password.". For more information logon to our website : ".$val->web_url;	
		?>
			<iframe height="0" width="0" frameBorder="0" src="http://sms1.hwebs.in/api/sendmsg.php?user=<?php echo $val->uname; ?>&pass=<?php echo $val->password; ?>&sender=<?php echo $val->sender_id; ?>&phone=<?php echo $personalInfo->mobile; ?>&text=<?php echo $msg; ?>&priority=ndnd&stype=normal" ></iframe>
			        <?php
			        $count1 = array("count1"=>'1');
			        $this->db->update("sms_setting",$count1);
		endif;
	}
	?>