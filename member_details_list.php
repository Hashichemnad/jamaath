<?php
require 'db.php';
session_start();
if($_SESSION['loggedin']!=1 && $_SESSION['agent_id']==1)
    header('location:index.php');

$name=$_POST['name'];
$mobile=$_POST['mobile'];
$whatsapp=$_POST['whatsapp'];
$email=$_POST['email'];
$shopname=$_POST['gender'];
$pan=$_POST['dob'];
$date=$_POST['date'];
$from_date=$_POST['fromdate'];
$to_date=$_POST['todate'];
$file = "jobseeker_details_list.xlsx";

require('libs/SimpleXLSXGen.php');

$head="Id";
if(isset($_POST['name']))
    $head.=", Name";
if(isset($_POST['mobile']))
    $head.=", Contact";
if(isset($_POST['whatsapp']))
    $head.=", Whatsapp";
if(isset($_POST['email']))
    $head.=", Email";
if(isset($_POST['gender']))
    $head.=", Gender";
if(isset($_POST['dob']))
    $head.=", DOB";
if(isset($_POST['date']))
    $head.=", Registered";



$books=[];
$content=explode(", ",$head);
// $content = array($head);
array_push($books,$content);

if($_POST['gender']=='all'){
    $query_search="select * from jobseeker;";
    if($_POST['fromdate']!='' && $_POST['todate']!=''){
        $query_search="select * from jobseeker where datetime between '".$from_date."' and '".$to_date."';";
    }
}
if($_POST['gender']=='male'){
    $query_search="select * from jobseeker where gender LIKE 'male';";
    if($_POST['fromdate']!='' && $_POST['todate']!=''){
        $query_search="select * from jobseeker where gender LIKE 'male' and datetime between '".$from_date."' and '".$to_date."';";
    }
    
}
if($_POST['female']=='female'){
    $query_search="select * from jobseeker where gender LIKE 'female';";
    if($_POST['fromdate']!='' && $_POST['todate']!=''){
        $query_search="select * from jobseeker where gender LIKE 'female' and datetime between '".$from_date."' and '".$to_date."';";
    }
}
if($_POST['other']=='others'){
    $query_search="select * from jobseeker where gender LIKE 'others';";
    if($_POST['fromdate']!='' && $_POST['todate']!=''){
        $query_search="select * from jobseeker where gender LIKE 'others' and datetime between '".$from_date."' and '".$to_date."';";
    }
}

    $result = mysqli_query($connect, $query_search);  
    while($row = mysqli_fetch_array($result)){
        $query_word=$row['jobseeker_id'];
        if(isset($_POST['name']))
            $query_word.=",".$row['jobseeker_name'];
        if(isset($_POST['mobile']))
            $query_word.=",".$row['mobile'];
        if(isset($_POST['whatsapp']))
            $query_word.=",".$row['whatsapp'];
        if(isset($_POST['email']))
            $query_word.=",".$row['email'];
        if(isset($_POST['gender']))
            $query_word.=",".$row['gender'];
        if(isset($_POST['dob']))
            $query_word.=",".$row['dob'];
        if(isset($_POST['date']))
            $query_word.=",".$row['datetime'];
        $content=explode(",",$query_word);
        // $content = array($query_word);
        array_push($books,$content);
    }

$xlsx = SimpleXLSXGen::fromArray( $books );
$xlsx->downloadAs($file);
?>