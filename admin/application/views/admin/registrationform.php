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

                                            <thead><tr>
                                              <th>ID</th>
                                              <th>STUDENT NAME</th>
                                              <th>FATHER NAME</th>
                                              <th>MOTHER NAME</th>
                                              <th>MOBILE</th>
                                               <th>EMAIL</th></tr></thead>

                                            <?php foreach($res as $row)
                                            {
                                            ?>
                                            <tr><td>
                                            <?php echo $row->id ?></td>
                                    <td><?php echo $row->sname;?></td>
                                          <td><?php echo $row->fname;?></td>
                                          <td><?php echo $row->mname;?></td>
                                         <td><?php echo $row->mobile;?></td>
                                         <td><?php echo $row->email;?></td>
                                         <td><a href="<?php echo base_url();?>index.php/apanel/addformDetail/<?php echo $row->id;?>">View Detail</a></td>
                                         <td><a href="<?php echo base_url();?>apanel/deleteformDetail/<?php echo $row->id;?>">Delete</a></td>
                                       </tr>


                                           <!-- <tr><h2><center>REGISTRATION FORM</center></h2></tr>
                                            <tr>
                                       <td> <h4>Student name :</h4></td> <td> <?php echo $row->sname; ?></td></tr>
                                        <tr><td> <h4>Date of birth : </h4></td><td><?php echo $row->dob;?></td></tr>
                                           <tr><td> <h4>Age : </h4></td><td><?php echo $row->age;?></td></tr>
                                           <tr><td>  <h4>Addmission forclass : </h4></td><td><?php echo $row->addforclass;?></td></tr>
                                           <tr><td><h4>Gender(male/female) : </h4></td><td><?php echo $row->gender;?></td></tr>
                                            <tr><td> <h4>Nationality : </h4></td><td><?php echo $row->nation;?></td></tr>
                                          <tr><h3><?php echo $row->father;?></h3></tr>
                                             <tr><td><h4>Father'name : </h4></td><td><?php echo $row->fname;?></td></tr>
                                               <tr><td><tr><td>  <h4>Occupation : </h4></td><td><?php echo $row->foccupation;?></td></tr>
                                               <tr><td><h4>Education : </h4></td><td><?php echo $row->fedu;?></td></tr>
                                                <tr><td><h4>Language spoken at home : </h4></td><td><?php echo $row->flanguage;?></td></tr>
                                                 <tr><td> <h4>Residential number : </h4></td><td><?php echo $row->resiaddress;?></td></tr>
                                                 <tr><td> <h4>Contact details : </h4></td><td><?php echo $row->contactdetail;?></td></tr>
                                                  <tr><td><h4>Phone no. : </h4></td><td><?php echo $row->phone;?></td></tr>
                                                  <tr><td><h4>Mobile no : </h4></td><td><?php echo $row->mobile;?></td></tr>
                                                   <tr><td><h4>Email : </h4></td><td><?php echo $row->email;?></td></tr>
                                                   <tr><h3><?php echo $row->mother;?></h3></tr>
                                                   <tr><td><h4> Mother's name: </h4></td><td><?php echo $row->mname;?></td></tr>
                                                    <tr><td><h4>Occupation : </h4></td><td><?php echo $row->moccupation;?></td></tr>
                                                     <tr><td><h4>Education : </h4></td><td><?php echo $row->meducation;?></td></tr>
                                                      <tr><td> <h4>Language spoken at home : </h4></td><td><?php echo $row->mlanguage;?></td></tr>-->
                                                      <?php }?>


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
                                          <?php// endforeach;?>
                                       </table>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row -->
                </div><!-- Main Wrapper -->