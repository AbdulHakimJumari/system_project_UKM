<?php 
include_once 'database.php';
  
    $stmt = $conn->prepare("SELECT * FROM tbl_staffs_a172458_pt2 WHERE fld_staff_num = :sid AND fld_staff_password = :pass AND fld_staff_position = :pos");
    
    $stmt->bindParam(':sid', $sid, PDO::PARAM_STR);
    $stmt->bindParam(':pass', $pass, PDO::PARAM_STR);
    $stmt->bindParam(':pos', $pos, PDO::PARAM_STR);

    $sid=$_POST['sid'];
    $pass=$_POST['pass'];
    $pos=$_POST['pos'];
  
    $stmt->execute();
    $result = $stmt->fetchAll();
    $bil_row = $stmt->rowCount();
    
      if($bil_row > 0)
      {
        session_start();
        
        $_SESSION['fld_staff_num']=$sid;

        if ($_POST["pos"]=== "Supervisor") {
          # code...
          header("location:main_page.php");
        }
        else {
          # code...
          header("location:main_page_emp.php");
        }
          
        
      }
      else
      {
        header("location:index.php?login=failed");
      } 
?>