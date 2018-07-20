<?php
$stmt = $DB_con->prepare('SELECT * FROM photos ORDER BY photo_id DESC ');
$stmt->execute();
if($stmt->rowCount() > 0)
{
while($row=$stmt->fetch(PDO::FETCH_ASSOC))
{
extract($row);
$key = urlencode(base64_encode($photo_id));
?>
<div class="panel panel-body shedow">
<div class="row">
<div class="col-sm-12">
<img height="120" width="180" src="../images/<?php echo$photo;?>">
<h4><b><?php echo $photoname ;?></b></h4>
<p>
<b>Post date : </b>
 <span style="font-weight: bold; color: orange;"><?php echo$photodate;?></span>
</p>
<hr>
<div>
 <a class="btn btn-xs btn-info" href="edit-post-photo.php?p=<?php echo $photo_id; ?>"><span class="glyphicon glyphicon-edit"></span> edit </a> 

<a class="btn btn-xs btn-warning" href="home.php?photodelkey=<?php echo $key; ?>" title="click for delete" onclick="return confirm('sure to delete ?')"><span class="glyphicon glyphicon-trash"></span> delete</a>
</div>
</div> <!-- 6 col end -->




</div> <!-- row -->
</div><!-- panel -->
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