<div id="tr-service" class="tr-service image-bg section-padding">
<div class="container">
<div class="title">

<?php
$stmt = $DB_con->prepare('SELECT * FROM services_txt ORDER BY services_txt_id DESC LIMIT 1 ');
$stmt->execute();
if($stmt->rowCount() > 0)
{
while($row=$stmt->fetch(PDO::FETCH_ASSOC))
{
extract($row);
?> 

<h1><?= $service_txt1;?></h1>
</div>
<div class="section-info">
<h2><?= $service_txt2;?> <span><?= $service_txt3;?></span>  <?= $service_txt4;?></h2>
<p><?= $service_txt5;?></p>

<?php
}
}
else
{
?>
<li> <a href="#"> no data found </a> </li>
<?php
}
?>  


</div>
<div class="service-content">
<div class="row">
<?php
$stmt = $DB_con->prepare('SELECT * FROM post WHERE post_cat="services" ORDER BY post_id ASC LIMIT 4  ');
$stmt->execute();
if($stmt->rowCount() > 0)
{
while($row=$stmt->fetch(PDO::FETCH_ASSOC))
{
extract($row);
$key = urlencode(base64_encode($post_id)); 
?>

<div class="col-sm-3">
<div class="service icon-1">
<a href="story.php?v=<?php echo $key;?>"><img class="img-responsive" src="images/<?php echo $post_pic ; ?>" alt="<?php echo $post_title ; ?>"></a>
<h3><?=$post_title;?></h3>
<p><?=$post_txt;?></p>
<a href="story.php?v=<?php echo $key;?>" class="btn btn-default">Learn more <i class="fa fa-chevron-right" aria-hidden="true"></i></a>		
</div>
</div>

<?php
}
}
else
{
?>
<span class="glyphicon glyphicon-info-sign"></span> &nbsp; Services post Data not Found ...
<?php
}
?>
</div>
</div>
</div><!-- container -->
</div><!-- our service -->