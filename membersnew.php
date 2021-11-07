<?php 
/* Main page with two forms: sign up and log in */
require 'db.php';
session_start();
if($_SESSION['loggedin']!=1){
	header("location: index.php");
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Admin</title>
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

 <!-- side nav css file -->
 <link href='css/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css'/>
 <!-- side nav css file -->
 
 <!-- js-->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>

<!--webfonts-->
<link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
<!--//webfonts--> 

<!-- Metis Menu -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<link href="css/custom.css" rel="stylesheet">
<!--//Metis Menu -->

</head> 
<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
if (isset($_POST['submit'])) { 
   $name = $mysqli->escape_string($_POST['name']);
   $father_name = $mysqli->escape_string($_POST['father_name']);
   $location = $mysqli->escape_string($_POST['location']);
   $door_no = $mysqli->escape_string($_POST['door_no']);
   $mobile = $mysqli->escape_string($_POST['mobile']);
   $register_no = $mysqli->escape_string($_POST['register_no']);
   $category_id = $mysqli->escape_string($_POST['category_id']);
   $isjamaath = $mysqli->escape_string($_POST['isjamaath']);
   $coconut = $mysqli->escape_string($_POST['coconut']);
   $query="INSERT into members (name,father_name,location,door_no,mobile,register_no,category_ref,isjamaath,coconut) values('$name','$father_name','$location','$door_no','$mobile','$register_no',$category_id,$isjamaath,$coconut)";
   if(mysqli_query($connect,$query)){
		$_SESSION['alert']="Added Successfully";
		$_SESSION['code']=200;
   }
   else{
		$_SESSION['alert']="An Error Occured! Please Try Again";
		$_SESSION['code']=400;
   }
   }
   header('location:'.$_SERVER['HTTP_REFERER']);
   die();
 }
  ?>
<body class="cbp-spmenu-push">
	<div class="main-content">
<?php include 'header.php'; ?>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					<h2 class="title1">Jama'ath</h2>
					<div class="row">
					<?php
					 if(isset($_SESSION['code']) && $_SESSION['code']==200){
						echo'<div class="alert alert-success" role="alert">'.$_SESSION['alert'].'</div>';
						unset($_SESSION['code']);
						unset($_SESSION['alert']);
					 }
					 if(isset($_SESSION['code']) && $_SESSION['code']==400){
						echo'<div class="alert alert-danger" role="alert">'.$_SESSION['alert'].'</div>';
						unset($_SESSION['code']);
						unset($_SESSION['alert']);
					 }
					 ?>
						<h3 class="title1">New Member:</h3>
						<div class="form-three widget-shadow">
							<form class="form-horizontal" action="" method="post">
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Name</label>
									<div class="col-sm-8">
										<input type="text" name="name" class="form-control1" id="focusedinput" placeholder="Enter Name" required>
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Father Name</label>
									<div class="col-sm-8">
										<input type="text" name="father_name" class="form-control1" id="focusedinput" placeholder="Enter father name" required>
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Location</label>
									<div class="col-sm-8">
										<input type="text" name="location" class="form-control1" id="focusedinput" placeholder="Enter Location" required>
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Door Number</label>
									<div class="col-sm-8">
										<input type="text" name="door_no" class="form-control1" id="focusedinput" placeholder="Enter Door number" required>
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Mobile Number</label>
									<div class="col-sm-8">
										<input type="text" name="mobile" class="form-control1" id="focusedinput" placeholder="Enter mobile number" required>
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Register number</label>
									<div class="col-sm-8">
										<input type="text" name="register_no" class="form-control1" id="focusedinput" placeholder="Enter Register No" required>
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Category</label>
									<div class="col-sm-8">
										<select name="category_id" class="form-control1" required>
										<option selected disabled>Select category</option>
										<?php
										$query = "SELECT * FROM category";  
										$result = mysqli_query($connect, $query);  
										while($row = mysqli_fetch_array($result))  
										{
										echo'<option value="'.$row['category_id'].'">'.$row['category_name'].'</option>';
										}
										?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Is JamaAth</label>
									<div class="col-sm-8">
										<select name="isjamaath" class="form-control1" required>
										<option selected value="1">YES</option>
										<option value="0">NO</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Coconut?</label>
									<div class="col-sm-8">
										<select name="coconut" class="form-control1" required>
										<option value="1">YES</option>
										<option selcted value="0">NO</option>
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
		   <p>&copy; All Rights Reserved | Design by <a href="" target="_blank">spidev</a></p>
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