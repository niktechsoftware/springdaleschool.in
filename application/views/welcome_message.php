		<!-- slide start --><marquee  bgcolor=orange width=960 height=25> Note : The School Office will be open at 08.00A.M. To 3.00P.M. Every Day. Admission Open for  Academic Session 2019-20.</marquee>
		<div id="slide-container"  class="clearfix">
			<div id="slider-wrapper" class="left">
				<div id="slider" class="nivoSlider">
				<img src="<?php echo base_url(); ?>assets/img/stock/sharad.jpg" alt="image 1" style="height:200px; width:400px;" /> 
				<img src="<?php echo base_url(); ?>assets/img/stock/slide-image-13.jpg" alt="image 1" style="height:200px; width:420px;"/> 
			<img src="<?php echo base_url(); ?>assets/img/stock/slide-image-11.jpg" alt="" style="height:200px; width:400px;" />
				<img src="<?php echo base_url(); ?>assets/img/stock/slide-image-12.jpg" alt="" style="height:200px; width:400px;"/>
				<img src="<?php echo base_url(); ?>assets/img/stock/slide-image-14.jpg" alt="" title="#htmlcaption" style="height:200px; width:400px;" /></div>
				
			<div id="quickmenu" class="left">
				<h2 class="replace">Our School</h2>
				<div class="port">
					<ul class="overview">
					<li><a href="<?php echo base_url();?>index.php/welcome/admissionPro" class="menu-box round_4"> <span class="title">Academic</span><br/>
						Admission Process | Student Studies	<span class="arrow"></span> </a></li>
						<li><a href="<?php echo base_url();?>index.php/welcome/campus" class="menu-box round_4"> <span class="title">Campus</span><br/>
						 Building | Class Room |  Library<span class="arrow"></span> </a></li>
						<li><a href="<?php echo base_url();?>index.php/welcome/games" class="menu-box round_4"> <span class="title">Games & Sports</span><br/>
							Craft | Dance | Sport<span class="arrow"></span> </a></li>
						<li><a href="<?php echo base_url(); ?>index.php/welcome/schoolStaff" class="menu-box round_4"> <span class="title">School Staff</span><br/>
						Teacher | Others	<span class="arrow"></span> </a></li>
						<li><a href="<?php echo base_url(); ?>index.php/welcome/hostelform" class="menu-box round_4"> <span class="title">Hostel Form Detail</span><br/>
							<span class="arrow"></span> </a></li>
				
					</ul>
				</div>
				<a class="buttons prev" href="#">Prev</a> <a class="buttons next" href="#">Next</a> </div>
		</div>
		<!-- slide end --> 
		
		<!-- Main begin-->
		<div id="main" class="round_8 clearfix">
			<div id="home-content" class="left">
			<br />
				<h2 class="replace">The Best Play School In Azamgarh</h2><hr />
				<div class="intro">
					<p><img alt="" src="<?php echo base_url(); ?>assets/img/stock/180x135_post_thumbnail_2.png" style="float: right;">Early childhood education via joyful and safe learning environment our developmentally appropriate curriculum will promote child's growth socially, emotionally, physically, cognitively, and spiritually which leads towards the formal education. In our school, children enjoy a unique and stimulating experience necessary to develop their own personalities.</p>
				</div>
				<hr />
				<div class="col_201 alpha">
					<h3 class="replace">Quality Policy</h3>
					<p class="landing_col">Each and every member of Spring Dale School is committed to create value for parents / guardian's satisfaction and achieve expectation by deliverance quality services.<br>
