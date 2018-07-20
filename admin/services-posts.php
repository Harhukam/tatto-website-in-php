<?php
session_start();
require_once 'class.admin.php';
$user_home = new admin();

if(!$user_home->is_logged_in())
{
$user_home->redirect('index.php');
}

$stmt = $user_home ->runQuery("SELECT * FROM  tbl_admin WHERE adminID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['adminSession']));
//$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
//extract($row);

error_reporting( ~E_NOTICE );

if(isset($_GET['delkey']))
 {
  // select image from db to delete
  $id = base64_decode(urldecode($_GET['delkey']));//encryption
  $stmt_select = $user_home ->runQuery('SELECT post_pic FROM post WHERE post_id =:uid');
  $stmt_select->execute(array(':uid'=>$id));
  $imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
  unlink("../images/".$imgRow['post_pic']);
  
  // it will delete an actual record from db
  $stmt_delete = $user_home ->runQuery('DELETE FROM post WHERE post_id =:uid');
  $stmt_delete->bindParam(':uid',$id);
  $stmt_delete->execute();
  
  header("Location: services-posts.php");
 }
?> 

<?php include_once'include/header.php'; ?>

<div class="page-content">
<!-- begin PAGE TITLE ROW -->
<div class="row">
<div class="col-lg-12">
<div class="page-title">
<ol class="breadcrumb">
<li><i class="fa fa-dashboard"></i>  <a href="a-home">Dashboard</a>
</li>
<li class="active">All Posts</li>
</ol>
</div>
</div>
<!-- /.col-lg-12 -->
</div><!-- /.row -->


<div class="row">
<?php

$stmt = $user_home->runQuery("SELECT * FROM post WHERE post_cat='services' ORDER BY post_id DESC ");
$stmt->execute();
if($stmt->rowCount() > 0)
{
while($result=$stmt->fetch(PDO::FETCH_ASSOC))
{
extract($result);
$key = urlencode(base64_encode($result['post_id']));
?>
<div class="col-sm-12">
<div class="panel panel-body " >
<!-- <div class="well well-info"> -->

<!-- nasted row  -->

<div class="row"> 
 <div class="col-sm-3">
<img  class="img img-responsive" src="../images/<?php echo$result['post_pic'];?>">
</div> 

<div class="col-sm-9">

<h4><b><?php echo $result['post_title'] ;?></b></h4>
<p>
<b>Category : </b>
<span style="font-weight: bold; color: orange;"><?php echo $result['post_cat'] ;?></span> 
<!--  &nbsp;&nbsp;&nbsp; -->
<b>Post date : </b>
<span style="font-weight: bold; color: orange;"><?php echo $result['post_date'] ;?></span>
</p>
<hr>
<div>
<a class="btn btn-xs btn-info" href="edit-post.php?uptkey=<?php echo $result['post_id']; ?>"><span class="glyphicon glyphicon-edit"></span> edit </a> 

<a class="btn btn-xs btn-warning" href="home.php?delkey=<?php echo $key; ?>" title="click for delete" onclick="return confirm('sure to delete ?')"><span class="glyphicon glyphicon-trash"></span> delete</a>
</div>
</div>


 </div>  <!--nested row end -->
<!-- </div> --> <!-- well end -->
</div> <!-- panel-body end -->
</div> <!-- col-12 end -->
<?php
}
}
else
{
?>
<span style="color: red;" class="glyphicon glyphicon-info-sign"></span> &nbsp; no data found ...
<?php
}  
?>
</div>


</div>
</div> <!-- /.page-content -->

<!-- footer -->
<?php include('include/footer.php'); ?>
