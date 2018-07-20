<?php
session_start();
require_once 'class.admin.php';
$user_footer = new ADMIN();

if(!$user_footer->is_logged_in())
{
$user_footer->redirect('index.php');
}

$stmt = $user_footer->runQuery("SELECT * FROM  tbl_admin WHERE adminID =:uid");
$stmt->execute(array(":uid"=>$_SESSION['adminSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
//extract($row);

$stmt = $user_footer->runQuery("SELECT * FROM  footer WHERE footer_id =:hid");
$stmt->execute(array(":hid"=>$_SESSION['adminSession']));
$result = $stmt->fetch(PDO::FETCH_ASSOC);

error_reporting( ~E_NOTICE );

if(isset($_POST['save']))
{
	    $footer_dynamic = $_POST['fvar'];
	    
        if(!isset($errMSG))
        {
        $stmt = $user_footer->runQuery("UPDATE footer SET footer_dynamic=:b1 WHERE footer_id=:pid");
		$stmt->bindParam(':b1',$footer_dynamic);
		$stmt->bindParam(':pid',$row[adminID]);
		if($stmt->execute())
		{
		$successMSG = "update Successfully";
		header('location: footer-dynamic-variable.php');
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
<li class="active">Footer dynamic variable</li>
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
<h4>Footer dynamically Data insert</h4>
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
<label >Footer dynamic variable</label>
<textarea type="text" class="form-control" rows="12" name="fvar"  value="" required="required"> <?php echo $result['footer_dynamic']; ?></textarea>
</div>

<hr>
<input  type="submit" class="btn btn-default " name="save" value="Save changes">
</form>
</div><!-- col-5 second-->

</div> <!-- row internal -->
</div>
</div>
</div>

</div> <!-- row end -->
</div> <!-- /.page-content -->


<?php include_once'include/footer.php'; ?>