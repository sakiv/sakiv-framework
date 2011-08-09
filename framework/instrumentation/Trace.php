<?php

namespace sakiv\framework\instrumentation;

final class TraceMessageTypes {

	const error = -1;
	const info = 0;
	const warning = 1;

}

final class Trace {

	public static function write($message, $messageType = TraceMessageTypes::info, $haltExecution = FALSE) {
		$msg = "$messageType: $message";
		print_r($msg);

		// Halt execution if true
		if($haltExecution) {
			die($msg);
		}

	}

}

?>