<?php
session_start();
require_once 'class.admin.php';
$usermsg = new ADMIN();

if(!$usermsg->is_logged_in())
{
$usermsg->redirect('index.php');
}

$stmt = $usermsg->runQuery("SELECT * FROM  tbl_admin WHERE adminID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['adminSession']));
//$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
extract($row);

error_reporting( ~E_NOTICE ); // avoid notice


if(isset($_POST['mob']) && isset($_POST['msg']))
{

//$apiKey = urlencode('TyDqvfH3JI4');
//$apiKey ="TyDqvfH3JI4";
//$servicename = "mywebdeal";
$numbers = array($_POST['mob']);
$message = $_POST['msg'];
$message = urlencode($message);
$ch=curl_init();

curl_setopt($ch,CURLOPT_URL,"https://smsapi.24x7sms.com/api_2.0/SendSMS.aspx?APIKEY=TyDqvfH3JI4&MobileNo=$numbers&SenderID=MYWEBD&Message=”.$message.”&ServiceName=otp");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$output =curl_exec($ch);



if($output == true)
{
$successMSG = "Message sent  Successfully";
header('refresh:3; send-sms2.php');
}
else{
$errMSG = "message not sent unknown error uccer..";
header('refresh:3; send-sms2.php');
}

curl_close($ch);
}


?>
<?php include('include/header.php'); ?>

<div class="page-content">

<!-- begin PAGE TITLE ROW -->
<div class="row">
<div class="col-lg-12">
<div class="page-title">
<ol class="breadcrumb">
<li><i class="fa fa-dashboard"></i>  <a href="#">Dashboard</a>
</li>
<li class="active">Send Message</li>
</ol>
</div>
</div>
<!-- /.col-lg-12 -->
</div><!-- /.row -->

<div class="row">
<!-- begin LEFT COLUMN -->
<div class="col-lg-12">
<?php
if(isset($errMSG))
{
?>
<div class="alert alert-danger">
<span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
</div>
<?php
}
else if(isset($successMSG))
{
?>
<div class="alert alert-success">
<strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong>
</div>
<?php
}
?> 
<form method="post" >
<div class="portlet portlet-default">
<div class="portlet-heading">
<div class="portlet-title">
<h4>Send SMS</h4>
</div>
<div class="portlet-widgets">
<a data-toggle="collapse" data-parent="#accordion" href="#basicFormExample"><i class="fa fa-chevron-down"></i></a>
</div>
<div class="clearfix"></div>
</div>
<div id="basicFormExample" class="panel-collapse collapse in">
<div class="portlet-body">

<div class="form-group">
<label >Mobile number</label>
<input type="text" class="form-control" name="mob" value="" required="required">
</div>

<div class="form-group">
<label >Message Body</label>
<textarea type="text" class="form-control" name="msg" required="required"></textarea> 
</div>

<hr>
<input  type="submit" class="btn btn-default "  value="Send">
</form>
</div>

</div>
</div></div>
</div> <!-- row end -->

</div> <!-- /.page-content -->

<!-- footer -->
<?php include('include/footer.php'); ?>

