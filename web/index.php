<?php

defined('ENV_DEVELOPMENT') or define('ENV_DEVELOPMENT','development');
defined('ENV_STAGING') or define('ENV_STAGING','staging');
defined('ENV_PRODUCTION') or define('ENV_PRODUCTION','production');

$environment = ENV_DEVELOPMENT;

if ( $_SERVER['BBENV'] == ENV_DEVELOPMENT) {

    /// Path to Yii Core.
    $yii='/usr/src/yii-1.1.14.f0fee9/framework/yii.php';

    $environment = ENV_DEVELOPMENT;

    defined('YII_DEBUG') or define('YII_DEBUG',true);

    defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);
} else if ( $_SERVER['BBENV'] == ENV_STAGING ) {

    /// Path to Yii Core.
    $yii='/usr/src/yii-1.1.14.f0fee9/framework/yii.php';

    defined('YII_DEBUG') or define('YII_DEBUG',true);

    defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

    $environment = ENV_STAGING;
} else if ( $_SERVER['BBENV'] == ENV_PRODUCTION ) {
    /// Path to Yii Core.
    $yii='/usr/src/yii-1.1.14.f0fee9/framework/yii.php';

    $environment = ENV_STAGING;
}


$config = require_once( dirname(__FILE__).'/protected/config/main.php' );
$configServer = require_once( dirname(__FILE__).'/protected/config/environment/server.'.$environment.'.php' );

require_once($yii);


$config = CMap::mergeArray( $config, $configServer );

Yii::createWebApplication($config)->run();
