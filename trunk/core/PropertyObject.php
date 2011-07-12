<?php

/**
 * PropertyObject class provides functionality to add property accessors
 * to any class object.
 * @author sakiv
 *
 */
abstract class PropertyObject
{
  /**
   * Gets the value for a given property.
   * Return type is type of property.
   * @param unknown_type $name
   */
  public function __get($name)
  {
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
  public function __isset($name)
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
  public function __set($name, $value)
  {
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
  public function __unset($name)
  {
    if (method_exists($this, ($method = 'unset_'.$name)))
    {
      $this->$method();
    }
  }
}

?>