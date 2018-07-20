<?php
error_reporting( ~E_NOTICE );
session_start();
require_once 'class.admin.php';
$user_post = new admin();

if(!$user_post->is_logged_in())
{
$user_post->redirect('index.php');
}

$stmt = $user_post->runQuery("SELECT * FROM  tbl_admin WHERE adminID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['adminSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

// function slugifyUrl($str, $delimiter = '-')
// {
// $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
// return $slug;
// } 
function slugifyUrl($str, $delimiter = '_')
{
$slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter,
 preg_replace('/[^A-Za-z0-9-]+/', $delimiter,
 preg_replace('/[&]/', 'and',
 preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
 return $slug;
} 

if(isset($_POST['save']))
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

if(empty($post_pic))
{
$errMSG = "please select photo";
}
else
{
$upload_dir = '../images/'; // upload directory
$imgExt = strtolower(pathinfo($post_pic,PATHINFO_EXTENSION)); // get image extension
$valid_extensions = array("jpg","jpeg","gif", "png"); // valid extensions //audio/mp3

$post_pic = slugifyUrl($post_title).".".$imgExt;
if(in_array($imgExt, $valid_extensions))
{  
if($imgSize < 5000000000)  // Check file size '5MB'
{

move_uploaded_file($tmp_dir,$upload_dir.$post_pic);
print_r ( $tmp_dir.$upload_dir.$post_pic);

}
else{
$errMSG = "Sorry, your file is too large.";
}
}
else
{
$errMSG = "Sorry, this file type not allow to upload";        
}
}

if(!isset($errMSG))
{
$stmt = $user_post->runQuery("INSERT INTO post(post_cat,post_title,post_permalink,post_pic,post_txt,post_author) VALUES(:cat,:tit,:link,:pic,:txt,:aut)");

$stmt->bindParam(':cat',$post_cat);
$stmt->bindParam(':tit',$post_title);
$stmt->bindParam(':link',$post_permalink);
//$stmt->bindParam(':keyw',$post_keyw);
$stmt->bindParam(':pic',$post_pic);
$stmt->bindParam(':txt',$post_txt);
$stmt->bindParam(':aut',$post_author);
if($stmt->execute())
{
$successMSG = "Post Successfully";
//header('refresh:1; home.php');

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
<li><i class="fa fa-dashboard"></i>  <a href="a-home">Dashboard</a>
</li>
<li class="active">New Post</li>
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
<h4>New Post</h4>
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
<input type="text" class="form-control" name="posttitle" required="required">
</div>


<div class="form-group">
<label >Post Body ( Don't insert local image here)</label>
<textarea type="text" id="summernote" name="posttxt" onkeyup='swap_val(this.value);' ></textarea>

<!-- copy body 152 word description -->
<input type="hidden" class="form-control" maxlength="152"  name="postdesc" id ="postdesc" >
</div>


<pre>&lt;div class="embed-responsive embed-responsive-16by9"&gt;<br>&nbsp; &lt;iframe class="embed-responsive-item" src="..."&gt;&lt;/iframe&gt;<br>&lt;/div&gt;</pre><div><br></div>

</div>

</div>
</div>
</div>

<div class="col-sm-3 well well-info">

<div class="form-group">
<label for="exampleInputEmail1">Select Post Category </label>
<select class="form-control" type="text"  name="postcat">
<option value="" selected disabled>Choose Category</option>
<?php
$stmt = $user_post ->runQuery("SELECT * FROM post_category ORDER BY post_cat_id DESC");
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


<img src="" id="blah"  class="img img-responsive" >
<div class="form-group">
<label>Select Post Photo </label>
<input   type="file" class="form-control"  name="postpic" id="imgInp" accept="image/*" >
</div>


<hr> <hr>
<div class="panel pane-body">
<input  type="submit" class="btn btn-default btn-block " name="save" value="Post">
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
</script>

<script>       
var swap_val = function  (val){
var input = document.getElementById("postdesc"); // copy page name to pagetitle
input.value = val;
}
</script>
<!-- footer -->
<?php include('include/footer.php'); ?>
