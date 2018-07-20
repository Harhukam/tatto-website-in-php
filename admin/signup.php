<?php
session_start();
require_once 'class.admin.php';

$reg_user = new ADMIN();

if($reg_user->is_logged_in()!="")
{
$reg_user->redirect('index.php');
}


if(isset($_POST['btn-signup']))
{
	$uname = trim($_POST['txtuname']);
	$email = trim($_POST['txtemail']);
	$upass = trim($_POST['txtpass']);
	$code = md5(uniqid(rand()));
	$pic = trim($_POST['txtpic']);
	
	$stmt = $reg_user->runQuery("SELECT * FROM tbl_admin WHERE adminEmail=:email_id");
	$stmt->execute(array(":email_id"=>$email));
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	
	if($stmt->rowCount() > 0)
	{
		$msg = "
		      <div class='alert alert-error'>
				<button class='close' data-dismiss='alert'>&times;</button>
					<strong>Sorry !</strong>  email allready exists , Please Try another one
			  </div>
			  ";
	}
	else
	{
		if($reg_user->register($uname,$email,$upass,$code,$pic))
		{			
			$id = $reg_user->lasdID();		
			$key = base64_encode($id);
			$id = $key;
			
			$message = "					
						Hello $uname,
						<br /><br />
						Welcome to Coding Cage!<br/>
						To complete your registration  please , just click following link<br/>
						<br /><br />
						<a href='http://localhost/pdo/admin/verify.php?id=$id&code=$code'>Click HERE to Activate :)</a>
						<br /><br />
						Thanks,";
						
			$subject = "Accept admin postion";
						
			$reg_user->send_mail($email,$message,$subject);	
			$msg = "
					<div class='alert alert-success'>
						<button class='close' data-dismiss='alert'>&times;</button>
						<strong>Success!</strong>  We've sent an email to $email.
                    Please click on the confirmation link in the email to create your account. 
			  		</div>
					";
		}
		else
		{
			echo "sorry , Query could no execute...";
		}		
	}
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Signup private</title>
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
    	<div class="row">
    		<div class="col-sm-4"> </div>
    		<div class="col-sm-4" >
    			<div style="height: 100px;"></div>
    	<div class="portlet portlet-red">
<div class="portlet-heading login-heading">
<div class="portlet-title">
<h4>Sign Up</h4>
</div>

<div class="clearfix"></div>
</div>
<div class="portlet-body">
	   <?php if(isset($msg)) echo $msg;  ?>
      <form class="form-signin" method="post">
        <div class="form-group">
        <input type="text" class="input-block-level form-control" placeholder="Username" name="txtuname" required />
    </div>
    <div class="form-group">
        <input type="email" class="input-block-level form-control" placeholder="Email address" name="txtemail" required />
    </div>
    <div class="form-group">
        <input type="password" class="input-block-level form-control" placeholder="Password" name="txtpass" required />
        <input type="hidden" name="txtpic" value="000000.png">
    </div>
     	<hr />
        <button class="btn btn-large btn-red " align="right" type="submit" name="btn-signup">Sign Up</button>
        <a href="index.php" style="float:right;" >Sign In</a>
      </form>
 </div>
 <div class="col-sm-4"> </div>
  </div>
</div>
</div>
    </div> <!-- /container -->
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