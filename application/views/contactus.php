<style type="text/css">

.button {
  background-color: #4CAF50; /* Green */
  border-radius: 4px;
  color: white;
  padding: 8px 14px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 14px;
}
</style>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<div class="row">
    <div id="main" class="round_8 clearfix">
            <div class="page_title round_6">
                <h1 class="replace">CONTACT US</h1>
            </div>
           
          
            <div class="clear"></div>
                <hr class=""/>            
                <div class="col-md-3">
                    <div class="full">
                    	<!-- <div class="col_201">
                    		
                    	</div> -->
                    	  
	   	                    <h5 style="color: #20b8f0" class="replace">Contact</h5>
	   	                  
							<address>
								Spring Dale School,<br/>
								Eidgah Road Near Badraka Police Chauki,</br>
								Azamgarh.<br/>
								Phone:  0562-246777 <br/>
								Mobile:  09450938643 <br/>
							</address>            
                    </div>
                  </div>
                <form method="post" action="<?php echo base_url('index.php/welcome/saveenquiry')?>" id="form">
                	<center><div style=" text-align: center; margin-left:70px; margin-top: 0px; background-color: rgb(0, 51, 102); width:345px; color: white; padding-left: 10px; font-weight: 900; border-top-left-radius: 5px; padding-top: 5px; padding-bottom: 5px; border-top-right-radius: 5px; font-size: 16px;">
					Leave Your Question Here </div></center>
                	<div class="col-md-9" style="padding-top: 50px;">
		       			 <div class="full">
					            <div class="row">
					            	<div class="form-group">
					            		<div class="col-md-5">
					                    	<b class="fa fa-user" style="color: #20b8f0 ;padding-left: 20px;font-style: initial"> NAME :</b>
					                	</div>
					                	<div class="col-md-7">
					                		<input type="text" id="name" name="name" style="width: 250px;"required="required" placeholder="Enter Your Name">
					                	</div>
					            	</div>
					            </div>   	
		                    	<br>
		                    	<div class="row">
		                    		<div class="form-group">
		                    			<div class="col-md-5">
		                    				<b class="fa fa-user" style="color: #20b8f0 ;padding-left: 20px"> EMAIL :</b>
		                    			</div>
		                    			<div class="col-md-7">
		                    				<input type="text" id="email" name="email" style="width: 250px;"required="required" placeholder="Enter Your Email">
		                    			</div>
		                    		</div>	
		                    	</div>	
		                    	
		                    	<br>
		                    	<div class="row">
		                    		<div class="form-group">
		                    			<div class="col-md-5">
		                    				<b class="fa fa-envelope-square" style="color: #20b8f0 ;padding-left: 20px;"> CONTACT US :</b>
		                    			</div>
		                    			<div class="col-md-7">
		                    				<input type="text" id="contact" name="contact" style="width: 250px;" required="required" placeholder="Enter Your Contact Number">
		                    			</div>
		                    			<span id="errormessage"></span>
		                    		</div>
		                    	</div>	
		                    	
		                		<br>
		                		<div class="row">
		                			<div class="form-group">
		                				<div class="col-md-5">
		                    				<b class="fa fa-user" style="color: #20b8f0 ;padding-left: 20px"> MESSAGE :</b>
		                    			</div>
		                    			<div class="col-md-7">
		                    				<input type="textarea" name="comments" style="width: 250px;" required="required" placeholder="Type Your Message">
		                    			</div>
		                			</div>	
		                       	</div>	
		                    	
		                		<br>
		                		<div class="row">
		                			<div class="form-group">
		                				<div class="col-md-5">
		                					<input class ="button" style="float: left; color: white; padding-left: 20px;" type="button" id="otp" value="Get Varification">
		                				</div>
			                			<div class="col-md-7">
			                				<input class="form-field" type="text" id="otpbox" name="otpbox" style="width: 150px" required="required" placeholder="Enter Otp Here">
			                			</div>
		                			</div>	
		                		</div>
		                		<div id="otpstatus"></div>
		                		<div class="row">
		                			<div class="form-group">
		                				<div class="col-md-6">
											<input class="button" style="color:white;" id ="otp" type="submit" value="submit" />
										</div>
		                			</div>
		                		</div>
		       		 	</div>
    			</div>
            
            <?php if ($this->uri->segment(3)) {
            	echo "Successfully Save and we will contact soon.";
            } ?>
            </form>
		 <center><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1267.077515352503!2d83.17593230542347!3d26.071602112786472!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1535951768898" width="100%" height="300" frameborder="0" style="border:0; margin-top: 50px;" allowfullscreen></iframe></center>
					  		
	
</div>
            
            
</div>
<script>  
				
				    $("#otpbox").hide();
						$("#otp").click(function(){

							var name = $("#name").val();

							var contact = $("#contact").val();
								if(name != "" && contact != ""){
								$.post("<?php echo base_url("welcome/sendotp");?>",{name : name, contact : contact}, function(data){
								$("#otpstatus").html(data);
								$("#otpbox").show();
							});	
								}
							else
							{
								alert("Please Enter Name and Contact");
							}
							
								
							

							//var discountv=$("#discountv").val();
							
							});

				
				</script>
            