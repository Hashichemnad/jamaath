 <?php  
require 'db.php';
session_start();
if($_SESSION['loggedin']!=1)
    header('location:index.php');

if(isset($_POST["employee_id"]))  
{  
    $query = "SELECT * FROM members where member_id = ".$_POST['employee_id']."";  
    $result = mysqli_query($connect, $query);  
    $row = mysqli_fetch_array($result);
     $output = '';  
     $output .= '  
     <div class="table-responsive">  
          <table class="table table-bordered">';    
          $output .= '  
            <input type="hidden" name="member_id" class="form-control1" id="focusedinput" value="'.$row['member_id'].'">
               <tr>  <td>Name</td>
                    <td><input type="text" name="name" class="form-control1" id="focusedinput" value="'.$row['name'].'"></td>
               </tr> 
               <tr>  <td>Father Name</td>
                    <td><input type="text" name="fathername" class="form-control1" id="focusedinput" value="'.$row['father_name'].'"></td>
               </tr>
               <tr>  <td>Location</td>
                    <td><input type="text" name="location" class="form-control1" id="focusedinput" value="'.$row['location'].'"></td>
               </tr>
               <tr>  <td>Door No</td>
                    <td><input type="text" name="doorno" class="form-control1" id="focusedinput" value="'.$row['door_no'].'"></td>
               </tr>
               <tr>  <td>Mobile</td>
                    <td><input type="text" name="mobile" class="form-control1" id="focusedinput" value="'.$row['mobile'].'"></td>
               </tr>
               <tr>  <td>Register No</td>
                    <td><input type="text" name="registerno" class="form-control1" id="focusedinput" value="'.$row['register_no'].'"></td>
               </tr> ';  
     $output .= '  
          </table>  
     </div>  
     ';  
     echo $output;  
}

if(isset($_POST["submember_id"]))  
{  
    $query = "SELECT * FROM submember where submember_id = ".$_POST['submember_id']."";  
    $result = mysqli_query($connect, $query);  
    $row = mysqli_fetch_array($result);
     $output = '';  
     $output .= '  
     <div class="table-responsive">  
          <table class="table table-bordered">';    
          $output .= '  
            <input type="hidden" name="submember_id" class="form-control1" id="focusedinput" value="'.$row['submember_id'].'" required>
               <tr>  <td>Name</td>
                    <td><input type="text" name="name" class="form-control1" id="focusedinput" value="'.$row['name'].'" required></td>
               </tr> 
               <tr>  <td>Relation</td>
                    <td>
                    <select name="relation" class="form-control1" required>
                    <option selected value="'.$row['relation'].'">'.$row['relation'].'</option>
                    <option value="Father">Father</option>
                    <option value="Mother">Mother</option>
                    <option value="Husband">Husband</option>
                    <option value="Wife">Wife</option>
                    <option value="Son">Son</option>
                    <option value="Daughter">Daughter</option>
                    <option value="Brother">Brother</option>
                    <option value="Sister">Sister</option>
                    <option value="Other">Other</option>
                    </select>
                    </td>
               </tr>
               <tr>  <td>Contact</td>
                    <td><input type="text" name="contact" class="form-control1" id="focusedinput" value="'.$row['contact'].'"></td>
               </tr>
               ';  
     $output .= '  
          </table>  
     </div>  
     ';  
     echo $output;  
}

if(isset($_POST["category_id"]))  
{  
    $query = "SELECT * FROM category where category_id = ".$_POST['category_id']."";  
    $result = mysqli_query($connect, $query);  
    $row = mysqli_fetch_array($result);
     $output = '';  
     $output .= '  
     <div class="table-responsive">  
          <table class="table table-bordered">';    
          $output .= '  
            <input type="hidden" name="category_id" class="form-control1" id="focusedinput" value="'.$row['category_id'].'" required>
               <tr>  <td>category Name</td>
                    <td><input type="text" name="name" class="form-control1" id="focusedinput" value="'.$row['category_name'].'" required></td>
               </tr> 
               
               <tr>  <td>Amount</td>
                    <td><input type="text" name="amount" class="form-control1" id="focusedinput" value="'.$row['amount'].'"></td>
               </tr>
               ';  
     $output .= '  
          </table>  
     </div>  
     ';  
     echo $output;  
}

