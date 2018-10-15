<?php

/**
 * User: wujie
 * Date: 2016/12/22
 * @desc
 */
class CCurl
{

    public function sendMessage($url , $message){
        $process = curl_init($url);
        curl_setopt($process, CURLOPT_POSTFIELDS, http_build_query($message));
        curl_setopt($process, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($process, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($process, CURLOPT_POST, 1);
        $return = curl_exec($process);
        curl_close($process);
    }

    public function sendGetMessage($url , $message){
        $url     = $url."?".http_build_query($message);
        $process = curl_init($url);
        curl_setopt($process, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($process, CURLOPT_FOLLOWLOCATION, 1);
        $return = curl_exec($process);
        curl_close($process);
    }
}