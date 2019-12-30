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
  <title>My Antiques : Products</title>
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

  <?php include_once 'nav_bar_emp.php'; ?>
 

<div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <div class="page-header">
        <h2>Products List</h2>
      </div>
      <table class="table table-striped table-bordered">
        <tr>
          <th>Product ID</th>
          <th>Name</th>
          <th>Price</th>
          <th>Material</th>
          <th>Condition</th>
          <th>Year</th>
          <th>Quantity</th>
          <th></th>
      </tr>
     <?php
      // Read
     $per_page = 5;
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
      foreach($result as $readrow) {
      ?>   
      <tr>
        <td><?php echo $readrow['fld_product_num']; ?></td>
        <td><?php echo $readrow['fld_product_name']; ?></td>
        <td><?php echo $readrow['fld_product_price']; ?></td>
        <td><?php echo $readrow['fld_product_material']; ?></td>
        <td><?php echo $readrow['fld_product_condition']; ?></td>
        <td><?php echo $readrow['fld_product_year']; ?></td>
        <td><?php echo $readrow['fld_product_quantity']; ?></td>
        <td>
          <!-- <a href="products_details_emp.php?pid=<?php echo $readrow['fld_product_num']; ?>" class="btn btn-warning btn-xs" role="button">Details</a> -->
          <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#detail<?php echo $readrow['fld_product_num'] ?>">
                                    Details
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="detail<?php echo $readrow['fld_product_num']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel"><?php echo $readrow['fld_product_name']; ?> Details</h4>
                                            </div>
                                            <div class="modal-body">
                                                <img src="products/<?php echo $readrow['fld_product_image']; ?>" class="img-responsive">
                                                <div class="form-group">
                                                    <label for="text">Name:</label>
                                                    <input type="text" class="form-control" id="text" value="<?php echo $readrow['fld_product_name']; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="text">Price:</label>
                                                    <input type="text" class="form-control" id="text" value="<?php echo $readrow['fld_product_price']; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="text">Year:</label>
                                                    <input type="text" class="form-control" id="text" value="<?php echo $readrow['fld_product_year']; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="text">Material:</label>
                                                    <input type="text" class="form-control" id="text" value="<?php echo $readrow['fld_product_material']; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="text">Condition:</label>
                                                    <input type="text" class="form-control" id="text" value="<?php echo $readrow['fld_product_condition']; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="text">Quantity:</label>
                                                    <input type="text" class="form-control" id="text" value="<?php echo $readrow['fld_product_quantity']; ?>">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
        </td>
      </tr>
      <?php
      }
      $conn = null;
      ?>
 
    </table>
     </div>
     <div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <nav>
          <ul class="pagination">
          <?php
          try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM tbl_products_a172458_pt2");
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
            <li><a href="products_emp.php?page=<?php echo $page-1 ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
          <?php
          }
          for ($i=1; $i<=$total_pages; $i++)
            if ($i == $page)
              echo "<li class=\"active\"><a href=\"products_emp.php?page=$i\">$i</a></li>";
            else
              echo "<li><a href=\"products_emp.php?page=$i\">$i</a></li>";
          ?>
          <?php if ($page==$total_pages) { ?>
            <li class="disabled"><span aria-hidden="true">»</span></li>
          <?php } else { ?>
            <li><a href="products_emp.php?page=<?php echo $page+1 ?>" aria-label="Previous"><span aria-hidden="true">»</span></a></li>
          <?php } ?>
        </ul>
      </nav>
    </div>
  </div>
</div>
   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>