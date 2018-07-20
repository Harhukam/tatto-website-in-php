<div class="tr-sidebar">
<ul class="slide-menu">




<li><a id="menu" href="#sidr">menu</a></li>
</ul>
<div id="sidr">
<div class="tr-menu">
<ul>
<!--   <li class="dropdown current"><a href="index.php">Home<i class="fa fa-angle-right" aria-hidden="true"></i></a>

</li>

-->	

<?php
$stmt = $DB_con->prepare('SELECT * FROM navbar WHERE navbar_cat="navbar" ORDER BY navbar_id ASC');
$stmt->execute();
if($stmt->rowCount() > 0)
{
while($row_sn=$stmt->fetch(PDO::FETCH_ASSOC))
{
extract($row_sn);
?>

<li><a href="<?= $navbar_url;?>"><?= $navbar_name;?><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>

<?php
}
}
else
{
?><li><a href="#">blank </a><?php
}
?>



<!-- <li><a href="index.php">Home<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
<li><a href="#tr-service">Videos<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
<li><a href="#tr-pricing">Price & plan<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
<li><a href="#tr-contact">contact us<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
-->										    
</ul>	
</div><!-- /.tr-menu -->
<div class="tr-options">
<ul>
<li>
<form action="#">
<input type="text" class="form-control" required="required" placeholder="Search">
</form>							
</li>
<li><a href="#">En</a></li>
<li><a href="#">Careers</a></li>
</ul>	
</div>					  
</div><!-- /.sidr -->  			
</div><!-- /.tr-sidebar --> 		