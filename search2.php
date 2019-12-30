 <?php
  include_once 'products_crud.php';
  include_once 'database.php';
  include_once 'session.php';
?>
 
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>My Antiques | Search</title>
  <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  
</head>
<body>
   
  <?php include_once 'nav_bar.php'; ?>
 
<div class="container-fluid">
  <div class="row">
    <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
      <div class="page-header">
        <h2>Search</h2>
      </div>
    <table>
    <form method="post">
      <tr>
      <td> </td>
      <td> </td>
      </tr> <tr>

      <!--   Search 1 -->
      <!-- <td><select name="s1" class="form-control">
        <option value="FLD_PRODUCT_NAME">Product Name</option>
        <option value="FLD_TYPE">Brand</option>
        <option value="FLD_COLOUR">Colour</option>
        <option value="FLD_PRODUCT_NAME">Category</option>
        </select></td>
 -->
        <td><input name="st1" type="text" class="form-control" placeholder="Search keyword" required></td>
        <td>
       <input type="submit" class="form-control" name="search" value="Search" style="width: 80px; background-color: lightblue; "></td>
       
       </tr>
      </form>
      </table>
    </div>
  </div><br>

<!-- thumbnail -->
<div class="container">

 <div class="col-md-9">
 <div class="row">

  <?php

   $per_page = 2;
      if (isset($_GET["page"]))
        $page = $_GET["page"];
      else
        $page = 1;
      $start_from = ($page-1) * $per_page;
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("select * from tbl_products_a172458_pt2 LIMIT $start_from, $per_page");
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      ?>

 <?php
      if (isset($_POST['search']))
      {

      try {
        // $a=$_POST['s1'];
        $b=$_POST['st1'];
        
      
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("select * from tbl_products_a172458_pt2 where fld_product_price like '%$b%'  || fld_product_material like '%$b%'  || fld_product_name like '%$b%' || fld_product_name like '%$b%' ");
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $readrow) {
      ?> 
     
      <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail" style="height: 400px; position: relative;">
                           <img src="products/<?php echo $readrow['fld_product_image'] ?>" class="img-responsive" width="40%" height="15%">
                            <div class="caption">
                                <h4><a href="product_details2.php?pid=<?php echo $readrow['fld_product_num']; ?>"><?php echo $readrow['fld_product_name']; ?></a>
                                </h4><br>

                                <h4 class="pull-right">RM <?php echo $readrow['fld_product_price'];?></h4>
                                
                            </div>
                               <div class="ratings">
                               Condition : <?php echo $readrow['fld_product_condition']; ?> 
                            </div>
                            <div class="ratings">
                               Material : <?php echo $readrow['fld_product_material']; ?> 
                            </div>
                            <div class="ratings">
                               Year  : <?php echo $readrow['fld_product_year']; ?><br>
                           </div>
                            
                        </div>
                    </div>
      
     
 
     <?php }} ?>  

 </div>
  </div>
 
</div>
<!-- <div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <nav>
          <ul class="pagination">
              <?php
              try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare("SELECT * FROM tbl_products_a172458_pt2  ");
                $stmt->execute();
                $result = $stmt->fetchAll();
                $total_records = count($result);
              }
              catch(PDOException $e){
                    echo "Error: " . $e->getMessage();
              }
              $total_pages = ceil($total_records / $per_page);
              ?>

              <?php if ($page==1) { ?>
                <li class="disabled"><span aria-hidden="true">«</span></li>
              <?php } else { ?>
                <li><a href="testsearch.php?page=<?php echo $page-1 ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
              <?php
              }
              for ($i=1; $i<=$total_pages; $i++)
                if ($i == $page)
                  echo "<li class=\"active\"><a href=\"testsearch.php?page=$i\">$i</a></li>";
                else
                  echo "<li><a href=\"testsearch.php?page=$i\">$i</a></li>";
              ?>
              <?php if ($page==$total_pages) { ?>
                <li class="disabled"><span aria-hidden="true">»</span></li>

              <?php } else { ?>
                <li><a href="testsearch.php?page=<?php echo $page+1 ?>" aria-label="Previous"><span aria-hidden="true">»</span></a></li>
              <?php } ?>
        </ul>
      </nav>
    </div>
 </div>
 -->
     
   
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
 
</body>
</html>

       
