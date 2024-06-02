<?php 
//get groupname 
$sqli=mysqli_query($conn,"select gm_name from group_members where sm_name='".$_SESSION['user']."'");
$res=mysqli_fetch_assoc($sqli);



$sqli1=mysqli_query($conn,"select faculty_id from group_tbl where group_name='".$res['gm_name']."'");
$res1=mysqli_fetch_assoc($sqli1);

//echo "well  ".$res1['faculty_id'];
?>


<?php 

extract($_POST);
if(isset($save))
{
	
 
	if($np=="" || $npmsg=="")
	{
	$err="<font color='red'>fill all the fileds first</font>";	
	}
	else
	{
	

	$sql=mysqli_query($conn,"insert into messages (from_adr,to_adr,subject,message,sent_date) values('".$_SESSION['user']."','".$res1['faculty_id']."','$np','$npmsg',NOW())");
	
	$err="<font color='blue'>Sent Successfully!. </font>";
	
	}
	
	
}

//echo $_SESSION['faculty_login'];
//echo "uuu".$grp_name;
?>
<h2 align="center">Messages</h2>
<form method="post">
	
	<div class="row">
		<div class="col-sm-"></div>
		<div class="col-sm-4"><?php echo @$err;?></div>
	</div>
<div class="row" style="margin-top:10px">
<div class="col-sm-2"></div>
		<div class="col-sm-2">Select Group </div>

						<div class="col-sm-5"><select name="pro" class="form-control" required>
					<option></option>
				
					<option value='<?php echo $res1['faculty_id'];?>'><?php echo $res1['faculty_id']; ?></option>
					
						</select>
					</div>
	</div>
	<div class="row" style="margin-top:10px">
				<div class="col-sm-2"></div>
		<div class="col-sm-2">Subject </div>
		<div class="col-sm-5">
		<textarea name="np" class="form-control"></textarea>
		</div>
	</div>
	
	
	<div class="row" style="margin-top:10px">		<div class="col-sm-2"></div>

		<div class="col-sm-2">Message</div>
		<div class="col-sm-5">
		<textarea name="npmsg" class="form-control"></textarea>
		</div>
	</div>
	
	

	
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-4"></div>
		<div class="col-sm-8">
		
		
		<input type="submit" value="Send" name="save" class="btn btn-success"/>
		<input type="reset" class="btn btn-success"/>
		</div>
	</div>
	<hr>
	<table class="table table-bordered" style="margin-bottom:50px">
			<tr class="success">
				<td><b>S.No</b></td>
				<td><b>Subject</b></td>
				<td><b>Message</b></td>
				<td><b>From</b></td>
				<td><b>To</b></td>
				<td><b>Date</b></td>
				<td><b>Remove</b></td>
								</tr>
				<?php
				$cnt=0;
				$sql=mysqli_query($conn,"select id,message,subject,sent_date,from_adr,to_adr from messages where from_adr='".$_SESSION['user']."' or to_adr='".$_SESSION['user']."' order by sent_date desc");
				while($row=mysqli_fetch_array($sql))
				{
					$cnt++;
				?>
				<tr>
				<td><?php echo $cnt;?></td>
				<td><?php echo $row['subject'];?></td>
				<td><?php echo $row['message'];?></td>
				<td><?php echo $row['from_adr'];?></td>
				<td><?php echo $row['to_adr'];?></td>
				<td><?php echo $row['sent_date']?></td>
								<td class='text-center'><a href='#' onclick='deletes(<?php echo $row['id'];?>)'><span class='glyphicon glyphicon-remove' style=color:red;></span></a></td>

				</tr>
				<?php }?>
				
			</table>
</form>	
</body>
<script type="text/javascript">
function deletes(id)
{
	a=confirm('Are You Sure To Remove This Record ?')
	 if(a)
     {
        window.location.href='delete_fmessage.php?id='+id;
     }
}
</script>	
</html>
