<?php

namespace sakiv\framework\core;

// Should be included on top of each framewrok file.
if(!defined('sakiv.framework')){
	Trace::write("External Access to File Denied", TraceMessageTypes::error, TRUE);
}

/**
 * Provides the functionality of Internal similar to C#.NET.
 *
 * @category sakiv\framework\core
 * @filesource /framework/core/Internal.php
 *
 * @author sakiv
 * @copyright Copyright (C) 2005-2009, Sakiv Inc., India
 * @license Licensed under the GNU GPL v3
*/
class Internal {

        public static function isInternal() {
                $trace = debug_backtrace();

                if(count($trace) > 0 && isset($trace[1]['class'])) {
                	$file = $trace[1]['file'];
//                 	print($file);
                	$framework = str_replace('/core/Internal.php', '', __FILE__);
                	return (substr($file, 0, strlen($framework)) === $framework);
                }
        }

}

?>