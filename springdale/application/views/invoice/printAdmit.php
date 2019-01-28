<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />

<title><?php echo $title; ?></title>

	<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>assets/css/invoice_css/style.css' />
	<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>assets/css/invoice_css/prin_result.css' media="print" />
	<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/invoice_js/jquery-1.3.2.min.js'></script>
	<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/invoice_js/example.js'></script>
	
	<style type="text/css">

	@media print
	{
			body * { visibility: hidden; }
			#printcontent * { visibility: visible; }
			#printcontent { position: absolute; top: 40px; left: 30px; }
	    }
    .nob{
    	border: none;
    }
	</style>
	
    <script>
        function convert_number(number)
        {
            if ((number < 0) || (number > 999999999))
            {
                return "Number is out of range";
            }
            var Gn = Math.floor(number / 10000000);  /* Crore */
            number -= Gn * 10000000;
            var kn = Math.floor(number / 100000);     /* lakhs */
            number -= kn * 100000;
            var Hn = Math.floor(number / 1000);      /* thousand */
            number -= Hn * 1000;
            var Dn = Math.floor(number / 100);       /* Tens (deca) */
            number = number % 100;               /* Ones */
            var tn= Math.floor(number / 10);
            var one=Math.floor(number % 10);
            var res = "";

            if (Gn>0){
                res += (convert_number(Gn) + " Crore");
            }
            if (kn>0){
                res += (((res=="") ? "" : " ") +
                    convert_number(kn) + " Lakhs");
            }
            if (Hn>0){
                res += (((res=="") ? "" : " ") +
                    convert_number(Hn) + " Thousand");
            }

            if (Dn){
                res += (((res=="") ? "" : " ") +
                    convert_number(Dn) + " hundred");
            }


            var ones = Array("", "One", "Two", "Three", "Four", "Five", "Six","Seven", "Eight", "Nine", "Ten", "Eleven", "Twelve", "Thirteen","Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eightteen","Nineteen");
            var tens = Array("", "", "Twenty", "Thirty", "Fourty", "Fifty", "Sixty","Seventy", "Eigthy", "Ninety");

            if (tn>0 || one>0)
            {
                if (!(res==""))
                {
                    res += " and ";
                }
                if (tn < 2)
                {
                    res += ones[tn * 10 + one];
                }
                else
                {

                    res += tens[tn];
                    if (one>0)
                    {
                        res += ("-" + ones[one]);
                    }
                }
            }

            if (res=="")
            {
                res = "zero";
            }
            return res;
        }

    </script>
</head>

<body>
	<div id="printcontent" align="center">
	
	<div id="page-wrap" style="width:850px; border: 1px solid black; outline: 1px solid black; solid #333;">
<?php
	$school_info = mysql_query("select * from general_settings");
	$info = mysql_fetch_object($school_info);
	 $this->db->where("student_id",$id);
	$rowc = $this->db->get("student_info")->row();
	$this->db->where("student_id",$id);
	$pInfo = $this->db->get("guardian_info")->row();
