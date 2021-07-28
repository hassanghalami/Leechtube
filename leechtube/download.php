<?php
require "func.php";
include('inc.html');
use \RedBeanPHP\R;
$usercheck  = R::findOne( 'users', ' userd = ? ', [ $_SESSION['login_user'] ] );
$dir    = './videos/'.$_SESSION['login_user'];
if(!isset($_SESSION))
{
  session_start();
}
if($_SESSION['login_user']==NULL){
  tpl('notlogged');
}
else{
  updatecapacity();
  //check size e folder e video user bishtar bashe az capacity dar db ejaze nade
  if($usercheck['capacity']<=changetomb(dirsize($dir))){
echo "لطفا حجم خود را افزایش داده و سپس نسبت به دانلود اقدام فرمایید";
  }
  else{
define('YOUTUBE_DL', 'LD_LIBRARY_PATH=/usr/lib youtube-dl'); // find your youtube-dl path and replace with it
$urlpost=$_POST['urlpost'];
$re = '~^(https?://)*~';
$tlink=preg_replace($re,'http://',$urlpost);
$proxy='--proxy socks5://127.0.0.1:1080';// iran ip
  $duration = shell_exec(YOUTUBE_DL." ".$tlink.' --get-duration '.$proxy);
  $title = shell_exec(YOUTUBE_DL." ".$tlink.' --get-title 2>&1 '.$proxy);
  $thumb = shell_exec(YOUTUBE_DL." ".$tlink.' --get-thumbnail 2>&1 '.$proxy);

  echo 'عنوان </br>'.$title.'</br>';
  echo 'تصویر'.'</br>';
  echo '<img src="'.$thumb.'" height="300" width="300">'.'</br>';
  echo 'زمان ویدیو:'.$duration.'</br>';
  echo "
<form class='startdownloadform'>
<input id='sendlink' type='hidden' name='checkstatus' value='".$tlink."'>

  <button class='btn btn-lg btn-success' onclick='startdownload()' >
دانلود
<span class='glyphicon glyphicon-download-alt' aria-hidden='true' ></span>
  </button>
  </form>
  ";
}}
  ?>
