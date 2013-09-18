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
	),
);