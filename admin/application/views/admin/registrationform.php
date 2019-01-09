 <div id="main-wrapper" class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                            	<div class="panel-body">
                                   <div class="table-responsive">
                                    <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                        <h2><center>REGISTRATION FORM</center></h2>
                                        <br>
                                        <?php $i = 1;?>
                                            <?php $res = $this->db->get("regenquiry")->result();?>
                                            <?php foreach($res as $row):?>

                                        <h4>Student name : </h4> <?php echo $row->sname; ?>
                                         <h4>Date of birth : </h4>
                                          <h4>Age : </h4>
                                           <h4>Addmission forclass : </h4>
                                            <h4>Gender(male/female) : </h4>
                                             <h4>Nationality : </h4>
                                             <h3>FATHER'S DETAIL</h3>
                                              <h4>Father'name : </h4>
                                               <h4>Occupation : </h4>
                                                <h4>Education : </h4>
                                                 <h4>Language spoken at home : </h4>
                                                  <h4>Residential number : </h4>
                                                   <h4>Contact details : </h4>
                                                    <h4>Phone no. : </h4>
                                                    <h4>Mobile no : </h4>
                                                    <h4>Email : </h4>
                                                    <h3>MOTHER'S DETAIL</h3>
                                                     <h4> Mother's name: </h4>
                                                      <h4>Occupation : </h4>
                                                       <h4>Education : </h4>
                                                        <h4>Language spoken at home : </h4>


                                       <!-- <tbody>
                                        	<?php $i = 1;?>
                                        	<?php $res = $this->db->get("regenquiry")->result();?>
                                        	<?php foreach($res as $row):?>
                                            <tr>
                                              
                                             
                                                <td><?php echo $row->name; ?></td>
                                                <td><?php echo $row->email; ?></td>
                                                   <td><?php echo $row->contact; ?></td>
                                                      <td><?php echo $row->ques; ?></td>
                                                         <td><?php echo $row->enquiry_date; ?></td>
                                                
                                              
                                                <td>
                                                	<a href="<?php echo base_url();?>apanelForms/deleteCareer/<?php echo $row->id; ?>">
                                                		Delete
                                                	</a>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                            <?php endforeach;?>
                                        </tbody>-->
                                          <?php endforeach;?>
                                       </table>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row -->
                </div><!-- Main Wrapper -->