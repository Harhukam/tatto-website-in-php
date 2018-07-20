<?php
session_start();
require_once 'class.admin.php';
$user_update_about = new ADMIN();

if(!$user_update_about->is_logged_in())
{
$user_update_about->redirect('index.php');
}

$stmt = $user_update_about->runQuery("SELECT * FROM  tbl_admin WHERE adminID =:uid");
$stmt->execute(array(":uid"=>$_SESSION['adminSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
//extract($row);
$stmt = $user_update_about->runQuery("SELECT * FROM  about_us WHERE about_id =:uid");
$stmt->execute(array(":uid"=>$_SESSION['adminSession']));
$result = $stmt->fetch(PDO::FETCH_ASSOC);

error_reporting( ~E_NOTICE );

if(isset($_POST['update']))
{
	    $about_title = $_POST['txt_title'];
	    $about_description = $_POST['txt_description'];
	    $about_heading = $_POST['txt_heading'];
	    $about_text = $_POST['txt_about_txt'];
	    $about_vision = $_POST['txt_vision'];
	    $about_vision_text = $_POST['txt_vision_txt'];
	    $about_mission = $_POST['txt_mission'];
	    $about_mission_text = $_POST['txt_mission_txt'];
	    
	    $about_photo = $_FILES['about_photo']['name'];
	    $tmp_dir = $_FILES['about_photo']['tmp_name'];
	    $imgSize = $_FILES['about_photo']['size']; 

		if($about_photo)
		{
		$upload_dir = '../images/'; 
		$imgExt = strtolower(pathinfo($about_photo,PATHINFO_EXTENSION)); 
		$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); 
		$about_photo = rand(1000,1000000).".".$imgExt;
		if(in_array($imgExt, $valid_extensions)){           
		if($imgSize < 5000000)              {
		move_uploaded_file($tmp_dir,$upload_dir.$about_photo);
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
		$about_photo = $result['about_photo']; 
		}    
	    
	    
        if(!isset($errMSG))
        {
        $stmt = $user_update_about->runQuery("UPDATE about_us 
                                         SET 
                                        about_title =:b1,
                                         about_description=:b2,
                                         about_heading=:b3,
                                         about_text=:b4,
                                         about_photo=:b5,
                                         about_vision=:b6,
                                         about_vision_text=:b7,
                                         about_mission=:b8,
                                         about_mission_text=:b9
	                                     WHERE about_id=:pid");
		$stmt->bindParam(':b1',$about_title);
		$stmt->bindParam(':b2',$about_description);
		$stmt->bindParam(':b3',$about_heading);
		$stmt->bindParam(':b4',$about_text);
		$stmt->bindParam(':b5',$about_photo);
		$stmt->bindParam(':b6',$about_vision);
		$stmt->bindParam(':b7',$about_vision_text);
		$stmt->bindParam(':b8',$about_mission);
		$stmt->bindParam(':b9',$about_mission_text);
		$stmt->bindParam(':pid',$row[adminID]);
		if($stmt->execute())
		{
		$successMSG = "update Successfully";
		header('refresh:1;  update-about.php');
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
<h4>Update website About US </h4>
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
<label>About meta title </label>
<input type="text" class="form-control" value="<?php echo $result['about_title'];?>" name="txt_title" required="required" maxlength="65">
</div>


<div class="form-group">
<label>About meta description </label>
<textarea type="text" class="form-control" name="txt_description" required="required" maxlength="165"><?php echo $result['about_description'];?> </textarea>
</div>

<div class="form-group">
<label >About Us </label>
<input type="text" class="form-control" value="<?php echo $result['about_heading'];?>" name="txt_heading" required="required" maxlength="20" placeholder="eg: About Us">
</div>

<div class="form-group">
<label >About text </label>
<textarea type="text" class="form-control" name="txt_about_txt" required="required" maxlength="995"><?php echo $result['about_text'];?> </textarea>
</div>

<div class="form-group">
<img id="blah" src="../images/<?php echo $result['about_photo'];?>" alt="." style=" max-width: 280px; max-height: 180px;" /> 
<hr>
<label>Choose Image </label>
<input type="file" class="form-control" name="about_photo" id="imgInp" accept="image/*" />
</div>

<div class="form-group">
<label >Vision </label>
<input type="text" class="form-control" value="<?php echo $result['about_vision'];?>" name="txt_vision" required="required" maxlength="20" placeholder="eg: Vision">
</div>

<div class="form-group">
<label >Vision text </label>
<textarea type="text" class="form-control" name="txt_vision_txt" required="required" maxlength="990"><?php echo $result['about_vision_text'];?> </textarea>
</div>

<div class="form-group">
<label >Mission </label>
<input type="text" class="form-control" value="<?php echo $result['about_mission'];?>" name="txt_mission" required="required" maxlength="20" placeholder="eg: Mission">
</div>

<div class="form-group">
<label >Mission text </label>
<textarea type="text" class="form-control" name="txt_mission_txt" required="required" maxlength="990"><?php echo $result['about_mission_text'];?> </textarea>
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