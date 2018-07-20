<?php
require_once 'db.php'; 

if(isset($_POST['submit'])) // contact email
{
$err=array();
$name=$_POST['name'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$subject=$_POST['subject'];
$message=$_POST['message'];

$message=$_POST['message'];
$to = "harhukams@gmail.com";
$message = "		
<h1 style='font-family:arial,calibri,san-serif;font-size:14px; color:#000;'><i>Thank you ".ucwords($name)." for connecting with Harhukam Singh.</i> </h1>
<table border='1' cellpadding='5' >
<tr>
<th> Name</th>
<th> Email</th>
<th> Mobile</th>
<th> Subject</th>
<th> Message</th>

</tr>
<tr> 
<td> $name</td>
<td> $email</td>
<td> $mobile</td>
<td> $subject</td>
<td> $message</td>
</tr>

</table> 
";
// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: Pammi Tour and Travel<info@mywebdeal.in>' . "\r\n";
$mail=mail($to,$subject,$message,$headers);

if($mail){
echo"<script> alert('Thank you for contacting Pammi Tour and Travel, will contact you soon on email provided by you..');
window.location.href='harhukams.mywebdeal.in'; </script> ";
}

else{
echo"<script> alert('Email sending failed due to some technical errors');</script>";
}


?>