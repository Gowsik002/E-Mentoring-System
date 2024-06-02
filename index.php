<?php
session_start();
 require('dbconfig.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<title>Online Student Management System</title>
	
	<!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<style>
.slider{
    width:90%;
    height:300px;
    box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px;
    margin: 20px auto;
}
#img{
    width:100%;
    height:100%;
    
}

</style>
<script type="text/JavaScript">
	var img = document.getElementById('img');

var slides=['bg1.jpg','bg3.jpg','bg4'];

var Start=0;

function slider(){
    if(Start<slides.length){
        Start=Start+1;
    }
    else{
        Start=1;
    }
    console.log(img);
    img.innerHTML = "<img src="+slides[Start-1]+">";
   
}
setInterval(slider,2000);

</script>
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="background:#2196f3;">
        <div class="container" >
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php" style="color:#FFFFFF">Online Student Management System</a>
				
				
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    
					 <li style="color:#FFFFFF">
                        <a style="color:#FFFFFF" href="index.php"><i class="fa fa-home fa-fw"></i>Home</a>
                    </li>
					
				<!--	<li style="color:#FFFFFF">
                        <a style="color:#FFFFFF" href="index.php?info=about"><i class="fa fa-home fa-fw"></i>About</a>
                    </li>--->
					
					<li><a style="color:#FFFFFF" href="index.php?info=registration"><i class="fa fa-sign-out fa-fw"></i>Registration</a></li>
				
				
								
	<li class="dropdown">
        <a style="color:#FFFFFF" href="#" class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-sign-in fa-fw"></i>Login
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          
          <li><a href="index.php?info=login">Student</a></li>
		  <li><a href="index.php?info=faculty_login">Faculty</a></li> 
          <li><a href="admin">Admin</a></li> 
        </ul>
      </li> 
	  
	
	  
	  
	 <li>
                        <a style="color:#FFFFFF" href="index.php?info=contact"><i class="fa fa-phone fa-fw"></i>Contact</a>
                    </li>
					 	
					
                   

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

<?php 
					@$info=$_GET['info'];
					if($info!="")
					{
											
						 if($info=="about")
						 {
						 include('about.php');
						 }
						
						
						
						

						 
						 else if($info=="contact")
						 {
						 include('contact.php');
						 }
						
						
						 
						 
						 else if($info=="login")
						 {
						 include('login.php');
						 }
						 
						  else if($info=="faculty_login")
						 {
						 include('faculty_login.php');
						 }
						 
						 
						 else if($info=="registration")
						 {
						 	include('registration.php');
						 }
					}
					else
					{
				?>
		<!-- slider start -->
   
<!-- slider -->			
	
	
    <!-- Page Content -->
    <div class="container-fluid" style="background-color:none;">
       
            <div class="col-lg-12">
             	<div class="col-sm-8">
				<div class="row">
					
							
								<center>	<img src="images/bg4.jpg"/> </center>
						
					

				
				</div> <hr>
				<div class="row">
				<h2 style="color: red;">About Online Student Management System</h2>
				<p style="text-align:justify;"> 
Here we have developed the Student management system, which is generally used in the HOD to manage the students performance. Here we have 3 modules such as administrator, Faculty and student.

Administrator(HOD)  is the one who creates the student account by adding all student info and assigning the username and password. 
Admin also checks the result once all students entered the feedback..
We can start the development from the login page, where we have given the option to login as admin and student...Here since we have only one admin account,
You can perform all admin actions such as login to the account and check result..

I fyou entered the student user and password and selected student option, then it will show all student information and let you enter the feedback based on the subject..

/p>
	
			</div>
			
            
			</div>
	<div class="col-sm-3 modal-content pull-right" style="background-color:aliceblue;">
				
				<marquee width="100%" direction="down" height="660px">
				<?php
				$cnt=0;
				$sql=mysqli_query($conn,"select id,Title,Message,exp_date from e_notice where NOW()<=exp_date order by exp_date desc");
				while($row=mysqli_fetch_array($sql))
				{
					$cnt++;
				?>
				 
						
						<div class="panel panel-default">
							<div class="panel panel-header panel-success clear-fix>" style="background-color: #9796e3;    color: white;"> <center><?php echo $row['Title'];?>  </center></div>
							<div class="panel panel-body panel-primary>">   <?php echo $row['Message'];?> </div>
						</div>
				 
				
				<?php 
					} }
				?>
				</marquee>
				 </div>
			
			
			
			
			
            </div>
    <!-- /.container -->
	
	<div class="navbar-fixed-bottom nav navbar-inverse text-center" style="padding:15px;height:40px; background:#2196f3;">
		<span style="color:#FFFFFF">Developed By Gowsik 	<a href="#">Rohini College Of Engineering</a> </span>
	</div>
    <!-- jQuery -->
    <script src="css/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="css/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>

</html>
