<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="main_page.php">MyAntiques</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

   <?php if($name!="" && $pos!=""){ ?>
    <ul class="glyphicon glyphicon navbar-right" align="center">
      <h4><span aria-hidden="true"></span> <?php echo $pos;?> : <?php echo $name; ?></h4>
    </ul>

<?php }?>

    <ul class="nav navbar-nav">
    </ul>
      <ul class="nav navbar-nav navbar-right">
            <li><a href="main_page_emp.php">Home</a></li>
            <li><a href="products_emp.php">Products</a></li>
            <li><a href="customers_emp.php">Customers</a></li>
            <li><a href="staffs_emp.php">Staffs</a></li>
            <li><a href="orders_emp.php">Orders</a></li>
            <li><a href="search.php">Search</a></li>
            <li><a href="logout.php">Logout </a></li>
          </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>