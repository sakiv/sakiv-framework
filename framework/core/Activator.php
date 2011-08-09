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
		// TODO: Plan on using different type of contexts.

		print("$type<br/>");
		// TODO: Start Here - August 9, 2011
		return $type::getCurrent();
	}

	/*
	private static function set_context($value) {

		// TODO: Implement set_context method. Need to make it internal.
		if(!Internal::isInternal()) {
			Trace::write("Context can only be set from within framework classes.", TraceMessageTypes::error, TRUE);
		}

		self::$contexts[gettype($value)] = $value;

	}
	*/

}