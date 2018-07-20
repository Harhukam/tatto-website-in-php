<?php
session_start();
require_once 'class.admin.php';
$user_cover = new ADMIN();

if(!$user_cover->is_logged_in())
{
$user_cover->redirect('index.php');
}

$stmt = $user_cover->runQuery("SELECT * FROM  tbl_admin WHERE adminID =:uid");
$stmt->execute(array(":uid"=>$_SESSION['adminSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt = $user_cover->runQuery("SELECT * FROM  cover WHERE cover_id =:uid");
$stmt->execute(array(":uid"=>$_SESSION['adminSession']));
$res = $stmt->fetch(PDO::FETCH_ASSOC);

error_reporting( ~E_NOTICE );

if(isset($_POST['update']))
{

$cover_txt1 =$_POST['cover_txt1'] ;
$cover_txt2 =$_POST['cover_txt2'] ;
$cover_txt3 =$_POST['cover_txt3'] ;
$cover_txt4 =$_POST['cover_txt4'] ;
$cover_txt5 =$_POST['cover_txt5'] ;
$cover_txt6 =$_POST['cover_txt6'] ;
$cover_txt7 =$_POST['cover_txt7'] ;
$cover_txt8 =$_POST['cover_txt8'] ;
$cover_txt9 =$_POST['cover_txt9'] ;
$cover_txt10 =$_POST['cover_txt10'] ;
$cover_txt11 =$_POST['cover_txt11'] ;
$cover_txt12 =$_POST['cover_txt12'] ;

	if(!isset($errMSG))
	{
	$stmt = $user_cover->runQuery("UPDATE cover 
	SET 
	cover_txt1 =:b1,
	cover_txt2 =:b2,
	cover_txt3 =:b3,
	cover_txt4 =:b4,
	cover_txt5 =:b5,
	cover_txt6 =:b6,
	cover_txt7 =:b7,
	cover_txt8 =:b8,
	cover_txt9 =:b9,
	cover_txt10 =:b10,
	cover_txt11 =:b11,
	cover_txt12 =:b12
	WHERE cover_id=:pgeid");
	$stmt->bindParam(':b1',$cover_txt1);
	$stmt->bindParam(':b2',$cover_txt2);
	$stmt->bindParam(':b3',$cover_txt3);
	$stmt->bindParam(':b4',$cover_txt4);
	$stmt->bindParam(':b5',$cover_txt5);
	$stmt->bindParam(':b6',$cover_txt6);
	$stmt->bindParam(':b7',$cover_txt7);
	$stmt->bindParam(':b8',$cover_txt8);
	$stmt->bindParam(':b9',$cover_txt9);
	$stmt->bindParam(':b10',$cover_txt10);
	$stmt->bindParam(':b11',$cover_txt11);
	$stmt->bindParam(':b12',$cover_txt12);
	$stmt->bindParam(':pgeid',$row['adminID']);
		if($stmt->execute())
		{
		$successMSG = "update Successfully";
		header('refresh:1; update-cover.php');
		}
		else
		{
		$errMSG = "error something wrong ! please try later...";
		}
	}
}


//-------------------------------------------------------------
//cover1
if(isset($_POST['cover1update']))
{

$cover1 = $_FILES['cover1']['name'];
$tmp_dir = $_FILES['cover1']['tmp_name'];
$imgSize = $_FILES['cover1']['size']; 

if($cover1)
{
$upload_dir = '../images/cover/'; // upload directory
$imgExt = strtolower(pathinfo($cover1,PATHINFO_EXTENSION)); // get image extension
$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
$cover1 = rand(1000,1000000).".".$imgExt;
if(in_array($imgExt, $valid_extensions)){           
if($imgSize < 5000000)              {
move_uploaded_file($tmp_dir,$upload_dir.$cover1);
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
$cover1 = $res['cover1']; // old image from database
}            

// if no error occured, continue ....
if(!isset($errMSG))
{
$stmt = $user_cover->runQuery("UPDATE cover 
SET 
cover1=:b1
WHERE cover_id=:pgeid");
$stmt->bindParam(':b1',$cover1);
$stmt->bindParam(':pgeid',$row['adminID']);
if($stmt->execute())
{
$successMSG = "update Successfully";
header('refresh:1; update-cover.php');
}
else
{
$errMSG = "error something wrong ! please try later...";
}
}
}
//---------------------------------------------------------------
//cover2
if(isset($_POST['cover2update']))
{

$cover2 = $_FILES['cover2']['name'];
$tmp_dir = $_FILES['cover2']['tmp_name'];
$imgSize = $_FILES['cover2']['size']; 

if($cover2)
{
$upload_dir = '../images/cover/'; // upload directory
$imgExt = strtolower(pathinfo($cover2,PATHINFO_EXTENSION)); // get image extension
$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
$cover2 = rand(1000,1000000).".".$imgExt;
if(in_array($imgExt, $valid_extensions)){           
if($imgSize < 5000000)              {
move_uploaded_file($tmp_dir,$upload_dir.$cover2);
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
$cover2 = $res['cover2']; // old image from database
}            

// if no error occured, continue ....
if(!isset($errMSG))
{
$stmt = $user_cover->runQuery("UPDATE cover 
SET 
cover2=:b1
WHERE cover_id=:pgeid");
$stmt->bindParam(':b1',$cover2);
$stmt->bindParam(':pgeid',$row['adminID']);
if($stmt->execute())
{
$successMSG = "update Successfully";
header('refresh:1; update-cover.php');
}
else
{
$errMSG = "error something wrong ! please try later...";
}
}
}

//--------------------------------------------------------
//cover3
if(isset($_POST['cover3update']))
{

$cover3 = $_FILES['cover3']['name'];
$tmp_dir = $_FILES['cover3']['tmp_name'];
$imgSize = $_FILES['cover3']['size']; 

if($cover3)
{
$upload_dir = '../images/cover/'; // upload directory
$imgExt = strtolower(pathinfo($cover3,PATHINFO_EXTENSION)); // get image extension
$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
$cover3 = rand(1000,1000000).".".$imgExt;
if(in_array($imgExt, $valid_extensions)){           
if($imgSize < 5000000)              {
move_uploaded_file($tmp_dir,$upload_dir.$cover3);
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
$cover3 = $res['cover3']; // old image from database
}            

// if no error occured, continue ....
if(!isset($errMSG))
{
$stmt = $user_cover->runQuery("UPDATE cover 
SET 
cover3=:b1
WHERE cover_id=:pgeid");
$stmt->bindParam(':b1',$cover3);
$stmt->bindParam(':pgeid',$row['adminID']);
if($stmt->execute())
{
$successMSG = "update Successfully";
header('refresh:1; update-cover.php');
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
<li class="active">Update cover covers</li>
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
<h4>Update cover text</h4>
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
<labe >cover1 txt1 </label>
<textarea type="text" name="cover_txt1" class="form-control"><?php echo $res['cover_txt1'];?>
</textarea>
</div>

<div class="form-group">
<labe >cover1 txt2 </label>
<textarea type="text" name="cover_txt2" class="form-control"><?php echo $res['cover_txt2'];?></textarea>
</div>

<div class="form-group">
<labe >cover1 txt3 </label>
<textarea type="text" name="cover_txt3" class="form-control"><?php echo $res['cover_txt3'];?></textarea>
</div>

<div class="form-group">
<labe >cover1 txt4 </label>
<textarea type="text" name="cover_txt4" class="form-control"><?php echo $res['cover_txt4'];?></textarea>
</div>

</div>



<div class="col-sm-4">

<div class="form-group">
<labe >cover2 txt1 </label>
<textarea type="text" name="cover_txt5" class="form-control"><?php echo $res['cover_txt5'];?></textarea>
</div>

<div class="form-group">
<labe >cover2 txt2 </label>
<textarea type="text" name="cover_txt6" class="form-control"><?php echo $res['cover_txt6'];?></textarea>
</div>

<div class="form-group">
<labe >cover2 txt3 </label>
<textarea type="text" name="cover_txt7" class="form-control"><?php echo $res['cover_txt7'];?></textarea>
</div>

<div class="form-group">
<labe >cover2 txt4 </label>
<textarea type="text" name="cover_txt8" class="form-control"><?php echo $res['cover_txt8'];?></textarea>
</div>

</div>


<div class="col-sm-4">

<div class="form-group">
<labe >cover3 txt1 </label>
<textarea type="text" name="cover_txt9" class="form-control"><?php echo $res['cover_txt9'];?></textarea>
</div>

<div class="form-group">
<labe >cover3 txt2 </label>
<textarea type="text" name="cover_txt10" class="form-control"><?php echo $res['cover_txt10'];?></textarea>
</div>

<div class="form-group">
<labe >cover3 txt3 </label>
<textarea type="text" name="cover_txt11" class="form-control"><?php echo $res['cover_txt11'];?></textarea>
</div>

<div class="form-group">
<labe >cover3 txt4 </label>
<textarea type="text" name="cover_txt12" class="form-control"><?php echo $res['cover_txt12'];?></textarea>
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
<h4>Update cover1</h4>
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
<img  height="200" class="img img-responsive" src="../images/cover/<?php echo $res['cover1'];?>">
</div>

<div class="col-sm-6">
<div class="form-group">
<br>  <hr>
<label >Choose New Banner  cover 1  </label>
<input   type="file"   name="cover1" accept="image/*" />
</div>
<hr>
<input  type="submit" class="btn btn-default " name="cover1update" value="Update">
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
<h4>Update cover 2</h4>
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
<img  height="200" class="img img-responsive"  src="../images/cover/<?php echo $res['cover2'];?>">
</div>

<div class="col-sm-6">
<div class="form-group">
<br>  <hr>
<label >Choose New banner cover 2 </label>
<input   type="file"   name="cover2" accept="image/*" />
</div>
<hr>
<input  type="submit" class="btn btn-default " name="cover2update" value="Update">
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
<h4>Update cover 3</h4>
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
<img  height="200" class="img img-responsive" src="../images/cover/<?php echo $res['cover3']; ?>">
</div>

<div class="col-sm-6">
<div class="form-group">
<br>  <hr>
<label >Choose New cover3 banner </label>
<input   type="file"   name="cover3" accept="image/*" />
</div>
<hr>
<input  type="submit" class="btn btn-default " name="cover3update" value="Update">
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