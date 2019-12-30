<?php
 
include_once 'db.php';
 
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
//Create
if (isset($_POST['create'])) {
 
  try {
 
    $stmt = $conn->prepare("INSERT INTO tbl_staffs_a172458_pt2(fld_staff_num, fld_staff_fname, fld_staff_lname,
      fld_staff_gender, fld_staff_phone, fld_staff_email, fld_staff_position) VALUES(:sid, :sfname, :slname, :sgender,
      :sphone, :smail, :pos)");
   
    $stmt->bindParam(':sid', $sid, PDO::PARAM_STR);
    $stmt->bindParam(':sfname', $sfname, PDO::PARAM_STR);
    $stmt->bindParam(':slname', $slname, PDO::PARAM_STR);
    $stmt->bindParam(':sgender', $sgender, PDO::PARAM_STR);
    $stmt->bindParam(':sphone', $sphone, PDO::PARAM_STR);
    $stmt->bindParam(':smail', $smail, PDO::PARAM_STR);
    $stmt->bindParam(':pos', $pos, PDO::PARAM_STR);
       
    $sid = $_POST['sid'];
    $sfname = $_POST['sfname'];
    $slname = $_POST['slname'];
    $sgender =  $_POST['sgender'];
    $sphone = $_POST['sphone'];
    $smail = $_POST['smail'];
    $pos = $_POST['pos'];
         
    $stmt->execute();
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Update
if (isset($_POST['update'])) {
   
  try {
 
    $stmt = $conn->prepare("UPDATE tbl_staffs_a172458_pt2 SET
      fld_staff_num = :sid, fld_staff_fname = :sfname,
      fld_staff_lname = :slname, fld_staff_gender = :sgender,
      fld_staff_phone = :sphone, fld_staff_email = :smail, fld_staff_position = :pos
      WHERE fld_staff_num = :oldsid");
   
    $stmt->bindParam(':sid', $sid, PDO::PARAM_STR);
    $stmt->bindParam(':sfname', $sfname, PDO::PARAM_STR);
    $stmt->bindParam(':slname', $slname, PDO::PARAM_STR);
    $stmt->bindParam(':sgender', $sgender, PDO::PARAM_STR);
    $stmt->bindParam(':sphone', $sphone, PDO::PARAM_STR);
    $stmt->bindParam(':smail', $smail, PDO::PARAM_STR);
    $stmt->bindParam(':pos', $pos, PDO::PARAM_STR);
    $stmt->bindParam(':oldsid', $oldsid, PDO::PARAM_STR);
       
    $sid = $_POST['sid'];
    $sfname = $_POST['sfname'];
    $slname = $_POST['slname'];
    $sgender =  $_POST['sgender'];
    $sphone = $_POST['sphone'];
    $smail = $_POST['smail'];
    $pos = $_POST['pos'];
    $oldsid = $_POST['oldsid'];
         
    $stmt->execute();
 
    header("Location: staffs.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Delete
if (isset($_GET['delete'])) {
 
  try {
 
    $stmt = $conn->prepare("DELETE FROM tbl_staffs_a172458_pt2 where fld_staff_num = :sid");
   
    $stmt->bindParam(':sid', $sid, PDO::PARAM_STR);
       
    $sid = $_GET['delete'];
     
    $stmt->execute();
 
    header("Location: staffs.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Edit
if (isset($_GET['edit'])) {
   
  try {
 
    $stmt = $conn->prepare("SELECT * FROM tbl_staffs_a172458_pt2 where fld_staff_num = :sid");
   
    $stmt->bindParam(':sid', $sid, PDO::PARAM_STR);
       
    $sid = $_GET['edit'];
     
    $stmt->execute();
 
    $editrow = $stmt->fetch(PDO::FETCH_ASSOC);
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
  $conn = null;
 
?>