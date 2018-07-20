<?php

session_start();
require_once 'class.admin.php';
$admin_login = new ADMIN();

if($admin_login->is_logged_in()!="")
{
$admin_login->redirect('home.php');
}

if(isset($_POST['btn-login']))
{
$email = trim($_POST['txtemail']);
$upass = trim($_POST['txtupass']);

if($admin_login->login($email,$upass))
{
$admin_login->redirect('home.php');
}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="admin login">
<meta name="author" content="Ambition Institiute host">
<title>Admin Login</title>
<link href="css/plugins/pace/pace.css" rel="stylesheet">
<script src="js/plugins/pace/pace.js"></script>
<link href="css/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700,300italic,400italic,500italic,700italic' rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel="stylesheet" type="text/css">
<link href="icons/font-awesome/css/font-awesome.min.css" rel="stylesheet"><script type="text/javascript" src='http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.3.min.js'></script>
<link href="css/style.css" rel="stylesheet">
<link href="css/plugins.css" rel="stylesheet">
<link href="css/demo.css" rel="stylesheet">
</head>
<body style="background-image: url('img/bc.jpg') !important;
   background-color: #cccccc; height: 100%;">
<div class="container">
<div class="row">
<div class="col-md-4 col-md-offset-4 shedowlogin">
<div class="login-banner text-center ">
<h1><i class="fa fa-user"></i> Admin LogIn</h1>
</div>
<div class="portlet portlet-red">
<div class="portlet-heading login-heading">
<div class="portlet-title">
<!-- <h4>Admin Area!</h4> -->
</div>
<div class="portlet-widgets">
<!-- <button class="btn btn-white btn-xs"><i class="fa fa-plus-circle"></i> New User</button> -->
</div>
<div class="clearfix"></div>
</div>
<div class="portlet-body">
<!-- <form accept-charset="UTF-8" role="form"> -->
<?php 
if(isset($_GET['inactive']))
{
?>
<div class='alert alert-error'>
<button class='close' data-dismiss='alert'>&times;</button>
<strong>Sorry!</strong> This Account is not Activated Go to your Inbox and Activate it. 
</div>
<?php
}
?>

<form class="form-signin" method="post">
<?php
if(isset($_GET['error']))
{
?>
<div class='alert alert-warning'>
<button class='close' data-dismiss='alert'>&times;</button>
<strong>Invalid UserName Password!</strong> 
</div>
<?php
}
?>
<fieldset>
<div class="form-group">
<input class="form-control" placeholder="E-mail"  type="email" name="txtemail" required />
</div>
<div class="form-group">
<input class="form-control" placeholder="Password"  type="password" required="required" name="txtupass" required />
</div>
<!-- <div class="checkbox">
<label>
<input name="remember" type="checkbox" value="Remember Me">Remember Me
</label>
</div> -->
<br>
<input type="submit" value="LogIn" name="btn-login" class=" btn btn-lg btn-red btn-block" />
<hr />

</fieldset>
<br>
<a href="signup.php" style="float:right;" >Sign Up</a>
<p class="small">
<a href="fpass.php">lost your password?</a>
</p>
</form>
</div>
</div>
</div>
</div>
</div>
<script src="../../ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="js/plugins/bootstrap/bootstrap.min.js"></script>
<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="js/plugins/popupoverlay/jquery.popupoverlay.js"></script>
<script src="js/plugins/popupoverlay/defaults.js"></script>
<script src="js/plugins/popupoverlay/logout.js"></script>
<script src="js/plugins/hisrc/hisrc.js"></script>
<script src="js/flex.js"></script>
<script src="js/plugins/popupoverlay/logout.js"></script>
</body>
</html>
