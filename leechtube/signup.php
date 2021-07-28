<?php
require "func.php";
use \RedBeanPHP\R;

if(!isset($_SESSION))
{

	session_start();
}
if($_SESSION['login_user']!=null){
	tpl('error-loged-account');
}
else{
	if (isset($_POST['emailad'])){
		$emailad=$_POST['emailad'];
		$passd=$_POST['passd'];
		$userd=$_POST['userd'];
		$users=R::dispense('users');
		$users->email=$emailad;
		$users->passd=$passd;
		$users->userd=$userd;
		$users->capacity=50;
		$password = crypt($passd, base64_encode($passd));
		file_put_contents("./videos/.htpasswd",$userd.":".$password."\r".PHP_EOL , FILE_APPEND | LOCK_EX); //just you should chmod 777  to All directory

		$emailexist  = R::findOne( 'users', ' email = ? ', [ $emailad ] );
		$userexist  = R::findOne( 'users', ' userd = ? ', [ $userd ] );
		$userfolderpath="/opt/lampp/htdocs/videos/".$userd;
        mkdir($userfolderpath, 7777);
        chmod($userfolderpath,0777);
		if($emailexist!=NULL ||$userexist!=NULL){
			tpl("error-signup");
		}
		else
		{
			$id=R::store($users);
			tpl("success");
		}
	}
	else{
		tpl("signup");
	}}
	?>
