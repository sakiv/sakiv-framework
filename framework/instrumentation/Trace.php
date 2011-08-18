<?php

namespace sakiv\framework\instrumentation;

// Should be included on top of each framewrok file.
if(!defined('sakiv.framework')){
	Trace::write("External Access to File Denied", TraceMessageTypes::error, TRUE);
}

/**
 * TraceMessageTypes constants.
 *
 * @final This class cannot be extended.
 * @category sakiv\framework\instrumentation
 * @filesource /framework/instrumentation/Trace.php
 *
 * @author sakiv
 * @copyright Copyright (C) 2005-2009, Sakiv Inc., India
 * @license Licensed under the GNU GPL v3
*/
final class TraceMessageTypes {

	const error = -1;
	const info = 0;
	const warning = 1;

}

/**
 * Use to log the trace.
 *
 * @final This class cannot be extended.
 * @category sakiv\framework\instrumentation
 * @filesource /framework/instrumentation/Trace.php
 *
 * @author sakiv
 * @copyright Copyright (C) 2005-2009, Sakiv Inc., India
 * @license Licensed under the GNU GPL v3
*/
final class Trace {

	public static function write($message, $messageType = TraceMessageTypes::info, $haltExecution = FALSE) {
		$msg = "$messageType: $message";
// 		print_r($msg);

		// Halt execution if true
		if($haltExecution) {
			die($msg);
		}

	}

}

?>