<?php
ini_set('display_errors', 1);
require_once __DIR__ . '/vendor/autoload.php'; // composer mustache sibil redbean
use \RedBeanPHP\R;
session_start();
	R::setup( 'mysql:host=127.0.0.1;dbname=auth', 'root', '' );
	function updatecapacity(){
		$hajmget=R::getAll( 'select * from hajm where uid = :uid AND expire > :exp',
		        array(':uid'=>$_SESSION['login_user'],
		        ':exp'=>strtotime("now")
		      )
		    );
		    $capa=0;//hajm
		    for($i=0;$i<sizeof($hajmget);$i++){
		        $capa+=$hajmget[$i]['hajm'];
		        }
		        $checkuser  = R::findOne( 'users', ' userd = ? ', [ $_SESSION['login_user'] ] );
						if($capa==0){
							$checkuser->capacity=50;
						}
						else{
		        $checkuser->capacity=$capa;}
		        R::store($checkuser);
	}
	function dirsize($dir) {
	$size = 0;
	if (is_dir($dir)) {
	$objects = scandir($dir);
	foreach ($objects as $object)
	if ($object != "." && $object != ".." && $object != 'index.php')
	if (filetype($dir."/".$object) == "dir")
	$size += $this->dirsize($dir."/".$object);
	else
	$size += filesize($dir."/".$object);
	reset($objects);
	}
	return $size;
	}

function tpl($tplname){
	$arr = array(
    "username" => $_SESSION['login_user'],
);
	$m = new Mustache_Engine;
$file = file_get_contents("./tpl/".$tplname.".tpl");
echo $m->render($file,$arr);
};
function formatSizeUnits($bytes)
{
		if ($bytes >= 1073741824)
		{
				$bytes = number_format($bytes / 1073741824, 2) . ' GB';
		}
		elseif ($bytes >= 1048576)
		{
				$bytes = number_format($bytes / 1048576, 2) . ' MB';
		}
		elseif ($bytes >= 1024)
		{
				$bytes = number_format($bytes / 1024, 2) . ' kB';
		}
		elseif ($bytes > 1)
		{
				$bytes = $bytes . ' bytes';
		}
		elseif ($bytes == 1)
		{
				$bytes = $bytes . ' byte';
		}
		else
		{
				$bytes = '0 bytes';
		}

		return $bytes;
}
function changetomb($bytes){
	$bytes = number_format($bytes / 1048576, 2);
return $bytes;
}
