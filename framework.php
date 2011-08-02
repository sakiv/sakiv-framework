<?php

namespace sakiv\framework;

// Should be included on top of each framewrok file.
if(!defined('sakiv.framework')){die('External Access to File Denied');}

/**
 * Sakiv.Framework: constant for framework config file name.
 * @var unknown_type
 */
define('SF_CONFIG_FILE_NAME', 'framework.inc.php');

/**
 * Sakiv.Framework entry point class.
 * @author sakiv
 *
 */
class sf {

	/**
	 * Sakiv.Framework: Use this method to load Sakiv Framework.
	 * @param unknown_type $configPath
	 */
	public static function loadFramework($configPath = null) {

		// Verify if configPath is passed or not
		// If not, then try to locate config file using locateConfigFile()
		if (!isset($configPath)) {
			$configPath = self::locateConfigFile();
		}

		// If configPath is still not set then stop processing
		if(!isset($configPath))
			die("Could not find Sakiv Framework config file ['$configPath']");

		// TODO: Try to use ErrorHandler or some common thing here.

		return self::load($configPath);
	}

	/**
	 * Locates Sakiv Framework config file within the given path
	 * @return string
	 */
	private static function locateConfigFile($lookupPath = null) {

		/**
		* Sakiv.Framework: List of path to locate the framework config file.
		* @var unknown_type
		*/
		$defaultLookupPath = array('./', './config');

		// Verify if lookupPath is passed or not
		// If passed, then process it based on its type
		if(isset($lookupPath)) {
			switch (gettype($lookupPath)) {
				// If array then merge it into defaultLookupPath
				case 'array':
					$defaultLookupPath = array_merge($lookupPath, $defaultLookupPath);
					break;

				// If string then add it to beginning of defaultLookupPath
				case 'string':
					array_unshift($defaultLookupPath, $lookupPath);
					break;

				// Print warning for any other data type
				default:
					print_r("warning: Lookup path ['$lookupPath'] not supported.");
					break;

			}
		}

		// Try to locate framework config file in each of the lookup Path
		foreach ($defaultLookupPath as $path) {
			$path = self::joinPath($path,SF_CONFIG_FILE_NAME);
			// If file found then return the path
			if (file_exists($path)) {
				return $path;
			}
		}
	}


	/**
	 * Joins the given path by eliminating any extra forward slashes "/".
	 * @param string $a
	 * @param string $b
	 * @return string
	 */
	private static function joinPath($a,$b) {
		return rtrim($a, '/') .'/'. ltrim($b, '/');
	}

	/**
	 * Loads the framework using framework config file from given path.
	 * @param unknown_type $configPath
	 */
	private static function load($configPath) {

		// Start buffer
		ob_start();

		// Define the version for framework
		define('SF_VERSION', '0.1b');

		// If framework path is not defined then set to default value
		if(!defined(SF_PATH))
			define('SF_PATH', './framework');

		// Load the framework config file
		require_once $configPath;

		// Validate framework path or stop processing
		if(!file_exists(SF_PATH))
			die("Could not find Sakiv Framework path ['SF_PATH']");

		// TODO: Try to use ErrorHandler here.

		////////////////////////////////////////////////////////////
		// Load core library
		////////////////////////////////////////////////////////////

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
		////////////////////////////////////////////////////////////

		// Release the output
		ob_end_flush();

	}


}



?>