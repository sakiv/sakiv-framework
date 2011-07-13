<?php if(!defined('sakiv.framework')){die('External Access to File Denied');}

/**
 * Sakiv.Framework constant for framework config file name.
 * @var unknown_type
 */
define('SF_CONFIG_FILE_NAME', 'framework.inc.php');

class sf {

	const lookupPath = array('./', './config');

	public static function loadFramework($configPath = null) {

		if (!isset($configPath)) {
			$configPath = sf::locateConfigFile();
		}

		//TODO: Load framework


	}

	private static function locateConfigFile() {

		foreach (sf::lookupPath as $path)
		if (file_exists($path.SF_CONFIG_FILE_NAME)) {
			return $path.SF_CONFIG_FILE_NAME;
		}
	}

}

?>