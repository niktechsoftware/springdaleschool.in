<meta name="viewport" content="width=device-width, initial-scale=1">
 
 <div id="main" class="round_8 clearfix">
            <div class="page_title round_6">
                <h1 class="replace">School Gallery</h1>
            </div>
           
           
  <div class="container">
  <h2>Image</h2>
   <div>   
   <?php $val = $this->db->get("gfincuct_springAdmin.gallery"); 
   if($val->num_rows()>0)
   {
   $i=1;
   foreach($val->result() as $d):
  if($i%3==0){?></div><div><?php } 
  ?>           
  <img src="<?php echo base_url();?>admin/assets/images//<?php echo $d->image; ?>"  alt="Cinque Terre" width="304" height="200"> 
  
  
  <?php $i++; endforeach;} ?>
  </div>
</div>
</div>
  