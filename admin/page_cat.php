<?php
session_start();
require_once 'class.admin.php';
$user_cat = new ADMIN();

if(!$user_cat->is_logged_in())
{
$user_cat->redirect('index.php');
}

$stmt = $user_cat->runQuery("SELECT * FROM  tbl_admin WHERE adminID =:uid");
$stmt->execute(array(":uid"=>$_SESSION['adminSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
//extract($row);

// $stmt = $user_cat->runQuery("SELECT * FROM  post_category");
// $stmt->execute();
// $result = $stmt->fetch(PDO::FETCH_ASSOC);

error_reporting( ~E_NOTICE );


if(isset($_GET['delkey']))
{
$id = base64_decode(urldecode($_GET['delkey']));//encryption
$stmt = $user_cat->runQuery('DELETE FROM post_category WHERE post_cat_id =:bid');
$stmt->execute(array(':bid'=>$id));
header('location: page_cat.php');
}


if(isset($_POST['save']))
{

$cat_name = $_POST['cat'];

if(!isset($errMSG))
{
$stmt = $user_cat->runQuery("INSERT INTO post_category(cat_name) VALUES(:b1)");
$stmt->bindParam(':b1',$cat_name);
if($stmt->execute())
{
$successMSG = "Category added.";
header('refresh:1; page_cat.php');
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
<li class="active">Categories</li>
</ol>
</div>
</div>
<!-- /.col-lg-12 -->
</div><!-- /.row -->

<div class="row">
<!-- begin LEFT COLUMN -->
<div class="col-sm-6">
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
<h4>Add category </h4>
</div>
<div class="portlet-widgets">
<a data-toggle="collapse" data-parent="#accordion" href="#basicFormExample"><i class="fa fa-chevron-down"></i></a>
</div>
<div class="clearfix"></div>
</div>
<div id="basicFormExample" class="panel-collapse collapse in">
<div class="portlet-body">
<form method="post" enctype="multipart/form-data">

<div class="form-group">
<label >Page category name </label>
<input type="text" class="form-control" value="" name="cat" required="required" maxlength="45">
</div>


<hr>
<input  type="submit" class="btn btn-default " name="save" value="Add">

</form>
</div>

</div></div></div>


<div class="col-sm-6">
<h4> Availble  Categories</h3>
<?php
$stmt = $user_cat->runQuery("SELECT * FROM post_category ORDER BY post_cat_id DESC");
$stmt->execute();
if($stmt->rowCount() > 0)
{
while($result=$stmt->fetch(PDO::FETCH_ASSOC))
{
extract($result);
$key = urlencode(base64_encode($result['post_cat_id']));
?>


<div style="background-color: #fff; height: 30px; width: 100%; margin-top: 5px;margin-bottom: 5px; padding: 5px 5px 5px 5px;">
<?php echo $result['cat_name']; ?> &nbsp;&nbsp;&nbsp;<a style="float: right;" class="btn btn-xs btn-warning" href="page_cat.php?delkey=<?php echo $key; ?>" title="click for delete" onclick="return confirm('sure to delete ?')"><span class="glyphicon glyphicon-trash"></span> delete</a>
</div>
<?php
}
}
else
{
?>
<div class="col-sm-12">
<span class="glyphicon glyphicon-info-sign"></span> &nbsp; 0
</div>
<?php
}  
?>
</div>


</div> <!-- row end -->
</div> <!-- /.page-content -->


<?php include_once'include/footer.php'; ?>