<?php
session_start();
require_once 'class.admin.php';
$user_update_ser = new ADMIN();

if(!$user_update_ser->is_logged_in())
{
$user_update_ser->redirect('index.php');
}

$stmt = $user_update_ser->runQuery("SELECT * FROM  tbl_admin WHERE adminID =:uid");
$stmt->execute(array(":uid"=>$_SESSION['adminSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
//extract($row);
$stmt = $user_update_ser->runQuery("SELECT * FROM  services WHERE adminID =:uid");
$stmt->execute(array(":uid"=>$_SESSION['adminSession']));
$result = $stmt->fetch(PDO::FETCH_ASSOC);

error_reporting( ~E_NOTICE );

if(isset($_POST['servicesupt']))
{
	    $services_title = $_POST['tit'];
	    $services_description= $_POST['desc'];
	    $services_heading= $_POST['heading'];
	    
	    
        if(!isset($errMSG))
        {
        $stmt = $user_update_ser->runQuery("UPDATE services 
                                         SET 
                                         services_title=:b1,
                                         services_description=:b2,
                                         services_heading=:b3
	                                     WHERE adminID=:nid");
		$stmt->bindParam(':b1',$services_title);
		$stmt->bindParam(':b2',$services_description);
		$stmt->bindParam(':b3',$services_heading);
		$stmt->bindParam(':nid',$row[adminID]);
		if($stmt->execute())
		{
		$successMSG = "Meta tags update Successfully";
		header('refresh:2;  update-services.php');
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
<li class="active">Home Update</li>
</ol>
</div>
</div>
<!-- /.col-lg-12 -->
</div><!-- /.row -->

<div class="row">
<!-- begin LEFT COLUMN -->
<div class="col-lg-12">
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

<div class="portlet portlet-default">
<div class="portlet-heading">
<div class="portlet-title">
<h4>Update website Services Meta </h4>
</div>
<div class="portlet-widgets">
<a data-toggle="collapse" data-parent="#accordion" href="#basicFormExample"><i class="fa fa-chevron-down"></i></a>
</div>
<div class="clearfix"></div>
</div>
<div id="basicFormExample" class="panel-collapse collapse in">
<div class="portlet-body">
<div class="shedow">
<form method="post" enctype="multipart/form-data">

<div class="form-group">
<label >Services title </label>
<input type="text" class="form-control" value="<?php echo $result['services_title'];?>" name="tit" required="required" maxlength="60">
</div>


<div class="form-group">
<label >Services description </label>
<textarea type="text" class="form-control" name="desc" required="required" maxlength="159"><?php echo $result['services_description'];?> </textarea>
</div>

<div class="form-group">
<label >Page heading eg: services </label>
<input type="text" class="form-control"  value="<?php echo $result['services_heading'];?>" placeholder="Type something and hit enter!"  name="heading" required="required">
</div>

<hr>
<input  type="submit" class="btn btn-default " name="servicesupt" value="update">

</form>
</div>

</div>
</div>
</div>

</div> <!-- row end -->
</div> <!-- /.page-content -->


<?php include_once'include/footer.php'; ?>