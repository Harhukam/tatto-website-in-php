<?php
require_once 'class.admin.php';
$user = new ADMIN();

if(empty($_GET['id']) && empty($_GET['code']))
{
	$user->redirect('index.php');
}

if(isset($_GET['id']) && isset($_GET['code']))
{
	$id = base64_decode($_GET['id']);
	$code = $_GET['code'];
	
	$stmt = $user->runQuery("SELECT * FROM tbl_admin WHERE adminID=:uid AND tokenCode=:token");
	$stmt->execute(array(":uid"=>$id,":token"=>$code));
	$rows = $stmt->fetch(PDO::FETCH_ASSOC);
	
	if($stmt->rowCount() == 1)
	{
		if(isset($_POST['btn-reset-pass']))
		{
			$pass = $_POST['pass'];
			$cpass = $_POST['confirm-pass'];
			
			if($cpass!==$pass)
			{
				$msg = "<div class='alert alert-block'>
						<button class='close' data-dismiss='alert'>&times;</button>
						<strong>Sorry!</strong>  Password Doesn't match. 
						</div>";
			}
			else
			{
				$password = md5($cpass);
				$stmt = $user->runQuery("UPDATE tbl_admin SET adminPass=:upass WHERE adminID=:uid");
				$stmt->execute(array(":upass"=>$password,":uid"=>$rows['adminID']));
				
				$msg = "<div class='alert alert-success'>
						<button class='close' data-dismiss='alert'>&times;</button>
						Password Changed.
						</div>";
				header("refresh:5;index.php");
			}
		}	
	}
	else
	{
		$msg = "<div class='alert alert-success'>
				<button class='close' data-dismiss='alert'>&times;</button>
				No Account Found, Try again
				</div>";
				
	}
	
	
}

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Password Reset</title>
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
  <body id="login">
    <div class="container">
    	<div style="height: 100px"></div>
    	<div class="col-sm-4"> </div>
    		<div class="col-sm-4">
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
    	<div class='alert alert-success'>
			<strong>Hello !</strong>  <?php echo $rows['adminName'] ?> you are here to reset your forgetton password.
		</div>
        <form class="form-signin" method="post">
        <h3 class="form-signin-heading">Password Reset.</h3><hr />
        <?php
        if(isset($msg))
		{
			echo $msg;
		}
		?>
		<div class="form-group">
        <input type="password" class="input-block-level" placeholder="New Password" name="pass" required />
    </div>
    <div class="form-group">
        <input type="password" class="input-block-level" placeholder="Confirm New Password" name="confirm-pass" required />
    </div>
     	<hr />
        <button class="btn btn-large btn-primary" type="submit" name="btn-reset-pass">Reset Your Password</button>
        
      </form>

    </div> <!-- /container -->
    <script src="../../ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="js/plugins/bootstrap/bootstrap.min.js"></script>
<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="js/plugins/popupoverlay/jquery.popupoverlay.js"></script>
<script src="js/plugins/popupoverlay/defaults.js"></script>
<script src="../../ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="js/plugins/popupoverlay/logout.js"></script>
<script src="js/plugins/hisrc/hisrc.js"></script>
<script src="js/flex.js"></script>
<script src="js/plugins/popupoverlay/logout.js"></script>
  </body>
</html>