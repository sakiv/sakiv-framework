<?php

namespace sakiv\framework\core;

// Should be included on top of each framewrok file.
if(!defined('sakiv.framework')){
	Trace::write("External Access to File Denied", TraceMessageTypes::error, TRUE);
}

// Namespaces referred
use sakiv\framework\io;

define('SF_ROOT_NAMESPACE', 'sakiv\framework');
spl_autoload_register(__NAMESPACE__.'\core\Loader::autoLoad');
require_once __DIR__.'/../io/file.php';

/**
 * Provides auto load functionality to resolve class files.
 *
 * @final This class cannot be extended.
 * @category sakiv\framework\core
 * @filesource /framework/core/Loader.php
 * @uses
 * sakiv\framework\io
 *
 * @author sakiv
 * @copyright Copyright (C) 2005-2009, Sakiv Inc., India
 * @license Licensed under the GNU GPL v3
*/
final class Loader {

	public static function autoLoad($className) {

// 		print("AutoLoader invoked for [$className]<br/>");

// 		$trace = debug_backtrace();
// 		foreach ($trace as $item) {
// 			print("Item: $item<br/>");
// 			foreach ($item as $key => $value) {
// 				print("$key: $value<br/>");
// 			}
// 		}


		$file = str_replace(SF_ROOT_NAMESPACE, '', $className);
		$file = str_replace('\\', '/', $file);

		$filePath = realpath(io\joinPaths(__DIR__, '..', $file.'.php'));

// 		print("Search file at [$filePath]<br/>");
		if(file_exists($filePath) && is_file($filePath)) {
// 			print("File found...<br/>");
			require_once $filePath;
			return true;
		}

		return false;
	}

}

?>