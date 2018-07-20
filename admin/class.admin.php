<?php
require_once 'dbconfig.php';
class ADMIN
{	

private $conn;

public function __construct()
{
$database = new Database();
$db = $database->dbConnection();
$this->conn = $db;
}

public function runQuery($sql)
{
$stmt = $this->conn->prepare($sql);
return $stmt;
}

public function lasdID()
{
$stmt = $this->conn->lastInsertId();
return $stmt;
}


public function register($uname,$email,$upass,$code,$pic)
{
try
{							
$password = md5($upass);
$stmt = $this->conn->prepare("INSERT INTO tbl_admin(adminName,adminEmail,adminPass,tokenCode,adminphoto) 
                     VALUES(:admin_name, :admin_mail, :admin_pass, :active_code,:admin_pic)");
$stmt->bindparam(":admin_name",$uname);
$stmt->bindparam(":admin_mail",$email);
$stmt->bindparam(":admin_pass",$password);
$stmt->bindparam(":active_code",$code);
$stmt->bindparam("admin_pic",$pic);
$stmt->execute();	
return $stmt;
}
catch(PDOException $ex)
{
echo $ex->getMessage();
}
}


public function login($email,$upass)
{
try
{
$stmt = $this->conn->prepare("SELECT * FROM tbl_admin WHERE adminEmail=:email_id");
$stmt->execute(array(":email_id"=>$email));
$adminRow=$stmt->fetch(PDO::FETCH_ASSOC);

if($stmt->rowCount() == 1)
{
if($adminRow['adminStatus']=="Y")
{
if($adminRow['adminPass']==md5($upass))
{
$_SESSION['adminSession'] = $adminRow['adminID'];
return true;
}
else
{
header("Location: index.php?error");
exit;
}
}
else
{
header("Location: index.php?inactive");
exit;
}	
}
else
{
header("Location: index.php?error");
exit;
}		
}
catch(PDOException $ex)
{
echo $ex->getMessage();
}
}


public function is_logged_in()
{
if(isset($_SESSION['adminSession']))
{
return true;
}
}


public function redirect($url)
{
header("Location: $url");
}


public function logout()
{
session_destroy();
$_SESSION['adminSession'] = false;
}




function send_mail($email,$message,$subject)
{						
require_once('../mailer/class.phpmailer.php');
$mail = new PHPMailer();
$mail->IsSMTP(); 
$mail->SMTPDebug  = 0;                     
$mail->SMTPAuth   = true;                  
$mail->SMTPSecure = "ssl";                 
$mail->Host       = "smtp.gmail.com";      
$mail->Port       = 465;             
$mail->AddAddress($email);
$mail->Username="xxx@gmail.com";  
$mail->Password="password";            
$mail->SetFrom('xxxx@gmail.com','your name');
$mail->AddReplyTo("xxxx@gmail.com","name");
$mail->Subject    = $subject;
$mail->MsgHTML($message);
$mail->Send();
}


//*************** update logo down code***************

public function uptlogo($adminid,$logo_pic,$logo_alt,$logo_sitename)
{
	
	try
	{

	$stmt= $this->conn->prepare("UPDATE logo SET logo_pic=:a1,logo_alt=:a2,logo_sitename=:a3 WHERE adminID=:pid");
	$stmt->bindParam(':a1',$logo_pic);
	$stmt->bindParam(':a2',$logo_alt);
	$stmt->bindParam(':a3',$logo_sitename);
	$stmt->bindParam(':pid',$adminid);
	$stmt->execute();
	return $stmt;
	}
	catch(PDOException $ex)
	{
	echo $ex->getMessage();
	}
}


//*************** update logo code***************

public function uptsocial($id,$fb,$ins,$tw,$yt,$go)
{
	
	try
	{

	$stmt= $this->conn->prepare("UPDATE social SET facebook=:a1,instagram=:a2,twitter=:a3,youtube=:a4,google=:a5 WHERE social_id=:pid");
	$stmt->bindParam(':a1',$fb);
	$stmt->bindParam(':a2',$ins);
	$stmt->bindParam(':a3',$tw);
	$stmt->bindParam(':a4',$yt);
	$stmt->bindParam(':a5',$go);
	$stmt->bindParam(':pid',$id);
	$stmt->execute();
	return $stmt;
	}
	catch(PDOException $ex)
	{
	echo $ex->getMessage();
	}
}


//********end class********
} //end admin class
