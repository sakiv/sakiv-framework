<?php

namespace sakiv\framework\core;

// Should be included on top of each framewrok file.
if(!defined('sakiv.framework')){
	Trace::write("External Access to File Denied", TraceMessageTypes::error, TRUE);
}

// Namespaces referred

/**
 * Contains method to access context(s).
 * It extends PropertyBase.
 *
 * @final This class cannot be extended.
 * @category sakiv\framework\core
 * @filesource /framework/core/Activator.php
 * @see PropertyBase
 * @uses
 * sakiv\framework\core\PropertyBase
 *
 * @author sakiv
 * @copyright Copyright (C) 2005-2009, Sakiv Inc., India
 * @license Licensed under the GNU GPL v3
*/
final class Activator extends PropertyBase {

	//private static $contexts = array();

	// Holds an instance of the class
	private static $instance;

	// Private constructor
	private function __construct() {

	}

	// The singleton method
	public static function getInstance() {
		if(!isset(self::$instance)) {
			$c = __CLASS__;
			self::$instance = new $c;
		}

		return self::$instance;
	}

	// Prevent users to clone the instance
	public function __clone()
	{
		trigger_error('Clone is not allowed for Activator class.', E_USER_ERROR);
	}


	/**
	 * context Property
	 * @param unknown_type $type
	 * @return string
	 */
	public function get_context($type = 'sakiv\framework\context\Context') {
		//print("Type: $type<br/>");
		return $type::getCurrent();
	}

}