<?php
require('/controllers/fpdf.php');
include_once "/controllers/helpers.php";

$helper = new helpers();

$billno = $_GET["billno"];

class PDF extends FPDF
{
    function Header()
    {
        $this->SetFont('Arial','B',15);
        $this->Cell(60);
        $this->Cell(70,10,'New Oil Stores',1,0,'C');
        $this->Ln(20);
    }
    function LoadData($file)
    {
        $lines = file($file);
        $data = array();
        foreach($lines as $line)
        {
            $data[] = explode(';',trim($line));
        }
        return $data;
    }
    function ImprovedTable($header, $data)
    {
        $total = 0;
        $w = array(100, 25, 25, 25);
        for($i=0;$i<count($header);$i++)
        {
            $this->Cell($w[$i],7,$header[$i],1,0,'C');
        }
        $this->Ln();
        if($data!=null)
        {
            foreach($data as $row)
            {
                $this->Cell($w[0],10,$row['name'],'LR');
                $this->Cell($w[1],10,$row["price"],'LR');
                $this->Cell($w[2],10,number_format($row["qty"]),'LR',0,'R');
                $price = $row["qty"]*$row["price"];
                $total +=$price;
                $this->Cell($w[3],10,number_format($price),'LR',0,'R');
                $this->Ln();
            }
        }
        $this->Cell(array_sum($w),0,'','T');
        $this->printTotal($total);
    }
    function printTotal($total)
    {
        $this->Ln();
        $this->SetFont('Arial','',20);
        $this->Cell(0,20,'Total = '.$total);
    }
}

$pdf = new PDF();
$header = array('Item Name', 'Price', 'Quanity', 'Total');
$datas = $helper->getbill($billno);
$pdf->SetFont('Arial','',14);
$pdf->AddPage();
$pdf->Cell(100,15,'Bill No: '.$billno);
$date = strtotime($datas[0]['date']);
$pdf->Cell(0,15,'Date: '.date('d-F-Y',$date));
$pdf->Ln();
$pdf->ImprovedTable($header,$datas);
$pdf->Output("D",'Bill No: '.$billno.".pdf");
?>