<?php

/*
+-----------------------------------------------------------------------+
| Application configuration file                                        |
|                                                                       |
| This is framework configuration file of the application 				|
| Copyright (C) 2005-2009, Sakiv Inc., India			                |
| Licensed under the GNU GPL v3                                         |
|                                                                       |
+-----------------------------------------------------------------------+

*/

$sf_config = array();

/**
 * Config Name: 	app_path
 * Description: 	Specifies the application root path.
 * 					If omitted or blank value then uses default value.
 * 					Using this config entry default folder path can be overriden.
 * Default Value:	Inquire the path during application run time or 
 * 					takes current executing application directory. 
 */
$sf_config['app_path'] = '';

/**
 * Config Name: 	framework_path
 * Description: 	Specifies the framework folder path.
 * 					If omitted or blank value then uses default value.
 * 					Using this config entry default folder path can be overriden.
 * Default Value:	'./'. 
 */
$sf_config['framework_path'] = '../../Framework/';


/**
 * Config Name: 	framework_folder_name
 * Description: 	Specifies the framework folder name. 
 * 					If omitted or blank value then uses default value.
 * 					Using this config entry default folder name can be overriden.
 * Default Value:	'system'. 
 */
$sf_config['framework_folder_name'] = 'system';