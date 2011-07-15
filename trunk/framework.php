<?php

namespace sakiv\framework;

// Should be included on top of each framewrok file.
if(!defined('sakiv.framework')){die('External Access to File Denied');}

/**
 * Sakiv.Framework: constant for framework config file name.
 * @var unknown_type
 */
define('SF_CONFIG_FILE_NAME', 'framework.inc.php');

class sf {

	/**
	 * Sakiv.Framework: Use this method to load Sakiv Framework.
	 * @param unknown_type $configPath
	 */
	public static function loadFramework($configPath = null) {

		if (!isset($configPath)) {
			$configPath = self::locateConfigFile();
		}

		if(!isset($configPath))
			die("Could not find Sakiv Framework config file ['$configPath']");

		return self::load($configPath);

	}

	private static function locateConfigFile() {

		/**
		* Sakiv.Framework: List of path to locate the framework config file.
		* @var unknown_type
		*/
		$configLookupPath = array('./', './config');

		foreach ($configLookupPath as $path) {
			$path = self::joinPath($path,SF_CONFIG_FILE_NAME);
			if (file_exists($path)) {
				return $path;
			}
		}
	}

	private static function joinPath($a,$b) {
		return rtrim($a, '/') .'/'. ltrim($b, '/');
	}

	private static function load($configPath) {

		// Start buffer
		ob_start();

		define('SF_VERSION', '0.1b');

		if(!defined(SF_PATH))
			define('SF_PATH', './framework');

		require_once $configPath;

		// Load core library

		if(!file_exists(SF_PATH))
			die("Could not find Sakiv Framework path ['SF_PATH']");

		$sf_core = self::joinPath(SF_PATH, 'core');
		if($handle = opendir($sf_core)) {

			$loaderPath = self::joinPath($sf_core, 'Loader.php');
			print("Loading [$loaderPath]...<br/>");
			require_once $loaderPath;
			spl_autoload_register(__NAMESPACE__.'\core\Loader::autoLoad');

			while (false !== ($file = readdir($handle))) {
				if(strtolower(end(explode('.', $file))) == 'php') {
					$filePath = self::joinPath($sf_core, $file);
					if (is_file($filePath)) {
						print("Loading [$filePath]...<br/>");
						require_once $filePath;
					}
				}
			}

			closedir($handle);
		}

		// Release the output
		ob_end_flush();

	}


}



?>