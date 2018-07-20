<div id="tr-portfolio" class="tr-portfolio">
<div class="portfolio-slider">
    
 <?php
$stmt = $DB_con->prepare('SELECT * FROM post WHERE post_cat="best4portfolio" ORDER BY post_id ASC LIMIT 4  ');
$stmt->execute();
if($stmt->rowCount() > 0)
{
while($row=$stmt->fetch(PDO::FETCH_ASSOC))
{
extract($row);
$key = urlencode(base64_encode($post_id)); 
?>

<div class="portfolio-item">
<img class="img-responsive" src="images/<?=$post_pic;?>" alt="Portfolio Image" style="max-height:554px;  min-height:554px;">
<div class="portfolio-overlay">
<div class="portfolio-info">
<h2><?=$post_title;?></h2>
<p><?=$post_desc;?></p>
<a href="#" class="btn btn-default">More Detail <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
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
</div><!-- portfolio slider -->
</div><!-- tr-portfolio -->
