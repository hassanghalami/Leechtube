<?php
require 'vendor/autoload.php';
require 'func.php';
$tlink = $_GET['tokenlink'];

$args = array(
        'link' => $tlink,
        'whichuser' => $_SESSION['login_user']
      );
        $token=Resque::enqueue('default', 'My_Job', $args, true);

$status = new Resque_Job_Status($token);

    switch ($status->get()) {
        case Resque_Job_Status::STATUS_WAITING:
            echo "لطفا صبر کنید\n";
            break;
        case Resque_Job_Status::STATUS_RUNNING:
        echo "ویدیو ی شما در حال دانلود شدن میباشد لطفا شکیبا باشید";
            break;
        case Resque_Job_Status::STATUS_FAILED:
            $done = true;
            echo "دانلود با شکست مواجه شد";

            break;
        case Resque_Job_Status::STATUS_COMPLETE:
            $done = true;
            echo "دانلود کامل شده است";
            break;
    }


 ?>
