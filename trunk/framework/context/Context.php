<?php

namespace sakiv\framework\context;

// Should be included on top of each framewrok file.
if(!defined('sakiv.framework')){
	Trace::write("External Access to File Denied", TraceMessageTypes::error, TRUE);
}

// Namespaces referred
use sakiv\framework\core\iContext;
use sakiv\framework\core\Internal;

/**
 * This is main and default context class for sakiv.framework.
 * This is a singleton class. It implements iContext.
 *
 * @category sakiv\framework\context
 * @filesource /framework/context/Context.php
 * @see iContext
 * @uses
 * sakiv\framework\core\iContext
 * sakiv\framework\core\Internal
 *
 * @author sakiv
 * @copyright Copyright (C) 2005-2009, Sakiv Inc., India
 * @license Licensed under the GNU GPL v3
*/
class Context implements iContext  {

	// Holds an instance of the class
	private static $instance;

	private $content = array();

	// Private constructor
	private function __construct() {
	}

	// The singleton method
	public static function getCurrent() {
// 		print("Context->getCurrent() invoked.<br/>");
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

	/**
	 * Gets the value for a given property.
	 * @param unknown_type $name
	 * @return value of the given property name.
	 */
	public function __get($name) {
		if (array_key_exists($name, $this->content)) {
			return $this->content[$name];
		}

		$trace = debug_backtrace();
		trigger_error(
		'Undefined property via __get(): ' . $name .
	            ' in ' . $trace[0]['file'] .
		' on line ' . $trace[0]['line'],
		E_USER_NOTICE);
		return null;
	}

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
			else
			{
				$this->content[$name] = $value;
			}
		}
	}

	/**
	 * Enter description here ...
	 * @param unknown_type $name
	 */
	public function __isset($name) {
		if (method_exists($this, ($method = 'unset_'.$name))) {
			$this->$method();
		}
		else
		{
			return isset($this->data[$name]);
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
		else
		{
			unset($this->content[$name]);
		}
	}

}

?>