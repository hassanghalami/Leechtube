<?php
require "func.php";
if(!isset($_SESSION))
{

  session_start();
}
$_SESSION['login_user']=NULL;
header('location: /.');
?>
