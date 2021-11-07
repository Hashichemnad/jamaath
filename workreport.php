<?php
require "db.php";

$id=$_GET['id'];

require('libs/fpdf.php');
class PDF extends FPDF
{
    function Header()
    {
        
        $this->SetFont('Times','',15);
        $this->Cell(60);
        $this->Cell(100,5,'Masjid',0,0,'L');
        $this->SetFont('Times','',10);
        $this->Cell(30,5,'Original',1,1,'C');
        
    }
}
$pdf = new PDF('P','mm','A4'); 
$pdf->AddPage();

$pdf->Cell(58, 5, '', 0, 1);
$pdf->Cell(58, 5, '', 0, 1);

$pdf->SetFont('Times','B',12);
$pdf->SetFillColor(5,100,155);
$pdf->SetTextColor(255,255,255);
$count="select * from works where work_id=".$id."";
foreach ($dbo->query($count) as $row) {
$pdf->Cell(70,15,$row['date'],0,0,'C',true);
$pdf->Cell(120,15,$row['work_name'],0,1,'L',true);
$pdf->Cell(0,15,$row['description'],0,1,'C',true);
}
$pdf->Cell(58, 5, '', 0, 1);
$pdf->SetFont('Arial','B',10);
$pdf->SetFillColor(220,220,220);
$pdf->SetTextColor(0,0,0);

// Header starts /// 

$pdf->Cell(0,10,'Payment In',1,1,'C',true);
$pdf->Cell(30,10,' Reciept No',1,0,'L',true);
$pdf->Cell(50,10,' Name',1,0,'L',true);
$pdf->Cell(25,10,' Date',1,0,'C',true);
$pdf->Cell(20,10,' Amount',1,0,'C',true);
$pdf->Cell(65,10,' Remarks',1,1,'L',true);

//// header ends ///////

$pdf->SetFont('Arial','',9);
$pdf->SetFillColor(235,236,236); 
$fill=false;
$totalin=0;
$count="select * from workpayment where work_ref=".$id." order by date asc";
foreach ($dbo->query($count) as $row) {
$pdf->Cell(30,10,$row['reciept'],0,0,'L',$fill);
$pdf->Cell(50,10,$row['name'],0,0,'L',$fill);
$pdf->Cell(25,10,$row['date'],0,0,'C',$fill);
$pdf->Cell(20,10,$row['amount'],0,0,'C',$fill);
$pdf->Cell(65,10,$row['remarks'],0,1,'L',$fill);
$totalin=$totalin+$row['amount'];
$fill = !$fill;
}
/// end of records /// 

$pdf->Cell(0,10,'',0,1,'R',true);
$pdf->Cell(90,10,'',0,0,'R',true);
$pdf->Cell(50,10,'Total',TB,0,'L',true);
$pdf->Cell(50,10,'Rs. '.$totalin,TB,1,'L',true);

$pdf->Cell(58, 5, '', 0, 1);
$pdf->SetFont('Arial','B',10);
$pdf->SetFillColor(220,220,220);
$pdf->SetTextColor(0,0,0);

// Header starts /// 

$pdf->Cell(0,10,'Payment Out',1,1,'C',true);
$pdf->Cell(40,10,' Reciept No',1,0,'L',true);
$pdf->Cell(40,10,' Date',1,0,'C',true);
$pdf->Cell(35,10,' Amount',1,0,'C',true);
$pdf->Cell(75,10,' Remarks',1,1,'L',true);

//// header ends ///////

$pdf->SetFont('Arial','',9);
$pdf->SetFillColor(235,236,236); 
$fill=false;
$totalout=0;
$count="select * from workexpense where work_ref=".$id." order by date asc";
foreach ($dbo->query($count) as $row) {
$pdf->Cell(40,10,$row['bill_no'],0,0,'L',$fill);
$pdf->Cell(40,10,$row['date'],0,0,'C',$fill);
$pdf->Cell(35,10,$row['amount'],0,0,'C',$fill);
$pdf->Cell(75,10,$row['remarks'],0,1,'L',$fill);
$totalout=$totalout+$row['amount'];
$fill = !$fill;
}
/// end of records /// 

$pdf->Cell(0,10,'',0,1,'R',true);
$pdf->Cell(90,10,'',0,0,'R',true);
$pdf->Cell(50,10,'Total',TB,0,'L',true);
$pdf->Cell(50,10,'Rs. '.$totalout,TB,1,'L',true);

$pdf->Cell(0,10,'',0,1,'R',);
$pdf->Cell(0,10,'',0,1,'R',);
$pdf->Cell(50,10,'',0,0,'R',);
$pdf->Cell(70,10,'Payment In Total',TB,0,'C',);
$pdf->Cell(70,10,'Rs. '.$totalin,TB,1,'C',);
$pdf->Cell(50,10,'',0,0,'R',);
$pdf->Cell(70,10,'Payment Out Total',TB,0,'C',);
$pdf->Cell(70,10,'Rs. '.$totalout,TB,1,'C',);
$pdf->Cell(50,10,'',0,0,'R',true);
$pdf->Cell(70,10,'Remaining Amount',TB,0,'C',true);
$pdf->Cell(70,10,'Rs. '.($totalin-$totalout),TB,1,'C',true);

$pdf->Output();
?>