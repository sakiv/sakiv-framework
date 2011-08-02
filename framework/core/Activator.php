<?php

namespace sakiv\framework\core;

class Activator extends PropertyBase {

	private static $context;

	public function get_context() {
		// TODO: Plan on using different type of contexts.
		return $context;
	}

	public function set_context($value) {

		// TODO: Implement set_context method. Need to make it internal.
	}

}