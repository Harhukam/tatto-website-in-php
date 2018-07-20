<?php
session_start();
require_once 'class.admin.php';
$user_update_contact = new ADMIN();

if(!$user_update_contact->is_logged_in())
{
$user_update_contact->redirect('index.php');
}

$stmt = $user_update_contact->runQuery("SELECT * FROM  tbl_admin WHERE adminID =:uid");
$stmt->execute(array(":uid"=>$_SESSION['adminSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
//extract($row);
$stmt = $user_update_contact->runQuery("SELECT * FROM  contact_us WHERE contact_id =:did");
$stmt->execute(array(":did"=>$_SESSION['adminSession']));
$result = $stmt->fetch(PDO::FETCH_ASSOC);

error_reporting( ~E_NOTICE );

if(isset($_POST['update']))
{
	    $contact_title = $_POST['contact_title'];
	    $contact_description = $_POST['contact_description'];
	    $contact_heading = $_POST['contact_heading'];
	    $contact_companyname = $_POST['contact_companyname'];
	    $contact_address_title = $_POST['contact_address_title'];
	    $contact_address = $_POST['contact_address'];
	    $contact_mobile_heading = $_POST['contact_mobile_heading'];
	    $contact_mobile_numbers = $_POST['contact_mobile_numbers'];
	    $contact_email_heading = $_POST['contact_email_heading'];
	    $contact_email_text = $_POST['contact_email_text'];
	    $contact_hours_heading = $_POST['contact_hours_heading'];
	    $contact_hours_text = $_POST['contact_hours_text'];
	    

	    
	    $contact_photo = $_FILES['contact_photo']['name'];
	    $tmp_dir = $_FILES['contact_photo']['tmp_name'];
	    $imgSize = $_FILES['contact_photo']['size']; 

		if($contact_photo)
		{
		$upload_dir = '../images/'; 
		$imgExt = strtolower(pathinfo($contact_photo,PATHINFO_EXTENSION)); 
		$valid_extensions = array('jpeg', 'jpg', 'png', 'gif','jfif'); 
		$contact_photo = rand(1000,1000000).".".$imgExt;
		if(in_array($imgExt, $valid_extensions)){           
		if($imgSize < 5000000)              {
		move_uploaded_file($tmp_dir,$upload_dir.$contact_photo);
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
		$contact_photo = $result['contact_photo']; 
		}    
	    
	    
        if(!isset($errMSG))
        {
        $stmt = $user_update_contact->runQuery("UPDATE contact_us 
                                         SET 
                                        contact_title =:b1,
                                         contact_description=:b2,
                                         contact_heading=:b3,
                                         contact_photo=:b4,
                                         contact_companyname=:b5,
                                         contact_address_title=:b6,
                                         contact_address=:b7,
                                         contact_mobile_heading=:b8,
                                         contact_mobile_numbers=:b9,
                                         contact_email_heading=:b10,
                                         contact_email_text=:b11,
                                         contact_hours_heading=:b12,
                                         contact_hours_text=:b13
	                                     WHERE contact_id=:pid");
		$stmt->bindParam(':b1',$contact_title);
		$stmt->bindParam(':b2',$contact_description);
		$stmt->bindParam(':b3',$contact_heading);
		$stmt->bindParam(':b4',$contact_photo);
		$stmt->bindParam(':b5',$contact_companyname);
		$stmt->bindParam(':b6',$contact_address_title);
		$stmt->bindParam(':b7',$contact_address);
		$stmt->bindParam(':b8',$contact_mobile_heading);
		$stmt->bindParam(':b9',$contact_mobile_numbers);
		$stmt->bindParam(':b10',$contact_email_heading);
		$stmt->bindParam(':b11',$contact_email_text);
		$stmt->bindParam(':b12',$contact_hours_heading);
		$stmt->bindParam(':b13',$contact_hours_text);
		$stmt->bindParam(':pid',$row[adminID]);
		if($stmt->execute())
		{
		$successMSG = "update Successfully";
		header('refresh:1;  update-contact.php');
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
<label>Contact meta title </label>
<input type="text" class="form-control" value="<?php echo $result['contact_title'];?>" name="contact_title" required="required" maxlength="65">
</div>


<div class="form-group">
<label>Contact meta description </label>
<textarea type="text" class="form-control" name="contact_description" required="required" maxlength="165"><?php echo $result['contact_description'];?> </textarea>
</div>

<div class="form-group">
<label >Contact </label>
<input type="text" class="form-control" value="<?php echo $result['contact_heading'];?>" name="contact_heading" required="required" maxlength="20" placeholder="eg: Contact Us">
</div>

<div class="form-group">
<img id="blah" src="../images/<?php echo $result['contact_photo'];?>" alt="." style=" max-width: 280px; max-height: 180px;" /> 
<hr>
<label>Choose Image </label>
<input type="file" class="form-control" name="contact_photo" id="imgInp" accept="image/*" />
</div>

<div class="form-group">
<label >Contact Company name </label>
<input type="text" class="form-control" value="<?php echo $result['contact_companyname'];?>" name="contact_companyname" required="required" maxlength="50" placeholder="eg: xyz ptv. ltd.">
</div>


<div class="form-group">
<label >Address titile eg: address </label>
<input type="text" class="form-control" value="<?php echo $result['contact_address_title'];?>" name="contact_address_title" required="required" maxlength="10" placeholder="eg: building 420 new york, USA">
</div>

<div class="form-group">
<label >Address </label>
<textarea type="text" class="form-control" name="contact_address" required="required" maxlength="100"><?php echo $result['contact_address'];?> </textarea>
</div>

<div class="form-group">
<label >Mobile eg: Contact No's </label>
<input type="text" class="form-control" value="<?php echo $result['contact_mobile_heading'];?>" name="contact_mobile_heading" required="required" maxlength="10" >
</div>

<div class="form-group">
<label >Number's </label>
<textarea type="text" class="form-control" name="contact_mobile_numbers" required="required" maxlength="50"><?php echo $result['contact_mobile_numbers'];?> </textarea>
</div>


<div class="form-group">
<label >Email eg: Email</label>
<input type="text" class="form-control" value="<?php echo $result['contact_email_heading'];?>" name="contact_email_heading" required="required" maxlength="10" placeholder="eg: Mission">
</div>

<div class="form-group">
<label >Email eg: info@domain.com</label>
<input type="text" class="form-control" value="<?php echo $result['contact_email_text'];?>" name="contact_email_text" required="required" maxlength="30" >
</div>


<div class="form-group">
<label >Hours eg: Hours </label>
<input type="text" class="form-control" value="<?php echo $result['contact_hours_heading'];?>" name="contact_hours_heading" required="required" maxlength="10" >
</div>

<div class="form-group">
<label >hours eg: 9:30am to :30pm </label>
<textarea type="text" class="form-control" name="contact_hours_text" required="required" maxlength="30"><?php echo $result['contact_hours_text'];?> </textarea>
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