<?php

namespace sakiv\framework\core;

// Should be included on top of each framewrok file.
if(!defined('sakiv.framework')){
	Trace::write("External Access to File Denied", TraceMessageTypes::error, TRUE);
}

/**
 * PropertyBase class provides functionality to add property accessors to any class object.
 *
 * @abstract This class is abstract.
 * @category sakiv\framework\core
 * @filesource /framework/core/PropertyBase.php
 *
 * @author sakiv
 * @copyright Copyright (C) 2005-2009, Sakiv Inc., India
 * @license Licensed under the GNU GPL v3
*/
abstract class PropertyBase
{
  /**
   * Gets the value for a given property.
   * Return type is type of property.
   * @param unknown_type $name
   */
  private function __get($name)
  {
//   	print("Property get for [$name]<br/>");
    if (method_exists($this, ($method = 'get_'.$name)))
    {
      return $this->$method();
    }
    else return;
  }

  /**
   * Validates whether the given property is set or not.
   * Return type is boolean.
   * @param unknown_type $name
   */
  private function __isset($name)
  {
    if (method_exists($this, ($method = 'isset_'.$name)))
    {
      return $this->$method();
    }
    else return;
  }

  /**
   * Sets the value for a given property.
   * No values returned.
   * @param unknown_type $name
   * @param unknown_type $value
   */
  private function __set($name, $value)
  {
//   	print("Property set for [$name]<br/>");
    if (method_exists($this, ($method = 'set_'.$name)))
    {
      $this->$method($value);
    }
  }

  /**
   * Unsets a value of the given property.
   * No values returned.
   * @param unknown_type $name
   */
  private function __unset($name)
  {
    if (method_exists($this, ($method = 'unset_'.$name)))
    {
      $this->$method();
    }
  }
}

?>