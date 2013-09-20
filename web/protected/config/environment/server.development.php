<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	// application components
	'components'=>array(
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=bbitaly_v1',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'admin123',
			'charset' => 'utf8',
		),
                'facebook'=>array(
                    'class' => 'ext.yii-facebook-opengraph.SFacebook',
                    'appId'=>'534325046636573', // needed for JS SDK, Social Plugins and PHP SDK
                    'secret'=>'ae45deb86601a866960909409fbcf5f7', // needed for the PHP SDK
                    //'fileUpload'=>false, // needed to support API POST requests which send files
                    //'trustForwarded'=>false, // trust HTTP_X_FORWARDED_* headers ?
                    //'locale'=>'en_US', // override locale setting (defaults to en_US)
                    'jsSdk'=>true, // don't include JS SDK
                    'async'=>true, // load JS SDK asynchronously
                    //'jsCallback'=>false, // declare if you are going to be inserting any JS callbacks to the async JS SDK loader
                    //'status'=>true, // JS SDK - check login status
                    //'cookie'=>true, // JS SDK - enable cookies to allow the server to access the session
                    //'oauth'=>true,  // JS SDK - enable OAuth 2.0
                    //'xfbml'=>true,  // JS SDK - parse XFBML / html5 Social Plugins
                    //'frictionlessRequests'=>true, // JS SDK - enable frictionless requests for request dialogs
                    //'html5'=>true,  // use html5 Social Plugins instead of XFBML
                    //'ogTags'=>array(  // set default OG tags
                        //'title'=>'MY_WEBSITE_NAME',
                        //'description'=>'MY_WEBSITE_DESCRIPTION',
                        //'image'=>'URL_TO_WEBSITE_LOGO',
                    //),
                    ),
	),
);