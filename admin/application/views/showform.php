<?php 



?>

<!DOCTYPE html>
<html>
<head>
	<title>Form</title>
</head>
<body>
	<table style="margin-top:0px;">
	<tr><td><center><img width="120" height="120" src="<?php echo base_url();?>assets/images/logo.jpg" alt="" /></center></td>
	<td><center><h1 style="color:blue">Spring Dale School</h1>
		<h3 style="color:blue">EIDGAH ROAD NEAR POLICE CHAUKI BADARAKA</h3>
		<h2 style="color:blue">
ADMISSION FORM
<br>20___20</h2>
	</center></td>
<td><center><div style="height:120px;width:100px; border:1px solid black; margin-top:100px;"></div></center></td></tr>

<tr><td>To,<br>
The principal<br>
Spring Dale School<br>
Azamgarh
</td>
<td></td>
<td></td></tr>

<tr>
<td></td>
<td>(WRITE IN BLOCK LETTERS)</td>
<td></td>
</tr>
<tr>
<td>1. SCHOLAR'S NAME IN FULL :</td>
<td><?php echo $abc->sname;?></td>
<td></td>
</tr>

<tr>
<td>2. CLASS TO WHICH ADMISSION IS SOUGHT :</td>
<td><?php echo $abc->addforclass;?></td>
<td></td>
</tr>

<tr>
<td>3: DATE OF BIRTH :</td>
<td>(a)INFIGURE<br>(b)IN WORDS:<?php echo $abc->dob;?> </td>

<td></td>
</tr>

<tr>
<td>4: (a) FATHER'S NAME</td>
<td><?php echo $abc->fname;?></td>
<td></td>
</tr>

<tr>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MOTHER'S NAME :</td>
<td><?php echo $abc->mname;?></td>
<td></td>
</tr>

<tr>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ADDRESS :</td>
<td><?php echo $abc->resiaddress;?></td>
<td></td>
</tr>

<tr>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;OCCUPATION :</td>
<td><?php echo $abc->foccupation;?></td>
<td></td>
</tr>

<tr>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ph. No.</td>
<td><?php echo $abc->mobile;?></td>
<td></td>
</tr>

<tr>
<td>(b) GUARDIAN'S NAME :
</td>
<td></td>
<td></td>
</tr>

<tr>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ADDRESS :</td>
<td></td>
<td></td>
</tr>

<tr>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;OCCUPATION :</td>
<td></td>
<td></td>
</tr>

<tr>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ph No. :</td>
<td></td>
<td></td>
</tr>

<tr>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;RELATIONSHIP TO CHILD :</td>
<td></td>
<td></td>
</tr>

<tr>
<td>5: NATIONALITY :</td>
<td><?php echo $abc->nation;?></td>
<td></td>
</tr>


<tr>
<td>7 :DATE OF APPLICATION :</td>
<td><?php echo $abc->date;?><br>certify that the above information is correct</td>
<td></td>
</tr>

<tr>
<td>DATE :</td>
<td><?php echo $abc->date;?></td>
<td>SIGNATURE OF PARENT/GUARDIAN :</td>
</tr>

<tr>
<td>PRINCIPLE SIGNATURE :</td>
<td></td>
<td></td>
</tr>
<tr><td></td><td><h3>*  School fees once paid will not be refunded in any case ....</h3></td></tr>

<tr>
<td>FORM NO. :</td>
<td><?php echo $abc->id;?></td>
<td></td>
</tr>

<tr>
<td>NAME :</td>
<td><?php echo $abc->sname;?></td>
<td></td>
</tr>


<tr>
<td>CLASS :</td>
<td><?php echo $abc->addforclass;?></td>
<td></td>
</tr>

<tr>
<td>FATHER'S NAME :</td>
<td><?php echo $abc->fname;?></td>
<td></td>
</tr>

<tr>
<td>DATE OF ADDMISSION : :</td>
<td><?php echo $abc->date;?></td>
<td></td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td></td>
	<td></td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td></td>
	<td></td>
</tr>

<tr>
	<td>Principal Sig.</td>
	<td></td>
	<td>Gaurdian Sig.</td>
</tr>




</table>


</body>
</html>
