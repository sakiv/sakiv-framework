<?php

/**
 * @name framework.inc.php
 * This is framework configuration file of the application

 * @author sakiv
 * @copyright Copyright (C) 2005-2009, Sakiv Inc., India
 * @license Licensed under the GNU GPL v3
 */

// Should be included on top of each framewrok file.
if(!defined('sakiv.framework')){
	Trace::write("External Access to File Denied", TraceMessageTypes::error, TRUE);
}

// TODO: Add required framework configuration.

/**
 * Config Name: 	SF_PATH
 * Description: 	Specifies the framework folder path.
 * 					If omitted or blank value then uses default value.
 * 					Using this config entry default folder path can be overriden.
 * Default Value:	'./framework'.
 */
// define('SF_PATH', './framework');