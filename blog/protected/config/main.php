<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');
require_once dirname(__FILE__).'/../../config.php';
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Dexter',
	'defaultController' => 'home/index',
	
	// 'theme'=>'', //yii bootstrap
	
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.components.helpers.*',
		'application.modules.admin.controllers.*',
		'ext.galleryManager.models.*',
		'ext.z_bodya-yii-image.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'admin',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','192.168.1.18','110.139.14.64','::1'),
			//yii bootstrap
			'generatorPaths'=>array(
                'bootstrap.gii',
            ),
		),
		'auth' => array(
		  'strictMode' => true, // when enabled authorization items cannot be assigned children of the same type.
		  'userClass' => 'User', // the name of the user model class.
		  'userIdColumn' => 'user', // the name of the user id column.
		  'userNameColumn' => 'email', // the name of the user name column.
		  'appLayout' => 'application.views.layoutsAdmin.main', // the layout used by the module.
		  'viewDir' => null, // the path to view files to use with this module.
		),
		'admin',
		
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			'loginUrl'=>array('admin/home/index'),
			'logoutUrl'=>array('admin/home/index'),
		),
		// uncomment the following to enable URLs in path-format
		//Yii bootstrap
		'bootstrap'=>array(
            'class'=>'bootstrap.components.Bootstrap',
        ),
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName' => FALSE,
			'rules'=>array(
				// 'admin'=>'admin/site/index',
				// 'admin/<controller:\w+>/<id:\d+>'=>'admin/<controller>/view',
				// 'admin/<controller:\w+>/<action:\w+>/<id:\d+>'=>'admin/<controller>/<action>',
				// '<lang:\w+>/<controller:(main)>/<action:\w+>'=>'<controller>/<action>',


				// // 'product/detail/<id:\w+>'=>'product/detail',
				// 'buy-<slug:[a-zA-Z0-9&_\.-]+>-<id:\w+>.html'=>'product/detail',
				// 'product/redirectsearch'=>'product/redirectSearch',
				// 'product/buy'=>'product/buy',
				// 'product/addcart'=>'product/addcart',
				// 'product/edit'=>'product/edit',

				// 'product/<category:\w+>-<name:[a-zA-Z0-9&_\.-]+>/*'=>'product/index',
				// 'product/<category:\w+>-<name:[a-zA-Z0-9&_\.-]+>'=>'product/index',
				// 'product/*'=>'product/index',
				// 'product/<category:\w+>'=>'product/index',




				// '<controller:\w+>/<id:\d+>'=>'<controller>/view',
				// '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				// '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
				

				'/profile/login'=>'profile/login',
				'/profile/facebooktoken'=>'/profile/facebooktoken',

				'admin'=>'admin/site/index',
				'admin/<controller:\w+>/<id:\d+>/*'=>'admin/<controller>/view',
				'admin/<controller:\w+>/<id:\d+>'=>'admin/<controller>/view',
				'admin/<controller:\w+>/<action:\w+>/<id:\d+>/*'=>'admin/<controller>/<action>',
				'admin/<controller:\w+>/<action:\w+>/<id:\d+>'=>'admin/<controller>/<action>',

				'<lang:(id|en)>'=>'home/index',
				'<lang:(id|en)>/search/index?q=<q:[a-zA-Z0-9&_\.-]+>'=>'search/index',
				'<lang:(id|en)>/<controller:\w+>/<action:\w+>/*'=>'<controller>/<action>',
				'<lang:(id|en)>/<controller:\w+>/<action:\w+>'=>'<controller>/<action>',

				'/service/'=>'layanan/index',
				'/service/<id:\w+>-<url:[a-zA-Z0-9&_\.-]+>.html'=>'layanan/view',

				//menghilangkan index ex:home/index -> home
				// '<controller:\w+>/*'=>'<controller>/index',
				// '<controller:\w+>'=>'<controller>/index',

				'<controller:\w+>/<id:\d+>/*'=>'<controller>/view',
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>/*'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+[^admin]>/<action:\w+>/*'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',


			),
		),
		/*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		 */
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host='.$dt_DB['server'].';dbname='.$dt_DB['database'].'',
			'emulatePrepare' => true,
			'username' => $dt_DB['username'],
			'password' => $dt_DB['password'],
			'charset' => 'utf8',
			'class'=>'CDbConnection',
		),
		'authManager'=>array(
            'class'=>'CDbAuthManager',
            'connectionID'=>'db',
            'behaviors' => array(
				'auth' => array(
					'class' => 'auth.components.AuthBehavior',
					'admins' => array('root'), // users with full access
				),
			),
        ),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'home/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning, trace, info',
				),
	            // array(
	            //     'class'=>'ext.yii-debug-toolbar.YiiDebugToolbarRoute',
	            //     'ipFilters'=>array('127.0.0.1'),
	            // ),
				// array(
				// 	'class'=>'CWebLogRoute',
				// 	'levels'=>'error, warning, trace, info',
				// ),
				
			),
		),
		'user' => array(
			'allowAutoLogin'=>true,
			'class' => 'auth.components.AuthWebUser',
			'loginUrl'=>array('admin/home/index'),
		),
        'cache' => array(
            'class' => 'CFileCache'
        ),
        'image'=>array(
            'class'=>'ext.z_bodya-yii-image.CImageComponent',
            // GD or ImageMagick
            'driver'=>'GD',
            // ImageMagick setup path
            // 'params'=>array('directory'=>'D:/Program Files/ImageMagick-6.4.8-Q16'),
        ),
        'file'=>array(
	        'class'=>'application.extensions.cfile.CFile',
	    ),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'deoryzpandu@gmail.com',
	),
	'language'=>'en',
);