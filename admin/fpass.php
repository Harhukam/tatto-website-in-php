<?php
session_start();
require_once 'class.admin.php';
$user = new ADMIN();

if($user->is_logged_in()!="")
{
	$user->redirect('home.php');
}

if(isset($_POST['btn-submit']))
{
	$email = $_POST['txtemail'];
	
	$stmt = $user->runQuery("SELECT adminID FROM tbl_admin WHERE adminEmail=:email LIMIT 1");
	$stmt->execute(array(":email"=>$email));
	$row = $stmt->fetch(PDO::FETCH_ASSOC);	
	if($stmt->rowCount() == 1)
	{
		$id = base64_encode($row['adminID']);
		$code = md5(uniqid(rand()));
		
		$stmt = $user->runQuery("UPDATE tbl_admin SET tokenCode=:token WHERE adminEmail=:email");
		$stmt->execute(array(":token"=>$code,"email"=>$email));
		
		$message= "
				   Hello , $email
				   <br /><br />
				   We got requested to reset your password, if you do this then just click the following link to reset your password, if not just ignore                   this email,
				   <br /><br />
				   Click Following Link To Reset Your Password 
				   <br /><br />
				   <a href='http://localhost/signup/resetpass.php?id=$id&code=$code'>click here to reset your password</a>
				   <br /><br />
				   thank you :)
				   ";
		$subject = "Password Reset";
		
		$user->send_mail($email,$message,$subject);
		
		$msg = "<div class='alert alert-success'>
					<button class='close' data-dismiss='alert'>&times;</button>
					We've sent an email to $email.
                    Please click on the password reset link in the email to generate new password. 
			  	</div>";
	}
	else
	{
		$msg = "<div class='alert alert-danger'>
					<button class='close' data-dismiss='alert'>&times;</button>
					<strong>Sorry!</strong>  this email not found. 
			    </div>";
	}
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Forgot Password</title>
   <link href="blackportal/css/plugins/pace/pace.css" rel="stylesheet">
<script src="blackportal/js/plugins/pace/pace.js"></script>
<link href="blackportal/css/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700,300italic,400italic,500italic,700italic' rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel="stylesheet" type="text/css">
<link href="blackportal/icons/font-awesome/css/font-awesome.min.css" rel="stylesheet"><script type="text/javascript" src='http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.3.min.js'></script>
<link href="blackportal/css/style.css" rel="stylesheet">
<link href="blackportal/css/plugins.css" rel="stylesheet">
<link href="blackportal/css/demo.css" rel="stylesheet">
  </head>
  <body id="login">
    <div class="container">
<div class="col-sm-4"> </div>
    		<div class="col-sm-4">
    			<div style="height: 100px"></div>
 <div class="portlet portlet-red">
<div class="portlet-heading login-heading">
<div class="portlet-title">
<h4>Forgot Password!</h4>
</div>
<div class="portlet-widgets">
<!-- <button class="btn btn-white btn-xs"><i class="fa fa-plus-circle"></i> New User</button> -->
</div>
<div class="clearfix"></div>
</div>
<div class="portlet-body">
      <form class="form-signin" method="post">
         
        	<?php
			if(isset($msg))
			{
				echo $msg;
			}
			else
			{
				?>
              	<div class='alert alert-warning'>
				Please enter your email address. You will receive a link to create a new password via email.!
				</div>  
                <?php
			}
			?>
        <div class="form-group">
        <input type="email" class="input-block-level form-control" placeholder="Email address" name="txtemail" required />
         </div>
     	<hr />
        <button class="btn btn-danger btn-primary" type="submit" name="btn-submit">Reset Password</button>
      </form>
</div></div></div></div>
    </div> <!-- /container -->
    <script src="../../ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="blackportal/js/plugins/bootstrap/bootstrap.min.js"></script>
<script src="blackportal/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="blackportal/js/plugins/popupoverlay/jquery.popupoverlay.js"></script>
<script src="blackportal/js/plugins/popupoverlay/defaults.js"></script>
<script src="../../ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="blackportal/js/plugins/popupoverlay/logout.js"></script>
<script src="blackportal/js/plugins/hisrc/hisrc.js"></script>
<script src="blackportal/js/flex.js"></script>
<script src="blackportal/js/plugins/popupoverlay/logout.js"></script>
  </body>
</html>