<?php
session_start();
require_once 'class.admin.php';
$user_update_index = new ADMIN();

if(!$user_update_index->is_logged_in())
{
$user_update_index->redirect('index.php');
}

$stmt = $user_update_index->runQuery("SELECT * FROM  tbl_admin WHERE adminID =:uid");
$stmt->execute(array(":uid"=>$_SESSION['adminSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
//extract($row);
$stmt = $user_update_index->runQuery("SELECT * FROM  home WHERE home_id =:uid");
$stmt->execute(array(":uid"=>$_SESSION['adminSession']));
$result = $stmt->fetch(PDO::FETCH_ASSOC);

error_reporting( ~E_NOTICE );

if(isset($_POST['update']))
{
	    $home_title = $_POST['tit'];
	    $home_description= $_POST['desc'];
	    $home_keywords= $_POST['keyw'];
	    
	    
        if(!isset($errMSG))
        {
        $stmt = $user_update_index->runQuery("UPDATE home 
                                         SET 
                                         home_title=:b1,
                                         home_description=:b2,
	                                     home_keywords=:b3
	                                     WHERE home_id=:pid");
		$stmt->bindParam(':b1',$home_title);
		$stmt->bindParam(':b2',$home_description);
		$stmt->bindParam(':b3',$home_keywords);
		$stmt->bindParam(':pid',$row[adminID]);
		if($stmt->execute())
		{
		$successMSG = "update Successfully";
		header('refresh:1;  update-index.php');
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
<h4>Update website Home </h4>
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
<label >Page title </label>
<input type="text" class="form-control" value="<?php echo $result['home_title'];?>" name="tit" required="required" maxlength="60">
</div>


<div class="form-group">
<label >Page description </label>
<textarea type="text" class="form-control" name="desc" required="required" maxlength="159"><?php echo $result['home_description'];?> </textarea>
</div>

<div class="form-group">
<label >Page keywords </label>
<input type="text" class="form-control" id="tokenfield" value="<?php echo $result['home_keywords'];?>" placeholder="Type something and hit enter!"  name="keyw" required="required">
</div>

<hr>
<input  type="submit" class="btn btn-default " name="update" value="update">

</form>
</div>

</div>
</div>
</div>

</div> <!-- row end -->
</div> <!-- /.page-content -->


<?php include_once'include/footer.php'; ?>