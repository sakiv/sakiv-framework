<?php

namespace sakiv\framework\context;

use sakiv\framework\core;

// Singleton Context class
class Context implements iContext {

	// Holds an instance of the class
	private static $context;

	// Private constructor
	private function __construct() {

	}

	// The singleton method
	public function getCurrent() {
		if(!isset(self::$context)) {
			$c = __CLASS__;
			$context = new $c;
		}

		return self::$context;
	}

	// Prevent users to clone the instance
	public function __clone()
	{
		trigger_error('Clone is not allowed for Context class.', E_USER_ERROR);
	}
}

?>