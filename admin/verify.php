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
	
	$statusY = "Y";
	$statusN = "N";
	
	$stmt = $user->runQuery("SELECT adminID,adminStatus FROM tbl_admin WHERE adminID=:uID AND tokenCode=:code LIMIT 1");
	$stmt->execute(array(":uID"=>$id,":code"=>$code));
	$row=$stmt->fetch(PDO::FETCH_ASSOC);
	if($stmt->rowCount() > 0)
	{
		if($row['adminStatus']==$statusN)
		{
			$stmt = $user->runQuery("UPDATE tbl_admin SET adminStatus=:status WHERE adminID=:uID");
			$stmt->bindparam(":status",$statusY);
			$stmt->bindparam(":uID",$id);
			$stmt->execute();	
			
			$msg = "
		           <div class='alert alert-success'>
				   <button class='close' data-dismiss='alert'>&times;</button>
					  <strong>WoW !</strong>  Your Account is Now Activated : <a href='index.php'>Login here</a>
			       </div>
			       ";	
		}
		else
		{
			$msg = "
		           <div class='alert alert-error'>
				   <button class='close' data-dismiss='alert'>&times;</button>
					  <strong>sorry !</strong>  Your Account is allready Activated : <a href='index.php'>Login here</a>
			       </div>
			       ";
		}
	}
	else
	{
		$msg = "
		       <div class='alert alert-error'>
			   <button class='close' data-dismiss='alert'>&times;</button>
			   <strong>sorry !</strong>  No Account Found : <a href='signup.php'>Signup here</a>
			   </div>
			   ";
	}	
}

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Confirm Registration</title>
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
		<?php if(isset($msg)) { echo $msg; } ?>
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