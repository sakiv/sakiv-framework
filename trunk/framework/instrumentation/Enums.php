<?php

namespace sakiv\framework\instrumentation;

// Should be included on top of each framewrok file.
if(!defined('sakiv.framework')){
	Trace::write("External Access to File Denied", TraceMessageTypes::error, TRUE);
}

/**
 * Contains all enumerations for instrumentation framework module.
 *
 * @final This class cannot be extended.
 * @category sakiv\framework\instrumentation
 * @filesource /framework/instrumentation/Enums.php
 *
 * @author sakiv
 * @copyright Copyright (C) 2005-2009, Sakiv Inc., India
 * @license Licensed under the GNU GPL v3
*/
final class Enums {

	// Add constants for core here.

}

?>