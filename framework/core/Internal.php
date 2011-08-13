<?php

namespace sakiv\framework\core;

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