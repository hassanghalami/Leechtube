<?php
require "func.php";
use \RedBeanPHP\R;
if(!isset($_SESSION))
{

  session_start();
}
$usermail=$_POST['usermail'];
$passwords=$_POST['passwords'];
if(isset($_SESSION["login_user"])) {

if($_SESSION['login_user']!=null){
  tpl('error-loged-account');
}}
else{
  if(isset($usermail)){
    $emailexist  = R::findOne( 'users', ' email = ? ', [ $usermail ] );
    $userexist  = R::findOne( 'users', ' userd = ? ', [ $usermail ] );
    $passcorrect  = R::findOne( 'users', ' passd = ? ', [ $passwords ] );

    if($emailexist!=NULL || $userexist!=NULL){
      if($passcorrect!=NULL){
        $_SESSION['login_user']= $usermail;

        tpl('dashboard');

      } else{
            tpl('error-signin');
          }

    }    else{
          tpl('error-signin');
        }

  }}



  ?>
