<?php

define('APP_ROOT', dirname(__DIR__));
define("APP_PATH",  dirname(__DIR__).'/application/');
define("APP_CONFIG", APP_PATH.'/conf/');
//定义全局library
//ini_set('yaf.library', APP_PATH.'/library');

require APP_ROOT.'/vendor/autoload.php';


//第二个参数用来区分开发环境、测试环境、生产环境配置 对应config中内容
$app  = new Yaf\Application( APP_CONFIG."/application.ini");
$app->bootstrap()->run();
