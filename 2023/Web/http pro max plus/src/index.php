<?php
$flag = "flag{testflag}";
error_reporting(0);


function getClientIP(){       
     if (array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER)){
            return  $_SERVER["HTTP_X_FORWARDED_FOR"];  
     }else if (array_key_exists('REMOTE_ADDR', $_SERVER)) { 
            return $_SERVER["REMOTE_ADDR"]; 
     }else if (array_key_exists('HTTP_CLIENT_IP', $_SERVER)) {
            return $_SERVER["HTTP_CLIENT_IP"]; 
     }else if  (array_key_exists('HTTP_USER_AGENT', $_SERVER)) {
       return $_SERVER['HTTP_USER_AGENT']
     } 
     return '';
}

if($ip != '127.0.0.1'){
    die('<h1>仅限本地访问噢，如果你不知道本地的ip，你该学学了。</h1><h2>问题又来了，怎么改ip呢？hint:xff</h2>');
}

echo '<h1>我需要来自j0k3r.com噢，you should know Referer is 什么</h1>';

if($_SERVER['HTTP_REFERER'] != 'j0k3r.com'){
    die('<h1>You are not from j0k3r.com !</h1>');
}

echo '<h1>请使用官方浏览器 zzuli ，you should know User-Agent is 什么</h1>';

if ($_SERVER['HTTP_USER_AGENT'] != 'zzuli'){
       die('<h1>You are not use zzuli !</h1>')
 }

echo $flag;