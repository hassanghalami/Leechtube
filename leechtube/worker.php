<?php

class My_Job
{
    public function perform()
    {
        // Work work work
        $dlneedlink=$this->args['link'];
        $userfolder=$this->args['whichuser'];
        shell_exec('cd ./videos/'.$userfolder.'/ && youtube-dl '.'"'.$dlneedlink.'"'.' 2>&1 --proxy socks5://127.0.0.1:1080');
        }
}
?>
