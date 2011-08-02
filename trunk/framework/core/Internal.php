<?php

namespace sakiv\framework\core;

class Internal {

	public static function isInternal() {
		$trace = debug_backtrace();

		// 	if(isset($trace[1]['class']) && isset($trace[2]['class'])) {
		// 		return $this->$key;
		// 	}

		foreach ($trace as $item) {
			print($item);
		}
	}

}

?>