<?php
require "db.php";

$member_id=$_POST['member_id'];
require('libs/fpdf.php');
class PDF extends FPDF
{
    
}
$pdf = new PDF('P','mm','A4'); 
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->Cell(0, 15, '', 0, 1);
$pdf->SetFont('Times','BU',25);
$pdf->SetFillColor(5,100,155);
$pdf->SetTextColor(255,255,255);
$pdf->Cell(0,15,'MEMBER DETAILS',0,1,'C',true);


$pdf->Cell(0, 10, '', 0, 1);
$pdf->SetFont('Times','B',11);
$pdf->SetFillColor(255,255,255);
$pdf->SetTextColor(0,0,0);

$count="SELECT * from members,category WHERE members.member_id=$member_id and members.category_ref=category.category_id ";

foreach($dbo->query($count) as $value){

$pdf->Cell(90,9,'Register No :'.$value['register_no'],0,0,'L');
$pdf->Cell(90,9,'Name :'.$value['name'],0,1,'L');
$pdf->Cell(90,9,'Father :'.$value['father_name'],0,0,'L');
$pdf->Cell(90,9,'Contact :'.$value['mobile'],0,1,'L');
$pdf->Cell(90,9,'Location :'.$value['location'],0,0,'L');
$pdf->MultiCell(100,9,'Door No : '.$value['door_no'].'',0,1,'J');
$pdf->Cell(100,9,'Category :'.$value['category_name'].' - '.$value['amount'],0,1,'L');

}

$pdf->SetFont('Times','B',11);
$pdf->Cell(200,9,'Family Members ',0,1,'C');

$pdf->Cell(70,9,'Name ',1,0,'L');
$pdf->Cell(60,9,'Relation ',1,0,'L');
$pdf->Cell(60,9,'Contact ',1,1,'L');
$pdf->SetFont('Times','',11);
$count="SELECT * from submember WHERE member_ref=$member_id ";

foreach($dbo->query($count) as $value){

$pdf->Cell(70,9,$value['name'],1,0,'L');
$pdf->Cell(60,9,$value['relation'],1,0,'L');
$pdf->Cell(60,9,$value['contact'],1,1,'L');

}



/// end of records /// 

$pdf->Output('i','merchant_report.pdf');
?>