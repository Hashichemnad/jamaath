<?php 
/* Main page with two forms: sign up and log in */
require 'db.php';
session_start();
if($_SESSION['loggedin']==1){
	header("location: dashboard.php");
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Admin Jamaath</title>
<link href="fav.css" rel="stylesheet">
    <script src="fav.js" defer></script>
    <link rel="manifest" href="manifest1.webmanifest">
    <link href="favicon.png" rel="apple-touch-icon-precomposed">
    <link href="favicon.png" rel="shortcut icon">
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
 <!--//js-->
 
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
		    $id = $mysqli->escape_string($_POST['id']);
			$pass = $mysqli->escape_string($_POST['pass']);
			if($id=='admin'&&$pass=='newsite'){
				echo '<script>alert("member login")</script>';
				$_SESSION['loggedin']=1;
				header("location: dashboard.php");
			}
			echo '<script>alert("invalid")</script>';
	  
   }
  ?>
<body class="cbp-spmenu-push">
	<div class="main-content">

		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="forms validation">
					<div class="row">

						<div class="col-md-6 validation-grids validation-grids-right">
							<div class="widget-shadow" data-example-id="basic-forms"> 
								<div class="form-title">
									<h4>Login</h4>
								</div>
								<div class="form-body">
									<form action="" method="post">
										<div class="form-group has-feedback">
											<input type="text" name="id" class="form-control"  placeholder="Enter Login Id"  required>
											<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
										</div>
										<div class="form-group">
											<input type="password" name="pass" class="form-control" id="inputPassword" placeholder="Password" required>
										</div>
										<div class="bottom">
											<div class="form-group">
												<button type="submit" name="submit" class="btn btn-primary">Login</button>
											</div>
											<div class="clearfix"> </div>
										</div>
									</form>
								</div>
							</div>
							
						</div>
						<div class="clearfix"> </div>	
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
	
	<!--validator js-->
	<script src="js/validator.min.js"></script>
	<!--//validator js-->
	
</body>
</html>