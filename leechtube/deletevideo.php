<?php
require 'func.php';
include('inc.html');
if(!isset($_SESSION))
{
  session_start();
}
if($_SESSION['login_user']==NULL){
  tpl('notlogged');
}
$dir    = './videos/'.$_SESSION['login_user'];
$videotoken = $_GET['tokenvideo'];
$file=$dir."/".$videotoken;
if (!unlink($file))
  {
  echo (" در حال حذف  $videotoken");
  }
else
  {
  echo ("  با موفقیت پاک شد $videotoken");
  }


 ?>
