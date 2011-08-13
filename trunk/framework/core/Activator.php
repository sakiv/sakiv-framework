<?php

namespace sakiv\framework\core;

// Namespaces referred

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