<?php
session_start();
require_once 'class.admin.php';
$user_postedit = new ADMIN();

if(!$user_postedit->is_logged_in())
{
$user_postedit->redirect('index.php');
}

$stmt = $user_postedit->runQuery("SELECT * FROM  tbl_admin WHERE adminID =:uid");
$stmt->execute(array(":uid"=>$_SESSION['adminSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
//extract($row);

error_reporting( ~E_NOTICE );

// if(isset($_POST['update']))
// {
// 	    $ = $_POST['x'];
	    
// 	    $pic = $_FILES['photo']['name'];
// 	    $tmp_dir = $_FILES['photo']['tmp_name'];
// 	    $imgSize = $_FILES['photo']['size']; 

// 		if($pic)
// 		{
// 		$upload_dir = '../images/'; 
// 		$imgExt = strtolower(pathinfo($pic,PATHINFO_EXTENSION)); 
// 		$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); 
// 		$pic = rand(1000,1000000).".".$imgExt;
// 		if(in_array($imgExt, $valid_extensions)){           
// 		if($imgSize < 5000000)              {
// 		move_uploaded_file($tmp_dir,$upload_dir.$pic);
// 		}
// 		else
// 		{
// 		$errMSG = "Sorry, your file is too large it should be less then 5MB";
// 		}
// 		}
// 		else
// 		{
// 		$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";        
// 		}   
// 		}
// 		else
// 		{
// 		$pic = $row['Photo']; 
// 		}            

        
//         if(!isset($errMSG))
//         {
//         $stmt = $user_postedit->runQuery("UPDATE tbl_admin 
//                                          SET 
//                                          x=:b1,
// 	                                     x=:b2
// 	                                     WHERE adminID=:pid");
// 		$stmt->bindParam(':b1',$adminName);
// 		$stmt->bindParam(':b2',$adminPhoto);
// 		$stmt->bindParam(':pid',$row[adminID]);
// 		if($stmt->execute())
// 		{
// 		$successMSG = "update Successfully";
// 		header('refresh:1;  home.php');
// 		}
// 		else
// 		{
// 		$errMSG = "error something wrong ! please try later...";
// 		}
// 		}
// }
?>
<?php include_once'include/header.php'; ?>
<div class="page-content">
<div class="row">
<div class="col-lg-12">
<div class="page-title">
<ol class="breadcrumb">
<li><i class="fa fa-dashboard"></i>  <a href="#">Dashboard</a>
</li>
<li class="active">Main menu</li>
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
<h4>main menu</h4>
</div>
<div class="portlet-widgets">
<a data-toggle="collapse" data-parent="#accordion" href="#basicFormExample"><i class="fa fa-chevron-down"></i></a>
</div>
<div class="clearfix"></div>
</div>
<div id="basicFormExample" class="panel-collapse collapse in">
<div class="portlet-body">

<div class="row">

<div class="col-sm-5 shedow">

<form method="post" enctype="multipart/form-data">

<div class="form-group">
<img id="blah" src="#" alt="." style=" max-width: 280px; max-height: 180px;" /> 
<br/>
<label>Choose Image </label>
<input type="file" name="photo" id="imgInp" accept="image/*" />
</div>

<div class="form-group">
<label >Page Title (Display)</label>
<input type="text" class="form-control" name="" required="required">
</div>

<hr>
<input  type="submit" class="btn btn-default " name="save" value="update">
</form>


</div> <!-- col-5 first-->

<div class="col-sm-6 shedow">
<form method="post" enctype="multipart/form-data">

<div class="form-group">
<label >Page Title (Display)</label>
<input type="text" class="form-control" name="" required="required">
</div>

<hr>
<input  type="submit" class="btn btn-default " name="save" value="update">
</form>
</div><!-- col-5 second-->

</div> <!-- row internal -->
</div>
</div>
</div>

</div> <!-- row end -->
</div> <!-- /.page-content -->


<?php include_once'include/footer.php'; ?>