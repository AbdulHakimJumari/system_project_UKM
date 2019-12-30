<?php
include_once 'db.php';
session_start();

	$sid = $_SESSION['fld_staff_num'];
	
	$stmt = $conn->prepare("SELECT * FROM tbl_staffs_a172458_pt2 WHERE fld_staff_num = '$sid'");

	$stmt->execute();
	
	$readrow = $stmt->fetch(PDO::FETCH_ASSOC);
	
$name = $readrow['fld_staff_fname'];
$pos = $readrow['fld_staff_position'];

		
if($sid==''){
	header("location:index.php?login");
	}
	else {
	header("");
	}
?>