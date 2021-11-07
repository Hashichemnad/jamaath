<?php 
require 'db.php';
session_start();
if($_SESSION['loggedin']!=1){
	header("location: index.php");
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />

<!-- font-awesome icons CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons CSS -->
<link href="css/dataTables.bootstrap4.min.css" rel='stylesheet' type='text/css' />
 <!-- side nav css file -->
 <link href='css/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css'/>
 <!-- side nav css file -->

           <link rel="stylesheet" href="css/bootstrap.min.css" /> 
 <!-- js-->
<script src="js/jquery.min.js"></script>
<script src="js/modernizr.custom.js"></script>

<!--webfonts-->
<link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
<!--//webfonts--> 

<!-- Metis Menu -->
<script src="js/metisMenu.min.js"></script>

<script src="js/custom.js"></script>
<link href="css/custom.css" rel="stylesheet">
<script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap4.min.js"></script>

<!--//Metis Menu -->
 
</head> 

<body class="cbp-spmenu-push">
  
	<div class="main-content">
<?php include 'header.php'; ?>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					<div class="row">
						<h3 class="title1">Profile Details</h3>
					
						<div class="form-three widget-shadow">
							<form class="form-horizontal" action="member_details_print.php" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Members</label>
									<div class="col-sm-8">
										<input type="text" list="jobseeker" name="member_id" class="form-control1" id="focusedinput" required>
									</div>
								</div>
								<datalist id="jobseeker">
										<?php
										$query = "select member_id,name from members";  
										$result = mysqli_query($connect, $query);  
										while($row = mysqli_fetch_array($result))  
										{
										echo'<option value="'.$row['member_id'].'">'.ucfirst($row['name']).'</option>';
										} ?>
									</datalist>
								<button type="submit" name="submit" class="btn btn-primary">Submit</button>
							</form>
						</div>
					</div>

					<div class="row">
						<h3 class="title1">Details List</h3>
					
						<div class="form-three widget-shadow">
							<form class="form-horizontal" action="member_details_list.php" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Name</label>
									<div class="col-sm-3">
										<input type="checkbox" checked name="name" value="jobseeker_name" >
									</div>
									<label for="focusedinput" class="col-sm-2 control-label">Father Name</label>
									<div class="col-sm-3">
										<input type="checkbox" checked name="mobile" value="mobile" >
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Location</label>
									<div class="col-sm-3">
										<input type="checkbox" checked name="whatsapp" value="whatsapp" >
									</div>
									<label for="focusedinput" class="col-sm-2 control-label">Door No</label>
									<div class="col-sm-3">
										<input type="checkbox" checked name="email" value="email" >
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Mobile</label>
									<div class="col-sm-3">
										<input type="checkbox" checked name="gender" value="shop_name" >
									</div>
									<label for="focusedinput" class="col-sm-2 control-label">Register No</label>
									<div class="col-sm-3">
										<input type="checkbox" checked name="dob" value="pan" >
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Category</label>
									<div class="col-sm-8">
										<select name="gender" class="form-control1" required>
											 <option value="all" selected>All</option>
											 <option value="male">Male</option>
											 <option value="female">Female</option>
											 <option value="other">Others</option>
										</select>
									</div>
								</div>
								
								<button type="submit" name="submit" class="btn btn-primary">Submit</button>
							</form>
						</div>
					</div>
					
				</div>
			</div>
			
		</div>


		<!--footer-->
		<div class="footer">
		   <p>&copy; with love <a href="https://addwiser.in/" target="_blank">addwiser</a></p>		
		</div>
        <!--//footer-->
	</div>
	
	<!-- side nav js -->
	<script src='js/SidebarNav.min.js' type='text/javascript'></script>
	<script>
      $('.sidebar-menu').SidebarNav()
    </script>
	<!-- //side nav js -->
	
	<!-- Classie --><!-- for toggle left push menu script -->
		<script src="js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			
			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!-- //Classie --><!-- //for toggle left push menu script -->
	
	<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
	
	<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.js"> </script>
   
</body>
</html>
