<?php
 require_once 'db.php';

if(isset($_POST['send'])) // contact email
{
$err=array();
$name=$_POST['name'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$subject=$_POST['subject'];
$message=$_POST['message'];
$to = "harhukams@gmail.com";
$message = "    
<h1 style='font-family:arial,calibri,san-serif;font-size:14px; color:#000;'><i>Thank you ".ucwords($name)." for connecting with Pammi tour and travel.</i> </h1>
<table border='1' cellpadding='5' >
<tr>
<th> Name</th>
<th> Mobile Number</th>
<th> Email id</th>
<th> Message</th>


</tr>
<tr> 
<td> $name</td>
<td> $mobile</td>
<td> $email</td>
<td> $message</td>

</tr>

</table> 
";
// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: Website<info@mywebdeal.in>' . "\r\n";
$mail=mail($to,$subject,$message,$headers);

if($mail){
echo"<script> alert('Thank you for contacting with us., will contact you soon on email provided by you..');
window.location.href='index.php'; </script> ";
}

else{
echo"<script> alert('Email sending failed due to some technical errors');</script>";
}

}



 
$stmt = $DB_con->prepare('SELECT * FROM slider');
$stmt->execute();
$row= $stmt->fetch(PDO::FETCH_ASSOC);
extract($row);

$stmt = $DB_con->prepare('SELECT * FROM contact_us');
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
extract($row);

$stmt = $DB_con->prepare('SELECT * FROM about_us');
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
extract($row);

$stmt = $DB_con->prepare('SELECT * FROM feature_cover');
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
extract($row);

$stmt = $DB_con->prepare('SELECT * FROM home');
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
extract($row);

$stmt = $DB_con->prepare('SELECT * FROM logo');
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
extract($row);


$stmt = $DB_con->prepare('SELECT * FROM social');
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
extract($row);

$stmt = $DB_con->prepare('SELECT * FROM photo_slider_section');
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
extract($row);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title><?=$home_title;?></title>
<meta name="description" content="<?=$home_description;?>">
 <meta name = "keywords" content = "<?=$home_keywords;?>" />
 <meta name="author" content="Harhukam Singh">
<?php include_once 'include/header.php'; ?>

</head>
<body class="tr-homepage homepage-2 ">
<div class="tr-main-wrapper">
<?php include_once 'include/navbar.php'; ?>
<?php include_once 'include/slider.php'; ?>
<?php include_once 'include/services.php'; ?>
<?php include_once 'include/portfolio.php'; ?>
<?php include_once 'include/about.php'; ?>
<?php include_once 'include/images-slide.php'; ?>
<?php include_once 'include/posts.php'; ?>
<?php include_once 'include/contact.php'; ?>
<?php include_once 'include/footer.php'; ?>
</body>
</html>