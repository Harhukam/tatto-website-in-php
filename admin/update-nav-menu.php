<?php
session_start();
require_once 'class.admin.php';
$user_update_navbar = new ADMIN();

if(!$user_update_navbar->is_logged_in())
{
$user_update_navbar->redirect('index.php');
}

$stmt = $user_update_navbar->runQuery("SELECT * FROM  tbl_admin WHERE adminID =:uid");
$stmt->execute(array(":uid"=>$_SESSION['adminSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
//extract($row);


if(isset($_GET['uptkey']) && !empty($_GET['uptkey'])) 
{
$id = $_GET['uptkey'];
$stmt = $user_update_navbar->runQuery('SELECT * FROM navbar WHERE navbar_id =:pid');
$stmt->execute(array(':pid'=>$id));
$edit_row = $stmt->fetch(PDO::FETCH_ASSOC);
extract($edit_row);
}


error_reporting( ~E_NOTICE );

if(isset($_POST['update']))
{
	    $adminID = $row[adminID];
	    $navbar_cat = $_POST['cat'];
	    $navbar_name = $_POST['name'];
	    $navbar_url = $_POST['url'];
	    
	    
        if(!isset($errMSG))
        {
        $stmt = $user_update_navbar->runQuery("UPDATE navbar 
                                        SET 
                                        adminID=:b1,
                                        navbar_cat=:b2,
                                        navbar_name=:b3,
	                                     navbar_url=:b4
	                                     WHERE navbar_id=:upid");
        $stmt->bindParam(':b1',$adminID);
        $stmt->bindParam(':b2',$navbar_cat);
		$stmt->bindParam(':b3',$navbar_name);
		$stmt->bindParam(':b4',$navbar_url);
		$stmt->bindParam(':upid',$id);
		if($stmt->execute())
		{
		$successMSG = "update Successfully";
		header('refresh:1;  nav-menu.php');
		}
		else
		{
		$errMSG = "error something wrong ! please try later...";
		}
		
}}
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
<div class="col-sm-12">
<form method="post" enctype="multipart/form-data">

<input type="hidden"   name="cat" value="<?php echo $edit_row['navbar_cat']; ?>">

<div class="form-group">
<label >Navbar Name</label>
<input type="text" class="form-control" placeholder="example: Home" name="name" value="<?php echo $edit_row[navbar_name] ?>" required="required">
</div>




<div class="form-group">
<label >Navbar Url</label>
<input type="text" class="form-control" placeholder="example: index.php" name="url" value="<?php echo $edit_row[navbar_url] ?>" required="required">
</div>


	<br>
<input  type="submit" class="btn btn-default btn-sm" name="update" value="Update">

</div> <!-- col-12 first-->
</form>
</div>
</div>


</div> <!-- row internal -->
</div>
</div>
</div>

</div> <!-- row end -->
</div> <!-- /.page-content -->


<?php include_once'include/footer.php'; ?>