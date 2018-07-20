<?php 
require_once 'db.php'; 
if(isset($_GET['v']) && !empty($_GET['v'])) 
{ 
$url = base64_decode(urldecode($_GET['v']));
	//$url = $_GET['v'];
$stmt = $DB_con->prepare('SELECT * FROM post WHERE post_id =:bid');
$stmt->execute(array(':bid'=>$url));
$res = $stmt->fetch(PDO::FETCH_ASSOC);
extract($res);
}
else
{
header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="<?php echo $post_author; ?>">
<meta name="description" content="<?php echo $post_desc; ?>">
<title><?php echo $post_title ; ?></title>
<meta name="description" content="<?php echo $post_desc; ?>"/>
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="article" />
<meta property="og:title" content="<?php echo $post_title; ?>" />
<meta property="og:description" content="<?php echo $post_desc; ?>" />
<meta property="og:site_name" content="Harhukams Blog" />
<meta property="article:publisher" content="https://www.facebook.com/harhukams" />
<meta property="article:author" content="https://www.facebook.com/harhukams" />
<meta property="article:tag" content="Harhukams_blogs"/>
<meta property="article:section" content="Others" />
<meta property="article:published_time" content="<?php echo date("F j, Y g:i a", strtotime($post_date)); ; ?>" />
<meta property="article:modified_time" content="<?php echo date("F j, Y g:i a", strtotime($post_date)); ; ?>" />
<meta property="og:image" content="https://harhukams.mywebdeal.in/images/<?php echo $post_pic; ?>" />
<meta property="og:image:secure_url" content="https://harhukams.mywebdeal.in/images/<?php echo $post_pic; ?>" />
<meta property="og:image:width" content="960" />
<meta property="og:image:height" content="667" />
<meta name="twitter:card" content="summary" />
<meta name="twitter:description" content="<?php echo $post_desc; ?>" />
<meta name="twitter:title" content="<?php echo $post_title; ?>" />
<meta name="twitter:site" content="@mywebdeal17" />
<meta name="twitter:image" content="https://harhukams.mywebdeal.in/images/<?php echo $post_pic;?>" />
<?php include_once 'include/header.php'; ?>
</head>
<body class="tr-details-page blog-details tr-page" >
<div class="tr-main-wrapper">
<?php include_once 'include/navbar.php'; ?>
<section style="min-height: 600px;">
<div class="tr-main-wrapper"> 
<div class="blog-content">
<div class="container-fluid no-padding">
<div class="row">
<div class="col-sm-6 tr-sticky">
<div class="theiaStickySidebar"> 
<div class="tr-image">                                
<div class="entry-header">
<div class="entry-thumbnail">
  <img class="img-responsive" onerror="this.style.display='none'" src="images/<?php echo $post_pic ; ?>" alt="<?php echo $post_permalink; ?>" title="<?php echo $post_title; ?>">
</div>
</div>
</div> 
</div>                        
</div>


<div class="col-sm-6 tr-sticky">
<div class="theiaStickySidebar">
<div class="tr-right-content">
<div class="tr-post">
<div class="entry-meta">
<span class="category"><?php echo $post_cat ; ?></span>
<span class="time"><?php echo date("F j, Y g:i a", strtotime($post_date)); ; ?></span>
</div>
<div class="entry-title">
<h2><?php echo $post_title ; ?></h2>
</div>
<div class="publised">Publised: <span><?php echo $post_author ; ?></span></div>
</div><!-- entry post -->

<div class="post-content">
<?php echo $post_txt ; ?>
</div><!-- post-content -->



<div class="social-share">
<ul class="tr-list">
<li>Share:</li>
<li><a href="#"><img class="img-responsive" src="images/blog/share1.jpg" alt=""></a></li>
<li><a href="#"><img class="img-responsive" src="images/blog/share2.jpg" alt=""></a></li>
<li><a href="#"><img class="img-responsive" src="images/blog/share3.jpg" alt=""></a></li>
<li><a href="#"><img class="img-responsive" src="images/blog/share4.jpg" alt=""></a></li>
<li><a href="#"><img class="img-responsive" src="images/blog/share5.jpg" alt=""></a></li>
</ul>
</div>                    

<!-- <div class="comments-area">
<div class="section-title">
<h1>Comments</h1>
</div>

<div class="post-comment">
<div class="commenter-info">
<a class="commenter-avatar" href="#">
<img class="img-responsive" src="images/blog/user-1.jpg" alt="Commenter">
</a>
<div class="media-body">
<div class="media-inner">
<h4>GEORGE Devid</h4>
<p class="date">Feb 02, 2016</p>
<p>Nullam id sem ligula. Donec tincidunt rhoncus turpis, et pharetra nunc volutpat quis. Curabitur porttitor odio quis velit condimentum dapibus.</p>
</div>                                              
</div>
</div>
</div>   post comment


</div>   end comment area

<div class="replay-box padding-bottom">
<div class="section-title">
<h1>Leave a comment</h1>
</div>
<form id="contact-form" class="contact-form" name="contact-form" method="post" action="#">
<div class="row">
<div class="col-sm-6">
<div class="form-group">
<input type="text" class="form-control" required="required" placeholder="Enter name">
</div>
</div>
<div class="col-sm-6">
<div class="form-group">
<input type="email" class="form-control" required="required" placeholder="Enter email">
</div> 
</div>
<div class="col-sm-12">
<div class="form-group">
<textarea name="message" id="message" required="required" class="form-control" rows="7" placeholder="Enter message"></textarea>
</div>             
</div>     
</div>
<div class="form-group">
<button type="submit" class="btn btn-primary">Submit your message <i class="fa fa-chevron-right" aria-hidden="true"></i></button>
</div>
</form> 
</div>                                       
</div>
</div> -->
</div>
</div><!-- row --> 
</div>
</div><!-- blog content -->   
</section>            
</div><!-- tr-main-wrapper --> 
<?php include_once 'include/footer.php'; ?>
</body>
</html>    