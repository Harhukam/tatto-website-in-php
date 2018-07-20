<?php
session_start();
require_once 'class.admin.php';
$user_social = new ADMIN();

if(!$user_social->is_logged_in())
{
$user_head->redirect('index.php');
}

$stmt = $user_social->runQuery("SELECT * FROM  tbl_admin WHERE adminID =:uid");
$stmt->execute(array(":uid"=>$_SESSION['adminSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
//extract($row);

$stmt = $user_social->runQuery("SELECT * FROM social WHERE social_id =:hid");
$stmt->execute(array(":hid"=>$_SESSION['adminSession']));
$result = $stmt->fetch(PDO::FETCH_ASSOC);

error_reporting( ~E_NOTICE );

if(isset($_POST['update']))
{
	$id = $_SESSION['adminSession'];
    $fb = $_POST['facebook'];
    $ins =$_POST['instagram'];
    $tw  =$_POST['twitter'];
    $yt  =$_POST['youtube'];
    $go  =$_POST['google'];
  
      
    if(!isset($errMSG))
    {

	if($user_social->uptsocial($id,$fb,$ins,$tw,$yt,$go))//upt function
	{
	//$successMSG = "update Successfully";
	header('location:social-links.php');
	//header('refresh:1;  social-links.php');
	}
	else
	{
	$errMSG = "error something wrong ! please try later...";
	}
	}
}

?>
<?php include_once'include/header.php'; ?>
<div class="page-content">
<div class="row">
<div class="col-lg-12">
<div class="page-title">
<ol class="breadcrumb">
<li><i class="fa fa-dashboard"></i>  <a href="#">Dashboard</a>
</li>
<li class="active">Social Links</li>
</ol>
</div>
</div>
<!-- /.col-lg-12 -->
</div><!-- /.row -->

<div class="row">
<!-- begin LEFT COLUMN -->
<div class="col-lg-12">
<div class="portlet portlet-default">
<div class="portlet-heading">
<div class="portlet-title">
<h4>Social links</h4>
</div>
<div class="portlet-widgets">
<a data-toggle="collapse" data-parent="#accordion" href="#basicFormExample"><i class="fa fa-chevron-down"></i></a>
</div>
<div class="clearfix"></div>
</div>
<div id="basicFormExample" class="panel-collapse collapse in">
<div class="portlet-body">

<div class="row">
<div class="col-sm-12">
<?php
if(isset($errMSG))
{
?>
<div class="alert alert-danger">
<span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
</div>
<?php
}
else if(isset($successMSG))
{
?>
<div class="alert alert-success">
<strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong>
</div>
<?php
}
?>
<form method="post" enctype="multipart/form-data">

<div class="form-group">
<label>Facebook</label>
<input  type="text" class="form-control" name="facebook"  value="<?php echo $result['facebook']; ?>">
</div>

<div class="form-group">
<label>Instagram</label>
<input  type="text" class="form-control" name="instagram"  value="<?php echo $result['instagram']; ?>">
</div>

<div class="form-group">
<label>Twitter</label>
<input  type="text" class="form-control" name="twitter"  value="<?php echo $result['twitter']; ?>">
</div>

<div class="form-group">
<label>YouTube</label>
<input  type="text" class="form-control" name="youtube"  value="<?php echo $result['youtube']; ?>">
</div>

<div class="form-group">
<label>Google+</label>
<input  type="text" class="form-control" name="google"  value="<?php echo $result['google']; ?>">
</div>


<hr>
<input  type="submit" class="btn btn-default " name="update" value="Submit">
</form>
</div><!-- col-5 second-->

</div> <!-- row internal -->
</div>
</div>
</div>

</div> <!-- row end -->
</div> <!-- /.page-content -->


<?php include_once'include/footer.php'; ?>