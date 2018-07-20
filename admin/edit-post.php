<?php
error_reporting( ~E_NOTICE );
session_start();
require_once 'class.admin.php';
$user_edit_post = new admin();

if(!$user_edit_post->is_logged_in())
{
$user_edit_post->redirect('index.php');
}

$stmt = $user_edit_post->runQuery("SELECT * FROM  tbl_admin WHERE adminID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['adminSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);


if(isset($_GET['uptkey']) && !empty($_GET['uptkey'])) 
{
$id = $_GET['uptkey'];
$stmt = $user_edit_post->runQuery("SELECT * FROM post WHERE post_id =:pid");
$stmt->execute(array(':pid'=>$id));
$find_result = $stmt->fetch(PDO::FETCH_ASSOC);
extract($find_result);
}



// ********* get update key *******

function slugifyUrl($str, $delimiter = '_')
{
$slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter,
preg_replace('/[^A-Za-z0-9-]+/', $delimiter,
preg_replace('/[&]/', 'and',
preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
return $slug;
} 

if(isset($_POST['update']))
{
$post_cat = $_POST['postcat'];
$post_title = $_POST['posttitle'];
$post_permalink = slugifyUrl($post_title);
//$post_keyw = $_POST['postkeyw'];
$post_txt = $_POST['posttxt'];
$post_author = $row[adminName];


$post_pic = $_FILES['postpic']['name'];
$tmp_dir = $_FILES['postpic']['tmp_name'];
$imgSize = $_FILES['postpic']['size']; 


if($post_pic)
{
$upload_dir = '../images/'; // upload directory
$imgExt = strtolower(pathinfo($post_pic,PATHINFO_EXTENSION)); // get image extension
$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
$post_pic = slugifyUrl($post_title).".".$imgExt;
if(in_array($imgExt, $valid_extensions)){           
if($imgSize < 5000000)              {
move_uploaded_file($tmp_dir,$upload_dir.$post_pic);
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
$post_pic = $find_result['post_pic']; // old image from database
}            

// if no error occured, continue ....
if(!isset($errMSG))
{
$stmt = $user_edit_post->runQuery("UPDATE post 
SET 
post_cat=:b1,
post_title=:b2,
post_permalink=:b3,
post_pic=:b4,
post_txt=:b5,
post_author=:b6
WHERE post_id=:poid");
$stmt->bindParam(':b1',$post_cat);
$stmt->bindParam(':b2',$post_title);
$stmt->bindParam(':b3',$post_permalink);
$stmt->bindParam(':b4',$post_pic);
$stmt->bindParam(':b5',$post_txt);
$stmt->bindParam(':b6',$post_author);
$stmt->bindParam(':poid',$id);
if($stmt->execute())
{
$successMSG = "update Successfully";
//header('refresh:1;  home.php');
if($post_cat==best4portfolio)
{
	header('refresh:1; best4portfolio-posts.php');
}

if ($post_cat==services) 
{
	header('refresh:1; services-posts.php');
}

if ($post_cat==timeline)
{
  header('refresh:1; home.php');
}

}
else
{
$errMSG = "error something wrong ! please try later...";
}
}}


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
<li class="active">Edit Post</li>
</ol>
</div>
</div>
<!-- /.col-lg-12 -->
</div><!-- /.row -->


<div class="row">
<!-- begin LEFT COLUMN -->
<div class="col-sm-9">
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
<form id="postForm" onsubmit="return postForm()" method="post" enctype="multipart/form-data" >
<div class="portlet portlet-default">
<div class="portlet-heading">
<div class="portlet-title">
<h4>Edit Post</h4>
</div>
<div class="portlet-widgets">
<a data-toggle="collapse" data-parent="#accordion" href="#basicFormExample"><i class="fa fa-chevron-down"></i></a>
</div>
<div class="clearfix"></div>
</div>
<div id="basicFormExample" class="panel-collapse collapse in">
<div class="portlet-body">



<div class="form-group">
<label >Post title</label>
<input type="text" class="form-control" name="posttitle" required="required" value="<?php echo $find_result['post_title'];?>">
</div>


<div class="form-group">
<label >Post Body ( Don't insert local image here)</label>
<textarea type="text" id="summernote" name="posttxt" onkeyup='swap_val(this.value);'> <?php echo $find_result['post_txt'];?></textarea>

<!-- copy body 152 word description -->
<input type="hidden" class="form-control" maxlength="152"  name="postdesc" id ="postdesc" value="<?php echo $find_result['post_desc'];?>" >
</div>

</div>

</div>
</div>
</div>

<div class="col-sm-3 well well-info">
<!-- <div class="form-group">
<label for="exampleInputEmail1">Currunt Cat : <?php echo $find_result[post_cat];?> </label>
</div> -->

<div class="form-group">
<label for="exampleInputEmail1">Select if want to  Change </label>
<select class="form-control" type="text"  name="postcat">
<option value="<?php echo $find_result['post_cat'];?>"> 
<?php echo $find_result['post_cat'];?>
</option>

<?php
$stmt = $user_edit_post ->runQuery("SELECT * FROM post_category ORDER BY post_cat_id DESC");
$stmt->execute();
if($stmt->rowCount() > 0)
{
while($result=$stmt->fetch(PDO::FETCH_ASSOC))
{
extract($result);
?>
<option value="<?php echo $result['cat_name']; ?>" ><?php echo $result['cat_name']; ?></option>
<?php
}
}
else
{
?>
<div class="col-sm-12">
<span class="glyphicon glyphicon-info-sign"></span> &nbsp; no category...
</div>
<?php
}  
?>
</select>
</div>



<!-- <div class="form-group">
<label >Post Keywords</label>
<input type="text" name="postkeyw" class="form-control" id="tokenfield"  placeholder="Type Keyword hit enter!">
</div> -->


<img src="../images/<?php echo $find_result['post_pic'];?>" id="blah"  class="img img-responsive" >
<div class="form-group">
<label>Select Post Photo </label>
<input   type="file" class="form-control"  name="postpic" id="imgInp" accept="image/*" >
</div>


<hr> <hr>
<div class="panel pane-body">
<input  type="submit" class="btn btn-default btn-block " name="update" value="Update">
</div>

</div>

</form>
</div> <!-- row end -->
</div> <!-- /.page-content -->

<script type="text/javascript">
$(document).ready(function() {
$('#summernote').summernote({
height: "600px"
});
});

var postForm = function() {
var content = $('textarea[name="posttxt"]').html($('#summernote').code());
}


var swap_val = function  (val){
var input = document.getElementById("postdesc"); // copy page name to pagetitle
input.value = val;
}
</script>
<!-- footer -->
<?php include('include/footer.php'); ?>
