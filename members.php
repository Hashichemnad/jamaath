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
<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
if (isset($_POST['update'])) { 
	$member_id = $mysqli->escape_string($_POST['member_id']);
	$name = $mysqli->escape_string($_POST['name']);
   $father_name = $mysqli->escape_string($_POST['fathername']);
   $location = $mysqli->escape_string($_POST['location']);
   $door_no = $mysqli->escape_string($_POST['doorno']);
   $mobile = $mysqli->escape_string($_POST['mobile']);
   $register_no = $mysqli->escape_string($_POST['registerno']);
   $query="UPDATE members set name='$name',father_name='$father_name',location='$location',door_no='$door_no',mobile='$mobile',register_no='$register_no' where member_id=$member_id";
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
		<a href="membersreport.php" style="float: left;"><input type="button" name="view" value="Print Members" class="btn btn-default" /></a>
		<a href="membersnew.php" style="float: right;"><input type="button" name="view" value="New Member" class="btn btn-primary" /></a><br>
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
				<h2 class="title1">Members</h2>
					<div class="panel-body widget-shadow">
					<div class="table-responsive">
					<p id="msg"></p>
						<table id="myTable" class="table">
							<thead>
								<tr>
								  <th>Reg.No</th>
								  <th>Name</th>
								  <th>Father</th>
								  <th>Door.No</th>
								  <th>Contact</th>
								  <th>Category</th>
								  <th></th>
								</tr>
							</thead>
							<tbody>
								<?php
									$query = "SELECT * FROM members,category where members.category_ref=category.category_id";  
									$result = mysqli_query($connect, $query);  
									while($row = mysqli_fetch_array($result))  
								{
								  echo'<tr><td>'.$row['register_no'].'</td>
								  <td><a href="submembers.php?mid='.$row['member_id'].'">'.$row['name'].'</a></td>
								  <td>'.$row['father_name'].'</td>
								  <td>'.$row['door_no'].'</td>
								  <td>'.$row['mobile'].'</td>
								  <td>'.$row['category_name'].' - '.$row['amount'].'</td>
								  <td>
								  <input type="button" name="view" value="Edit" id="'.$row["member_id"].'" class="btn btn-primary  view_data" /> 
								  <form action="" method="post"><input type="hidden" name="id" value=""><input type="submit" onclick="return confirm(\'Are you sure you want to delete?\');" name="" class="btn btn-danger" value="delete"></form>
								  </td></tr>';
								}
								?>
				
							</tbody>
						</table>
					</div></div>
			
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
           var employee_id = $(this).attr("id");  
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"select.php",
                     method:"POST",
                     data:{employee_id:employee_id},
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
