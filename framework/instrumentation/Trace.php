<?php

namespace sakiv\framework\instrumentation;

final class TraceMessageTypes {

	const error = -1;
	const info = 0;
	const warning = 1;

}

final class Trace {

	public static function write($message, $messageType = TraceMessageTypes::info) {
		print_r("$messageType: $message");
	}

}

?>