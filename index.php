<?php
include_once 'database.php';
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>My Antiques : Home</title>
  <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
      html {
        width:100%;
        height:100%;
        background-color: #ffff;
        min-height:50%;
      }
    </style>
</head>
<body>

 <?php include_once 'nav_bar_login.php'; ?>

 <h3><center><b><i>STAFF LOGIN</i></b></center></h3>
 <center><img src="logo2.png" width="500" height="500"></center>
<?php if($_GET['login']=="failed"){ ?>
  <h5><center><b><i><font color="red">Unsuccessful Login.</font></i></b></center></h5>
<?php } ?>
  <form action="login.php" method="post" class="form-horizontal">
    <div class="form-group">
      <div class="col-sm-2 col-sm-offset-5 control-label">
        <input name="sid" type="text" class="form-control" placeholder="Staff ID" required />
      </div>
        </div>
    <div class="form-group">
      <div class="col-sm-2 col-sm-offset-5 control-label">
        <input name="pass" type="password" class="form-control" placeholder="Password"required />
      </div>
    </div>

    <div class="form-group">
          <label for="position" class="col-sm-1 col-sm-offset-4 control-label"></label>
          <div></div>
          <div class="col-sm-2">
        </div>
        </div>

        <div class="form-group">
          <label for="position" class="col-sm-1 col-sm-offset-4 control-label"></label>
          <div></div>
          <div class="col-sm-2">
         <select name="pos" class="form-control" id="position" required>
            <option value="">Please select</option>
            <option value="Supervisor">Supervisor</option>
            <option value="Employee"required >Employee</option>
          </select>
        </div>
        </div>     
     
         <div class="form-group">
          <div class="col-sm-2 col-sm-offset-5">
      <center><button type="submit" style="color: #154360"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>  Login</button><center>
      </div>
    </div>
  </form>
</font>
<br><hr/><br>

 	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>