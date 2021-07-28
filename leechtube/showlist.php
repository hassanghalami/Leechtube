<?php
require 'func.php';
include('inc.html');
use \RedBeanPHP\R;
if(!isset($_SESSION))
{
  session_start();
}
if($_SESSION['login_user']==NULL){
  tpl('notlogged');
}
updatecapacity();
$usercheck  = R::findOne( 'users', ' userd = ? ', [ $_SESSION['login_user'] ] );
$sitepath='/videos/'.$_SESSION['login_user'];
$dir    = './videos/'.$_SESSION['login_user'];
$files1 = scandir($dir);
echo "<div class='alert alert-success' style='direction:rtl;width:50%'><strong>حجم کل:
</strong>".$usercheck['capacity']."MB</br><strong>
حجم استفاده شده :
</strong>".changetomb(dirsize($dir));
echo "MB</div>";
echo "  <center><div class='panel panel-primary' style='width:50%;'>
    <div class='panel-heading'>لیست ویدیو های دانلود شده</div>";

for($i=2;$i<=sizeof($files1)-1;$i++){

  echo "
      <div class='panel-body' style='direction:rtl'>";

      if(substr($files1[$i], -4)=='part'){
        echo htmlspecialchars($files1[$i],ENT_QUOTES, 'UTF-8');
      }
      else{

echo"  <a href='".$sitepath."/".htmlspecialchars($files1[$i], ENT_QUOTES, 'UTF-8')."' >".$files1[$i]."</a>";//link of video for downloading
}
  if(substr($files1[$i], -4)=='part'){
    echo "<span style='color:green;margin-right:10%'>
    در حال دانلود
    </span>";
  }
  else{
    echo "<span style='margin-right:10%''>
	حجم:".formatSizeUnits(filesize($dir."/".$files1[$i]))."  </span>";}
  echo"
  <form class='deletemovie' style='display:inline'>
  <input id='sendvideoname' type='hidden' name='checkfiles' value='".$files1[$i]."' >
  <button class='btn btn-lg btn-alert' onclick='deletemovie()' style='margin-right:10%;' >
حذف
  <span class='glyphicon glyphicon-trash' style='color:red;cursor:pointer;' aria-hidden='true' ></span>
  </button>
    </form>

  </div>";
}
echo "</div>";



 ?>
