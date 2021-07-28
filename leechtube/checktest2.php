<?php
require 'vendor/autoload.php';

$ttoken = $_GET['tokenpost'];
$status = new Resque_Job_Status($ttoken);

    switch ($status->get()) {
        case Resque_Job_Status::STATUS_WAITING:
            echo "WAITING\n";
            break;
        case Resque_Job_Status::STATUS_RUNNING:
        echo "download is running";
            break;
        case Resque_Job_Status::STATUS_FAILED:
            $done = true;
            echo "download is failed";

            break;
        case Resque_Job_Status::STATUS_COMPLETE:
            $done = true;
            echo "download is completed";
            break;
    }


 ?>
