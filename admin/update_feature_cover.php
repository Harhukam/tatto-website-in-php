<?php
session_start();
require_once 'class.admin.php';
$user_feature_cover_images = new ADMIN();

if(!$user_feature_cover_images->is_logged_in())
{
$user_feature_cover_images->redirect('index.php');
}

$stmt = $user_feature_cover_images->runQuery("SELECT * FROM  tbl_admin WHERE adminID =:uid");
$stmt->execute(array(":uid"=>$_SESSION['adminSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt = $user_feature_cover_images->runQuery("SELECT * FROM  feature_cover WHERE feature_cover_id =:uid");
$stmt->execute(array(":uid"=>$_SESSION['adminSession']));
$res = $stmt->fetch(PDO::FETCH_ASSOC);

error_reporting( ~E_NOTICE );

if(isset($_POST['update']))
{

$feature_cover_txt1 =$_POST['feature_cover_txt1'] ;
$feature_cover_txt2 =$_POST['feature_cover_txt2'] ;
$feature_cover_txt3 =$_POST['feature_cover_txt3'] ;
$feature_cover_txt4 =$_POST['feature_cover_txt4'] ;
$feature_cover_txt5 =$_POST['feature_cover_txt5'] ;
$feature_cover_txt6 =$_POST['feature_cover_txt6'] ;
$feature_cover_txt7 =$_POST['feature_cover_txt7'] ;
$feature_cover_txt8 =$_POST['feature_cover_txt8'] ;
$feature_cover_txt9 =$_POST['feature_cover_txt9'] ;
$feature_cover_txt10 =$_POST['feature_cover_txt10'] ;
$feature_cover_txt11 =$_POST['feature_cover_txt11'] ;
$feature_cover_txt12 =$_POST['feature_cover_txt12'] ;

	if(!isset($errMSG))
	{
	$stmt = $user_feature_cover_images->runQuery("UPDATE feature_cover 
	SET 
	feature_cover_txt1 =:b1,
	feature_cover_txt2 =:b2,
	feature_cover_txt3 =:b3,
	feature_cover_txt4 =:b4,
	feature_cover_txt5 =:b5,
	feature_cover_txt6 =:b6,
	feature_cover_txt7 =:b7,
	feature_cover_txt8 =:b8,
	feature_cover_txt9 =:b9,
	feature_cover_txt10 =:b10,
	feature_cover_txt11 =:b11,
	feature_cover_txt12 =:b12
	WHERE feature_cover_id=:pgeid");
	$stmt->bindParam(':b1',$feature_cover_txt1);
	$stmt->bindParam(':b2',$feature_cover_txt2);
	$stmt->bindParam(':b3',$feature_cover_txt3);
	$stmt->bindParam(':b4',$feature_cover_txt4);
	$stmt->bindParam(':b5',$feature_cover_txt5);
	$stmt->bindParam(':b6',$feature_cover_txt6);
	$stmt->bindParam(':b7',$feature_cover_txt7);
	$stmt->bindParam(':b8',$feature_cover_txt8);
	$stmt->bindParam(':b9',$feature_cover_txt9);
	$stmt->bindParam(':b10',$feature_cover_txt10);
	$stmt->bindParam(':b11',$feature_cover_txt11);
	$stmt->bindParam(':b12',$feature_cover_txt12);
	$stmt->bindParam(':pgeid',$row['adminID']);
		if($stmt->execute())
		{
		$successMSG = "update Successfully";
		header('refresh:1; update_feature_cover.php');
		}
		else
		{
		$errMSG = "error something wrong ! please try later...";
		}
	}
}


//-------------------------------------------------------------
//feature_cover1
if(isset($_POST['feature_cover1update']))
{

$feature_cover1 = $_FILES['feature_cover1']['name'];
$tmp_dir = $_FILES['feature_cover1']['tmp_name'];
$imgSize = $_FILES['feature_cover1']['size']; 

if($feature_cover1)
{
$upload_dir = '../images/'; // upload directory
$imgExt = strtolower(pathinfo($feature_cover1,PATHINFO_EXTENSION)); // get image extension
$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
$feature_cover1 = rand(1000,1000000).".".$imgExt;
if(in_array($imgExt, $valid_extensions)){           
if($imgSize < 5000000)              {
move_uploaded_file($tmp_dir,$upload_dir.$feature_cover1);
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
$feature_cover1 = $res['feature_cover1']; // old image from database
}            

// if no error occured, continue ....
if(!isset($errMSG))
{
$stmt = $user_feature_cover_images->runQuery("UPDATE feature_cover 
SET 
feature_cover1=:b1
WHERE feature_cover_id=:pgeid");
$stmt->bindParam(':b1',$feature_cover1);
$stmt->bindParam(':pgeid',$row['adminID']);
if($stmt->execute())
{
$successMSG = "update Successfully";
header('refresh:1; update_feature_cover.php');
}
else
{
$errMSG = "error something wrong ! please try later...";
}
}
}
//---------------------------------------------------------------
//feature_cover2
if(isset($_POST['feature_cover2update']))
{

$feature_cover2 = $_FILES['feature_cover2']['name'];
$tmp_dir = $_FILES['feature_cover2']['tmp_name'];
$imgSize = $_FILES['feature_cover2']['size']; 

if($feature_cover2)
{
$upload_dir = '../images/'; // upload directory
$imgExt = strtolower(pathinfo($feature_cover2,PATHINFO_EXTENSION)); // get image extension
$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
$feature_cover2 = rand(1000,1000000).".".$imgExt;
if(in_array($imgExt, $valid_extensions)){           
if($imgSize < 5000000)              {
move_uploaded_file($tmp_dir,$upload_dir.$feature_cover2);
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
$feature_cover2 = $res['feature_cover2']; // old image from database
}            

// if no error occured, continue ....
if(!isset($errMSG))
{
$stmt = $user_feature_cover_images->runQuery("UPDATE feature_cover 
SET 
feature_cover2=:b1
WHERE feature_cover_id=:pgeid");
$stmt->bindParam(':b1',$feature_cover2);
$stmt->bindParam(':pgeid',$row['adminID']);
if($stmt->execute())
{
$successMSG = "update Successfully";
header('refresh:1; update_feature_cover.php');
}
else
{
$errMSG = "error something wrong ! please try later...";
}
}
}

//--------------------------------------------------------
//feature_cover3
if(isset($_POST['feature_cover3update']))
{

$feature_cover3 = $_FILES['feature_cover3']['name'];
$tmp_dir = $_FILES['feature_cover3']['tmp_name'];
$imgSize = $_FILES['feature_cover3']['size']; 

if($feature_cover3)
{
$upload_dir = '../images/'; // upload directory
$imgExt = strtolower(pathinfo($feature_cover3,PATHINFO_EXTENSION)); // get image extension
$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
$feature_cover3 = rand(1000,1000000).".".$imgExt;
if(in_array($imgExt, $valid_extensions)){           
if($imgSize < 5000000)              {
move_uploaded_file($tmp_dir,$upload_dir.$feature_cover3);
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
$feature_cover3 = $res['feature_cover3']; // old image from database
}            

// if no error occured, continue ....
if(!isset($errMSG))
{
$stmt = $user_feature_cover_images->runQuery("UPDATE feature_cover 
SET 
feature_cover3=:b1
WHERE feature_cover_id=:pgeid");
$stmt->bindParam(':b1',$feature_cover3);
$stmt->bindParam(':pgeid',$row['adminID']);
if($stmt->execute())
{
$successMSG = "update Successfully";
header('refresh:1; update_feature_cover.php');
}
else
{
$errMSG = "error something wrong ! please try later...";
}
}
}


//feature_cover4
if(isset($_POST['feature_cover4update']))
{

$feature_cover4 = $_FILES['feature_cover4']['name'];
$tmp_dir = $_FILES['feature_cover4']['tmp_name'];
$imgSize = $_FILES['feature_cover4']['size']; 

if($feature_cover4)
{
$upload_dir = '../images/'; // upload directory
$imgExt = strtolower(pathinfo($feature_cover4,PATHINFO_EXTENSION)); // get image extension
$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
$feature_cover4 = rand(1000,1000000).".".$imgExt;
if(in_array($imgExt, $valid_extensions)){           
if($imgSize < 5000000)              {
move_uploaded_file($tmp_dir,$upload_dir.$feature_cover4);
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
$feature_cover4 = $res['feature_cover4']; // old image from database
}            

// if no error occured, continue ....
if(!isset($errMSG))
{
$stmt = $user_feature_cover_images->runQuery("UPDATE feature_cover 
SET 
feature_cover4=:b1
WHERE feature_cover_id=:pgeid");
$stmt->bindParam(':b1',$feature_cover4);
$stmt->bindParam(':pgeid',$row['adminID']);
if($stmt->execute())
{
$successMSG = "update Successfully";
header('refresh:1;  update_feature_cover.php');
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
<li class="active">Update feature_cover feature_covers</li>
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
<h4>Update feature_cover text</h4>
</div>
<div class="portlet-widgets">
<a data-toggle="collapse" data-parent="#accordion" href="#basicFormExample"><i class="fa fa-chevron-down"></i></a>
</div>
<div class="clearfix"></div>
</div>
<div id="basicFormExample" class="panel-collapse collapse in">
<div class="portlet-body">


<div class="row">

<div class="col-sm-4">

<div class="form-group">
<labe >feature_cover1 txt1 </label>
<textarea type="text" name="feature_cover_txt1" class="form-control"><?php echo $res['feature_cover_txt1'];?>
</textarea>
</div>

<div class="form-group">
<labe >feature_cover1 txt2 </label>
<textarea type="text" name="feature_cover_txt2" class="form-control"><?php echo $res['feature_cover_txt2'];?></textarea>
</div>

<div class="form-group">
<labe >feature_cover1 txt3 </label>
<textarea type="text" name="feature_cover_txt3" class="form-control"><?php echo $res['feature_cover_txt3'];?></textarea>
</div>

<div class="form-group">
<labe >feature_cover1 txt4 </label>
<textarea type="text" name="feature_cover_txt4" class="form-control"><?php echo $res['feature_cover_txt4'];?></textarea>
</div>

</div>



<div class="col-sm-4">

<div class="form-group">
<labe >feature_cover2 txt1 </label>
<textarea type="text" name="feature_cover_txt5" class="form-control"><?php echo $res['feature_cover_txt5'];?></textarea>
</div>

<div class="form-group">
<labe >feature_cover2 txt2 </label>
<textarea type="text" name="feature_cover_txt6" class="form-control"><?php echo $res['feature_cover_txt6'];?></textarea>
</div>

<div class="form-group">
<labe >feature_cover2 txt3 </label>
<textarea type="text" name="feature_cover_txt7" class="form-control"><?php echo $res['feature_cover_txt7'];?></textarea>
</div>

<div class="form-group">
<labe >feature_cover2 txt4 </label>
<textarea type="text" name="feature_cover_txt8" class="form-control"><?php echo $res['feature_cover_txt8'];?></textarea>
</div>

</div>


<div class="col-sm-4">

<div class="form-group">
<labe >feature_cover3 txt1 </label>
<textarea type="text" name="feature_cover_txt9" class="form-control"><?php echo $res['feature_cover_txt9'];?></textarea>
</div>

<div class="form-group">
<labe >feature_cover3 txt2 </label>
<textarea type="text" name="feature_cover_txt10" class="form-control"><?php echo $res['feature_cover_txt10'];?></textarea>
</div>

<div class="form-group">
<labe >feature_cover3 txt3 </label>
<textarea type="text" name="feature_cover_txt11" class="form-control"><?php echo $res['feature_cover_txt11'];?></textarea>
</div>

<div class="form-group">
<labe >feature_cover3 txt4 </label>
<textarea type="text" name="feature_cover_txt12" class="form-control"><?php echo $res['feature_cover_txt12'];?></textarea>
</div>

<hr>
<input  type="submit" class="btn btn-default " name="update" value="Update">
</form>
</div>
</div>
</div>
</div></div>






<form  method="post" enctype="multipart/form-data" >
<div class="portlet portlet-default">
<div class="portlet-heading">
<div class="portlet-title">
<h4>Post Slider Background <span>width: 300px height: 612px</span></h4>
</div>
<div class="portlet-widgets">
<a data-toggle="collapse" data-parent="#accordion" href="#basicFormExample"><i class="fa fa-chevron-down"></i></a>
</div>
<div class="clearfix"></div>
</div>
<div id="basicFormExample" class="panel-collapse collapse in">
<div class="portlet-body">


<div class="row">

<div class="col-sm-6">
<img  height="200" class="img img-responsive" src="../images/<?php echo $res['feature_cover1'];?>">
</div>

<div class="col-sm-6">
<div class="form-group">
<br>  <hr>
<label >Choose New Banner  </label>
<input   type="file"   name="feature_cover1" accept="image/*" />
</div>
<hr>
<input  type="submit" class="btn btn-default " name="feature_cover1update" value="Update">
</form>
</div>
</div>
</div>
</div>
</div>



<form  method="post" enctype="multipart/form-data" >
<div class="portlet portlet-default">
<div class="portlet-heading">
<div class="portlet-title">
<h4>Posts Background <span>width: 300px height: 612px</span></h4>
</div>
<div class="portlet-widgets">
<a data-toggle="collapse" data-parent="#accordion" href="#basicFormExample"><i class="fa fa-chevron-down"></i></a>
</div>
<div class="clearfix"></div>
</div>
<div id="basicFormExample" class="panel-collapse collapse in">
<div class="portlet-body">


<div class="row">

<div class="col-sm-6">
<img  height="200" class="img img-responsive"  src="../images/<?php echo $res['feature_cover2'];?>">
</div>

<div class="col-sm-6">
<div class="form-group">
<br>  <hr>
<label >Choose New banner feature_cover 2 </label>
<input   type="file"   name="feature_cover2" accept="image/*" />
</div>
<hr>
<input  type="submit" class="btn btn-default " name="feature_cover2update" value="Update">
</form>
</div>
</div>
</div>
</div>
</div>



<form  method="post" enctype="multipart/form-data" >
<div class="portlet portlet-default">
<div class="portlet-heading">
<div class="portlet-title">
<h4>Contact Background <span>width: 300px height: 612px</span></h4>
</div>
<div class="portlet-widgets">
<a data-toggle="collapse" data-parent="#accordion" href="#basicFormExample"><i class="fa fa-chevron-down"></i></a>
</div>
<div class="clearfix"></div>
</div>
<div id="basicFormExample" class="panel-collapse collapse in">
<div class="portlet-body">


<div class="row">

<div class="col-sm-6">
<img  height="200" class="img img-responsive" src="../images/<?php echo $res['feature_cover3']; ?>">
</div>

<div class="col-sm-6">
<div class="form-group">
<br>  <hr>
<label >Choose New feature_cover3 banner </label>
<input   type="file"   name="feature_cover3" accept="image/*" />
</div>
<hr>
<input  type="submit" class="btn btn-default " name="feature_cover3update" value="Update">
</form>
</div>
</div>
</div>
</div>
</div>



<form  method="post" enctype="multipart/form-data" >
<div class="portlet portlet-default">
<div class="portlet-heading">
<div class="portlet-title">
<h4>Update feature_cover 4 <span>width: 300px height: 612px</span></h4>
</div>
<div class="portlet-widgets">
<a data-toggle="collapse" data-parent="#accordion" href="#basicFormExample"><i class="fa fa-chevron-down"></i></a>
</div>
<div class="clearfix"></div>
</div>
<div id="basicFormExample" class="panel-collapse collapse in">
<div class="portlet-body">


<div class="row">

<div class="col-sm-6">
<img  height="200" class="img img-responsive"  src="../images/<?php echo $res['feature_cover4'];?>">
</div>

<div class="col-sm-6">
<div class="form-group">
<br>  <hr>
<label >Choose New banner feature_cover 4 </label>
<input   type="file"   name="feature_cover4" accept="image/*" />
</div>
<hr>
<input  type="submit" class="btn btn-default " name="feature_cover4update" value="Update">
</form>
</div>
</div>
</div>
</div>
</div>



</div>
</div> <!-- row end -->


</div> <!-- /.page-content -->


<?php include_once'include/footer.php'; ?>