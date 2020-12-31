<?php
$agent = lower($_SERVER['HTTP_USER_AGENT']);

//check for nikto, sql map or "bad" subfolders which only exist on wordpress
if (strpos($agent, 'nikto') !== false || strpos($agent, 'sqlmap') !== false || startswith($url,'wp-') || startswith($url,'wordpress') || startswith($url,'wp/'))
{
      sendBomb();
      exit();
}

function sendBomb(){
        //prepare the client to recieve GZIP data. This will not be suspicious
        //since most web servers use GZIP by default
        header("Content-Encoding: gzip");
        header("Content-Length: ".filesize('10G.gzip'));
        //Turn off output buffering
        if (ob_get_level()) ob_end_clean();
        //send the gzipped file to the client
        readfile('10G.gzip');
}

function startsWith($haystack,$needle){
    return (substr($haystack,0,strlen($needle)) === $needle);
}