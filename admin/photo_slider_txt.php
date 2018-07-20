<?php
session_start();
require_once 'class.admin.php';
$user_ps = new ADMIN();

if(!$user_ps->is_logged_in())
{
$user_ps->redirect('index.php');
}

$stmt = $user_ps->runQuery("SELECT * FROM  tbl_admin WHERE adminID =:uid");
$stmt->execute(array(":uid"=>$_SESSION['adminSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt = $user_ps->runQuery("SELECT * FROM  photo_slider_section WHERE ps_id =:uid");
$stmt->execute(array(":uid"=>$_SESSION['adminSession']));
$res = $stmt->fetch(PDO::FETCH_ASSOC);

error_reporting( ~E_NOTICE );

if(isset($_POST['update']))
{

$ps_txt1 =$_POST['ps_txt1'] ;
$ps_txt2 =$_POST['ps_txt2'] ;
$ps_txt3 =$_POST['ps_txt3'] ;
$ps_txt4 =$_POST['ps_txt4'] ;
$ps_txt5 =$_POST['ps_txt5'] ;
$ps_txt6 =$_POST['ps_txt6'] ;
$ps_txt7 =$_POST['ps_txt7'] ;
$ps_txt8 =$_POST['ps_txt8'] ;

	if(!isset($errMSG))
	{
	$stmt = $user_ps->runQuery("UPDATE photo_slider_section 
	SET 
	ps_txt1 =:b1,
	ps_txt2 =:b2,
	ps_txt3 =:b3,
	ps_txt4 =:b4,
	ps_txt5 =:b5,
	ps_txt6 =:b6,
	ps_txt7 =:b7,
	ps_txt8 =:b8
	WHERE ps_id=:pgeid");
	$stmt->bindParam(':b1',$ps_txt1);
	$stmt->bindParam(':b2',$ps_txt2);
	$stmt->bindParam(':b3',$ps_txt3);
	$stmt->bindParam(':b4',$ps_txt4);
	$stmt->bindParam(':b5',$ps_txt5);
	$stmt->bindParam(':b6',$ps_txt6);
	$stmt->bindParam(':b7',$ps_txt7);
	$stmt->bindParam(':b8',$ps_txt8);
	$stmt->bindParam(':pgeid',$row['adminID']);
		if($stmt->execute())
		{
		$successMSG = "update Successfully";
		header('refresh:1; photo_slider_txt.php');
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
<li class="active">Update title text</li>
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
<h4>Update ps text</h4>
</div>
<div class="portlet-widgets">
<a data-toggle="collapse" data-parent="#accordion" href="#basicFormExample"><i class="fa fa-chevron-down"></i></a>
</div>
<div class="clearfix"></div>
</div>
<div id="basicFormExample" class="panel-collapse collapse in">
<div class="portlet-body">


<div class="row">

<div class="col-xs-6">

<div class="form-group">
<labe >txt1 </label>
<textarea type="text" name="ps_txt1" class="form-control"><?php echo $res['ps_txt1'];?>
</textarea>
</div>

<div class="form-group">
<labe >txt2 </label>
<textarea type="text" name="ps_txt2" class="form-control"><?php echo $res['ps_txt2'];?></textarea>
</div>

<div class="form-group">
<labe >txt3 </label>
<textarea type="text" name="ps_txt3" class="form-control"><?php echo $res['ps_txt3'];?></textarea>
</div>

<div class="form-group">
<labe ></labe>txt4 </label>
<textarea type="text" name="ps_txt4" class="form-control"><?php echo $res['ps_txt4'];?></textarea>
</div>

</div>



<div class="col-xs-6">

<div class="form-group">
<labe >txt 5 </label>
<textarea type="text" name="ps_txt5" class="form-control"><?php echo $res['ps_txt5'];?></textarea>
</div>

<div class="form-group">
<labe >txt 6 </label>
<textarea type="text" name="ps_txt6" class="form-control"><?php echo $res['ps_txt6'];?></textarea>
</div>

<div class="form-group">
<labe >txt 7 </label>
<textarea type="text" name="ps_txt7" class="form-control"><?php echo $res['ps_txt7'];?></textarea>
</div>

<div class="form-group">
<labe > txt 8 </label>
<textarea type="text" name="ps_txt8" class="form-control"><?php echo $res['ps_txt8'];?></textarea>
</div>





<hr>
<input  type="submit" class="btn btn-default " name="update" value="Update">
</form>
</div>
</div>
</div>
</div></div>



</div>
</div> <!-- row end -->


</div> <!-- /.page-content -->


<?php include_once'include/footer.php'; ?>
