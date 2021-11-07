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
<link href="css/dataTables.bootstrap4.min.css" rel='stylesheet' type='text/css' />
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap4.min.js"></script>
<!--//Metis Menu -->
 
</head> 
<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
if (isset($_POST['submit'])) { 
   $wid = $_POST['wid'];
   $amount = $_POST['amount'];
   $reciept = $_POST['reciept'];
   $date = $_POST['date'];
   $rem = $_POST['remarks'];
   $query="INSERT into workexpense (work_ref, bill_no, date, amount, remarks) values($wid,'$reciept','$date','$amount','$rem')";
if(mysqli_query($connect,$query)){
	$_SESSION['alert']="Added Successfully";
	$_SESSION['code']=200;
}
else{
	$_SESSION['alert']="An Error Occured! Please Try Again";
	$_SESSION['code']=400;
}

}

if (isset($_POST['update'])) { 
	$weid = $mysqli->escape_string($_POST['weid']);
	$reciept = $mysqli->escape_string($_POST['reciept']);
   $amount = $mysqli->escape_string($_POST['amount']);
   $date = $mysqli->escape_string($_POST['date']);
   $remarks = $mysqli->escape_string($_POST['remarks']);
   $query="UPDATE workexpense set bill_no='$reciept',amount='$amount',date='$date',remarks='$remarks' where weid=$weid";
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
<?php include 'header.php'; 
$wid=$_GET['id'];
?>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">	
		
					<div class="row">
					<h2 class="title1">Works : <?php echo $_GET['name'];?></h2>
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
						<div class="form-three widget-shadow">
							<form class="form-horizontal" action="" method="post">
							<input type="hidden" name="wid" value="<?php echo $wid;?>" required>
								
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Bill No:</label>
									<div class="col-sm-8">
										<input type="text" name="reciept" class="form-control1" id="focusedinput" placeholder="Enter Bill No">
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Date</label>
									<div class="col-sm-8">
										<input type="date" name="date" class="form-control1" id="focusedinput" required>
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Amount</label>
									<div class="col-sm-8">
										<input type="text" name="amount" class="form-control1" id="focusedinput" placeholder="Enter Amount" required>
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Remarks</label>
									<div class="col-sm-8">
										<input type="text" name="remarks" class="form-control1" id="focusedinput" placeholder="Enter Remarks">
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
								  <th>Reciept</th>
								  <th>Amount</th>
								  <th>Remarks</th>
								  <th></th>
								</tr>
							</thead>
							<tbody>
								<?php
									$query = "SELECT * FROM workexpense where work_ref=".$wid."";  
									$result = mysqli_query($connect, $query);  
									while($row = mysqli_fetch_array($result))  
								{ 
								  echo'<tr>
								  <td>'.$row['date'].'</td>
								  <td>'.$row['bill_no'].'</td>
								  <td>'.$row['amount'].'</td>
								  <td>'.$row['remarks'].'</td>
								  <td>
								  <input type="button" name="view" value="Edit" id="'.$row["weid"].'" class="btn btn-primary  view_data" /> 
								  <form action="" method="post"><input type="hidden" name="" value=""><input type="submit" name="" onclick="return confirm(\'Are you sure you want to delete?\');" class="btn btn-danger" value="delete"></form></td>
								  </tr>';
								}
								?>
							</tbody>
						</table>
					</div>
					</div>
					
			
		</div>
		<script>
	$(document).ready(function() {
    $('#myTable').DataTable();
} );
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
<div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Update Data</h4>  
                </div>  
                <form action="" method="post">
                <div class="modal-body" id="employee_detail">  
				
				
                </div> 
				<input type="submit" onclick="return confirm('Are you sure you want to update?');" class="btn btn-success" value="update" name="update">
				</form> 
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  

 <script>  
 $(document).ready(function(){  
      $('#add').click(function(){  
           $('#insert').val("Insert");  
           $('#insert_form')[0].reset();  
      });    
      $(document).on('click', '.view_data', function(){  
           var cdid = $(this).attr("id");  
           if(cdid != '')  
           {  
                $.ajax({  
                     url:"select.php",  
                     method:"POST",  
                     data:{weid:cdid},  
                     success:function(data){  
                          $('#employee_detail').html(data);  
                          $('#dataModal').modal('show');  
                     }  
                });  
           }            
      });
	  
 });  
 </script>
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
