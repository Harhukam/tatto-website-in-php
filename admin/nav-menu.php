<?php
session_start();
require_once 'class.admin.php';
$user_navbar = new ADMIN();

if(!$user_navbar->is_logged_in())
{
$user_navbar->redirect('index.php');
}

$stmt = $user_navbar->runQuery("SELECT * FROM  tbl_admin WHERE adminID =:uid");
$stmt->execute(array(":uid"=>$_SESSION['adminSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
//extract($row);

if(isset($_GET['delkey']))
{
$id = base64_decode(urldecode($_GET['delkey']));//encryption
$stmt = $user_navbar->runQuery('DELETE FROM navbar WHERE navbar_id =:bid');
$stmt->execute(array(':bid'=>$id));
header('refresh:1; nav-menu.php');
}

error_reporting( ~E_NOTICE );

if(isset($_POST['save']))
{
	    $adminID = $row[adminID];
	    $navbar_cat = $_POST['cat'];
	    $navbar_name = $_POST['name'];
	    $navbar_url = $_POST['url'];
	    
	if(!isset($errMSG))
    {
    	$stmt = $user_navbar->runQuery("INSERT INTO navbar(adminID,navbar_cat,navbar_name,navbar_url) 
                     VALUES(:a1,:a2,:a3,:a4)");
    	            $stmt->bindparam(":a1",$adminID);
					$stmt->bindparam(":a2",$navbar_cat);
					$stmt->bindparam(":a3",$navbar_name);
					$stmt->bindparam(":a4",$navbar_url);
				    if($stmt->execute())
					{
					$successMSG = "Insert Successfully";
					header('refresh:1;  nav-menu.php');
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
<li class="active">Main menu</li>
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

<div class="col-sm-5 shedow" style="border-right: 4px solid #ED9C28; margin-left: 15px; ">
<form method="post" enctype="multipart/form-data">


<input type="hidden"   name="cat" value="navbar">

<div class="form-group">
<label >Navbar Name</label>
<input type="text" class="form-control" placeholder="example: Home" name="name" required="required">
</div>

<div class="form-group">
<label >Navbar Url</label>
<input type="text" class="form-control" placeholder="example: index.php" name="url" required="required">
</div>

<hr>
<input  type="submit" class="btn btn-default btn-sm" name="save" value="Submit">
</form>

</div> <!-- col-5 first-->


<div class="col-sm-1 "> </div>
<div class="col-sm-5 shedow">
<?php
$stmt = $user_navbar->runQuery("SELECT * FROM navbar ORDER BY navbar_id DESC");
$stmt->execute();
if($stmt->rowCount() > 0)
{
while($result=$stmt->fetch(PDO::FETCH_ASSOC))
{
extract($result);
$key = urlencode(base64_encode($result['navbar_id']));
?>
<div class="well well-info">

<b>Navbar Name : </b>
 <span style="font-weight: bold; color: orange;"><?php echo $result['navbar_name'];?></span> 
</p>

<b>Navbar URL : </b>
 <span style="font-weight: bold; color: orange;"><?php echo $result['navbar_url'];?></span> 
</p>

<b>Navbar Category : </b>
 <span style="font-weight: bold; color: orange;"><?php echo $result['navbar_cat'];?></span> 
</p>

<hr>
<div>
 <a class="btn btn-xs btn-info" href="update-nav-menu.php?uptkey=<?php echo $result['navbar_id']; ?>"><span class="glyphicon glyphicon-edit"></span> edit </a> 

<a class="btn btn-xs btn-warning" href="nav-menu.php?delkey=<?php echo $key; ?>" title="click for delete" onclick="return confirm('sure to delete ?')"><span class="glyphicon glyphicon-trash"></span> delete</a>
</div>
</div><!-- panel -->
<?php
}
}
else
{
?>
<span style="color: red;" class="glyphicon glyphicon-info-sign"></span> &nbsp; No record inserted
<?php
}  
?>
</div><!-- col-5 second-->

</div> <!-- row internal -->
</div>
</div>
</div>

</div> <!-- row end -->
</div> <!-- /.page-content -->


<?php include_once'include/footer.php'; ?>