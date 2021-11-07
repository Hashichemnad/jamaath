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
<link href="css/dataTables.bootstrap4.min.css" rel='stylesheet' type='text/css' />
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap4.min.js"></script>
<!--//Metis Menu -->

</head> 
<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
if (isset($_POST['submit'])) { 
   $amount = $mysqli->escape_string($_POST['amount']);
   $desc = $mysqli->escape_string($_POST['desc']);
   $date = $mysqli->escape_string($_POST['date']);
   $bill = $mysqli->escape_string($_POST['bill']);
   $query="INSERT into expense (date,bill_no,amount,description) values('$date','$bill','$amount','$desc')";
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
						<h3 class="title1">Expense</h3>
						<div class="form-three widget-shadow">
							<form class="form-horizontal" action="" method="post">
							<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Date</label>
									<div class="col-sm-8">
										<input type="date" name="date" class="form-control1" id="focusedinput" placeholder="Enter Amount" required>
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Bill No</label>
									<div class="col-sm-8">
										<input type="text" name="bill" class="form-control1" id="focusedinput" placeholder="Enter Amount" required>
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Amount</label>
									<div class="col-sm-8">
										<input type="text" name="amount" class="form-control1" id="focusedinput" placeholder="Enter Amount" required>
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Description</label>
									<div class="col-sm-8">
										<input type="text" name="desc" class="form-control1" id="focusedinput" placeholder="Enter if any">
									</div>
								</div>
								<button type="submit" name="submit" class="btn btn-primary">Submit</button>
							</form>
						</div>
					</div>
					<div class="panel-body widget-shadow">
					<div class="table-responsive">
					<p id="msg"></p>
						<table id="myTable" class="table">
							<thead>
								<tr>
								  <th>Date</th>
								  <th>Bill No</th>
								  <th>Amount</th>
								  <th>Description</th>
								  <th></th>
								</tr>
							</thead>
							<tbody>
								<?php
									$query = "SELECT * FROM expense";  
									$result = mysqli_query($connect, $query);  
									while($row = mysqli_fetch_array($result))  
								{ 
								  echo'<tr>
								  <td>'.$row['date'].'</td>
								  <td>'.$row['bill_no'].'</td> 
								  <td>'.$row['amount'].'</td>
								  <td>'.$row['description'].'</td>
								  <td>
								  <input type="button" name="view" value="Edit" id="'.$row["expense_id"].'" class="btn btn-primary  view_data" /> 
								  <form action="" method="post"><input type="hidden" name="" value=""><input type="submit" name="" class="btn btn-danger" value="delete"></form></td>
								  </tr>';
								}
								?>
							</tbody>
						</table>
					</div></div>
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
			$(document).ready(function() {
    $('#myTable').DataTable();
} );
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