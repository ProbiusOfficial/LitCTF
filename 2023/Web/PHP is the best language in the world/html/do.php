<?php

//require '../test.cc/common/functions.php';

//工具后端处理
class ErrorHandle
{
    public static function register()
    {
        error_reporting(E_ALL);
        set_error_handler([__CLASS__, 'appError']);
        set_exception_handler([__CLASS__, 'appException']);
        register_shutdown_function([__CLASS__, 'appShutdown']);
    }

    public static function appError($errno, $errstr, $errfile = '', $errline = 0)
    {
        $ret = ['code' => -1001,  'message' => 'line:'.$errline.';  message:'.$errstr ,'data' => []];
        exit(json_encode($ret));
    }


    public static function appException($e)
    {
        $ret = ['code' => -1002, 'message' => 'line:'.$e->getLine().';  message:'.$e->getMessage(), 'data' => []];
        exit(json_encode($ret));
    }

    public static function appShutdown()
    {
        //log
    }
}
//注册处理类
ErrorHandle::register();
###########################################################################################################


$type = isset($_POST['type']) ? trim($_POST['type']) : 'now';
$left_value = isset($_POST['left_value']) ? trim($_POST['left_value']) : '';
$right_value = isset($_POST['right_value']) ? trim($_POST['right_value']) : '';
$php_code = isset($_POST['php_code']) ? trim($_POST['php_code']) : '';

$ret = ['code' => 0, 'message' => 'success', 'data' => []];
if ($type == 'date_to_timestamp') {
    $ret['data']['date'] = $left_value;
    $ret['data']['timestamp'] = strtotime($ret['data']['date']);
} else if ($type == 'timestamp_to_date') {
    $ret['data']['timestamp'] = $right_value;
    $ret['data']['date'] = date('Y-m-d H:i:s', $ret['data']['timestamp']);
} else if ($type == 'now') {
    $ret['data']['timestamp'] = time();
    $ret['data']['date'] = date('Y-m-d H:i:s', $ret['data']['timestamp']);
} else if ($type == 'run') {
    $php_code = str_replace('<?php', '', $php_code);
    eval($php_code);
	exit;
} else if ($type == 'JsonToArray') {
    $ret = json_decode($php_code, true);
	exit(print_r($ret, true));
} else if ($type == 'UrlDecode') {
    echo urldecode($php_code);
	exit;
} else if ($type == 'formatJson') {
    $arr = json_decode($php_code,true);
	exit(json_encode($arr, JSON_UNESCAPED_UNICODE));
} else if ($type == 'UrlEncode') {
    echo urlencode($php_code);
	exit;
} else if ($type == 'Base64Decode') {
    echo base64_decode($php_code);
	exit;
} else if ($type == 'Base64Encode') {
    echo base64_encode($php_code);
	exit;
} else if ($type == 'MongoDecode') {
    $php_code = preg_replace_callback('/NumberInt\(\"(\d+)\"\)/i', function ($matches) {
		return $matches[1];
	}, $php_code);
	$php_code = preg_replace_callback('/ObjectId\(\"(\w+)\"\)/i', function ($matches) {
		return '"' . $matches[1] . '"';
	}, $php_code);
	echo $php_code;
	exit;
} else {
    $ret['message'] = "无操作";
}

exit(json_encode($ret, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT));