?>		

		<table style="width: 100%">
			<tr>
				<td width="10%" style="border: none;" rowspan="2">
					<img src="<?php echo base_url();?>assets/images/empImage/<?php echo $info->logo;?> " alt="" width="140" />
				</td>
				<td style="border: none;">
					<p style="font-size:30px"; ><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $info->your_school_name; ?></b></p>
			        <h3  style=margin-left:135px;>
						&nbsp;<?php echo $info->address_1." ".$info->address_2; ?>
			        </h3>
			       
			        <h3  style="font-variant:small-caps; margin-left:140px;">
						<?php if(strlen($info->phone_number > 0 )){echo $info->city."  Phone : ".$info->phone_number.", ";} ?>
			            <?php echo "Mobile : ".$info->mobile_number; ?>
			        </h3>
				</td>
			</tr>
			<tr>
				<td style="border: none;">
					
						<h2  style="border: 1px solid #000; padding: 2px; width: 250px; margin-left:185px;">
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Unit Test-2 (2018-19)<br>
							&nbsp;&nbsp;&nbsp;&nbsp;Admit Card : <?php echo $rowc->class_id.'-'.$rowc->section ; ?>
						</h2>
					
				</td>
			</tr>
		</table>
        <hr/>
		<div style="clear:both"></div>
		
		<div id="customer">
        	<div style="display:inline-block; float:left; margin-left:5px;">
            <table> 
          
                     <tr>
                    	<td style="border:none; line-height: 15px;">
                        	
				  		<h3>Student ID  : <strong><?php echo $rowc->student_id ; ?></strong>	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Roll Number :......</h3>
				  		
                        </td>
                    </tr>
                    
                    <tr>
                    	<td style="border:none;  line-height: 15px;">
                    		<h3>Student Name : <strong><?php echo $rowc->first_name." ".$rowc->midd_name." ".$rowc->last_name; ?></strong></h3>
                        </td>
                    </tr>
                    <tr>
                    	<td style="border:none; line-height: 15px;">
                    		<h3>Father Name : <strong><?php echo $pInfo->father_full_name; ?></strong></h3>
                        </td>
                    </tr>
                   
                 
            </table>
			</div>
			
			
			<div style="display:inline-block; float:right; margin-right:5px;">
            <table>
                <tr>
                    	<td style="border:none; line-height: 20px;">
                    		<img src="<?php echo base_url();?>assets/images/stuImage/<?php echo $rowc->photo; ?>"  alt="" width="50" />
                        </td>
                    </tr>
                   
            </table>
            </div>
            <?php $this->db->where("exam_name","UnitTest-2");
            $shift=$this->db->get("exam_shift")->result();
            
            $this->db->distinct();
            $this->db->select("date1");
            $this->db->where("exam_name","UnitTest-2");
            $this->db->where("class1",$rowc->class_id);
            $this->db->order_by("date1","asc");
             $exam_day=$this->db->get("exam_time_table")->result();?>
		</div>
			<table id="items" align="center"  style="width:100%; margin-top:0px; alignment-adjust:central;">
					<thead>
						<th>Date</th>
						<?php foreach($exam_day as $ed):?>
						<th><?php echo date("d-m-Y",strtotime($ed->date1));?></th>
						<?php endforeach;?>
					</thead>
					<body>
						<?php foreach($shift as $s):?><tr>
						<td><?php echo $s->shift;?></td><?php 
						foreach($exam_day as $ed):
						
						
							$this->db->where("class1",$rowc->class_id);
						$this->db->where("shift",$s->shift);
						
						$this->db->where("exam_name","UnitTest-2");
						 $this->db->where("date1","$ed->date1");
						$etb = $this->db->get("exam_time_table");
						if($etb->num_rows()>0){
							foreach($etb->result() as $ff):
							
							
							if($ff->subject){
							
								?><td> <?php echo $ff->subject;?></td>
							<?php 
							}else{
							?> <td></td>
					<?php 		}
							endforeach;
						?>
						<?php }else{ ?><td></td><?php } endforeach;?>
						</tr>
					<?php endforeach;?>
					</body>
			
			</table>
			
			</br>
		<div align="left"><h3>&nbsp;Note: 1) First Shift timing is 09:00AM to 11:00AM and Second shift is 11:15 to 01:15PM.<br>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2) Reporting time for the student at the class on the day of
examination is between 08:20 A.M. to 08:50 A.M.  </br>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3) Students are strictly advised not to bring any illegal paper.</br>
		
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4) The Result will be declared on 22.12.2018.</br>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5) Students,whose dues are not cleared fully,will not be allowed to appear for the examination.</br>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;6) No Re- exam  , students who are absent for any paper.</div>
		</h3>
		<div>
		<br>
		<table width="100%" border="0">
		<tr ><h3>
		<td style="border: none;" align="center"><h3>(Signature)<br>Class Teacher</h3></td><td style="border: none;" align="center"><h3>(Signature)<br>Director</h3></td>
		</tr>
		</table><br></div>
		<div> </div>
	</div>
	
	</div>
	
	
	<br/>
	<div class="invoice-buttons">
    	<button class="btn btn-default margin-right" type="button" onclick="window.print();" >
        	<i class="fa fa-print padding-right-sm"></i> Print Reciept
        </button>
    </div>
</body>

</html>