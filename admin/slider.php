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

$stmt = $user_slider->runQuery("SELECT * FROM  slider WHERE slider_id =:uid");
$stmt->execute(array(":uid"=>$_SESSION['adminSession']));
$res = $stmt->fetch(PDO::FETCH_ASSOC);

error_reporting( ~E_NOTICE );

if(isset($_POST['update']))
{

$slider_txt1 =$_POST['slider_txt1'] ;
$slider_txt2 =$_POST['slider_txt2'] ;
$slider_txt3 =$_POST['slider_txt3'] ;
$slider_txt4 =$_POST['slider_txt4'] ;
$slider_txt5 =$_POST['slider_txt5'] ;
$slider_txt6 =$_POST['slider_txt6'] ;
$slider_txt7 =$_POST['slider_txt7'] ;
$slider_txt8 =$_POST['slider_txt8'] ;
$slider_txt9 =$_POST['slider_txt9'] ;
$slider_txt10 =$_POST['slider_txt10'] ;
$slider_txt11 =$_POST['slider_txt11'] ;
$slider_txt12 =$_POST['slider_txt12'] ;

	if(!isset($errMSG))
	{
	$stmt = $user_slider->runQuery("UPDATE slider 
	SET 
	slider_txt1 =:b1,
	slider_txt2 =:b2,
	slider_txt3 =:b3,
	slider_txt4 =:b4,
	slider_txt5 =:b5,
	slider_txt6 =:b6,
	slider_txt7 =:b7,
	slider_txt8 =:b8,
	slider_txt9 =:b9,
	slider_txt10 =:b10,
	slider_txt11 =:b11,
	slider_txt12 =:b12
	WHERE slider_id=:pgeid");
	$stmt->bindParam(':b1',$slider_txt1);
	$stmt->bindParam(':b2',$slider_txt2);
	$stmt->bindParam(':b3',$slider_txt3);
	$stmt->bindParam(':b4',$slider_txt4);
	$stmt->bindParam(':b5',$slider_txt5);
	$stmt->bindParam(':b6',$slider_txt6);
	$stmt->bindParam(':b7',$slider_txt7);
	$stmt->bindParam(':b8',$slider_txt8);
	$stmt->bindParam(':b9',$slider_txt9);
	$stmt->bindParam(':b10',$slider_txt10);
	$stmt->bindParam(':b11',$slider_txt11);
	$stmt->bindParam(':b12',$slider_txt12);
	$stmt->bindParam(':pgeid',$row['adminID']);
		if($stmt->execute())
		{
		$successMSG = "update Successfully";
		header('refresh:1; slider.php');
		}
		else
		{
		$errMSG = "error something wrong ! please try later...";
		}
	}
}


//-------------------------------------------------------------
//slider1
if(isset($_POST['slide1update']))
{

$slide1 = $_FILES['slide1']['name'];
$tmp_dir = $_FILES['slide1']['tmp_name'];
$imgSize = $_FILES['slide1']['size']; 

if($slide1)
{
$upload_dir = '../images/slider/'; // upload directory
$imgExt = strtolower(pathinfo($slide1,PATHINFO_EXTENSION)); // get image extension
$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
$slide1 = rand(1000,1000000).".".$imgExt;
if(in_array($imgExt, $valid_extensions)){           
if($imgSize < 5000000)              {
move_uploaded_file($tmp_dir,$upload_dir.$slide1);
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
$slide1 = $res['slide1']; // old image from database
}            

// if no error occured, continue ....
if(!isset($errMSG))
{
$stmt = $user_slider->runQuery("UPDATE slider 
SET 
slide1=:b1
WHERE slider_id=:pgeid");
$stmt->bindParam(':b1',$slide1);
$stmt->bindParam(':pgeid',$row['adminID']);
if($stmt->execute())
{
$successMSG = "update Successfully";
header('refresh:1; slider.php');
}
else
{
$errMSG = "error something wrong ! please try later...";
}
}
}
//---------------------------------------------------------------
//slider2
if(isset($_POST['slide2update']))
{

$slide2 = $_FILES['slide2']['name'];
$tmp_dir = $_FILES['slide2']['tmp_name'];
$imgSize = $_FILES['slide2']['size']; 

if($slide2)
{
$upload_dir = '../images/slider/'; // upload directory
$imgExt = strtolower(pathinfo($slide2,PATHINFO_EXTENSION)); // get image extension
$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
$slide2 = rand(1000,1000000).".".$imgExt;
if(in_array($imgExt, $valid_extensions)){           
if($imgSize < 5000000)              {
move_uploaded_file($tmp_dir,$upload_dir.$slide2);
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
$slide2 = $res['slide2']; // old image from database
}            

// if no error occured, continue ....
if(!isset($errMSG))
{
$stmt = $user_slider->runQuery("UPDATE slider 
SET 
slide2=:b1
WHERE slider_id=:pgeid");
$stmt->bindParam(':b1',$slide2);
$stmt->bindParam(':pgeid',$row['adminID']);
if($stmt->execute())
{
$successMSG = "update Successfully";
header('refresh:1; slider.php');
}
else
{
$errMSG = "error something wrong ! please try later...";
}
}
}

//--------------------------------------------------------
//slider3
if(isset($_POST['slide3update']))
{

$slide3 = $_FILES['slide3']['name'];
$tmp_dir = $_FILES['slide3']['tmp_name'];
$imgSize = $_FILES['slide3']['size']; 

if($slide3)
{
$upload_dir = '../images/slider/'; // upload directory
$imgExt = strtolower(pathinfo($slide3,PATHINFO_EXTENSION)); // get image extension
$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
$slide3 = rand(1000,1000000).".".$imgExt;
if(in_array($imgExt, $valid_extensions)){           
if($imgSize < 5000000)              {
move_uploaded_file($tmp_dir,$upload_dir.$slide3);
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
$slide3 = $res['slide3']; // old image from database
}            

// if no error occured, continue ....
if(!isset($errMSG))
{
$stmt = $user_slider->runQuery("UPDATE slider 
SET 
slide3=:b1
WHERE slider_id=:pgeid");
$stmt->bindParam(':b1',$slide3);
$stmt->bindParam(':pgeid',$row['adminID']);
if($stmt->execute())
{
$successMSG = "update Successfully";
header('refresh:1; slider.php');
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
<li class="active">Update Slider Slides</li>
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
<h4>Update Slider text</h4>
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
<labe >Slide1 txt1 </label>
<textarea type="text" name="slider_txt1" class="form-control"><?php echo $res['slider_txt1'];?>
</textarea>
</div>

<div class="form-group">
<labe >Slide1 txt2 </label>
<textarea type="text" name="slider_txt2" class="form-control"><?php echo $res['slider_txt2'];?></textarea>
</div>

<div class="form-group">
<labe >Slide1 txt3 </label>
<textarea type="text" name="slider_txt3" class="form-control"><?php echo $res['slider_txt3'];?></textarea>
</div>

<div class="form-group">
<labe >Slide1 txt4 </label>
<textarea type="text" name="slider_txt4" class="form-control"><?php echo $res['slider_txt4'];?></textarea>
</div>

</div>



<div class="col-sm-4">

<div class="form-group">
<labe >Slide2 txt1 </label>
<textarea type="text" name="slider_txt5" class="form-control"><?php echo $res['slider_txt5'];?></textarea>
</div>

<div class="form-group">
<labe >Slide2 txt2 </label>
<textarea type="text" name="slider_txt6" class="form-control"><?php echo $res['slider_txt6'];?></textarea>
</div>

<div class="form-group">
<labe >Slide2 txt3 </label>
<textarea type="text" name="slider_txt7" class="form-control"><?php echo $res['slider_txt7'];?></textarea>
</div>

<div class="form-group">
<labe >Slide2 txt4 </label>
<textarea type="text" name="slider_txt8" class="form-control"><?php echo $res['slider_txt8'];?></textarea>
</div>

</div>


<div class="col-sm-4">

<div class="form-group">
<labe >Slide3 txt1 </label>
<textarea type="text" name="slider_txt9" class="form-control"><?php echo $res['slider_txt9'];?></textarea>
</div>

<div class="form-group">
<labe >Slide3 txt2 </label>
<textarea type="text" name="slider_txt10" class="form-control"><?php echo $res['slider_txt10'];?></textarea>
</div>

<div class="form-group">
<labe >Slide3 txt3 </label>
<textarea type="text" name="slider_txt11" class="form-control"><?php echo $res['slider_txt11'];?></textarea>
</div>

<div class="form-group">
<labe >Slide3 txt4 </label>
<textarea type="text" name="slider_txt12" class="form-control"><?php echo $res['slider_txt12'];?></textarea>
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
<h4>Update Slide1</h4>
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
<img  height="200" class="img img-responsive" src="../images/slider/<?php echo $res['slide1'];?>">
</div>

<div class="col-sm-6">
<div class="form-group">
<br>  <hr>
<label >Choose New Banner  Slide 1  </label>
<input   type="file"   name="slide1" accept="image/*" />
</div>
<hr>
<input  type="submit" class="btn btn-default " name="slide1update" value="Update">
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
<h4>Update Slide 2</h4>
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
<img  height="200" class="img img-responsive"  src="../images/slider/<?php echo $res['slide2'];?>">
</div>

<div class="col-sm-6">
<div class="form-group">
<br>  <hr>
<label >Choose New banner Slide 2 </label>
<input   type="file"   name="slide2" accept="image/*" />
</div>
<hr>
<input  type="submit" class="btn btn-default " name="slide2update" value="Update">
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
<h4>Update Slide 3</h4>
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
<img  height="200" class="img img-responsive" src="../images/slider/<?php echo $res['slide3']; ?>">
</div>

<div class="col-sm-6">
<div class="form-group">
<br>  <hr>
<label >Choose New Slide3 banner </label>
<input   type="file"   name="slide3" accept="image/*" />
</div>
<hr>
<input  type="submit" class="btn btn-default " name="slide3update" value="Update">
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