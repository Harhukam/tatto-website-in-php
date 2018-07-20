<?php
session_start();
require_once 'class.admin.php';
$user_logo_update = new ADMIN();

if(!$user_logo_update->is_logged_in())
{
$user_logo_update->redirect('index.php');
}


$stmt = $user_logo_update->runQuery("SELECT * FROM  tbl_admin WHERE adminID =:uid");
$stmt->execute(array(":uid"=>$_SESSION['adminSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt = $user_logo_update->runQuery("SELECT * FROM  logo WHERE logo_id =:lid");
$stmt->execute(array(":lid"=>$_SESSION['adminSession']));
$resultrow = $stmt->fetch(PDO::FETCH_ASSOC);


error_reporting( ~E_NOTICE );

if(isset($_POST['update-logo']))
{
    $logo_alt = $_POST['alt'];
    $logo_sitename = $_POST['sitename'];
    $adminid = $_SESSION['adminSession']; //send session as admin id fot update logo
    
    $logo_pic = $_FILES['logo']['name'];
    $tmp_dir = $_FILES['logo']['tmp_name'];
    $imgSize = $_FILES['logo']['size']; 

	if($logo_pic)
	{
	$upload_dir = '../images/logo/'; 
	$imgExt = strtolower(pathinfo($logo_pic,PATHINFO_EXTENSION)); 
	$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); 
	$logo_pic = rand(100000, 999999).".".$imgExt;
	if(in_array($imgExt, $valid_extensions)){           
	if($imgSize < 5000000)              {
	move_uploaded_file($tmp_dir,$upload_dir.$logo_pic);
	}
	else
	{
	$errMSG = "Sorry, your file is too large it should be less then 5MB";
	}
	}
	else
	{
	$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";        
	}   
	}
	else
	{
	$logo_pic = $resultrow['logo_pic']; 
	}  


    if(!isset($errMSG))
    {

	if($user_logo_update->uptlogo($adminid,$logo_pic,$logo_alt,$logo_sitename))//uptlogo function
	{
	$successMSG = "update Successfully";
	//header('location:logo.php');
	header('refresh:1;  logo.php');
	}
	else
	{
	$errMSG = "error something wrong ! please try later...";
	}
	}
}
?>
<?php include('include/header.php'); ?>
<div class="page-content">
<div class="row">
<div class="col-lg-12">
<div class="page-title">
<ol class="breadcrumb">
<li><i class="fa fa-dashboard"></i>  <a href="#">Dashboard</a>
</li>
<li class="active">Update logo</li>
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
<h4>Update logo</h4>
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
<img id="blah" src="../images/logo/<?php echo $resultrow['logo_pic'] ?>"  style=" max-width: 280px; max-height: 180px;" /> 

<br/>
<label>Choose Image </label>
<input type="file" name="logo" id="imgInp" accept="image/*" />
</div>

<div class="form-group">
<label> Logo Alt </label>
<input type="text" class="form-control" name="alt" value="<?php echo $resultrow['logo_alt'] ?>" >
</div>

<div class="form-group">
<label> Website name </label>
<input type="text" class="form-control" name="sitename" value="<?php echo $resultrow['logo_sitename'] ?>" >
</div>

<hr>
<input  type="submit" class="btn btn-default " name="update-logo" value="update">
</form>
</div>

</div>
</div></div>
</div> <!-- row end -->
</div> <!-- /.page-content -->

<?php include('include/footer.php'); ?>