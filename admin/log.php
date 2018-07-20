<?php
session_start();
require_once 'class.admin.php';
$admin_login = new ADMIN();

if($admin_login->is_logged_in()!="")
{
$admin_login->redirect('home.php');
}

if(isset($_POST['btn-login']))
{
$email = trim($_POST['txtemail']);
$upass = trim($_POST['txtupass']);

if($admin_login->login($email,$upass))
{
$admin_login->redirect('dashboard.php');
}

}
?>