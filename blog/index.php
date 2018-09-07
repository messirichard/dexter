<?php
$start_timeeeee = microtime(TRUE);

// change the following paths if necessary
//if($_SERVER['HTTP_HOST'] == 'localhost'){
	//localhost
	$yii=dirname(__FILE__).'/yii/framework/yii.php';
// }else{
// 	//online
// 	$yii=dirname(__FILE__).'/../../yii/framework/yii.php';
// }
$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);
error_reporting(E_ALL ^ E_NOTICE);
date_default_timezone_set('Asia/Jakarta');
require_once($yii);
Yii::createWebApplication($config)->run();

$end_timeeeee = microtime(TRUE);

// echo $end_timeeeee - $start_timeeeee;
// echo "<br>";
// function convertttt($size)
// {
// $unit=array('b','kb','mb','gb','tb','pb');
// return @round($size/pow(1024,($i=floor(log($size,1024)))),2).' '.$unit[$i];
// }
// echo(convertttt(memory_get_usage()));

