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
	<br/><br/><br/>
	<div id="page-wrap" style="width:800px; border:1px solid #333;">
<?php
	$school_info = mysql_query("select * from general_settings");
	$info = mysql_fetch_object($school_info);
?>		
		<table style="width: 100%">
			<tr>
				<td width="20%" style="border: none;" rowspan="2">
					<img src="<?php echo base_url();?>assets/images/empImage/<?php echo $info->logo;?>" alt="" width="100" />
					</br><i>Aff.No. - RC/A-15-16/8267</i>
				</td>
				<td style="border: none;">
					<h1 style=margin-left:125px;><?php echo $info->your_school_name;?></h1>
			        <h4 style="font-variant:small-caps; margin-left:85px;">
						<?php echo $info->address_1." ".$info->address_2." ".$info->city." "; ?>
			        </h4>
			       
			        <h4 style="font-variant:small-caps; margin-left:130px;">
						<?php  echo $info->state." - ".$info->pin;  if(strlen($info->phone_number > 0 )){echo "Phone : ".$info->phone_number." ";} ?>
			           
			        </h4>
				</td>
			</tr>
			<tr>
				<td style="border: none;">
					<br></br>
						<h2 style="border: 2px solid #000; padding: 5px; width: 250px; margin-left:115px;">
							&nbsp;&nbsp;Progress Report (2018-19) 
						</h2>
					
				</td>
			</tr>
			<tr><td style="border: none;"></td></tr>
			<tr><td style="border: none;"></td></tr>
		</table>
        <hr/>
		<div style="clear:both"></div>
		
		<div id="customer">
        	<div style="display:inline-block; float:left; margin-left:5px;">
            <table> 
                    <tr>
                    	<td style="border:none;  line-height: 20px;">
                    		Student Name : <strong><?php echo $rowc->first_name." ".$rowc->midd_name." ".$rowc->last_name; ?></strong>
                        </td>
                    </tr>
                    
                    <tr>
                    	<td style="border:none; line-height: 20px;">
                    		Mother's Name : <strong><?php echo $pInfo->mother_full_name; ?></strong>
                        </td>
                    </tr>
                    <tr>
                    	<td style="border:none; line-height: 20px;">
                    		
                        	<?php $this->db->where("created > ",$fsd);
                        	$this->db->where("created < ",$futureDate);
                        	
                        	$this->db->where("stu_id",$rowc->student_id);
                        	
                        	$class1  = $this->db->get("exam_info")->result();
                        	$c="";$d="";
                        	foreach($class1 as $d12):
                        	$c = $d12->class1;
                        	$d=$d12->section;
                        	break;
                        	endforeach;
                        	if(strlen($c)>0){
				  		echo 'Class : <strong>'.$c.' - '.$d.'</strong>';	
				  		}else{
				  			echo " There are no marks entry for this Student";
				  		}
                        	?>
                        	
                        </td>
                    </tr>
                    
            </table>
			</div>
			
			<div style="display:inline-block; float:right; margin-right:5px;">
            <table>
                <tr>
                    	<td style="border:none; line-height: 20px;">
                    		<img src="<?php echo base_url();?>assets/images/stuImage/<?php echo $rowc->photo; ?>"  alt="" width="90" />
                        </td>
                    </tr>
                   
            </table>
            </div>
			
			
			
			
            <div style="display:inline-block; float:center; margin-right:5px;">
            <table>
                <tr>
                    	<td style="border:none; line-height: 20px;">
                    		Father's Name : <strong><?php echo $pInfo->father_full_name; ?></strong>
                        </td>
                    </tr>
                    <tr>
                    	<td style="border:none; line-height: 20px;">
                    		Date of Birth : <strong><?php echo date("d-m-Y",strtotime($rowc->date_ob)); ?></strong>
                        </td>
                    </tr>
                <tr>
                    	<td style="border:none; line-height: 12px;">
                        	<?php echo 'Student Id : <strong>'.$rowc->student_id.'</strong>';	?>
                        </td>
                    </tr>
                    </H3>
            </table>
            </div>
		
		</div>
		<h3>
		<table id="items" align="center" class="exam" style="width:100%; margin-top:0px; alignment-adjust:central;">
		  	<tr>
		  		<th>S.No.</th>
		  		<th>Subjects</th>
		  		<?php 	$this->db->distinct();
		  			$this->db->select("exam_name");
		  			$this->db->where("fsd",$fsd);
		  			$examName = $this->db->get("exam_info")->result();
		  			foreach($examName as $examName1):?>
		  		<th>
		  		
		  		<?php if(($examName1->exam_name=="SUMMATIVE_ASSESSMENT-1st")||($examName1->exam_name=="FORMATIVE_ASSESSMENT-III")||($examName1->exam_name=="SUMMATIVE_ASSESSMENT-2nd")){
		  		
		  	if($examName1->exam_name=="SUMMATIVE_ASSESSMENT-1st"){	
echo "SA-1";}
if($examName1->exam_name=="FORMATIVE_ASSESSMENT-III"){
echo "F.A.III";
}
if($examName1->exam_name=="SUMMATIVE_ASSESSMENT-2nd"){
echo "SA-2";
}

}else{echo $examName1->exam_name;}?>
				</th>
				<?php endforeach;?>
				<th>
		  		Grand Total
				</th>
		  		
		  		
		  	</tr>
		  	<?php 
		  		$i = 1;
		  		$j = 1;
		  		$gross = 0;
		  		$gross1 = 0;
		  		$gross2 = 0;
		  		$gross3 = 0;
		  		$gross4 = 0;
		  		$gross5 = 0;
		  		$gross6 = 0;
		  		$nhu = 0;
		  		$gross7 = 0;
		  		$gross8 = 0;
		  		$rowtot=0;
		  		$totoutofrow=0;
		  		$tot1 = 0;$tot2 = 0;$tot3 = 0;$tot4 = 0;$tot5 = 0;$tot6 = 0;$tot7 = 0;$tot8 = 0;$tot9 = 0;
		  		$total = 0;
		  		$this->db->where("class_id",$c);
		  		$this->db->where("section",$d);
		  		$var  = $this->db->get("subject")->result();
		  		foreach($var as $row):
		  			echo '<tr>';
		  			echo "<td style='text-align: center;'>".$i."</td>";
		  			echo "<td>".$row->subject."</td>";
		  			$this->db->distinct();
		  			$this->db->select("exam_name");
		  			$this->db->where("fsd",$fsd);
		  			$examName = $this->db->get("exam_info")->result();
		  			foreach($examName as $ex):
		  			$this->db->where("created > ",$fsd);
		  			$this->db->where("created < ",$futureDate);
				  		
				  		$this->db->where("stu_id",$rowc->student_id);
				  		$this->db->where("subject",$row->subject);
				  		$this->db->where("exam_name",$ex->exam_name);
				  		$var1  = $this->db->get("exam_info");
				  		$num = $var1->num_rows();
					  		if($num > 0){
					  			$result = $var1->row();
					  			if(is_numeric($result->marks)){
					  				if($j == 1){
					  				
					  					$tot1 += $result->marks;
					  					$rowtot +=$result->marks;
					  					
					  					$gross1 += $result->out_of;
					  					
					  					$totoutofrow += $result->out_of;
					  				}
					  				if($j == 2){
					  				
					  					$tot2 += $result->marks;
					  					$rowtot +=$result->marks;
					  					
					  					$gross2 += $result->out_of;
					  					
					  					$totoutofrow += $result->out_of;
					  				}
					  				if($j == 3){
					  				
					  					$tot3 += $result->marks;
					  					$rowtot +=$result->marks;
					  					
					  					
					  					$gross3 += $result->out_of;
					  					$totoutofrow += $result->out_of;
					  				}
					  				if($j == 4){
					  				
					  					$tot4 += $result->marks;
					  					
					  					$rowtot +=$result->marks;
					  					
					  					$gross4 += $result->out_of;
					  					$totoutofrow += $result->out_of;
					  				}
					  				if($j == 5){
					  				
					  					$tot5 += $result->marks;
					  					$rowtot +=$result->marks;
					  					
					  					$gross5 += $result->out_of;
					  					$totoutofrow += $result->out_of;
					  				}
					  				if($j == 6){
					  				
					  					$tot6 += $result->marks;
					  					$rowtot +=$result->marks;
					  					
					  					$gross6 += $result->out_of;
					  					$totoutofrow += $result->out_of;
					  				}
					  				if($j == 7){
					  				
					  					$tot7 += $result->marks;
					  					$rowtot +=$result->marks;
					  					
					  					$gross7 += $result->out_of;
					  					$totoutofrow += $result->out_of;
					  				}
					  				if($j == 8){
					  				
					  					$tot8 += $result->marks;
					  					$rowtot +=$result->marks;
					  					
					  					$totoutofrow += $result->out_of;
					  					
					  				}
					  				$val = $result->marks;
					  			}else{
					  				$val = 0;
					  			}echo "<td  style='text-align: center;'><table ><tr><td style='border-left:none;border-bottom:none;border-top:none; width:37%;'>".$result->marks."</td><td style='border-right:none;border-bottom:none;border-top:none; width:37%;'>".$result->out_of."</td></tr></table></td>";
					  			
					  			$total = $total + $result->marks;
					  		}else{ 
					  			echo "<td> </td>";
					  			
					  		
					  		}
					  		
					  		$j++;
					endforeach;
					
				  	
				  		$tot9 += $total;
				  		$total = 0;
				  		
				  		
				  		?>
				  		<td><table ><tr><td style="border-left:none;border-bottom:none;border-top:none; width:35%;"><?php if($rowtot > 9 ){echo $rowtot;}else{echo "0".$rowtot; }?></td><td style="border-right:none;border-bottom:none;border-top:none; width:35%;"><?php echo $totoutofrow;?></td></tr></table>
				  </td>	<?php 	$j = 1;	$rowtot=0;
				  		$totoutofrow=0;			  		
		  			echo '</tr>';
		  		$i++; endforeach; 
		  	?>
			  	<tr>
			  		<td colspan="2" align="center"><B> TOTAL</B></td>
			  		<td><table ><tr><td style="border-left:none;border-bottom:none;border-top:none; width:35%;"><?php echo $tot1;?></td><td style="border-right:none;border-bottom:none;border-top:none; width:35%;"><?php echo $gross1;?></td></tr></table>
		  				</td>
			  		<td><table ><tr><td style="border-left:none;border-bottom:none;border-top:none; width:35%;"><?php echo $tot2;?></td><td style="border-right:none;border-bottom:none;border-top:none; width:35%;"><?php echo $gross2;?></td></tr></table>
		  				</td>
		  				
		  				<?php $gtu=$gross3+$gross2+$gross1;?>
		  				<td><table ><tr><td style="border-left:none;border-bottom:none;border-top:none; width:35%;"><?php echo $tot3+$tot1+$tot2;?></td><td style="border-right:none;border-bottom:none;border-top:none; width:35%;"><?php echo $gross3+$gross2+$gross1;?></td></tr></table>
		  				</td>
		  				
		  			
		  				
		  			
		  				
			  	
			  		
			  	</tr>
		  	</table>
		  	<table style="width:100%;">
		  	<tr>
		  		<td style="border-left:none; width:25.2%;">
		  			<table class="nob" >
			  			
			  			
			  			<tr>
			  			<td class="nob"></br>Attendance :</td>
			  				
			  				<td class="nob"></br>___________</td>
			  			</tr>
			  			<tr>
			  			<?php 
			  						
			  						?>
			  				<td class="nob"></br> Personality Skills : </td>
			  				<td class="nob"></br><span style="text-decoration: underline;"><?php 
			  				?></span></td>
			  			</tr>
		  			</table>
		  		</td>
		  		<td style = "width:26%;">
		  		
		  		
		  		<table>
			  			
			  			
			  			<tr>
			  				<td class="nob"></br>Sig. of Director :</td>
			  				<td class="nob">____________</td>
			  			</tr> 
			  			<tr>
			  				<td class="nob"></br>Sig. of Class Teacher :</td>
			  				<td class="nob"></br>____________</td>
			  			</tr>
			  			<tr>
			  				<td class="nob"></br>Sig. of the Guardian :</td>
			  				<td class="nob"></br>____________</br></td>
			  			</tr>
		  			</table>
		  			
		  		
		  		</td>
		  		
		  		<td style="border-right:none; width:35%;">
		  			<table>
		  			<tr>
			  				<td class="nob"></br>Percentage	:</td>
			  				<td class="nob"></br><span style="text-decoration: underline;">
			  						<b><?php 
			  						 $perv=$tot1+$tot2+$tot3+$tot4+$tot5+$tot6;
			  						$gros=$gross2+$gross1+$gross3+$gross4+$gross5+$gross6;
			  						
			  							echo $per = round(($perv*100)/$gros, 2);
			  							
			  						?> %&nbsp;&nbsp;&nbsp;
			  							
			  						</b>
			  					</span></td>
			  				
			  				
			  			</tr>
			  			
			  			<tr>
			  				<td class="nob"></br>Rank	:</td>
			  				<td class="nob"></br>______</td>
			  			</tr> 
			  			<tr>
			  			
			  				<td class="nob"></br>Final Result	: </td>
			  				<td class="nob"></br> <i>Passed/Promoted/Supp./Detained</i></br></td>
			  				
			  			</tr>
		  			
		  			
		  			
			  			
		  			</table>
		  			
		  		</td>
		  	</tr>
		  	
		</table>
		<div style=" float:right; margin-right:1px;"><h2> <b><i></br></br></br></br>Sig. of the Principal </i><b></h2></div>
	</div>
	</div>
	<br/><br/>
	<div class="invoice-buttons">
    	<button class="btn btn-default margin-right" type="button" onclick="window.print();" >
        	<i class="fa fa-print padding-right-sm"></i> Print Reciept
        </button>
    </div>
</body>

</html>