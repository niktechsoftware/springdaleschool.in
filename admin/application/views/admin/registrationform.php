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

       <?php }?>


                                      
                                       </table>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row -->
                </div><!-- Main Wrapper -->