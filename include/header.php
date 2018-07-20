<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/slick.css">            
<link rel="stylesheet" href="css/sidr.css">
<link rel="stylesheet" href="css/magnific-popup.css">            
<link rel="stylesheet" href="css/cubeportfolio.min.css">            
<link rel="stylesheet" href="css/animate.css">            
<link rel="stylesheet" href="css/main.css">   
<link id="preset" rel="stylesheet" href="css/presets/preset1.css">     
<link rel="stylesheet" href="css/responsive.css">

<!-- font -->
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,700,800' rel='stylesheet' type='text/css'>
<?php
$stmt = $DB_con->prepare('SELECT * FROM head_dynamic');
$stmt->execute();
if($stmt->rowCount() > 0)
{
while($row_head=$stmt->fetch(PDO::FETCH_ASSOC))
{
extract($row_head);
?> 
<?php echo $head_dynamic;?>
<?php
}
}
else
{
?>
<li> <a href="#"> Header - no data found </a> </li>
<?php
}
?>  




