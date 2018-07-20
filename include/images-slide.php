<div id="tr-team" class="tr-team image-bg section-padding" style="background-image: url('images/<?php echo $feature_cover1; ?>') !important;
   background-color: #fff; height: 100%;">
<div class="overlay"></div>
<div class="container">
<div class="title">
<h1><?=$ps_txt1;?></h1>
</div>
<div class="section-info">
<h2><?=$ps_txt2;?> <span><?=$ps_txt3;?></span> <?=$ps_txt4;?></h2>
<p><?=$ps_txt5;?></p>
</div>

<div class="team-slider">
 <?php
$stmt = $DB_con->prepare('SELECT * FROM post WHERE post_cat="timeline" ORDER BY post_id DESC ');
$stmt->execute();
if($stmt->rowCount() > 0)
{
while($row=$stmt->fetch(PDO::FETCH_ASSOC))
{
extract($row);
$key = urlencode(base64_encode($post_id)); 
?>

<div class="team-member">
<img class="img-responsive" src="images/<?=$post_pic;?>" alt="<?=$post_title;?>" style="min-height:329px; max-height:359px;">
<div class="team-overlay">
<div class="member-info">
<ul class="list-inline">
<li><a href="#"><i class="fa fa-facebook"></i></a></li>
<li><a href="#"><i class="fa fa-twitter"></i></a></li>
</ul>
<a href="story.php?v=<?php echo $key;?>"><h4><?=$post_title;?></h4></a>
<!--<p>Vice Director</p>-->
</div>
</div>
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

</div><!-- team slider -->
</div><!-- container -->
</div><!-- team section -->