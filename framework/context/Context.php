<?php

namespace sakiv\framework\context;

// Namespaces referred
use sakiv\framework\core\iContext;
use sakiv\framework\core\Internal;

// Singleton Context class
class Context implements iContext {

	// Holds an instance of the class
	private static $instance;

	// Private constructor
	private function __construct() {

	}

	// The singleton method
	public static function getCurrent() {
		print("Context->getCurrent() invoked.<br/>");
		if(!isset(self::$instance)) {
			$c = __CLASS__;
			self::$instance = new $c;
		}

		return self::$instance;
	}

	// Prevent users to clone the instance
	public function __clone()
	{
		trigger_error('Clone is not allowed for Context class.', E_USER_ERROR);
	}

	// TODO: Expand further methods to Context class.


	/**
	* Sets the value for a given property.
	* No values returned.
	* @param unknown_type $name
	* @param unknown_type $value
	*/
	public function __set($name, $value)
	{
		if (Internal::isInternal()) {
			if (method_exists($this, ($method = 'set_'.$name))) {
				$this->$method($value);
			}
		}
	}

	/**
	 * Unsets a value of the given property.
	 * No values returned.
	 * @param unknown_type $name
	 */
	public function __unset($name)
	{
		if (Internal::isInternal()) {
			if (method_exists($this, ($method = 'unset_'.$name))) {
				$this->$method();
			}
		}
	}

}

?>