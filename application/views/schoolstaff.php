<div id="main" class="round_8 clearfix">
            <div class="page_title round_6">
                <h1 class="replace">School Staff</h1>
            </div>
           
          
            <div class="clear"></div>
            <hr class="pad"/>
            <?php $this->db->where("status","Active");
            $ef=$this->db->get("employee_info")->result();
            foreach($ef as $v):
            ?><div><div>
           <img class="alignleft shadow" src="<?php echo base_url(); ?>admin/assets/images/<?php echo $v->photo;?>" alt="Post thumbail 1" height="120" width="150"/>
           </div>
           <div>Name : <?php echo $v->first_name." ".$v->mid_name." ".$v->last_name;?>
           <br><br>Designation : <?php echo $v->job_title;?>
            <br><br>Qualification :<?php echo $v->qualification;?>
             <br>
             <br>
             <br>
           </div>
           </div>
          <?php endforeach;?>
        </div>