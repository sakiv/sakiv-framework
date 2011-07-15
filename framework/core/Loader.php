<?php

namespace sakiv\framework\core;

use sakiv\framework\io;

define('SF_ROOT_NAMESPACE', 'sakiv/framework');

require_once __DIR__.'/../io/file.php';

class Loader {

	public static function autoLoad($className) {

		$file = str_replace('\\', '/', $className);
		$file = str_replace(SF_ROOT_NAMESPACE, '', $file);

		$filePath = realpath(io\joinPaths(__DIR__, '..', $file.'.php'));

		if(file_exists($filePath) && is_file($filePath)) {
			require_once $filePath;
			return true;
		}

		return false;
	}

}

?>