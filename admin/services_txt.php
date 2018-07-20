<?php
session_start();
require_once 'class.admin.php';
$user_slider = new ADMIN();

if(!$user_slider->is_logged_in())
{
$user_slider->redirect('index.php');
}

$stmt = $user_slider->runQuery("SELECT * FROM  tbl_admin WHERE adminID =:uid");
$stmt->execute(array(":uid"=>$_SESSION['adminSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt = $user_slider->runQuery("SELECT * FROM  services_txt WHERE services_txt_id =:uid");
$stmt->execute(array(":uid"=>$_SESSION['adminSession']));
$res = $stmt->fetch(PDO::FETCH_ASSOC);

error_reporting( ~E_NOTICE );

if(isset($_POST['update']))
{

$service_txt1 =$_POST['service_txt1'] ;
$service_txt2 =$_POST['service_txt2'] ;
$service_txt3 =$_POST['service_txt3'] ;
$service_txt4 =$_POST['service_txt4'] ;
$service_txt5 =$_POST['service_txt5'] ;


	if(!isset($errMSG))
	{
	$stmt = $user_slider->runQuery("UPDATE services_txt 
	SET 
	service_txt1 =:b1,
	service_txt2 =:b2,
	service_txt3 =:b3,
	service_txt4 =:b4,
	service_txt5 =:b5
	WHERE services_txt_id=:pgeid");
	$stmt->bindParam(':b1',$service_txt1);
	$stmt->bindParam(':b2',$service_txt2);
	$stmt->bindParam(':b3',$service_txt3);
	$stmt->bindParam(':b4',$service_txt4);
	$stmt->bindParam(':b5',$service_txt5);
	$stmt->bindParam(':pgeid',$row['adminID']);
		if($stmt->execute())
		{
		$successMSG = "update Successfully";
		header('refresh:1; services_txt.php');
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
<!-- begin PAGE TITLE ROW -->
<div class="row">
<div class="col-lg-12">
<div class="page-title">
<ol class="breadcrumb">
<li><i class="fa fa-dashboard"></i>  <a href="#">Dashboard</a>
</li>
<li class="active">Update Services text</li>
</ol>
</div>
</div>
<!-- /.col-lg-12 -->
</div><!-- /.row -->



<div class="row">
<!-- begin LEFT COLUMN -->
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
<form  method="post" enctype="multipart/form-data" >
<div class="portlet portlet-default">
<div class="portlet-heading">
<div class="portlet-title">
<h4>Update Services text</h4>
</div>
<div class="portlet-widgets">
<a data-toggle="collapse" data-parent="#accordion" href="#basicFormExample"><i class="fa fa-chevron-down"></i></a>
</div>
<div class="clearfix"></div>
</div>
<div id="basicFormExample" class="panel-collapse collapse in">
<div class="portlet-body">


<div class="row">
<div class="col-sm-12 col-xs-12">

<div class="form-group">
<labe >S text 1</label>
<textarea type="text" name="service_txt1" class="form-control"><?php echo $res['service_txt1'];?></textarea>
</div>

<div class="form-group">
<labe >S text 2 </label>
<textarea type="text" name="service_txt2" class="form-control"><?php echo $res['service_txt2'];?></textarea>
</div>

<div class="form-group">
<labe >S text 3 </label>
<textarea type="text" name="service_txt3" class="form-control"><?php echo $res['service_txt3'];?></textarea>
</div>

<div class="form-group">
<labe >S text 4 </label>
<textarea type="text" name="service_txt4" class="form-control"><?php echo $res['service_txt4'];?></textarea>
</div>

<div class="form-group">
<labe >S text 5</label>
<textarea type="text" name="service_txt5" class="form-control"><?php echo $res['service_txt5'];?></textarea>
</div>



<hr>
<input  type="submit" class="btn btn-default " name="update" value="Save">
</form>
</div>
</div>
</div>
</div></div>







</div>
</div> <!-- row end -->


</div> <!-- /.page-content -->


<?php include_once'include/footer.php'; ?>