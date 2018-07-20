<div id="tr-blog" class="tr-blog image-bg tr-after section-padding" style="background-image: url('images/<?php echo $feature_cover2; ?>') !important;
   background-color: #fff; height: 100%;">
<div class="container">
<div class="row">
<div class="col-sm-6">
<div class="left-content">
 <?php
$stmt = $DB_con->prepare('SELECT * FROM post WHERE post_cat="timeline" ORDER BY post_id ASC LIMIT 1');
$stmt->execute();
if($stmt->rowCount() > 0)
{
while($row=$stmt->fetch(PDO::FETCH_ASSOC))
{
extract($row);
 $key1 = urlencode(base64_encode($post_id));
?>

<div class="tr-post">
<div class="entry-meta">
<span class="category"><a href="story.php?v=<?php echo $key1; ?>"> <?=$post_cat;?> </a></span>
<span class="time"><a href="story.php?v=<?php echo $key1; ?>"><?php echo date("F j, Y g:i a", strtotime($post_date)); ; ?> </a></span>
</div>
<div class="entry-title">
<h2><a href="story.php?v=<?php echo $key1; ?>"><?=$post_title;?> </a></h2>
</div>
<a href="story.php?v=<?php echo $key1; ?>" class="btn btn-default">Learn more <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
</div>

<?php
}
}
else
{
?>
<span class="glyphicon glyphicon-info-sign"></span> &nbsp; Data not Found ...
<?php
}
?>


</div>
</div>

<div class="col-sm-6">
<div class="right-content">
  
  <?php
$stmt = $DB_con->prepare('SELECT * FROM post WHERE post_cat="timeline" ORDER BY post_id DESC LIMIT 6');
$stmt->execute();
if($stmt->rowCount() > 0)
{
while($row=$stmt->fetch(PDO::FETCH_ASSOC))
{
extract($row);
$key = urlencode(base64_encode($post_id));
?>

<div class="tr-post">
<div class="entry-meta">
<span class="category"><a href="story.php?v=<?php echo $key; ?>"> <?=$post_cat;?> </a></span>
<span class="time"><a href="story.php?v=<?php echo $key; ?>"><?php echo date("F j, Y g:i a", strtotime($post_date)); ; ?> </a></span>
</div>
<div class="entry-title">
<h2><a href="story.php?v=<?php echo $key; ?>"><?=$post_title;?> </a></h2>
</div>
<a href="story.php?v=<?php echo $key; ?>" class="btn btn-default">Learn more <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
</div>

<?php
}
}
else
{
?>
<span class="glyphicon glyphicon-info-sign"></span> &nbsp; Data not Found ...
<?php
}
?>  



</div>
</div><!-- /.row -->
</div><!-- /.container -->
</div><!-- /.tr blog -->
</div>