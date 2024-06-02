<?php 
//echo $_SESSION['faculty_login'];
extract($_POST);
if(isset($save))
{
	if($np=="" || $op=="")
	{
	$err="<font color='red'>fill all the fileds first</font>";	
	}
	else
	{
		$grp_name='';
		//echo "select * from group_tbl where faculty_id=$_SESSION["faculty_login"]";
		$q=mysqli_query($conn,"select * from group_tbl where faculty_id='".$_SESSION['faculty_login']."'");
	while($r=mysqli_fetch_array($q))
	{
		$grp_name=$row['group_name'];
	}

	$sql=mysqli_query($conn,"insert into task_fac (grp_name,fac_name,task_name,exp_date,Status) values('$grp_name','".$_SESSION['faculty_login']."','$np','$op',1)");
	
	$err="<font color='blue'>Task updated!. </font>";
	
	}
	
	
}
?>
<h2 align="center">Update Task</h2>
<form method="post">
	
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4"><?php echo @$err;?></div>
	</div>
	
	
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-4">Expected date of Completion</div>
		<div class="col-sm-5">
		<input type="date" name="op" class="form-control"/></div>
	</div>
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-4">Enter task</div>
		<div class="col-sm-5">
		<textarea name="np" class="form-control"></textarea>
		</div>
	</div>
	
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-2"></div>
		<div class="col-sm-8">
		
		
		<input type="submit" value="Update task" name="save" class="btn btn-success"/>
		<input type="reset" class="btn btn-success"/>
		</div>
	</div>
</form>	