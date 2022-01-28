<?php

function logEvent($message, $path)
{
    if ($message != '') {

        date_default_timezone_set('Europe/Istanbul');

        $message = date("Y/m/d H:i:s") . ': ' . $message . "\n";
        $file_name = $path;


        if (!$fp = fopen($file_name, 'a')) {
            echo "Cannot open file ($file_name)";
            exit;
        }

        if (fwrite($fp, $message) === FALSE) {
            echo "Cannot write to file ($file_name)";
            exit;
        }

        fclose($fp);
    } else {
        echo "yoo";
    }
}
