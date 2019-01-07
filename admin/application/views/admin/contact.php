                <div id="main-wrapper" class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                            	<div class="panel-body">
                                   <div class="table-responsive">
                                    <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                             
                                                
                                                <th>name</th>
                                                <th>email</th>
                                                   <th>contact</th>
                                                      <th>question</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php $i = 1;?>
                                        	<?php $res = $this->db->get("carrer")->result();?>
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
                                        </tbody>
                                       </table>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row -->
                </div><!-- Main Wrapper -->