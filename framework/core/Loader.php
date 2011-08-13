<?php

namespace sakiv\framework\core;

// Namespaces referred
use sakiv\framework\io;

define('SF_ROOT_NAMESPACE', 'sakiv\framework');

require_once __DIR__.'/../io/file.php';

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