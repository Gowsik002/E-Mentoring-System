<?php 
//get groupname 
$sql=mysqli_query($conn,"select gm_name from group_members where sm_name='".$_SESSION['user']."'");
$res=mysqli_fetch_assoc($sql);

?>

<script type="text/javascript">
function deletes(id)
{
	a=confirm('Are You Sure To Remove This Record ?')
	 if(a)
     {
        window.location.href='delete_feedback.php?id='+id;
     }
}
</script>	


<div class="row">
	<div class="col-sm-12" style="color:orange;">
		<h1 align="center" >View Task </h1>
	</div>
</div>
<div class="row">

<div class="col-sm-12">

<table class="table table-bordered" style="margin-bottom:50px">
					<tr class="success">
				<td><b>S.No</b></td>
				<td><b>Task</b></td>
				<td><b>Expiry Date</b></td>
				</tr>
				<?php
				$cnt=0;
				$sql=mysqli_query($conn,"select task_name,t.exp_date from task_fac t left outer join group_members g on t.grp_name=g.gm_name  where  g.gm_name='".$res['gm_name']."'  order by t.task_name");
				while($row=mysqli_fetch_array($sql))
				{
					$cnt++;
				?>
				<tr>
				<td><?php echo $cnt;?></td>
				<td><?php echo $row['task_name'];?></td>
				<td><?php echo $row['exp_date'];?></td>
				
				
				</tr>
				<?php }?>
				
			</table>
</div>
</div>
