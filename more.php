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
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>

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
   $mid = $mysqli->escape_string($_POST['mid']);
   $date = $mysqli->escape_string($_POST['date']);
   $amount = $mysqli->escape_string($_POST['amount']);
   $reciept = $mysqli->escape_string($_POST['reciept']);
   $query="INSERT into annualpaymentpaid (member_ref,date,amount,reciept_no) values($mid,'$date','$amount','$reciept')";
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
	$appid = $mysqli->escape_string($_POST['appid']);
	$reciept = $mysqli->escape_string($_POST['reciept']);
   $amount = $mysqli->escape_string($_POST['amount']);
   $date = $mysqli->escape_string($_POST['date']);
   $query="UPDATE annualpaymentpaid set reciept_no='$reciept',amount='$amount',date='$date' where appid=$appid";
   if(mysqli_query($connect,$query)){
		$_SESSION['alert']="Added Successfully";
		$_SESSION['code']=200;
   }
   else{
		$_SESSION['alert']="An Error Occured! Please Try Again";
		$_SESSION['code']=400;
   }
}
   
//    if (isset($_POST['remove'])) { //user registering
//    $piid = $_POST['piid'];
//    $query="DELETE FROM paymentin WHERE piid=$piid";
//    mysqli_query($connect,$query);
//    echo '<script>alert("removed successfully")</script>';
// }
header('location:'.$_SERVER['HTTP_REFERER']);
die();
 }
  ?>

<body class="cbp-spmenu-push">
	<div class="main-content">
		<?php include 'header.php'; 
$mid=$_GET['id']; ?>
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
						<h3 class="title1">Payment Info:
							<?php
						$query="select name,category_name,amount from category ,members where members.category_ref=category.category_id and members.member_id=$mid"; 
						$row = mysqli_fetch_array(mysqli_query($connect, $query));
						echo $row['name'].' ('.$row['category_name'].' - '.$row['amount'].')';
						?>
						</h3>
						<div class="form-three widget-shadow">
							<form class="form-horizontal" action="" method="post">
								<input type="hidden" name="mid" value="<?php echo $mid; ?>">
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Date</label>
									<div class="col-sm-8">
										<input type="date" name="date" class="form-control1" id="focusedinput" required>
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Amount</label>
									<div class="col-sm-8">
										<input type="number" name="amount" class="form-control1" id="focusedinput" placeholder="Enter Amount" required>
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Reciept No</label>
									<div class="col-sm-8">
										<input type="number" name="reciept" class="form-control1" id="focusedinput" placeholder="Enter Reciept No" required>
									</div>
								</div>
								<button type="submit" name="submit" class="btn btn-primary">Submit</button>
							</form>
						</div>
					</div>
					<div class="panel-body widget-shadow">
						<div class="table-responsive">
							
							<table id="myTable" class="table">
								<thead>
									<tr>
					 					<th></th>
										<th>Date</th>
										<th>Amount</th>
										<th>Remaining</th>
										<th></th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<?php
									$remaining=0;
									$query = "select apid as id,date,year,amount,'' as reciept_no,'out' as transc from annualpayment where member_ref=$mid UNION select appid as id,date,'' as year,amount,reciept_no,'in' as transc from annualpaymentpaid where member_ref=$mid order by date asc";
									$result = mysqli_query($connect, $query);  
									while($row = mysqli_fetch_array($result))  
								{ 
								  echo'<tr><td>';
								  if($row['transc']=='out'){
									  $remaining=$remaining-$row['amount'];
									  echo'Arrear Amount for year '.$row['year'].'';
								  }
								  if($row['transc']=='in'){
									$remaining=$remaining+$row['amount'];  
									echo' Amount Paid, Reciept No '.$row['reciept_no'].'';
								}
								  echo'</td>
								  <td>'.$row['date'].'</td>
								  <td>'.$row['amount'].'</td>
								  <td>'.$remaining.'</td>
								  <td>';
								  if($row['transc']=='in'){
								  echo'<input type="button" name="view" value="Edit" id="'.$row["id"].'" class="btn btn-primary  view_data" /> </td>
								  <td><form action="" method="post"><input type="hidden" name="piid" value=""><input type="submit" name="" class="btn btn-danger" onclick="return confirm(\'Are you sure you want to delete?\');" value="delete"></form>';
								  }
								  else{
									  echo'</td><td>';
								  }
								  echo'</td></tr>';
								}
								?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

		</div>

 <script>

$(document).ready(function() {
    $('#myTable').DataTable({
        "order": [[ 1, "asc" ]]
    } );
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
				<input type="submit" class="btn btn-success" onclick="return confirm('Are you sure you want to update?');" value="update" name="update">
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
           var employee_id = $(this).attr("id");  
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"select.php",
                     method:"POST",
                     data:{appid:employee_id},
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

	<!-- Classie -->
	<!-- for toggle left push menu script -->
	<script src="js/classie.js"></script>
	<script>
		var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
			showLeftPush = document.getElementById( 'showLeftPush' ),
			body = document.body;

		showLeftPush.onclick = function () {
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
	<!-- //Classie -->
	<!-- //for toggle left push menu script -->

	<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->

	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.js"> </script>

</body>
</html>