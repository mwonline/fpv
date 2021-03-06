<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Administrador FPV',
	'language'=>'es',
	'sourceLanguage'=>'es',
	'defaultController'=>'index/index', 
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
        'application.components.*',
		//'application.extensions.Elfinder.*',
        'application.extensions.ElFinderWidget.*',
		//'application.extensions.ElFinderWidget.*',
		 'application.extensions.coco.*',
         //'aliases' => array('widgets' => 'application.widgets',), 
		 'application.extensions.SitemapModule.*',
		 //extension de correos
		 'application.extensions.yii-mail.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'4dm1nIV12',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
	'sitemap' => array(
        		'class' => 'ext.sitemap.SitemapModule',     //or whatever the correct path is
       			'actions' => array('site/index'),                    //optional
        		'absoluteUrls' => true|false,               //optional
        		'protectedControllers' => array('admin'),   //optional
      		    'protectedActions' =>array('site/error'),   //optional
        		'priority' => '0.5',                        //optional
        		'changefreq' => 'daily',                    //optional
		        'lastmod' => '1985-11-05',                  //optional
		        'cacheId' => 'cache',                       //optional
		        'cachingDuration' => 3600,                  //optional      
    			),	
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<alias:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<alias:\w+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
			'showScriptName'=>false,
		),
		
		/*'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),*/
		// uncomment the following to use a MySQL database
		
		/*'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=fpv',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),*/
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=wwwintel_fpvV2',
			'emulatePrepare' => true,
			'username' => 'wwwintel_fpv',
			'password' => 'O2VRku2QM3',
			'charset' => 'utf8',
		),
			
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
		'mail' => array(
		    'class' => 'ext.yii-mail.YiiMail',
		    'transportType' => 'php',
		    /*'transportOptions' => array(
		        'host' => 'smtp.gmail.com',
		        'username' => 'ares987654@gmail.com',
		        'password' => 'ares123ares',
		        'port' => '465',
		        'encryption'=>'tls',
		    ),*/
		    'viewPath' => 'application.views.mail',
		    'logging' => true,
		    'dryRun' => false
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@inteligenciavial.com',
	),
	'aliases' => array(
                'widgets' => 'application.widgets',
        ),
	
);