Spring Dale School adheres to quality Management System in line with ISO 9001 :2016 & commits to maintain the global quality through continual up graduation of system ( Course, Faculties, Members, Hardware & Software)
					 </p>
						</div>
				<div class="col_201">
					<h3 class="replace">Notice Board</h3>
					 <marquee direction="up" height="300"  behavior="scroll" onmouseover="this.stop();" onmouseout="this.start();">
					<?php $ft = $this->db->get("notice");

					$i=1;	if($ft->num_rows()>0){
?><table><?php
		
							foreach($ft->result() as $ft):?>
	                        	<b><p style="color:green;" class="landing_col"><?php echo $i;?>.<?php echo $ft->message;?></p></b>
		<?php $i++; endforeach;
							
							?>
					 </table>
					 <?php }?>
                        </marquee>
				
					</div>
				<div class="col_201 omega">
					<h3 class="replace">Facilities</h3>
					<p class="landing_col">
					<ul>
  <li>Live Web Telecast</li>
  <li>Bright colorful playgroup and Nursery Class  rooms</li>
 
  <li>Vast conditioned Class rooms</li>
  <li>Vast collection of latest Toys and Education</li>
  <li>Audio Visual Aided learning</li>
  <li>Huge indoor &amp; outdoor play area</li>
  
  
</ul>
					
					</p></div>
			</div>
			<div  id="sidebar-home" class="left">
				<div class="sidebar-widget">
					
				</div>
				<div class="sidebar-widget shadow-light"> <a href="<?php echo base_url(); ?>springdale/index.php/homeController/" class="promo-container" target="_blank"><img src="<?php echo base_url(); ?>assets/img/stock/promo-245x162.jpg" alt="ad" /></a></div>
				<div class="sidebar-widget shadow-light">
					<div class="testimonials-container ">
						<h3 class="replace">What they say</h3>
						<p><a href="#">There is only one purpose in the whole of life - education. Otherwise what is the use of men and women, land and wealth?.</a><br/>
							<small><em>Swami Vivekanand</em></small></p>
					</div>
				</div>
				<div class="sidebar-widget shadow-light">
					<div >
						<h3 class="replace">Today's Birthday</h3>
						 <?php
                             $d=date('Y-m-d');
                             
   					 $cm=  date("m",strtotime($d));
   					 $cd=  date("d",strtotime($d));
   					 $this->db->where("status","Active");
   				 $gal =	 $this->db->get("student_info");
                            	 
				
				if( $gal->num_rows() > 0)
				{
				$gal1 = $gal->result();
				$h=0;
				foreach($gal1 as $gal):
					
					 $sdate = $gal->date_ob; 
   					 $sm=  date("m",strtotime($sdate));
   					 $sd=  date("d",strtotime($sdate));
   					
   					 if($sm==$cm && $sd==$cd){
   					 $h++;
   					 
				?>    
                       <p> <span id="lblhigh1"  style="display:inline-block;width:250px;">
                        <img src="<?php echo base_url(); ?>/assets/images/stuImage/<?php echo $gal->photo;?>" height="50" width="50" alt="ad" />
                       <?php 
                      
                       echo "&nbsp;".$h.") ".$gal->first_name." ".$gal->last_name."[".$gal->class_id."-".$gal->section."]"; ?></span></p>
                  
                         <?php  }endforeach;
                         if($h<2){?>
                         <h2 style="color:#F00">No Record Found<?php echo date('Y-m-d');?></h2>
                      <?php    }
				
				else
				{?>
                	<h2 style="color:#F00">No Record Found<?php echo date('Y-m-d');?></h2>
                 <?php }
             }
             
         
                 ?>
							
					</div>
				</div>
					<div class="sidebar-widget shadow-light"> <a href="<?php echo base_url(); ?>assets/sd_form.pdf" class="promo-container"><img src="<?php echo base_url(); ?>assets/img/ad.png" alt="ad" /></a></div>
			
					<div class="sidebar-widget shadow-light"> <a href="<?php echo base_url();?>welcome/syllabus" class="promo-container"><img src="<?php echo base_url(); ?>assets/img/ad1.png" alt="ad" /></a></div>
					
					
			
			</div>
		</div>
		<!-- Main end --> 
		