if(isset($_POST["appid"]))  
{  
    $query = "SELECT * FROM annualpaymentpaid where appid = ".$_POST['appid']."";  
    $result = mysqli_query($connect, $query);  
    $row = mysqli_fetch_array($result);
     $output = '';  
     $output .= '  
     <div class="table-responsive">  
          <table class="table table-bordered">';    
          $output .= '  
            <input type="hidden" name="appid" class="form-control1" id="focusedinput" value="'.$row['appid'].'" required>
               <tr>  <td>Reciept No</td>
                    <td><input type="text" name="reciept" class="form-control1" id="focusedinput" value="'.$row['reciept_no'].'"></td>
               </tr> 
               <tr>  <td>Date</td>
                    <td><input type="date" name="date" class="form-control1" id="focusedinput" value="'.$row['date'].'" required></td>
               </tr>
               <tr>  <td>Amount</td>
                    <td><input type="text" name="amount" class="form-control1" id="focusedinput" value="'.$row['amount'].'" required></td>
               </tr>
               ';  
     $output .= '  
          </table>  
     </div>  
     ';  
     echo $output;  
}

if(isset($_POST["wpid"]))  
{  
    $query = "SELECT * FROM workpayment where wpid = ".$_POST['wpid']."";  
    $result = mysqli_query($connect, $query);  
    $row = mysqli_fetch_array($result);
     $output = '';  
     $output .= '  
     <div class="table-responsive">  
          <table class="table table-bordered">';    
          $output .= '  
            <input type="hidden" name="wpid" class="form-control1" id="focusedinput" value="'.$row['wpid'].'" required>
               <tr>  <td>Reciept No</td>
                    <td><input type="text" name="reciept" class="form-control1" id="focusedinput" value="'.$row['reciept'].'"></td>
               </tr> 
               <tr>  <td>Date</td>
                    <td><input type="date" name="date" class="form-control1" id="focusedinput" value="'.$row['date'].'" required></td>
               </tr>
               <tr>  <td>Amount</td>
                    <td><input type="text" name="amount"';if($row['cash']==0){ $output.='disabled';} $output.=' class="form-control1" id="focusedinput" value="'.$row['amount'].'" required></td>
               </tr>
               <tr>  <td>Remarks</td>
                    <td><input type="text" name="remarks" class="form-control1" id="focusedinput" value="'.$row['remarks'].'" required></td>
               </tr>
               ';  
     $output .= '  
          </table>  
     </div>  
     ';  
     echo $output;  
}

if(isset($_POST["weid"]))  
{  
    $query = "SELECT * FROM workexpense where weid = ".$_POST['weid']."";  
    $result = mysqli_query($connect, $query);  
    $row = mysqli_fetch_array($result);
     $output = '';  
     $output .= '  
     <div class="table-responsive">  
          <table class="table table-bordered">';    
          $output .= '  
            <input type="hidden" name="weid" class="form-control1" id="focusedinput" value="'.$row['weid'].'" required>
               <tr>  <td>Reciept No</td>
                    <td><input type="text" name="reciept" class="form-control1" id="focusedinput" value="'.$row['bill_no'].'"></td>
               </tr> 
               <tr>  <td>Date</td>
                    <td><input type="date" name="date" class="form-control1" id="focusedinput" value="'.$row['date'].'" required></td>
               </tr>
               <tr>  <td>Amount</td>
                    <td><input type="text" name="amount" class="form-control1" id="focusedinput" value="'.$row['amount'].'" required></td>
               </tr>
               <tr>  <td>Remarks</td>
                    <td><input type="text" name="remarks" class="form-control1" id="focusedinput" value="'.$row['remarks'].'" required></td>
               </tr>
               ';  
     $output .= '  
          </table>  
     </div>  
     ';  
     echo $output;  
}

 ?>
 <script>


</script>