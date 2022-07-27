
<?php
require_once("dbcontroller.php");
$db_handle = new DBController();

 if(isset($_GET["action"]))
		  {
			if(isset($_GET['from_date']) && isset($_GET['to_date'])) 
		  
			  $date1=$_GET['from_date'];

			  $date2=$_GET['to_date'];

			  $result = $db_handle->runQuery("select * from tbl_attendance where attendance_date BETWEEN '$date1' AND '$date2'");
		  
			  $header = $db_handle->runQuery("SELECT `COLUMN_NAME` 
			  FROM `INFORMATION_SCHEMA`.`COLUMNS` 
			  WHERE `TABLE_SCHEMA`='attendance' 
				  AND `TABLE_NAME`='tbl_attendance'");
	
	require('FPDF/fpdf.php');
	$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',12);		
	foreach($header as $heading) {
		foreach($heading as $column_heading)
			$pdf->Cell(40,10,$column_heading,1);
	}
	foreach($result as $row) {
		$attendance_id = $row['attendance_id'];
		$student_id = $row['student_id'];
		$attendance_status = $row['attendance_status'];
		$attendance_date = $row['attendance_date'];
		$teacher_id =$row['teacher_id'];
		$pdf->Cell(40,10,$attendance_id,1);
		$pdf->Cell(40,10,$student_id,1);
		$pdf->Cell(40,10,$attendance_status,1);
		$pdf->Cell(40,10,$attendance_date,1);
		$pdf->Cell(40,10,$teacher_id,1);
		$pdf->Ln();

	}
	$pdf->Output();
}
	?>